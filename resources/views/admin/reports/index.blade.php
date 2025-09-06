@extends('admin.layout.default')

@section('admin.content')
<div class="container">
    <h1 class="mb-4">Reports Dashboard</h1>
    

    <div class="row">
        <!-- Sales Cards -->
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Sales</h5>
                    <h3>${{ number_format($totalSales, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Monthly Sales</h5>
                    <h3>${{ number_format($monthlySales, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Today Sales</h5>
                    <h3>${{ number_format($dailySales, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Summary -->
    <h2 class="mt-5">Orders Summary</h2>
    <ul>
        <li>Total Orders: {{ $totalOrders }}</li>
        <li>Completed Orders: {{ $completedOrders }}</li>
        <li>Pending Orders: {{ $pendingOrders }}</li>
    </ul>

    <!-- Best Selling Products -->
    <h2 class="mt-5">Top Selling Products</h2>
    <table class="table table-striped">
        <thead>
            <tr><th>Product</th><th>Quantity Sold</th></tr>
        </thead>
        <tbody>
            @foreach($topProducts as $item)
                <tr>
                    <td>{{ optional($item->product)->name ?? 'Deleted Product' }}</td>
                    <td>{{ $item->total_qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Low Stock -->
    <h2 class="mt-5">Low Stock Products</h2>
    <table class="table table-danger">
        <thead>
            <tr><th>Product</th><th>Stock</th></tr>
        </thead>
        <tbody>
            @foreach($lowStock as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
