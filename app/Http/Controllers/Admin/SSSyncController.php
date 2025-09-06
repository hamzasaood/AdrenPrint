<?php
// app/Http/Controllers/Admin/SSSyncController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\SSActivewearService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SSSyncController extends Controller
{
    protected $ssService;

    public function __construct(SSActivewearService $ssService)
    {
        $this->ssService = $ssService;
    }

    public function syncProducts()
    {
        $products = $this->ssService->getProducts(['limit' => 50]); // adjust limit/pagination as needed

        if (isset($products['error'])) {
            return response()->json(['success' => false, 'message' => $products['error']]);
        }

        foreach ($products as $p) {
            $product = Product::updateOrCreate(
                ['ss_product_id' => $p['id']], // match by S&S product id
                [
                    'name' => $p['name'],
                    'slug' => Str::slug($p['name']).'-'.$p['id'],
                    'brand' => $p['brandName'] ?? null,
                    'style_number' => $p['styleName'] ?? null,
                    'price' => $p['msrp'] ?? 0,
                    'stock' => $p['piecesAvailable'] ?? 0,
                    'description' => $p['description'] ?? '',
                    'main_image' => $p['frontImage'] ?? null,
                    'image' => $p['frontImage'] ?? null,
                    'is_active' => 1,
                ]
            );

            // Sync variants
            if (!empty($p['variants'])) {
                foreach ($p['variants'] as $variant) {
                    ProductVariant::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'sku' => $variant['sku'],
                        ],
                        [
                            'variant_name' => $variant['colorName'].' '.$variant['sizeName'],
                            'type' => 'ss_variant',
                            'price' => $variant['price'] ?? $product->price,
                            'stock' => $variant['piecesAvailable'] ?? 0,
                            'color' => $variant['colorName'] ?? null,
                            'size' => $variant['sizeName'] ?? null,
                            'is_active' => 1,
                        ]
                    );
                }
            }
        }

        return response()->json(['success' => true, 'message' => 'Products synced successfully!']);
    }
}

