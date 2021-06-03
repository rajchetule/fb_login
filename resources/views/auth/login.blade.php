@extends('layouts.main')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"> {{ config('app.name', 'Laravel') }} </a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" name="email" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 ml-1">
                        <div class="icheck-primary">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                            {{ __('Remember Me') }}
                            </label>
                        </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }} </button>

                        </div>

                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="{{ url('facebook') }}" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Login in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Login in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-0">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </p>

                <p class="mb-1 ml-1">
                    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
        </div>
    </div>
@endsection

