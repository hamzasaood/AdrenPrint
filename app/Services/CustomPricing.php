<?php

namespace App\Services;

class CustomPricing
{
    /**
     * Calculate gangsheet pricing based on fixed width × height sizes.
     *
     * @param float $width
     * @param float $height
     * @param int   $qty
     * @return array
     */
    public static function priceForGangsheet(float $width, float $height, int $qty): array
    {
        $area = $width * $height;

        // Updated base size prices (following Ninja Transfers sample sizes)
        $baseSizes = [
            '22x22'  => 30.00, // example price
            '22x60'  => 65.00, // example price
            '22x120' => 120.00, // example price
            '24x36'  => 38.00,
            '24x48'  => 50.00,
            '48x60'  => 95.00,
            // Add more as needed...
        ];

        $sizeKey = intval($width) . 'x' . intval($height);

        // Look up unit price (fallback to per sq.inch estimate)
        $unitPrice = $baseSizes[$sizeKey] ?? round($area * 0.10, 2);

        $totalPrice = round($unitPrice * $qty, 2);

        return [
            'width'       => $width,
            'height'      => $height,
            'area'        => $area,
            'qty'         => $qty,
            'unit_price'  => $unitPrice,
            'total_price' => $totalPrice,
            'used_size'   => $sizeKey,
            'is_custom'   => !isset($baseSizes[$sizeKey]),
        ];
    }
}
