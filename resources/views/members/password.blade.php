@extends('layouts.app', ['active' => 'password'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <div class="content">
                    <h2 class="has-text-primary">{{ $member->name }} Password</h2>
                    <p>
                        Enter your new password here. Be aware that passwords are updated immediately. The next time you
                        log into the SASMFOS members area you will need to use your new password.
                    </p>
                </div>
                <form method="post" action="{{ route('members.password.update') }}">
                    @csrf
                    <div class="field">
                        <label class="label">New Password</label>
                        <password-editor name="password"></password-editor>
                    </div>
                    <div class="is-pulled-right">
                        <a href="{{ route('members.dashboard') }}" class="button is-light">Cancel</a>
                        <button class="button is-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
