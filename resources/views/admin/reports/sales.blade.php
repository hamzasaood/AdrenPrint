@extends('admin.layout.default')

@section('admin.content')
<div class="container-fluid">
    <h1 class="mb-4">Sales Report</h1>
    <a href="{{ route('admin.reports.sales.export', ['from' => $from, 'to' => $to]) }}" class="btn btn-success">
        Export CSV
    </a>


    <!-- Date Filters -->
    <form method="GET" action="{{ route('admin.reports.sales') }}" class="row mb-4">
        <div class="col-md-3">
            <label>From Date</label>
            <input type="date" name="from" value="{{ request('from') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label>To Date</label>
            <input type="date" name="to" value="{{ request('to') }}" class="form-control">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h6>Total Sales</h6>
                    <h3>${{ number_format($totalSales, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h6>Total Orders</h6>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h6>Completed Orders</h6>
                    <h3>{{ $completedOrders }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h6>Pending Orders</h6>
                    <h3>{{ $pendingOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="card mb-4">
        <div class="card-header">Sales Overview</div>
        <div class="card-body">
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card">
        <div class="card-header">Orders List</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $o)
                    <tr>
                        <td>#{{ $o->id }}</td>
                        <td>{{ $o->billing_name }}</td>
                        <td>${{ number_format($o->total, 2) }}</td>
                        <td><span class="badge bg-primary">{{ ucfirst($o->status) }}</span></td>
                        <td>{{ ucfirst($o->payment_method) }}</td>
                        <td>{{ $o->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels) !!}, // Dates
            datasets: [{
                label: 'Sales ($)',
                data: {!! json_encode($chartData) !!}, // Totals
                borderColor: '#007bff',
                backgroundColor: 'rgba(0,123,255,0.3)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
