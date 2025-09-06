@extends('admin.layout.default')

@section('admin.content')
<div class="container-fluid">
    <h1 class="mb-4">Daily Sales Report</h1>
    <a href="{{ route('admin.reports.daily.export') }}" class="btn btn-success">
        Export CSV
    </a>


    <!-- Summary -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h6>Today’s Sales</h6>
                    <h3>${{ number_format($todaySales, 2) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6>Orders Today</h6>
                    <h3>{{ $todayOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Hourly Sales Chart -->
    <div class="card mb-4">
        <div class="card-header">Hourly Sales</div>
        <div class="card-body">
            <canvas id="dailyChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx3 = document.getElementById('dailyChart').getContext('2d');
    new Chart(ctx3, {
        type: 'line',
        data: {
            labels: {!! json_encode($hourLabels) !!},
            datasets: [{
                label: 'Sales ($)',
                data: {!! json_encode($hourData) !!},
                borderColor: '#28a745',
                backgroundColor: 'rgba(40,167,69,0.2)',
                fill: true
            }]
        }
    });
</script>
@endsection
