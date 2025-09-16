<?php

namespace App\Http\Controllers;
use App\Services\PrintifyService;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;


class CartController extends Controller
{
    // CartController.php

public function update(Request $request)
{
    $cart = session()->get('cart', []);
    $index = (int) $request->input('index');
    $quantity = max(1, (int) $request->input('quantity'));

    if (!isset($cart[$index])) {
        return response()->json([
            'success' => false,
            'message' => 'Item not found'
        ], 404);
    }

    // Update quantity
    $cart[$index]['quantity'] = $quantity;
    session()->put('cart', $cart);

    // Calculate item subtotal safely
    $price = isset($cart[$index]['price']) ? (float) $cart[$index]['price'] : 0;
    $itemSubtotal = round($price * $quantity, 2);

    // Calculate cart subtotal
    $cartSubtotal = 0;
    foreach ($cart as $item) {
        $itemPrice = isset($item['price']) ? (float) $item['price'] : 0;
        $itemQty   = isset($item['quantity']) ? (int) $item['quantity'] : 1;
        $cartSubtotal += $itemPrice * $itemQty;
    }
    $cartSubtotal = round($cartSubtotal, 2);

    $shipping = 5.00;
    $cartTotal = round($cartSubtotal + $shipping, 2);

    return response()->json([
        'success' => true,
        'quantity' => $quantity,
        'item_subtotal' => $itemSubtotal,
        'item_subtotal_formatted' => number_format($itemSubtotal, 2),
        'cart_subtotal' => $cartSubtotal,
        'cart_subtotal_formatted' => number_format($cartSubtotal, 2),
        'cart_total' => $cartTotal,
        'cart_total_formatted' => number_format($cartTotal, 2),
    ]);
}

public function remove(Request $request)
{
    $cart = session()->get('cart', []);
    $index = (int) $request->input('index');

    if (isset($cart[$index])) {
        unset($cart[$index]);             // Do not reindex, keep DOM data-index stable
        session()->put('cart', $cart);
    }

    // Recalculate subtotal
    $cartSubtotal = 0;
    foreach ($cart as $item) {
        $itemPrice = isset($item['price']) ? (float) $item['price'] : 0;
        $itemQty   = isset($item['quantity']) ? (int) $item['quantity'] : 1;
        $cartSubtotal += $itemPrice * $itemQty;
    }
    $cartSubtotal = round($cartSubtotal, 2);

    $shipping = 5.00;
    $cartTotal = round($cartSubtotal + $shipping, 2);

    return response()->json([
        'success' => true,
        'cart_subtotal' => $cartSubtotal,
        'cart_subtotal_formatted' => number_format($cartSubtotal, 2),
        'cart_total' => $cartTotal,
        'cart_total_formatted' => number_format($cartTotal, 2),
    ]);
}
















public function saveToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity'   => 'nullable|integer|min:1',
        'design_json' => 'nullable|string',
        'preview' => 'nullable|string', // optional: only for gangsheet
    ]);

    $product = Product::findOrFail($request->product_id);

    $cart = session()->get('cart', []);

    //dd($request->all());

    if($request->variant_price_value)
    {
        $price = floatval(str_replace('$','',$request->variant_price_value));
    }
    else
    {
        $price = $product->price;
    }
    if($product->image)
    {
        $image = $product->image;
    }
    else
    {
        $image = 'https://www.ssactivewear.com/'.$product->main_image;
    }

    $cartItem = [
        'product_id'   => $product->id,
        'size'         => $request->size ?? null,
        'color'        => $request->color ?? null,
        'name'         => $product->name,
        'price'        => $price,
        'quantity'     => $request->quantity ?? 1,
        'design_json'  => $request->design_json,
        'design_preview' => $request->preview ?? $image ?? null, // optional image
        'image'        => $image,
        'added_at'     => now()->toDateTimeString(),
    ];

    $cart[] = $cartItem;
    session()->put('cart', $cart);

    return response()->json(['success' => true, 'message' => 'Added to cart']);
}

public function showCart()
{
    $cart = session()->get('cart', []);
    return response()->json(['cart' => $cart]);
}

public function updateCart(Request $request)
{
    $cart = session()->get('cart', []);
    $index = $request->index;
    $quantity = max(1, (int) $request->quantity);

    if (isset($cart[$index])) {
        $cart[$index]['quantity'] = $quantity;
        session()->put('cart', $cart);
    }

    return response()->json([
        'success' => true,
        'cart' => $cart,
    ]);
}

public function deleteCart($index)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$index])) {
        unset($cart[$index]);
        session()->put('cart', array_values($cart));
    }

    return response()->json(['success' => true, 'message' => 'Item removed']);
}

    public function createIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent = PaymentIntent::create([
            'amount' => $request->amount, // in cents
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        return response()->json(['clientSecret' => $intent->client_secret]);
    }



    

    public function place(Request $request)
{
    $validator = Validator::make($request->all(), [
        'billing.name' => 'required',
        'billing.email' => 'required|email',
        'billing.address' => 'required',
        'billing.postal_code' => 'required',
        'shipping.name' => 'required',
        'shipping.email' => 'required|email',
        'shipping.address' => 'required',
        'shipping.postal_code' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $cart = session('cart', []);
    if (empty($cart)) {
        return response()->json(['error' => 'Cart is empty.'], 400);
    }

    $subtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['quantity']);
    $shippingCost = 5.00;
    $total = $subtotal + $shippingCost;

    $order = Order::create([
        'user_id' => auth()->id(),
        'billing_name' => $request->billing['name'],
        'billing_email' => $request->billing['email'],
        'billing_phone' => $request->billing['phone'] ?? null,
        'billing_address' => $request->billing['address'],
        'billing_postal_code' => $request->billing['postal_code'],
        'shipping_name' => $request->shipping['name'],
        'shipping_email' => $request->shipping['email'],
        'shipping_phone' => $request->shipping['phone'] ?? null,
        'shipping_address' => $request->shipping['address'],
        'shipping_postal_code' => $request->shipping['postal_code'],
        'subtotal' => $subtotal,
        'shipping_cost' => $shippingCost,
        'total' => $total,
        'payment_status' => 'pending',
        'payment_method' => 'stripe',
    ]);

    foreach ($cart as $c) {


        if (($c['type'] ?? 'product') === 'gangsheet') {
            // Download preview if it's a URL
            $previewPath = null;
            if (!empty($c['preview'])) {
                if (preg_match('/^https?:\/\//', $c['preview'])) {
                    $folder = public_path('gangsheets');
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $filename = uniqid('gangsheet_') . '.png';
                    file_put_contents($folder . '/' . $filename, file_get_contents($c['preview']));
                    $previewPath = 'gangsheets/' . $filename;
                } else {
                    $previewPath = $c['preview']; // already local path
                }
            }

            OrderProduct::create([
                'order_id'    => $order->id,
                'design_id'   => $c['design_id'],
                'design_name' => $c['design_name'],
                'preview'     => $previewPath,
                'width'       => $c['width'] ?? null,
                'height'      => $c['height'] ?? null,
                'size_title'  => $c['title'] ?? null,
                'price'       => $c['price'],
                'quantity'    => $c['quantity'],
            ]);
        } 
        else if(($c['type'] ?? '') ==='dtf' || ($c['type'] ?? '') === 'dtf-gangsheet-upload')
        {
            OrderProduct::create([
                'order_id'    => $order->id,
                //'design_id'   => $c['design_id'],
                'design_name' => $c['name'],
                'preview'     => $c['artwork'] ?? null,
                'options'       => json_encode($c['color']) ?? null,

                'width'       => $c['width'] ?? null,
                'height'      => $c['height'] ?? null,
                'size_title'  => $c['size_title'] ?? null,
                'price'       => $c['price'],
                'quantity'    => $c['quantity'],
            ]);
        }
        
        else {

            if($c['type'] ?? '' === 'pod')
            {
               // $c['product_id'] = null;
                if (!empty($c['design_preview'])) {
                
                    $folder = public_path('pods');
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                    }
                    $filename = uniqid('pod_') . '.png';
                    file_put_contents($folder . '/' . $filename, file_get_contents($c['design_preview']));
                    $image = 'pods/' . $filename;
                
            }
                
                //$image = $c['design_preview'] ?? null;
                //$c['design_preview'] = $image;
            }
            else {
                    $image = $c['design_preview']; // already local path
                }

            OrderProduct::create([
                'order_id'     => $order->id,
                'product_id'   => $c['product_id'],
                'product_name' => $c['name'] ?? null,
                'product_image'=> $image ?? null,
                'size'         => $c['size'] ?? null,
                'color'        => $c['color'] ?? null,
                'price'        => $c['price'],
                'quantity'     => $c['quantity'],
            ]);

            //minus stock
            if($c['product_id'] && $c['size'] && $c['color'])
            {
                $product = Product::find($c['product_id']);
                if($product)
                {
                    $variant = $product->variants()->where('size', $c['size'])->where('color', $c['color'])->first();
                    if($variant && $variant->stock >= $c['quantity'])
                    {
                        $variant->stock -= $c['quantity'];
                        $variant->save();
                    }
                }
            }
            else if($c['product_id'])
            {
                $product = Product::find($c['product_id']);
                if($product && $product->stock >= $c['quantity'])
                {
                    $product->stock -= $c['quantity'];
                    $product->save();
                }
            }
                //minus stock


        }
    }

    // (Optional) send to Printify or any 3rd-party service
    // $printify = new PrintifyService();
    // $response = $printify->createOrder($order, $order->items);

    $printify = new PrintifyService();
            $response = $printify->createOrder($order, $order->items);

            // You may want to log or save Printify’s response
            \Log::info('Printify order response', $response);

        session()->forget('cart');

    return response()->json([
        'success' => true,
        'order_id' => $order->id,
        'message' => 'Order placed successfully',
        'printify_response' => $response
    ]);
}


    public function orderDetails($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.details', compact('order'));
    }

    public function orders()
    {
        $orders = Order::with('items')->where('user_id', auth()->id())->paginate(5);
        return view('orders.index', compact('orders'));
    }

    public function downloadInvoice(Order $order)
    {
        // Ensure user owns this order
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('orders.invoice-pdf', compact('order'))
                ->setPaper('a4');

        return $pdf->download("invoice-order-{$order->id}.pdf");
    }


}

