<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncSSStyleProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $styleId;
    protected $brandName;
    protected $styleName;

    public $tries = 3;

    public function __construct($styleId, $brandName = null, $styleName = null)
    {
        $this->styleId   = $styleId;
        $this->brandName = $brandName;
        $this->styleName = $styleName;
    }

    public function handle(): void
    {
        Log::info("Syncing products for StyleID {$this->styleId}");

        $prodRes = Http::timeout(30)
            ->withBasicAuth(env('SS_ACCOUNT_NUMBER'), env('SS_API_KEY'))
            ->get('https://api.ssactivewear.com/v2/products/', [
                'styleid'   => $this->styleId,
                'mediatype' => 'json',
            ]);

        if ($prodRes->failed()) {
            Log::error("SS Products fetch failed for StyleID {$this->styleId}: " . $prodRes->body());
            return;
        }

        $rows = $prodRes->json();
        if (!is_array($rows) || empty($rows)) {
            Log::warning("No products found for StyleID {$this->styleId}");
            return;
        }

        // Create/Update Product
        $product = Product::updateOrCreate(
            ['ss_product_id' => $this->styleId],
            [
                'name'         => trim(($this->brandName ? $this->brandName.' ' : '').($this->styleName ?? '')),
                'slug'         => Str::slug(($this->brandName ?? 'style').'-'.$this->styleId.'-'.($this->styleName ?? '')),
                'brand'        => $this->brandName,
                'style_number' => $this->styleName,
                'main_image'   => $rows[0]['colorFrontImage'] ?? null,
                'price'        => (float)($rows[0]['customerPrice'] ?? 0),
            ]
        );

        // Upsert Variants
        foreach ($rows as $p) {
            $product->variants()->updateOrCreate(
                ['sku' => $p['sku']],
                [
                    'ss_sku_id'    => $p['skuID_Master'] ?? null,
                    'color'        => $p['colorName'] ?? null,
                    'color_code'   => $p['colorCode'] ?? null,
                    'swatch_image' => $p['colorSwatchImage'] ?? null,
                    'size'         => $p['sizeName'] ?? null,
                    'price'        => (float)($p['customerPrice'] ?? 0),
                    'map_price'    => (float)($p['mapPrice'] ?? 0),
                    'stock'        => (int)($p['qty'] ?? 0),
                    'warehouses'   => $p['warehouses'] ?? [],
                    'is_active'    => true,
                ]
            );
        }

        $product->refreshStock();

        Log::info("Finished syncing StyleID {$this->styleId} with " . count($rows) . " variants.");
    }
}
