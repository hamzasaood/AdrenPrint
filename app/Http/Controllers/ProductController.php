<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //

   public function show($slug)
    {  
        $product = Product::with([
            'variants' => function ($q) {
                $q->where('stock', '>', 0)
                  ->orderBy('size')->orderBy('color');
            },
            'images' => function ($q) {
                $q->orderBy('sort');
            }
        ])->where('slug', $slug)->firstOrFail();

        // Pick main image logic (fallback chain)
        $mainImage = $product->main_image;

        if (!$mainImage && $product->images->count()) {
            $mainImage = $product->images->first()->path;
        }
        $latestProducts = Product::where('brand','Adidas')->latest()->take(8)->with('images')->get();

        return view('product-detail', compact('product', 'mainImage', 'latestProducts'));
    }
}
