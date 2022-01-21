@extends('layouts.admin', ['active' => 'events'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-calendar"></span>
                </span>
                <span>
                    Calendar
                </span>
            </h1>
        </div>
    </div>
</section>
<div class="section">
    <div class="columns">
        <div class="column">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Calendar</a></li>
                </ul>
            </nav>
        </div>
    </div>
    @if(session()->has('success'))
        <div class="columns">
            <div class="column">
                <success-notification message="{{ session()->get('success') }}"></success-notification>
            </div>
        </div>
    @endif
    <div class="columns">
        <div class="column">
            <b-button type="is-success" tag="a" href="{{ route('admin.events.create') }}" icon-left="plus">Create Event</b-button>
            <b-button type="is-dark is-outlined" tag="a" href="{{ route('admin.events.index') }}" icon-left="calendar">View Events</b-button>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            <events-calendar :calendar-events="{{ $events }}"></events-calendar>
        </div>
    </div>
</div>
@endsection
