<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DtfImage;
use App\Models\DtfSize;
use App\Models\DtfColor;


class DTFuploadController extends Controller
{
    //

    public function index()
    {
        $images = DtfImage::where('type', 'dtf-gangsheet-upload')->get();
        $colors = DtfColor::where('type', 'dtf-gangsheet-upload')->where('is_active',1)->orderBy('id')->get();
        $sizes  = DtfSize::where('type', 'dtf-gangsheet-upload')->where('is_active',1)->orderBy('id')->get();

        return view('dtf.upload', compact('images','colors','sizes'));
    }

    // Price calculator (AJAX)
    public function calculate(Request $request)
    {
        $size  = DtfSize::findOrFail($request->size_id);
        $color = DtfColor::findOrFail($request->color_id);
        $qty   = (int) $request->quantity;

        $unit_price = $size->rate + $color->surcharge;
        $subtotal   = $unit_price * $qty;

        return response()->json([
            'unit_price' => $unit_price,
            'subtotal'   => $subtotal,
        ]);
    }

    // Add to cart
        public function addToCart(Request $request)
    {
        $request->validate([
            'size_id'   => 'required|exists:dtf_sizes,id',
            'color_id'  => 'required|exists:dtf_colors,id',
            'quantity'  => 'required|integer|min:1',
            'artwork'   => 'required|file|mimes:png,jpg,jpeg,pdf,svg|max:10240'
        ]);

        $size  = DtfSize::findOrFail($request->size_id);
        $color = DtfColor::findOrFail($request->color_id);

        /** 
         * Store file into public/dtf 
         */
        $file = $request->file('artwork');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('dtf'), $filename);

        // store relative path for retrieval
        $path = 'dtf/' . $filename;

        /**
         * Pricing
         * Example logic:
         * - Base price per sq.inch = size->rate
         * - Color surcharge (flat OR per sq.inch)
         */
        $area = $size->width * $size->height;

        // If your "rate" is per square inch:
        $basePrice = $area * $size->rate;

        // If your "surcharge" is also per square inch:
        $surcharge  = $area * $color->surcharge;

        // Final price per item
        $pricePerItem = $request->unitprice;

        $cart = session()->get('cart', []);

        $cart[] = [
            'type'        => 'dtf-gangsheet-upload',
            'name'        => "DTF Gangsheet Upload - {$size->title}",
            'size_title'  => $size->title,
            'color'       => $color->label,
            'width'       => $size->width,
            'height'      => $size->height,
            'price'       => $pricePerItem,
            'quantity'    => (int)$request->quantity,
            'artwork'     => $path, // saved path in /public/dtf
            'artwork_url' => asset($path), // helpful for displaying in cart
        ];

        session()->put('cart', $cart);

        return redirect('/cart')->with('success', 'DTF Transfer added to cart!');
    }
}
