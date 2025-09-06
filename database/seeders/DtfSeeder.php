<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DtfSize;
use App\Models\DtfColor;

class DtfSeeder extends Seeder
{
    public function run(): void
    {
        // Sizes
        $sizes = [
            ['title' => '4x4 in', 'width' => 4, 'height' => 4, 'rate' => 0.06],
            ['title' => '8x10 in', 'width' => 8, 'height' => 10, 'rate' => 0.05],
            ['title' => '12x12 in', 'width' => 12, 'height' => 12, 'rate' => 0.045],
            ['title' => '22x22 in', 'width' => 22, 'height' => 22, 'rate' => 0.04],
        ];
        foreach ($sizes as $s) DtfSize::create($s);

        // Colors
        $colors = [
            ['key' => 'fullcolor', 'label' => 'Full Color', 'surcharge' => 0.00],
            ['key' => 'white_underbase', 'label' => 'White Underbase', 'surcharge' => 0.10],
            ['key' => 'spot_color', 'label' => 'Spot Color', 'surcharge' => 0.05],
        ];
        foreach ($colors as $c) DtfColor::create($c);
    }
}

