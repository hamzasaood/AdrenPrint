<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category_id', 'price','stock', 'description', 'design_type', 'image', 'is_active','ss_product_id'
        ,'brand','style_number','main_image',
    ];

    public function category()
    {
    return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
    public function variants()
    {
    return $this->hasMany(ProductVariant::class);
    }
    public function refreshStock(): void
    {
        $this->update(['stock' => (int) $this->variants()->sum('stock')]);
    }
    public function images()
    {
        return $this->hasMany(Product_Image::class);
    }

}
