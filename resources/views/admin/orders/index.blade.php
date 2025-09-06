@extends('admin.layout.default')

@section('admin.content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<div class="container-fluid p-0">
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="box_header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Orders</h4>
                </div>

                <a href="{{ route('admin.reports.export.csv') }}" class="btn btn-success">
                        📥 Export CSV
                    </a>
            </div>

            <div class="white_card_body">
                <div class="QA_section">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="ordersTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $o)
                                    <tr>
                                        <td>#{{ $o->id }}</td>
                                        <td>{{ $o->billing_name }}</td>
                                        <td>{{ $o->billing_email }}</td>
                                        <td>${{ number_format($o->total,2) }}</td>
                                        <td>{{ ucfirst($o->status) }}</td>
                                        <td>{{ ucfirst($o->payment_status) }}</td>
                                        <td>{{ $o->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show',$o->id) }}" class="btn btn-sm btn-info">View</a>
                                            <form action="{{ route('admin.orders.destroy',$o->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#ordersTable').DataTable();
        $('.delete-form').on('submit', function (e) {
            if (!confirm('Are you sure you want to delete this order?')) {
                e.preventDefault();
            }
        });
    });
</script>
@endsection
