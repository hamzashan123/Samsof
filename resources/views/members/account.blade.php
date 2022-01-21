@extends('layouts.app', ['active' => 'account'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <div class="content">
                    <h2 class="has-text-primary">{{ $member->name }} Account Details</h2>
                    <p>
                        Make sure your details are up-to-date so that your record on the SASMFOS website reflects the
                        correct details.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <account-editor :member="{{ $member }}"
                    :countries="{{ $countries }}"
                    :cities="{{ $cities }}"
                    :hospitals="{{ $hospitals }}"
                    :specialities="{{ $specialities }}"></account-editor>
@stop
