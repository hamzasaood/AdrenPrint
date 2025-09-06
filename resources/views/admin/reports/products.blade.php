@extends('admin.layout.default')

@section('admin.content')
<div class="container-fluid">
    <h1 class="mb-4">Products Report</h1>
    <a href="{{ route('admin.reports.products.export') }}" class="btn btn-success">
        Export CSV
    </a>


    <!-- Summary -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6>Total Products</h6>
                    <h3>{{ $totalProducts }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h6>Low Stock Products</h6>
                    <h3>{{ $lowStockCount }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock Distribution Chart -->
    <div class="card mb-4">
        <div class="card-header">Stock Distribution</div>
        <div class="card-body">
            <canvas id="stockChart"></canvas>
        </div>
    </div>

    <!-- Low Stock Products -->
    <div class="card">
        <div class="card-header">Low Stock Products</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx1 = document.getElementById('stockChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($stockLabels) !!},
            datasets: [{
                data: {!! json_encode($stockData) !!},
                backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#17a2b8']
            }]
        }
    });
</script>
@endsection
