@extends('admin.layout.default')

@section('admin.content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .card-header {
        border-radius: 15px 15px 0 0;
        background: linear-gradient(90deg, #fbaf1c, #f9c459);
        text-align: center;
        color: #fff;
        padding: 15px;
    }
    .card-header h3 {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
    }
    .stat-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 15px;
    }
    .stat-box i {
        font-size: 30px;
        padding: 15px;
        border-radius: 50%;
        color: #fff;
    }
    .stat-revenue { background: linear-gradient(45deg,#f53c79,#f0ae00); }
    .stat-orders { background: linear-gradient(45deg,#1d976c,#93f9b9); }
    .stat-visitors { background: linear-gradient(45deg,#36d1dc,#5b86e5); }
    .stat-products { background: linear-gradient(45deg,#ff512f,#dd2476); }
    .table thead {
        background: #fbaf1c;
        color: #fff;
    }
</style>

<div class="row">
    {{-- Quick Stats --}}
    <div class="col-lg-3 col-md-6">
        <div class="stat-box">
            <div>
                <h5>Total Revenue</h5>
                <h3 id="statRevenue">{{$totalSales}}</h3>
            </div>
            <i class="fa-solid fa-sack-dollar stat-revenue"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-box">
            <div>
                <h5>Total Orders</h5>
                <h3 id="statOrders">{{$totalOrders}}</h3>
            </div>
            <i class="fa-solid fa-bag-shopping stat-orders"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-box">
            <div>
                <h5>Visitors</h5>
                <h3 id="statVisitors">0</h3>
            </div>
            <i class="fa-solid fa-users stat-visitors"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-box">
            <div>
                <h5>Products</h5>
                <h3 id="statProducts">{{$products}}</h3>
            </div>
            <i class="fa-solid fa-boxes-stacked stat-products"></i>
        </div>
    </div>
</div>

<div class="row">
    {{-- Revenue by Month --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-chart-line me-2"></i> Revenue by Month</h3>
            </div>
            <div class="card-body">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    {{-- Revenue by year --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-scale-balanced me-2"></i> Revenue by year</h3>
            </div>
            <div class="card-body">
                <canvas id="revenuebyyear"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- Low Stock Products --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-triangle-exclamation me-2"></i> Low Stock Products</h3>
            </div>
            <div class="card-body">
                <canvas id="lowStockChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Best Sellers --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-star me-2"></i> Best Selling Products</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Sold</th>
                        </tr>
                    </thead>
                    <tbody id="best-sellers-table-body"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- Category/Sub-category Sales --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-layer-group me-2"></i> Sales by Category</h3>
            </div>
            <div class="card-body">
                <canvas id="categorySubCategorySalesChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Visitors --}}
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-chart-area me-2"></i> Visitors</h3>
            </div>
            <div class="card-body">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    

    {{-- Latest Orders --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa-solid fa-clock-rotate-left me-2"></i> Latest Orders</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="latestOrdersTable">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Order #</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// 👉 Example: Best Sellers
function fetchBestSellers() {
    $.get('/admin/best-sellers', function(data) {
        let tbody = $('#best-sellers-table-body').empty();
        data.forEach(row => {
            tbody.append(`<tr>
                <td>${row.name}</td>
                <td><span class="badge bg-success">${row.total_quantity}</span></td>
            </tr>`);
        });
    });
}

// 👉 Low Stock Products
function fetchLowStock() {
    $.get('/admin/low-stock-products', function(data) {
        const ctx = document.getElementById('lowStockChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(p => p.name),
                datasets: [{
                    label: 'Stock',
                    data: data.map(p => p.stock),
                    backgroundColor: data.map(s => s <= 5 ? '#e74c3c' : '#f39c12')
                }]
            }
        });
    });
}

// 👉 Revenue by Month
function fetchMonthlyRevenue() {
    $.get('/admin/get/Monthly/Revenue', function(res) {
        const ctx = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(res),
                datasets: [{
                    label: 'Revenue',
                    data: Object.values(res),
                    borderColor: '#f53c79',
                    backgroundColor: 'rgba(245,60,121,0.3)',
                    tension: 0.4,
                    fill: true
                }]
            }
        });
    });
}




function fetchYearlyRevenue() {
    $.get('/admin/get/Yearly/Revenue', function(res) {
        const ctx = document.getElementById('revenuebyyear').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(res),
                datasets: [{
                    label: 'Revenue',
                    data: Object.values(res),
                    borderColor: '#f53c79',
                    backgroundColor: 'rgba(245,60,121,0.3)',
                    tension: 0.4,
                    fill: true
                }]
            }
        });
    });
}

// 👉 Visitors
function fetchVisitors() {
    $.get('/admin/visitor-data', function(res) {
        const ctx = document.getElementById('visitorChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: res.map(r => r.date),
                datasets: [{
                    label: 'Visitors',
                    data: res.map(r => r.visits),
                    borderColor: '#36d1dc',
                    backgroundColor: 'rgba(54,209,220,0.3)',
                    tension: 0.4,
                    fill: true
                }]
            }
        });
        $("#statVisitors").text(res.reduce((a,b)=>a+b.visits,0));
    });
}

// 👉 Latest Orders
function fetchLatestOrders() {
    $.get('/admin/latest/order', function(res) {
        let tbody = $("#latestOrdersTable tbody").empty();
        res.forEach(o => {
            tbody.append(`<tr>
                <td>${o.user.name}</td>
                <td>${o.id}</td>
                <td>${o.total}</td>
                <td><span class="badge bg-info">${o.status}</span></td>
                <td>${moment(o.created_at).format('D/M/Y')}</td>
            </tr>`);
        });
    });
}

// Initialize
$(function(){
    fetchBestSellers();
    fetchLowStock();
    fetchMonthlyRevenue();
    fetchYearlyRevenue();
    fetchVisitors();
    fetchLatestOrders();
});
</script>
@endsection
