<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categoryMap = Category::pluck('id', 'slug')->toArray();

        $products = [
            ['White Cotton T-Shirt', 't-shirts', 1200, 10, 'custom'],
            ['Black Hoodie Classic', 'hoodies', 1800, 15, 'custom'],
            ['Premium Coffee Mug', 'mugs', 950, 20, 'dtf'],
            ['Large Tote Bag', 'tote-bags', 1000, 25, 'custom'],
            ['Snapback Cap', 'caps', 1100, 18, 'pod'],
            ['Sticker Pack A', 'stickers', 500, 30, 'dtf'],
            ['Business Cards 100pk', 'business-cards', 1500, 50, 'custom'],
            ['16-page Booklet A5', 'booklets', 2200, 12, 'custom'],
            ['Poster 18x24', 'posters', 1350, 22, 'pod'],
            ['Notebook Lined', 'notebooks', 1150, 40, 'custom'],
            ['Flyer A4 Set 50', 'flyers', 1400, 35, 'custom'],
        ];

        foreach ($products as [$name, $slug, $price, $stock, $design_type]) {
            if (!isset($categoryMap[$slug])) continue;

            Product::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'category_id' => $categoryMap[$slug],
                'price' => $price,
                'stock' => $stock,
                'design_type' => $design_type
            ]);
        }
    }
}
