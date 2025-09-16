<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function categorypage($slug)
    {
        // Fetch category
        $category = Category::where('slug', $slug)->firstOrFail();

        // Fetch products for this category, with pagination
        $products = Product::where('category_id', $category->id)
                            ->paginate(12); // adjust per page

        // Fetch sidebar data if needed
        $categories = Category::withCount('products')->get();
        $brands = Product::select('brand', \DB::raw('count(*) as product_count'))
                         ->groupBy('brand')->get();

        $availability = [
            'in_stock' => Product::where('stock', '>', 0)->count(),
            'out_stock' => Product::where('stock', '<=', 0)->count()
        ];

        return view('shop.index', compact('products', 'categories', 'brands', 'availability', 'category'));
    }
    public function category($slug)
    {
        // Fetch category
        $category = Category::where('slug', $slug)->firstOrFail();

        // Fetch products for this category
        $products = Product::where('category_id', $category->id)
                        ->paginate(12); // adjust per page

        return view('category', compact('products', 'category'));
    }


    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }
    public function editProfile()
    {
        $user = auth()->user();
        return view('users.edit-profile', compact('user'));
    }

 // Update Profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
        ]);

        $user->update($request->only('name', 'email', 'phone', 'address', 'city', 'country', 'state'));

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
    // Change Password
    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password is incorrect.']);
        }

        // Update new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Password updated successfully!');
    }

}
