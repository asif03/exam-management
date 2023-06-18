@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
            <div class="form-container">
                <div class="form-icon">
                    <i class="fa fa-user-circle"></i>
                    <span class="signup"><a href="">Don't have account? Signup</a></span>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="title">{{ __('Login') }}</h3>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                            placeholder="Email Address" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" type="password" placeholder="Password">
                    </div>
                    <button class="btn signin">Login</button>
                    <span class="forgot-pass"><a href="#">Forgot Username/Password?</a></span>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection