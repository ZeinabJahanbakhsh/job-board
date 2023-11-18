@extends('layouts.guest')

@section('content')
    <div class="card-body login-card-body">

        <!-- Github/Google -->
        <div class="text-center">
            <h1 class="text-lg">
                Login with
            </h1>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="btn text-white text-center btn-block" href="auth/github/redirect" style="background-color: #333333;" role="button">
                    <i class="fab fa-github"></i>
                    {{ __('Github') }}
                </a>
            </div>

            <div class="col-6">
                <a class="btn text-white text-center btn-block" style="background-color: #dd4b39;" href="/auth/google/redirect" role="button">
                    <i class="fab fa-google"></i>
                    {{ __('Google') }}
                </a>
            </div>
        </div>
        <!-- Github/Google -->

        <!-- Login Form -->
        <div class="text-center pt-5">
            <h1 class="text-lg">
                {{ __('Login with credentials') }}
            </h1>
        </div>

        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                </div>

                <!-- /.col -->
            </div>
        </form>

        @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </p>
        @endif
        <!-- Login Form -->

        <!-- Register -->
        <div class="row">
            <div class="col-12 pt-5">
                <a class="btn text-white text-center btn-block btn-success" href="{{ route('register') }}" role="button">
                    {{ __('Create Account') }}
                </a>
            </div>
        </div>
        <!-- Register -->

    </div>
    <!-- /.login-card-body -->
@endsection
