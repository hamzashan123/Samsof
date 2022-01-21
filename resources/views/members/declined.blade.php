@extends('layouts.app', ['active' => 'payments'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
                <div class="content">
                    <h1 class="has-text-danger">
                        <fa icon="times"></fa><br>
                        Payment Declined!
                    </h1>
                    <p>
                        Unfortunately your payment has been declined by your bank. Please try another method of payment
                        or contact your bank to resolve.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
