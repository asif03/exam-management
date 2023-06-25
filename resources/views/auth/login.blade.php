@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="signup-icon">
        <i class="fa fa-user-circle"></i>
        <span class="signup"><a href="{{ route('register') }}">Don't have account? Signup</a></span>
    </div>
    <div class="form-container">
        <img src="{{ asset('images/bcps.png') }}" height="80" width="80" alt="Logo">
        <span class="title">{{ __('Login') }}</span>
        <form method="POST" action="{{ route('login') }}" style="width: 100%;">
            @csrf
            <div class="row mb-2">
                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="email" class="fst-normal">{{ __('E-Mail Address')
                        }}</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required />
                    <label for="password" class="text-md">{{ __('Password')
                        }}</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="form-floating">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection