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
        <a href="{{ route('profile.edit') }}" class="active">Edit Profile</a>
    </div>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header text-white" style="background:linear-gradient(135deg, #dea928, #000201);">
            <h3 class="mb-0"><i class="fas fa-user-edit me-2"></i> Edit Profile</h3>
        </div>

        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label fw-bold">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                               class="form-control @error('address') is-invalid @enderror">
                        @error('address')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="city" class="form-label fw-bold">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $user->city) }}"
                               class="form-control @error('city') is-invalid @enderror">
                        @error('city')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="country" class="form-label fw-bold">Country</label>
                        <input type="text" name="country" id="country" value="{{ old('country', $user->country) }}"
                               class="form-control @error('country') is-invalid @enderror">
                        @error('country')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label for="state" class="form-label fw-bold">State</label>
                        <input type="text" name="state" id="state" value="{{ old('state', $user->state) }}"
                               class="form-control @error('state') is-invalid @enderror">
                        @error('state')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning rounded-pill px-4">
                        <i class="fas fa-save me-2"></i> Update Profile
                    </button>
                    <a href="{{ route('user.profile') }}" class="btn btn-secondary rounded-pill px-4">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>


    {{-- Change Password --}}
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header text-white" style="background:linear-gradient(135deg, #dea928, #000201);">
            <h3 class="mb-0"><i class="fas fa-lock me-2"></i> Change Password</h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('profile.password') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Current Password</label>
                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">New Password</label>
                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                        @error('new_password')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-dark rounded-pill px-4">
                        <i class="fas fa-key me-2"></i> Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>





</div>
@endsection
