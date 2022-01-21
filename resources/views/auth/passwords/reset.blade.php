@extends('layouts.master')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-6 content mt-7 mb-7">
            <h1 class="has-text-primary">Reset Password</h1>
            <p>
                Enter your new password here.
            </p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>

                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                    <div class="control">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="has-text-right">
                    <button type="submit" class="button is-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
