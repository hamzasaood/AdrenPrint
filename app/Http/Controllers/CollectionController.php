<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Category;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::with('categories')->get();
        $categories = Category::all();
        return view('admin.collections.index', compact('collections','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.collections.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:collections,slug',
        ]);

        $collection = Collection::create($request->only('name', 'slug', 'description'));
        $collection->categories()->sync($request->categories);

        return redirect()->route('admin.collections.index')->with('success', 'Collection created successfully.');
    }

    public function edit(Collection $collection)
    {
        $categories = Category::all();
        return view('admin.collections.edit', compact('collection', 'categories'));
    }

    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:collections,slug,' . $collection->id,
        ]);

        $collection->update($request->only('name', 'slug', 'description'));
        $collection->categories()->sync($request->categories);

        return redirect()->route('admin.collections.index')->with('success', 'Collection updated successfully.');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();
        return redirect()->route('admin.collections.index')->with('success', 'Collection deleted successfully.');
    }
}

