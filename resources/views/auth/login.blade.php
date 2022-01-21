@extends('layouts.master')

@section('content')
    <page-banner src="{{ asset('images/banners/who-we-are.jpg') }}">
        <template v-slot:title>
            <span>SASMFOS</span> Members
        </template>
    </page-banner>
    <div class="member-login">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h1 class="title has-text-primary has-text-weight-normal has-text-grey">Members Login</h1>
                    <hr>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third mb-5">
                    @if ($errors->count())
                        <div class="notification is-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('members.login') }}">
                        @csrf

                        <b-field label="Email Address">
                            <b-input type="email" name="email" value="{{ old('email') }}"></b-input>
                        </b-field>
                        <b-field label="Password">
                            <b-input type="password" name="password"></b-input>
                        </b-field>

                        <b-button type="is-primary" native-type="submit">LOGIN</b-button>
                        <a href="{{ route('members.register') }}" class="button is-secondary is-uppercase">REGISTER</a>

                    </form>
                    <hr>
                    Having trouble logging in? <a href="{{ route('password.request') }}">Reset your password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
