<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'variant_name', 'type', 'sku', 'price', 'stock', 'is_active','color','size',
        'color_code','swatch_image','map_price','warehouses','ss_sku_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $casts = [
        'warehouses' => 'array',
    ];
}
