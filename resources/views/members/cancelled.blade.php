@extends('layouts.app', ['active' => 'payments'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
                <div class="content">
                    <h1 class="has-text-danger">
                        <fa icon="times"></fa><br>
                        Payment Cancelled!
                    </h1>
                    <p>
                        Your payment has been cancelled.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
