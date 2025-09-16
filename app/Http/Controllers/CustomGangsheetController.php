<?php

// app/Http/Controllers/CustomGangsheetController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\CustomPricing;

class CustomGangsheetController extends Controller
{
    public function index()
    {
        return view('custom.gangsheet');
    }
    public function save(Request $request)
    {
        $data = $request->validate([
            'design_id' => 'required',
            'width'     => 'required|numeric',
            'height'    => 'required|numeric',
            'qty'       => 'required|integer|min:1'
        ]);

        // 1. Get full design details from DripApps
        $design = Http::withToken(config('services.dripapps.api_token'))
            ->get("https://app.buildagangsheet.com/api/v1/design/{$data['design_id']}")
            ->json();

        // 2. Generate image from DripApps
        $imageRes = Http::withToken(config('services.dripapps.api_token'))
            ->post("https://app.buildagangsheet.com/api/v1/design/generate", [
                "design_id" => $data['design_id'],
                "file_name" => "gangsheet.png"
            ])->json();

        $previewUrl = $imageRes['url'] ?? null;

        // 3. Compute pricing (per your formula)
        $price = CustomPricing::priceForGangsheet($data['width'], $data['height'], $data['qty']);

        // 4. Add to cart (session)
        $cart = session('cart', []);
        $cart[] = [
            'type'        => 'custom',
            'custom_type' => 'gangsheet',
            'name'        => "Gang Sheet {$data['width']}\" x {$data['height']}\"",
            'quantity'    => $data['qty'],
            'unit_price'  => $price['unit_price'],
            'total'       => $price['total_price'],
            'width_in'    => $data['width'],
            'height_in'   => $data['height'],
            'area_sq_in'  => $price['area'],
            'preview'     => $previewUrl,
            'print_file'  => null, // optional if you later get PDF
            'payload'     => [
                'design_id' => $data['design_id'],
                'details'   => $design
            ],
            'source'      => 'dripapps'
        ];
        session()->put('cart', $cart);

        return response()->json(['success'=>true, 'message'=>'Gang sheet added to cart']);
    }
}
