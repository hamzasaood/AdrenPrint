@extends('admin.layout.default')

@section('admin.content')
<div class="container-fluid">
    <h1 class="mb-4">Monthly Sales Report</h1>
    <a href="{{ route('admin.reports.monthly.export') }}" class="btn btn-success">
        Export CSV
    </a>


    <!-- Summary -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6>This Month’s Sales</h6>
                    <h3>${{ number_format($monthlySales, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6>Orders This Month</h6>
                    <h3>{{ $monthlyOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Daily Totals Chart -->
    <div class="card mb-4">
        <div class="card-header">Daily Totals</div>
        <div class="card-body">
            <canvas id="monthlyChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx4 = document.getElementById('monthlyChart').getContext('2d');
    new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: {!! json_encode($dayLabels) !!},
            datasets: [{
                label: 'Sales ($)',
                data: {!! json_encode($dayData) !!},
                backgroundColor: '#17a2b8'
            }]
        }
    });
</script>
@endsection
