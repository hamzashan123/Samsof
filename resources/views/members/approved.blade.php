@extends('layouts.app', ['active' => 'payments'])
@section('content')
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
                <div class="content">
                    <h1 class="has-text-success">
                        <fa icon="check"></fa><br>
                        Payment complete!
                    </h1>
                    <p>
                        Thank you for your payment. You SASMFOS membership is now valid until
                        <strong>{{ $member->presentable_next_payment_at }}</strong>.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
