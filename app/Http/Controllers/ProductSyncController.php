<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ProductSyncController extends Controller
{
    /**
     * STEP 1 → Start sync
     * Fetch styles once and store them lightweight in cache
     */
    public function startSync()
    {
        try {
            // 🔹 Use stream mode to avoid memory spikes
            $stylesRes = Http::withBasicAuth(env('SS_ACCOUNT_NUMBER'), env('SS_API_KEY'))
                ->timeout(30) // smaller timeout, we'll call multiple times
                ->get('https://api.ssactivewear.com/v2/styles/', [
                    'fields'    => 'styleID,brandName,partNumber,styleName,baseCategory,brandImage,styleImage',
                    'mediatype' => 'json',
                ]);

            if ($stylesRes->failed()) {
                return response()->json(['error' => 'Failed to fetch styles']);
            }

            $styles = $stylesRes->json();

            // 🔹 Only keep the required info in cache
            $lightweight = collect($styles)->map(function ($s) {
                return [
                    'styleID'      => $s['styleID'] ?? null,
                    'brandName'    => $s['brandName'] ?? '',
                    'styleName'    => $s['styleName'] ?? ($s['partNumber'] ?? 'Unknown'),
                    'partNumber'   => $s['partNumber'] ?? '',
                    'baseCategory' => $s['baseCategory'] ?? 'Uncategorized',
                    'brandImage'   => $s['brandImage'] ?? null,
                    'styleImage'   => $s['styleImage'] ?? null,
                ];
            })->filter(fn($s) => !empty($s['styleID']))->values()->all();

            // 🔹 Cache reset
            Cache::put('ss_styles', $lightweight, 7200); // 2 hrs
            Cache::put('ss_style_index', 0);
            Cache::put('ss_product_offset', 0);

            return response()->json([
                'total_styles' => count($lightweight),
                'message'      => 'Sync initialized',
            ]);
        } catch (\Throwable $e) {
            Log::error("SS Sync start failed: ".$e->getMessage());
            return response()->json(['error' => 'Sync start failed']);
        }
    }

    /**
     * STEP 2 → Sync products in batches of 100 per request
     */
    public function syncBatch()
    {
        try {
            $styles   = Cache::get('ss_styles', []);
            $styleIdx = Cache::get('ss_style_index', 0);
            $offset   = Cache::get('ss_product_offset', 0);

            // 🔹 No more styles → finished
            if (!isset($styles[$styleIdx])) {
                Cache::forget('ss_styles');
                Cache::forget('ss_style_index');
                Cache::forget('ss_product_offset');
                return response()->json(['done' => true, 'message' => '✅ All styles synced']);
            }

            $style     = $styles[$styleIdx];
            $styleId   = $style['styleID'];
            $brand     = $style['brandName'];
            $styleName = $style['styleName'];

            // 🔹 Ensure category exists
            $category = Category::updateOrCreate(
                ['slug' => Str::slug($style['baseCategory'] ?? 'uncategorized')],
                [
                    'name'      => $style['baseCategory'] ?? 'Uncategorized',
                    'is_active' => 1,
                    'image'     => $style['brandImage'] ?? $style['styleImage'],
                ]
            );

            // 🔹 Load cached products for this style
            $allProducts = Cache::get("ss_current_products_{$styleId}");

            if (!$allProducts) {
                // First time → fetch products for this style
                $prodRes = Http::withBasicAuth(env('SS_ACCOUNT_NUMBER'), env('SS_API_KEY'))
                    ->timeout(300)
                    ->get('https://api.ssactivewear.com/v2/products/', [
                        'styleid'   => $styleId,
                        'mediatype' => 'json',
                    ]);

                if ($prodRes->failed()) {
                    return response()->json(['error' => "❌ Failed to fetch products for style {$styleId}"]);
                }

                $allProducts = $prodRes->json() ?? [];

                // 🔹 Store in cache (avoid sha1 error by serializing cleanly)
                Cache::put("ss_current_products_{$styleId}", $allProducts, 3600);
            }

            // 🔹 Get batch of 100 products
            $batch = array_slice($allProducts, $offset, 100);

            if (empty($batch)) {
                // Finished this style → clear + move to next
                Cache::forget("ss_current_products_{$styleId}");
                Cache::put('ss_style_index', $styleIdx + 1);
                Cache::put('ss_product_offset', 0);

                return response()->json([
                    'message'      => "✅ Finished style {$styleName} ({$brand})",
                    'style_done'   => true,
                    'style_index'  => $styleIdx + 1,
                    'total_styles' => count($styles),
                ]);
            }

            // 🔹 Parent product
            $product = Product::updateOrCreate(
                ['ss_product_id' => $styleId],
                [
                    'name'         => trim(($brand ? $brand.' ' : '').$styleName),
                    'slug'         => Str::slug(($brand ?: 'style').'-'.$styleId.'-'.$styleName),
                    'brand'        => $brand,
                    'category_id'  => $category->id,
                    'style_number' => $styleName,
                    'main_image'   => $batch[0]['colorFrontImage'] ?? null,
                    'price'        => (float)($batch[0]['customerPrice'] ?? 0),
                    'stock'        => (int)($batch[0]['qty'] ?? 0),
                ]
            );

            // 🔹 Variants
            foreach ($batch as $p) {
                $product->variants()->updateOrCreate(
                    ['sku' => $p['sku']],
                    [
                        'ss_sku_id'    => $p['skuID_Master'] ?? null,
                        'variant_name' => $p['sizeName'] ?? null,
                        'color'        => $p['colorName'] ?? null,
                        'color_code'   => $p['colorCode'] ?? null,
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

            // 🔹 Update offset
            Cache::put('ss_product_offset', $offset + 100);

            return response()->json([
                'message'        => "Synced " . count($batch) . " products for {$styleName}",
                'style_index'    => $styleIdx,
                'total_styles'   => count($styles),
                'batch_size'     => count($batch),
                'products_total' => count($allProducts),
                'products_done'  => min($offset + 100, count($allProducts)),
                'done'           => false,
            ]);
        } catch (\Throwable $e) {
            Log::error("SS Sync batch failed: ".$e->getMessage());
            return response()->json(['error' => '❌ Batch failed']);
        }
    }
}
