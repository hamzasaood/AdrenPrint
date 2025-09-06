<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class AdminController extends Controller
{
    //
   
    public function index()
    {
        $orders = Order::get();
        $totalSales = $orders->sum('total');
        $totalOrders = $orders->count();
        $products = Product::count();
        return view('admin.dashboard',compact('totalSales','totalOrders','products'));
    
        
    }
}
