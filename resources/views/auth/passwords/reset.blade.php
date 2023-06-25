@extends('layouts.auth')

@section('content')
<div class="container-reset">
    <div class="form-container-reset">
        <img src="{{ asset('images/bcps.png') }}" height="80" width="80" alt="Logo">
        <span class="title">{{ __('Reset Password') }}</span>

        <form method="POST" action="{{ route('password.update') }}" style="width: 100%;">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row mb-2">
                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                        name="password" required autocomplete="new-password">
                    <label for="password" class="fst-normal">{{ __('Password')
                        }}</label>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="form-floating">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                    <label for="password-confirm" class="fst-normal">{{ __('Confirm
                        Password') }}</label>
                </div>
            </div>

            <div class="row mb-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection