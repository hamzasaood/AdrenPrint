@extends('admin.layout.default')

@section('admin.content')
<div class="container">
    <h2>Customers</h2>
    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.customers.show',$customer->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.customers.edit',$customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.customers.destroy',$customer->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this customer?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links() }}
</div>
@endsection
