<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use JsonMachine\JsonMachine;
set_time_limit(0);


class ProductSyncController extends Controller
{
    /**
     * STEP 1 → Start sync
     * Fetch styles once and store them lightweight in cache
     */
    public function startSync()
    {
        try {
            // Fetch styles list from SS API (or cache if already fetched)
            $styles = Cache::remember('ss_styles', 3600, function () {
                $res = Http::withBasicAuth(env('SS_ACCOUNT_NUMBER'), env('SS_API_KEY'))
                    ->timeout(60)
                    ->get('https://api.ssactivewear.com/v2/styles');

                if ($res->failed()) {
                    throw new \Exception("Failed to fetch styles list");
                }
                return $res->json();
            });

            Cache::put('ss_style_index', 0);
            Cache::put('ss_product_offset', 0);
            Cache::put('ss_total_processed', 0); // 👈 new

            return response()->json([
                'message' => '✅ Sync initialized',
                'total_styles' => count($styles)
            ]);
        } catch (\Throwable $e) {
            Log::error("SS Sync start failed: " . $e->getMessage());
            return response()->json(['error' => '❌ Initialization failed']);
        }
    }

    // Step 2: Fetch Batch (1000 at a time)
    public function syncBatch()
{
    try {
        $styles   = Cache::get('ss_styles', []);
        $styleIdx = Cache::get('ss_style_index', 0);
        $offset   = Cache::get('ss_product_offset', 0);

        if (!isset($styles[$styleIdx])) {
            Cache::forget('ss_styles');
            Cache::forget('ss_style_index');
            Cache::forget('ss_product_offset');
            return response()->json(['done' => true, 'message' => '✅ All styles synced']);
        }

        $processedCount = 0; // total products processed this click
        $messages = [];

        while ($processedCount < 1000 && isset($styles[$styleIdx])) {
            $style     = $styles[$styleIdx];
            $styleId   = $style['styleID'];
            $brand     = $style['brandName'];
            $styleName = $style['styleName'];
            $description = $style['description'];

            // Ensure category exists
            $category = Category::updateOrCreate(
                ['slug' => Str::slug($style['baseCategory'] ?? 'uncategorized')],
                [
                    'name'      => $style['baseCategory'] ?? 'Uncategorized',
                    'is_active' => 1,
                    'image'     => $style['brandImage'] ?? $style['styleImage'],
                ]
            );

            // JSON cache per style
            $jsonFile = storage_path("app/ss_products_{$styleId}.json");
            if (!file_exists($jsonFile)) {
                $prodRes = Http::withBasicAuth(env('SS_ACCOUNT_NUMBER'), env('SS_API_KEY'))
                    ->timeout(600)
                    ->sink($jsonFile)
                    ->get('https://api.ssactivewear.com/v2/products/', [
                        'styleid'   => $styleId,
                        'mediatype' => 'json',
                    ]);

                if ($prodRes->failed()) {
                    return response()->json(['error' => "❌ Failed to fetch products for style {$styleId}"]);
                }
            }

            // 🔹 Load JSON safely
$allProducts = [];
if (file_exists($jsonFile)) {
    $allProducts = json_decode(file_get_contents($jsonFile), true);
}

// ✅ If file empty or invalid → skip style
if (!$allProducts || !is_array($allProducts)) {
    if (file_exists($jsonFile)) {
        unlink($jsonFile); // remove invalid JSON
    }
    // Move to next style
    $styleIdx++;
    Cache::put('ss_style_index', $styleIdx);
    Cache::put('ss_product_offset', 0);

    return response()->json([
        'message' => "⚠️ Skipped style {$styleName} ({$brand}) — no products found or invalid JSON",
        'style_index' => $styleIdx,
        'total_styles' => count($styles),
        'done' => false,
    ]);
}

$totalProducts = count($allProducts);


            // Remaining products in this style
            $remainingInStyle = $totalProducts - $offset;
            $remainingQuota = 1000 - $processedCount;
            $take = min($remainingInStyle, $remainingQuota);

            $batch = array_slice($allProducts, $offset, $take);

            foreach ($batch as $p) {
                $this->processProduct($p, $styleId, $brand, $styleName, $category, $description);
            }

            $processedCount += count($batch);
            $offset += count($batch);

            // Finished this style → move to next
            if ($offset >= $totalProducts) {
                if (file_exists($jsonFile)) {
                    unlink($jsonFile);
                }
                $styleIdx++;
                $offset = 0;
                Cache::put('ss_style_index', $styleIdx);
                $messages[] = "✅ Finished style {$styleName} ({$brand})";
            }

            Cache::put('ss_product_offset', $offset);
        }

        $totalProcessed = Cache::get('ss_total_processed', 0);
        $totalProcessed += $processedCount;
        Cache::put('ss_total_processed', $totalProcessed);

        return response()->json([
            'message'        => implode(" | ", $messages) ?: "Processed {$processedCount} products",
            'style_index'    => $styleIdx,
            'total_styles'   => count($styles),
            'batch_size'     => $processedCount,
            'products_done'  => $totalProcessed,   // 👈 cumulative products
            'done'           => false,
        ]);

    } catch (\Throwable $e) {
        Log::error("SS Sync batch failed: " . $e->getMessage());
        return response()->json(['error' => '❌ Batch failed'.$e->getMessage()]);
    }
}


/**
 * Process and save a single product safely
 */
protected function processProduct(array $p, $styleId, $brand, $styleName, $category , $description)
{
    // Parent product
    $possibleImages = [
        'colorFrontImage',
        'colorSideImage',
        'colorBackImage',
        'colorDirectSideImage',
        'colorOnModelFrontImage',
        'colorOnModelSideImage',
        'colorOnModelBackImage',
        'colorSwatchImage',
    ];
    $mainImage = null;
    foreach ($possibleImages as $key) {
        if (!empty($p[$key])) {
            $mainImage = $p[$key];
            break;
        }
    }

    $product = Product::updateOrCreate(
        ['ss_product_id' => $styleId],
        [
            'name'         => trim(($brand ? $brand.' ' : '').$styleName),
            'slug'         => Str::slug(($brand ?: 'style').'-'.$styleId.'-'.$styleName),
            'brand'        => $brand,
            'category_id'  => $category->id,
            'style_number' => $styleName,
            'main_image'   => $mainImage,
            'price'        => (float)($p['customerPrice'] ?? 0),
            'stock'        => (int)($p['qty'] ?? 0),
            'description'  => $description,
        ]
    );

    // Images
    $imageKeys = [
        'colorSwatchImage',
        'colorFrontImage',
        'colorSideImage',
        'colorBackImage',
        'colorDirectSideImage',
        'colorOnModelFrontImage',
        'colorOnModelSideImage',
        'colorOnModelBackImage',
    ];

    $images = [];
    foreach ($imageKeys as $sort => $key) {
        if (!empty($p[$key])) {
            $images[$p[$key]] = $sort;
        }
    }

    foreach ($images as $path => $sort) {
        $product->images()->updateOrCreate(
            ['path' => $path],
            ['sort' => $sort]
        );
    }

    // Variants
    $product->variants()->updateOrCreate(
        ['sku' => $p['sku'] ?? null],
        [
            'ss_sku_id'    => $p['skuID_Master'] ?? null,
            'variant_name' => $p['sizeName'] ?? null,
            'color'        => $p['colorName'] ?? null,
            'color_code'   => $p['color1'] ?? $p['color2'] ?? null,
            'swatch_image' => $p['colorSwatchImage'] ?? null,
            'size'         => $p['sizeName'] ?? null,
            'price'        => (float)($p['customerPrice'] ?? 0),
            'map_price'    => (float)($p['mapPrice'] ?? 0),
            'stock'        => (int)($p['qty'] ?? 0),
            'warehouses'   => json_encode($p['warehouses'] ?? []),
            'is_active'    => true,
        ]
    );
}

}
