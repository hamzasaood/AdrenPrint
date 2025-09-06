<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    // --- SALES REPORT ---
    public function sales(Request $request)
     {
        $from = $request->input('from', Carbon::now()->startOfMonth()->toDateString());
        $to   = $request->input('to', Carbon::now()->toDateString());

        $orders = Order::whereBetween('created_at', [$from, $to])->get();

        $totalSales = $orders->sum('total');
        $totalOrders = $orders->count();
        $completedOrders = $orders->where('status', 'completed')->count();
        $pendingOrders = $orders->where('status', 'pending')->count();

        // --- Chart Data ---
        $period = \Carbon\CarbonPeriod::create($from, $to); // date range
        $chartLabels = [];
        $chartData = [];

        foreach ($period as $date) {
            $chartLabels[] = $date->format('Y-m-d');
            $dailyTotal = $orders->filter(function ($o) use ($date) {
                return $o->created_at->format('Y-m-d') === $date->format('Y-m-d');
            })->sum('total');

            $chartData[] = $dailyTotal;
                    } 

        return view('admin.reports.sales', compact(
            'orders',
            'from',
            'to',
            'totalSales',
            'totalOrders',
            'completedOrders',
            'pendingOrders',
            'chartLabels',
            'chartData'
        ));
    }


    public function exportSales(Request $request)
    {
        $from = $request->input('from', Carbon::now()->startOfMonth()->toDateString());
        $to   = $request->input('to', Carbon::now()->toDateString());

        $orders = Order::whereBetween('created_at', [$from, $to])->get();

        $response = new StreamedResponse(function () use ($orders) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID','Customer','Email','Total','Status','Date']);
            foreach ($orders as $o) {
                fputcsv($handle, [$o->id, $o->billing_name, $o->billing_email, $o->total_amount, $o->status, $o->created_at]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="sales_report.csv"');

        return $response;
    }

    // --- PRODUCTS REPORT ---
    public function products()
    {
        $products = Product::all();
        $lowStock = Product::where('stock','<',10)->get();

        return view('admin.reports.products', [
            'totalProducts' => $products->count(),
            'lowStockCount' => $lowStock->count(),
            'lowStock' => $lowStock,
            'stockLabels' => $products->pluck('name'),
            'stockData' => $products->pluck('stock'),
        ]);
    }

    public function exportProducts()
    {
        $products = Product::all();

        $response = new StreamedResponse(function () use ($products) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID','Name','Stock','Price']);
            foreach ($products as $p) {
                fputcsv($handle, [$p->id, $p->name, $p->stock, $p->price]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="products_report.csv"');
        return $response;
    }

    // --- BESTSELLERS ---
    public function bestsellers()
    {
        $topProducts = OrderProduct::selectRaw('product_id, SUM(quantity) as total_qty')
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->take(10)
            ->get();

        return view('admin.reports.best_sellers', [
            'topProducts' => $topProducts,
            'topProductLabels' => $topProducts->map(fn($i)=>optional($i->product)->name),
            'topProductData' => $topProducts->pluck('total_qty'),
        ]);
    }

    public function exportBestSellers()
    {
        $topProducts = OrderProduct::selectRaw('product_id, SUM(quantity) as total_qty')
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->get();

        $response = new StreamedResponse(function () use ($topProducts) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Product','Quantity Sold']);
            foreach ($topProducts as $item) {
                fputcsv($handle, [optional($item->product)->name, $item->total_qty]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="bestsellers_report.csv"');
        return $response;
    }

    // --- DAILY ---
    public function daily()
    {
        $today = Carbon::today();
        $orders = Order::whereDate('created_at', $today)->get();

        $hourLabels = range(0,23);
        $hourData = [];
        foreach ($hourLabels as $h) {
            $hourData[] = $orders->filter(fn($o)=>$o->created_at->hour == $h)->sum('total_amount');
        }

        return view('admin.reports.daily', [
            'todaySales' => $orders->sum('total_amount'),
            'todayOrders' => $orders->count(),
            'hourLabels' => $hourLabels,
            'hourData' => $hourData,
        ]);
    }

    public function exportDaily()
    {
        $today = Carbon::today();
        $orders = Order::whereDate('created_at', $today)->get();

        $response = new StreamedResponse(function () use ($orders) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID','Customer','Total','Status','Date']);
            foreach ($orders as $o) {
                fputcsv($handle, [$o->id, $o->billing_name, $o->total_amount, $o->status, $o->created_at]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="daily_report.csv"');
        return $response;
    }

    // --- MONTHLY ---
    public function monthly()
    {
        $month = Carbon::now()->month;
        $orders = Order::whereMonth('created_at', $month)->get();

        $dayLabels = range(1, Carbon::now()->daysInMonth);
        $dayData = [];
        foreach ($dayLabels as $d) {
            $dayData[] = $orders->filter(fn($o)=>$o->created_at->day == $d)->sum('total_amount');
        }

        return view('admin.reports.monthly', [
            'monthlySales' => $orders->sum('total_amount'),
            'monthlyOrders' => $orders->count(),
            'dayLabels' => $dayLabels,
            'dayData' => $dayData,
        ]);
    }

    public function exportMonthly()
    {
        $month = Carbon::now()->month;
        $orders = Order::whereMonth('created_at', $month)->get();

        $response = new StreamedResponse(function () use ($orders) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID','Customer','Total','Status','Date']);
            foreach ($orders as $o) {
                fputcsv($handle, [$o->id, $o->billing_name, $o->total_amount, $o->status, $o->created_at]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="monthly_report.csv"');
        return $response;
    }
}
