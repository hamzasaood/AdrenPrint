@extends('layout.default')

@section('content')
<style>

.nav-dashboard { margin-bottom: 30px; }
.nav-dashboard a { margin-right: 15px; font-weight: 600; color: #333; }
.nav-dashboard a.active { color: #fff; background: linear-gradient(90deg, #dea928, #000201); padding: 6px 12px; border-radius: 6px; }
</style>
<div class="container py-5">
    {{-- Navigation --}}
    <div class="nav-dashboard mb-4">
        <a href="{{ url('/orders') }}">My Orders</a>
        <a href="{{ route('user.profile') }}" class="active">Profile Details</a>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header text-white" style="background:linear-gradient(135deg, #dea928, #000201);">
            <h3 class="mb-0"><i class="fas fa-user me-2"></i> My Profile</h3>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Phone:</strong> {{ $user->phone ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Address:</strong> {{ $user->address ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>City:</strong> {{ $user->city ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Country:</strong> {{ $user->country ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>State:</strong> {{ $user->state ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Member Since:</strong> {{ $user->created_at->format('F d, Y') }}</p>
                </div>

            </div>

            <div class="mt-4">
                <a href="{{ route('profile.edit') }}" class="btn btn-warning rounded-pill px-4">
                    <i class="fas fa-edit me-2"></i> Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
