<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SyncSSProducts;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = \App\Models\Category::where('is_active', 1)->get();
        return view('admin.product.form', [
            'product' => new Product(),
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'design_type' => 'required|string'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            
        }
        if (isset($request->image)) 
        {
        $r=$request->image;
        $image = time().'.'.$r->getClientOriginalExtension();
        $r->move(public_path('/images'), $image);


 }
 else
 {
     $image='NULL';
 }

 $data['image'] = $image;
        Product::create($data);
        // Save variants
if ($request->has('variants')) {
    $product->variants()->delete(); // clear previous variants on update

    foreach ($request->variants as $v) {
        if (!empty($v['variant_name'])) {
            $product->variants()->create([
                'variant_name' => $v['variant_name'],
                'price' => $v['price'] ?? null,
                'stock' => $v['stock'] ?? 0,
            ]);
        }
    }
}

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = \App\Models\Category::where('is_active', 1)->get();
        return view('admin.product.form', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'design_type' => 'required|string'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

       
        if (isset($request->image))
        {
        $r=$request->image;
        $image = time().'.'.$r->getClientOriginalExtension();
        $r->move(public_path('/images'), $image);


 }
 else
 {
     $image= $product->image; // keep existing image if not updated
 }

        $data['image'] = $image;

        $product->update($data);
        // Save variants
if ($request->has('variants')) {
    $product->variants()->delete(); // clear previous variants on update

    foreach ($request->variants as $v) {
        if (!empty($v['variant_name'])) {
            $product->variants()->create([
                'variant_name' => $v['variant_name'],
                'price' => $v['price'] ?? null,
                'stock' => $v['stock'] ?? 0,
            ]);
        }
    }
}

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function show(Product $product)
    {
    $product->load('variants', 'category');
    return view('admin.product.show', compact('product'));
    }


    public function sync()
    {
        SyncSSProducts::dispatch();
        return back()->with('success', 'SS Activewear sync job dispatched.');
    }

}
