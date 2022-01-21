@extends('layouts.app', ['active' => 'payments'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="content">
                    <h1>Redirecting you to PayGate to make payment...</h1>
                </div>
                <paygate-redirector endpoint="{{ config('services.paygate.endpoint') . '/process.trans' }}" pay-request-id="{{ $id }}" checksum="{{ $checksum }}"></paygate-redirector>
            </div>
        </div>
    </div>
@stop
