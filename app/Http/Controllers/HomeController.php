<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) 
        {
        return redirect()->route('admin.index');

        } 
        else 
        {
            $categories = \App\Models\Category::with('products')->get();
    $products = \App\Models\Product::with('category')->where('stock', '>', 0)->where('category_id','15')->take(30)->get();

    $blanks = \App\Models\Product::with('category')->where('stock', '>', 0)->where('category_id','15')->take(4)->get();

    return view('home', compact('categories', 'products','blanks'));
        }
        
    }
}
