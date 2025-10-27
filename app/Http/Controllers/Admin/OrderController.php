<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ZipArchive;
 use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user','items.product','items.variant']);
        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->items()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success','Order deleted successfully');
    }
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
            'payment_status' => 'required|string',
        ]);

        $order->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
        ]);

        return back()->with('success','Order status updated successfully!');
    }


   





public function downloadImage(Order $order, $itemId)
{
    $item = $order->items()->findOrFail($itemId);

    // Case 1: Design image / no product
    if ($item->design_id || !$item->product_id) {
        $filePath = public_path($item->preview ?? 'assets/media/products/nav-image-1.png');
        $fileName = basename($filePath); // ✅ keep original filename with extension

        return response()->download($filePath, $fileName);
    }

    // Case 2: External product image
    if (Str::startsWith($item->product_image, 'https://') || Str::startsWith($item->product_image, 'http://')) {
        $contents = file_get_contents($item->product_image);

        if ($contents === false) {
            abort(404, 'Image not found.');
        }

        $fileName = "product_{$item->id}.jpg";

        return Response::make($contents, 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
        ]);
    }

    // Case 3: Local product image

    $filePath = public_path($item->product_image); // <- correct path
    $fileName = basename($filePath); // keep original filename with extension

    if (!file_exists($filePath)) {
        abort(404, 'Local file not found.');
    }

    return response()->download($filePath, $fileName);
}


public function settings()
    {
        $user = Auth::user(); // currently logged-in admin
        return view('admin.settings', compact('user'));
    }

    // Update settings
    public function updatesettings(Request $request)
    {
        $user = Auth::user();

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'shipping_charges' => 'nullable|numeric|min:0',
        ]);

        // Update fields
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->shipping_charges = $request->shipping_charges ?? 0;

        $user->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }



}
