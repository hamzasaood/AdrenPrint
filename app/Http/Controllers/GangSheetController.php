<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class GangSheetController extends Controller
{
    public function builder(Product $product)
    {
        // show builder page for product
        //$product = Product::findOrFail($id);
        return view('gangsheet.builder', compact('product'));
    }

          public function fetch(Request $request)
      {
          // Get products with pagination (12 per page for example)
          $products = Product::paginate(12);

          // If AJAX request → return JSON
          if ($request->ajax()) {
              return response()->json([
                  'products' => view('partials.product-cards', compact('products'))->render(),
                  'pagination' => (string) $products->links('vendor.pagination.bootstrap-4')
              ]);
          }

          // If not AJAX → return normal view
          return view('products.index', compact('products'));
      }





public function filter(Request $request)
{
    $query = Product::with('variants', 'category');

    //dd($request->all());

    // 🔎 Availability
    if ($request->inStock && !$request->outStock) {
        $query->where(function ($q) {
            $q->where('stock', '>', 0) // products without variants
              ->orWhereHas('variants', fn($q2) => $q2->where('stock', '>', 0));
        });
    } elseif ($request->outStock && !$request->inStock) {
        $query->where(function ($q) {
            $q->where('stock', '=', 0)
              ->orWhereHas('variants', fn($q2) => $q2->where('stock', '=', 0));
        });
    }
    // if both checked → don’t filter (show all)

    // 🔎 Categories
   if ($request->has('categories') && count($request->categories) > 0) {
    $query->whereIn('category_id', $request->categories);
    }
    // 🔎 Brands
    if ($request->has('brands') && count($request->brands) > 0) {
    $query->whereIn('brand', $request->brands);
    }


    // 🔎 Price range
    if ($request->min_price && $request->max_price) {
        $query->where(function ($q) use ($request) {
            $q->whereBetween('price', [$request->min_price, $request->max_price]) // product price
              ->orWhereHas('variants', function ($q2) use ($request) {
                  $q2->whereBetween('price', [$request->min_price, $request->max_price]);
              });
        });
    }

    // 🔎 Color
    if ($request->color) {
        $query->whereHas('variants', function($q) use ($request) {
            $q->where('type', 'Color')
              ->where('variant_name', $request->color);
        });
    }

    // 🔎 Size
    if ($request->size) {
        $query->whereHas('variants', function($q) use ($request) {
            $q->where('type', 'Size')
              ->where('variant_name', $request->size);
        });
    }

    $products = $query->where('stock','>',0)->get();

    // Empty state
    if ($products->isEmpty()) {
        return response()->json([
            'html' => '<p>No products found</p>',
            'meta' => ['from'=>0,'to'=>0,'total'=>0,'links'=>'']
        ]);
    }

    
    // Build HTML
    $html = '';
    foreach ($products as $product) {
        if(!empty($product->image)) {
                        //return response()->json(['error' => 'Product has no image'], 404);
                        $imagePath = asset('images/' . $product->image);

                    }
                    elseif(!empty($product->main_image)){
                       $imagePath =  'https://www.ssactivewear.com/'.$product->main_image;
                    }
                    else{       
                        $imagePath = asset('images/' . $product->image);
                    }

        $html .= '
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <div class="latest-product-card">
                <div class="image-box mb-16">'.
                    ($product->sale_price && $product->sale_price < $product->price
                        ? '<span class="sale-label subtitle fw-400 white">Sale</span>' : ''
                    ).
                    '<a href="'.url('/product/').$product->slug.'">
                        <img src="'.$imagePath.'" class="product-image" alt="" style="height: 230px;">
                    </a>
                    
                </div>
                <div class="product-desc">
                    <div>
                        <a href="'.url('/product/').$product->slug.'" class="product-title h6 fw-500 mb-12">'.$product->name.'</a>
                        <p class="black fw-600">'.
                            ($product->sale_price && $product->sale_price < $product->price
                                ? '<span class="subtitle text-decoration-line-through fw-400 light-gray">$'.$product->price.'</span>&nbsp; $'.$product->sale_price
                                : '$'.$product->price
                            ).
                        '</p>
                    </div>
                    <a href="'.url('/gang-sheet/').$product->id.'" class="btn-primary-custom w-100" data-product-id="'.$product->id.'">
                        Design & Buy
                    </a>
                </div>
            </div>
        </div>';
    }

    return response()->json([
        'html' => $html,
        
    ]);
}






                public function sort(Request $request)
            {
                $sort = $request->sort;
                $query = Product::query();

                if ($sort == 'high_to_low') {
                    $query->orderBy('price', 'desc');
                } elseif ($sort == 'low_to_high') {
                    $query->orderBy('price', 'asc');
                } elseif ($sort == 'discounted') {
                    $query->whereNotNull('sale_price')->whereColumn('sale_price', '<', 'price')->orderBy('sale_price', 'asc');
                }

                $products = $query->get();


                

                // Build product HTML same as your Blade
                $html = '';
                foreach ($products as $product) {
                    if(!empty($product->image)) {
                        //return response()->json(['error' => 'Product has no image'], 404);
                        $imagePath = asset('images/' . $product->image);

                    }
                    elseif(!empty($product->main_image)){
                       $imagePath =  'https://www.ssactivewear.com/'.$product->main_image;
                    }
                    else{       
                        $imagePath = asset('images/' . $product->image);
                    }
                    $html .= '
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="latest-product-card">
                            <div class="image-box mb-16">'.
                                ($product->sale_price && $product->sale_price < $product->price ? '<span class="sale-label subtitle fw-400 white">Sale</span>' : '').
                                '<a href="'.url('/product/').$product->slug.'">
                                    <img src="'.$imagePath.'" class="product-image" alt="" style="height: 230px;">
                                </a>
                                
                            </div>
                            <div class="product-desc">
                                <div>
                                    <a href="'.url('/product/').$product->slug.'" class="product-title h6 fw-500 mb-12">'.$product->name.'</a>
                                    <p class="black fw-600">';
                                        if($product->sale_price && $product->sale_price < $product->price) {
                                            $html .= '<span class="subtitle text-decoration-line-through fw-400 light-gray">$'.$product->price.'</span>&nbsp; $'.$product->sale_price;
                                        } else {
                                            $html .= '$'.$product->price;
                                        }
                    $html .= '</p>
                                </div>
                                    <a href="'.url('/gang-sheet/').$product->id.'" class="btn-primary-custom w-100" data-product-id="'.$product->id.'">
                                        Design & Buy
                                    </a>
                            </div>
                        </div>
                    </div>';
                }

                return response()->json(['html' => $html]);
            }



    /**
     * Save design JSON + preview PNG into session cart item
     * expected payload: product_id, design_json, preview (dataURL), quantity (optional)
     * 
     * 
     
     */


    public function getProcessedImage($id)
        {
            $product = Product::findOrFail($id);

            if($product->image) {
                //return response()->json(['error' => 'Product has no image'], 404);
                $imagePath = public_path('images/' . $product->image);

            }
            elseif($product->main_image){
            $imagePath =  'https://www.ssactivewear.com/'.$product->main_image;
            }
            else{
                return response()->json(['error' => 'Product has no image'], 404);
            }

            //$imagePath = public_path('images/products/' . $product->image);

            // Save all processed images in public/bgremove/
            $outputDir = public_path('bgremove');
            if (!file_exists($outputDir)) {
                mkdir($outputDir, 0755, true);
            }

            $outputPath = $outputDir . '/processed-' . $product->id . '.png';

            if (!file_exists($outputPath)) {
                $apiKey = "vnbjJS7PR2eSG1aUyhM5JRLg";

                $response = Http::withHeaders([
                    'X-Api-Key' => $apiKey,
                ])->attach(
                    'image_file', file_get_contents($imagePath), basename($imagePath)
                )->post('https://api.remove.bg/v1.0/removebg', [
                    'size' => 'auto',
                ]);

                if ($response->successful()) {
                    file_put_contents($outputPath, $response->body());
                } else {
                    return response()->json(['error' => $response->body()], 500);
                }
            }

            return response()->json([
                'url' => asset('bgremove/processed-' . $product->id . '.png'),
            ]);
        }
    public function saveToCart(Request $request)
   {
       $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity'   => 'nullable|integer|min:1',
        // design_json and preview should only be required if it's a builder product
       ]);

       $product = Product::findOrFail($request->product_id);

       $cart = session()->get('cart', []);

     // If builder product
       if ($request->has('design_json') && $request->has('preview'))
      {
        $cartItem = [
            'type'           => 'pod',
            'product_id'     => $product->id,
            'name'           => $product->name,
            'price'          => $request->price ?? $product->price,
            'quantity'       => $request->quantity ?? 1,
            'design_json'    => $request->design_json,
            'design_preview' => $request->preview,
            'size'           => $request->size ?? null,
            'color'          => $request->color ?? null,
            'added_at'       => now()->toDateTimeString(),
        ];
      } else {
        // Normal product
        $cartItem = [
            'product_id'     => $product->id,
            'name'           => $product->name,
            'price'          => $product->price,
            'quantity'       => $request->quantity ?? 1,
            'image'          => $product->image ?? null, // fallback image from db
            'added_at'       => now()->toDateTimeString(),
        ];
           }

             $cart[] = $cartItem;
             session()->put('cart', $cart);

              return response()->json([
                     'success' => true,
                     'message' => 'Added to cart',
                     'cart_count' => count($cart) // update header mini-cart
                     ]);
   }





 public function saveGangsheetToCart(Request $request)
{
    $request->validate([
        'designs'   => 'required|array|min:1',
        'designs.*.design_id'   => 'required|string',
        'designs.*.design_name' => 'required|string',
        'designs.*.quantity'    => 'required|integer|min:1',
        'designs.*.preview_url' => 'nullable|string',
        'size'      => 'nullable|array',
        'size.id'   => 'nullable|integer',
        'size.width'=> 'nullable|numeric',
        'size.height'=> 'nullable|numeric',
        'size.title'=> 'nullable|string',
    ]);

    $cart = session()->get('cart', []);

    foreach ($request->designs as $design) {
        $cart[] = [
            'type'        => 'gangsheet',
            'design_id'   => $design['design_id'],
            'design_name' => $design['design_name'],
            'quantity'    => $design['quantity'],
            'preview'     => $design['preview_url'] ?? null,
            'size_id'     => $request->input('size.id'),
            'title'       => $request->input('size.title'),
            'width'       => $request->input('size.width'),
            'height'      => $request->input('size.height'),
            'price'       => $this->calculateGangsheetPrice(
                                $request->input('size.width'),
                                $request->input('size.height'),
                                $design['quantity']
                            ),
            'added_at'    => now()->toDateTimeString(),
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'message' => count($request->designs) . " Gang Sheet(s) added to cart",
        'cart_count' => count($cart),
    ]);
}

private function calculateGangsheetPrice($width, $height, $qty)
{
    if (!$width || !$height) return 0;

    // Example pricing: $0.25 per square inch
    $rate = 0.25;
    $area = ($width * $height);
    return ($area * $rate) * $qty;
}




}
