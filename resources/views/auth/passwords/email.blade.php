@extends('layouts.auth')

@section('content')
<div class="container-reset">
    <div class="form-container-reset">
        <img src="{{ asset('images/bcps.png') }}" height="80" width="80" alt="Logo">
        <span class="title">{{ __('Reset Password') }}</span>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" style="width: 100%;">
            @csrf
            <div class="row mb-3">
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
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection