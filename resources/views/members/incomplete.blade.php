@extends('layouts.app', ['active' => 'payments'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
                <div class="content">
                    <h1 class="has-text-danger">
                        <fa icon="times"></fa><br>
                        Payment Incomplete!
                    </h1>
                    <p>
                        Your payment has not been completed. The reason is unknown.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
