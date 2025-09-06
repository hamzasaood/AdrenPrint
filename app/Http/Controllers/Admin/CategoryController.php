<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.addcategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'nullable|image|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

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

        $category->image = $image;
        $category->is_active = $request->is_active;

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('admin.category.addcategory', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'image' => 'nullable|image|max:2048'
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if (isset($request->image)) 
       {
       $r=$request->image;
       $image = time().'.'.$r->getClientOriginalExtension();
       $r->move(public_path('/images'), $image);


       $category->image = $image;
}
else
{
    $category->image = $category->image; // Keep the existing image if no new one is uploaded 
}
        
        $category->is_active = $request->is_active;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
