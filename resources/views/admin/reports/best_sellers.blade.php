@extends('admin.layout.default')

@section('admin.content')
<div class="container-fluid">
    <h1 class="mb-4">Best Selling Products</h1>
    <a href="{{ route('admin.reports.bestsellers.export') }}" class="btn btn-success">
        Export CSV
    </a>


    <!-- Chart -->
    <div class="card mb-4">
        <div class="card-header">Top 10 Products</div>
        <div class="card-body">
            <canvas id="bestSellerChart"></canvas>
        </div>
    </div>

    <!-- Table -->
    <div class="card">
        <div class="card-header">Best Sellers Table</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
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
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx2 = document.getElementById('bestSellerChart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: {!! json_encode($topProductLabels) !!},
            datasets: [{
                label: 'Units Sold',
                data: {!! json_encode($topProductData) !!},
                backgroundColor: '#007bff'
            }]
        }
    });
</script>
@endsection
