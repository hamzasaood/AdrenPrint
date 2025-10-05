<?php 

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Category;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{
    // All collections
    public function index()
    {
        $collections = Collection::with('categories')->get();
        return view('collections.show', compact('collections'));
    }

    // Single collection page (shows categories like in screenshot)
    public function show($slug)
    {
        $collection = Collection::where('slug', $slug)->with('categories')->firstOrFail();
        return view('collections.show', compact('collection'));
    }

    // Products by category inside a collection
    public function categoryProducts($collectionSlug, $categorySlug)
    {
        $collection = Collection::where('slug', $collectionSlug)->firstOrFail();
        $category = $collection->categories()->where('slug', $categorySlug)->firstOrFail();

        $products = $category->products()->paginate(12);

        return view('collections.products', compact('collection', 'category', 'products'));
    }
}
