@extends('layouts.master', ['rightGap' => true])
@section('title', 'Home')
@section('content')
    <div class="has-background-white">
        <covid-banner></covid-banner>
        <home-hero-banner :slider-images="{{ json_encode($sliderImages) }}"></home-hero-banner>
        <feature-grid></feature-grid>
    </div>
{{--    @include('home.features.congress')--}}
    @include('home.features.upcoming-events')
    @include('home.features.join-us')
    @include('home.features.breaking-the-myths')
    @include('home.features.latest-achievements')
    <div style="margin-top: -2em; position: relative">
        <ask-sasmfos :image="false" :home-page="true"></ask-sasmfos>
    </div>
    @include('home.features.quotations')
@stop
