@extends('layout.default')

@section('content')
<style>

.table-orders {
    border-radius: 10px;
    overflow: hidden;
}

.table-orders thead {
    background: linear-gradient(90deg, #dea928, #000201);
    color: #fff;
}

.table-orders th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 13px;
}

.table-orders tbody tr:hover {
    background: #f9f9f9;
}


.custom-pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.custom-pagination ul {
    list-style: none;
    display: flex;
    gap: 6px;
    padding: 0;
    margin: 0;
}

.custom-pagination li {
    display: inline-block;
}

.custom-pagination a,
.custom-pagination span {
    display: block;
    padding: 8px 14px;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    color: #dea928; /* brand green */
    border: 1px solid #dea928;
    transition: all 0.2s ease-in-out;
}

.custom-pagination a:hover {
    background: #dea928;
    border-color: #dea928;
    color: #fff;
}

.custom-pagination .active span {
    background: #dea928;
    border-color: #dea928;
    color: #fff;
}

.custom-pagination .disabled span {
    opacity: 0.5;
    cursor: not-allowed;
    border-color: #ccc;
    color: #999;
}

</style>
<style>

.nav-dashboard { margin-bottom: 30px; }
.nav-dashboard a { margin-right: 15px; font-weight: 600; color: #333; }
.nav-dashboard a.active { color: #fff; background: linear-gradient(90deg, #dea928, #000201); padding: 6px 12px; border-radius: 6px; }
</style>
<div class="container py-5">
    {{-- Navigation --}}
    <div class="nav-dashboard mb-4">
        <a href="{{ url('/orders') }}" class="active">My Orders</a>
        <a href="{{ route('user.profile') }}">Profile Details</a>
    </div>
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header text-white d-flex justify-content-between align-items-center"
             style="background:linear-gradient(135deg, #dea928, #000201); border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
            <h3 class="mb-0"><i class="fas fa-box me-2"></i> My Orders</h3>
            <small class="text-white-50">Track & manage your purchases</small>
        </div>

        <div class="card-body p-4">
            @if($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td><span class="fw-bold text-dark">#{{ $order->id }}</span></td>
                                    <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($order->status == 'completed') bg-success 
                                            @elseif($order->status == 'processing') bg-info 
                                            @elseif($order->status == 'pending') bg-warning 
                                            @elseif($order->status == 'cancelled') bg-danger 
                                            @else bg-secondary @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge 
                                            @if($order->payment_status == 'paid') bg-success 
                                            @elseif($order->payment_status == 'failed') bg-danger 
                                            @elseif($order->payment_status == 'refunded') bg-warning 
                                            @else bg-secondary @endif">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td class="fw-bold text-dark">${{ number_format($order->total, 2) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('order.details', $order->id) }}" 
                                           class="btn btn-sm btn-outline-success rounded-pill px-3">
                                            <i class="fas fa-eye me-1"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-4 d-flex justify-content-center">
                    {{ $orders->links('components.pagination') }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                    <p class="text-muted">You haven’t placed any orders yet.</p>
                    <a href="{{ url('/') }}" class="btn btn-success px-4 rounded-pill">
                        <i class="fas fa-store me-2"></i> Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
