<?php

/*
 * This file is part of the FullyPrint project.
 *
 * (c) Your Name <  
 * 
 * 
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['id' => 2, 'name' => 'T-Shirts', 'slug' => 't-shirts'],
            ['name' => 'Mugs', 'slug' => 'mugs'],
            ['name' => 'Booklets', 'slug' => 'booklets'],
            ['name' => 'Hoodies', 'slug' => 'hoodies'],
            ['name' => 'Tote Bags', 'slug' => 'tote-bags'],
            ['name' => 'Caps', 'slug' => 'caps'],
            ['name' => 'Posters', 'slug' => 'posters'],
            ['name' => 'Stickers', 'slug' => 'stickers'],
            ['name' => 'Business Cards', 'slug' => 'business-cards'],
            ['name' => 'Flyers', 'slug' => 'flyers'],
            ['name' => 'Notebooks', 'slug' => 'notebooks'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => $cat['slug']],
                ['id' => $cat['id'] ?? null, 'name' => $cat['name'], 'slug' => $cat['slug'], 'is_active' => true]
            );
        }
    }
}

