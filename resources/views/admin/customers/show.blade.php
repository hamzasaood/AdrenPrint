@extends('admin.layout.default')

@section('admin.content')
<div class="container">
    <h2>Customer Details</h2>

    <p><strong>ID:</strong> {{ $customer->id }}</p>
    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>Created At:</strong> {{ $customer->created_at->format('Y-m-d H:i') }}</p>

    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
