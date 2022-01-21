@extends('layouts.master')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-6 content mt-7 mb-7">
            <h1 class="has-text-primary">Reset Password</h1>
            <p>
                Enter your email address and if we have your email address on record, we'll send you an email with
                instructions on how to reset your password.
            </p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="post" action="{{ route('password.email') }}">
                @csrf

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="has-text-right">
                    <button type="submit" class="button is-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
