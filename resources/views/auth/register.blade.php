@extends('layout.default')

@section('content')
<section class="cart py-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0 rounded">
                    
                    <!-- Card Header -->
                    <div class="card-header text-white" 
                     style="background:linear-gradient(135deg, #dea928, #000201);">
                        <h3 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Register</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Full Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-500">Full Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-500">Email Address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-500">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required>

                                @error('password')
                                    <span class="invalid-feedback d-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label fw-500">Confirm Password</label>
                                <input id="password-confirm" type="password"
                                    class="form-control" name="password_confirmation" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="cus-btn wow fadeInUp animated" data-wow-delay="0.2s">
                                    Register
                                </button>
                            </div>

                            <!-- Login Redirect -->
                            <div class="text-center mt-3">
                                <p class="small">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="link-primary fw-500">Login here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
