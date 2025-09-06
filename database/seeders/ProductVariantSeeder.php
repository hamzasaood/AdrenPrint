<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $variants = [
            ['White Cotton T-Shirt', [
                ['Size S', 1150, 4],
                ['Size M', 1200, 3],
                ['Size L', 1250, 3],
            ]],
            ['Premium Coffee Mug', [
                ['11oz', 900, 10],
                ['15oz', 1050, 10],
            ]],
            ['Snapback Cap', [
                ['Red', 1100, 5],
                ['Black', 1100, 7],
            ]],
            ['Poster 18x24', [
                ['Glossy', 1350, 10],
                ['Matte', 1400, 12],
            ]],
        ];

        foreach ($variants as [$productName, $variantList]) {
            $product = Product::where('name', $productName)->first();
            if (!$product) continue;

            foreach ($variantList as [$variant_name, $price, $stock]) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'variant_name' => $variant_name,
                    'price' => $price,
                    'stock' => $stock,
                    'is_active' => true
                ]);
            }
        }
    }
}
