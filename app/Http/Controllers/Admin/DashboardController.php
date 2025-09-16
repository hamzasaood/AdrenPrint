<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        $totalSales = $orders->sum('total');
        $totalOrders = $orders->count();
        $products = Product::count();
        return view('admin.dashboard',compact('totalSales','totalOrders','products'));
    }

    // 🔹 1. Best Sellers
    public function bestSellers()
    {
        $data = OrderProduct::select('products.name', DB::raw('SUM(order_products.quantity) as total_quantity'))
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->groupBy('products.name')
            ->orderByDesc('total_quantity')
            ->take(10)
            ->get();

        return response()->json($data);
    }

    // 🔹 2. Low Stock Products
    public function lowStockProducts()
    {
        $data = Product::select('name', 'stock')
            ->where('stock', '<=', 20) // threshold
            ->orderBy('stock', 'asc')
            ->get();

        return response()->json($data);
    }

    // 🔹 3. Visitor Data (Dummy if no table)
    public function visitorData()
    {
        // If you track visitors in DB, replace with actual logic
        $data = [];
        for ($i = 0; $i < 7; $i++) {
            $data[] = [
                'date' => Carbon::now()->subDays($i)->format('d M'),
                'visits' => rand(50, 200)
            ];
        }
        return response()->json(array_reverse($data));
    }

    // 🔹 4. Latest Orders
    public function latestOrders()
    {
        $data = Order::with('user')
            ->latest()
            ->take(10)
            ->get();

        return response()->json($data);
    }

    // 🔹 5. Monthly Revenue
    public function monthlyRevenue()
    {
        $revenues = Order::select(
                DB::raw('SUM(total) as total'),
                DB::raw('MONTH(created_at) as month')
            )
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('total', 'month');

        $labels = [];
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->format('M');
            $data[] = $revenues[$i] ?? 0;
        }

        return response()->json(array_combine($labels, $data));
    }

    public function yearly()
{
    // Get monthly revenue for the current year
    $revenues = Order::select(
            DB::raw('SUM(total) as total'),
            DB::raw('MONTH(created_at) as month')
        )
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->pluck('total', 'month'); // keys = month numbers 1..12

    $labels = [];
    $data = [];

    for ($i = 1; $i <= 12; $i++) {
        $labels[] = Carbon::create()->month($i)->format('M');
        $data[] = $revenues[$i] ?? 0;
    }

    return response()->json(array_combine($labels, $data));
}


    // 🔹 6. Gross Profit
    public function grossProfit()
    {
        // Assume revenue - COGS = profit
        $todayRevenue = Order::whereDate('created_at', Carbon::today())->sum('total');
        $weekRevenue = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $monthRevenue = Order::whereMonth('created_at', Carbon::now()->month)->sum('total');

        $todayCogs = $todayRevenue * 0.6; // example 60% cost
        $weekCogs = $weekRevenue * 0.6;
        $monthCogs = $monthRevenue * 0.6;

        return response()->json([
            'today' => $todayRevenue - $todayCogs,
            'week'  => $weekRevenue - $weekCogs,
            'month' => $monthRevenue - $monthCogs,
        ]);
    }

    // 🔹 7. Revenue vs. COGS
    public function revenueVsCogs()
    {
        $todayRevenue = Order::whereDate('created_at', Carbon::today())->sum('total');
        $weekRevenue = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $monthRevenue = Order::whereMonth('created_at', Carbon::now()->month)->sum('total');

        $todayCogs = $todayRevenue * 0.6;
        $weekCogs = $weekRevenue * 0.6;
        $monthCogs = $monthRevenue * 0.6;

        return response()->json([
            'today' => ['revenue' => $todayRevenue, 'cogs' => $todayCogs],
            'week' => ['revenue' => $weekRevenue, 'cogs' => $weekCogs],
            'month' => ['revenue' => $monthRevenue, 'cogs' => $monthCogs],
        ]);
    }

    // 🔹 8. Sales by Category & Subcategory
    public function salesByCategory()
    {
         $data = OrderProduct::select(
                'categories.name as category_name',
                DB::raw('SUM(order_products.quantity * order_products.price) as total_amount'),
                DB::raw('SUM(order_products.quantity) as total_qty')
            )
            ->leftjoin('orders', 'order_products.order_id', '=', 'orders.id')
            ->leftjoin('products', 'order_products.product_id', '=', 'products.id')
            ->leftjoin('categories', 'products.category_id', '=', 'categories.id')
            // ->where('orders.status', 'completed') // 🔹 Remove this for debugging first
            ->groupBy('categories.name')
            ->orderByDesc('total_amount')
            ->get();

    return response()->json($data);
    }
}
