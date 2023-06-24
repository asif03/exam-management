@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="signup-icon">
        <i class="fas fa-sign-in-alt"></i>
        <span class="signup"><a href="{{ route('login') }}">Already have account? Signin</a></span>
    </div>
    <div class="form-container">
        <img src="{{ asset('images/bcps.png') }}" height="80" width="80" alt="Logo">
        <span class="title">{{ __('Register') }}</span>
        <form method="POST" action="{{ route('register') }}" style="width: 100%;">
            @csrf
            <div class="row mb-2">
                <div class="form-floating">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autofocus>
                    <label for="name" class="fst-normal">{{ __('Name') }}</label>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
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
                <div class="col form-floating">
                    <input id="password_confirmation" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                        required />
                    <label for="password_confirmation" class="text-md">{{ __('Confirm Password') }}</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection