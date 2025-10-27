<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DtfImage;

class DtfImagesSeeder extends Seeder
{
    public function run(): void
    {
        // List of poster sizes
        $sizes = [
            '22 × 24 ',
            '22 × 36',
            '22 × 48',
            '22 × 60',
            '22 × 72',
            '22 × 84',
            '22 × 96',
            '22 × 108',
            '22 × 120',
            '22 × 132',
            '22 × 144',
            '22 × 156',
            '22 × 168',
            '22 × 180',
            '22 × 192',
            '22 × 204',
            '22 × 216',
            '22 × 228',
            '22 × 240',
        ];

        $records = [];

        foreach ($sizes as $index => $size) {
            $records[] = [
                'path' => "{$size}.jpg", // filename as in /public/dtf-transfer/
                'sort' => $index + 1,
                'type' => 'dtf-transfer-by-size',      // or whatever type you use
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DtfImage::insert($records);
    }
}
