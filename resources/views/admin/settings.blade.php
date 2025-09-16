@extends('admin.layout.default')

@section('admin.content')

<style>
    .settings-card {
        max-width: 700px;
        margin: 40px auto;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        overflow: hidden;
        border: none;
    }
    .settings-card .card-header {
        background-color: #fbaf1c;
        color: #fff;
        text-align: center;
        font-size: 1.5rem;
        font-weight: 600;
    }
    .settings-card .card-body {
        padding: 2rem;
        background-color: #fff;
    }
    .settings-card .form-group label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .settings-card .form-control {
        border-radius: 5px;
        padding: 0.5rem 1rem;
        border: 1px solid #ccc;
    }
    .settings-card .btn-save {
        background-color: #fbaf1c;
        color: #fff;
        font-weight: 600;
        border-radius: 5px;
        padding: 0.6rem;
        transition: 0.3s;
    }
    .settings-card .btn-save:hover {
        background-color: #fbaf1c;
        color: #fff;
    }
    .alert {
        max-width: 700px;
        margin: 20px auto;
    }
</style>

<div class="container">
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card settings-card">
        <div class="card-header">Settings</div>
        <div class="card-body">
            <form action="{{ url('/admin/update/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">User Name:</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group mb-3">
                    <label for="password">Change Password:</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Leave blank to keep current password">
                </div>

                <div class="form-group mb-4">
                    <label for="shipping_charges">Shipping & Handling Charges (Flat):</label>
                    <input type="text" id="shipping_charges" class="form-control" name="shipping_charges" value="{{ $user->shipping_charges }}">
                </div>

                <button type="submit" class="btn btn-save w-100">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
