@extends('layouts.admin')

@section('content')
    <div class="admin-login">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h1 class="title has-text-primary">SASMFOS <span class="has-text-weight-normal has-text-grey">| Admin</span></h1>
                    <hr>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
                    <form method="POST" action="/admin/login">
                        @csrf

                        <b-field label="Email Address">
                            <b-input type="email" name="email"></b-input>
                        </b-field>
                        <b-field label="Password">
                            <b-input type="password" name="password"></b-input>
                        </b-field>

                        <b-button type="is-primary" native-type="submit">LOGIN</b-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
