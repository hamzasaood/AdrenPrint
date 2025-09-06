@extends('layout.default')

@section('content')

<style>

.form-check {
    
     min-height: 0rem !important;
    
}
.mb-2 {
    margin-bottom: 0rem !important;
}
.btn-link{

    font-size : 14px;
}

</style>
<section class="title-banner">
    <div class="container">
        <h1 class="medium-black fw-700">Login</h1>
    </div>
</section>

<section class="cart py-40">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me and Forgot Password -->
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4 d-flex justify-content-between align-items-center" >
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                           {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <div>
                                        <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="cus-btn wow fadeInLeft animated" data-wow-delay="0.2s">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <!-- Register Link -->
                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('register') }}" class="btn btn-link px-0">
                                    {{ __("Don't have an account? Register") }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
@endsection
