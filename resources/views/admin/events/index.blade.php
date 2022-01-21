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
                    Events
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
                    <li class="is-active"><a href="#" aria-current="page">Events</a></li>
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
            <b-button type="is-dark is-outlined" tag="a" href="{{ route('admin.calendar') }}" icon-left="calendar">View Calendar</b-button>
        </div>
    </div>
    @foreach ($events as $event)
        <div class="columns">
            <div class="column">
                {{ $event->title }} <span class="tag">{{ $event->start_date }}</span>
            </div>
            <div class="column is-one-quarter">
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.events.edit', $event->id) }}">
                                <span class="icon">
                                    <fa icon="edit"></fa>
                                </span>
                                <span>Edit</span>
                            </a>
                        </p>
                        <p class="control">
                            <delete-button title="Event" action="{{ route('admin.events.destroy', $event->id) }}"></delete-button>
                        </p>
                    </div>
            </div>
        </div>
    @endforeach
    <div class="columns">
        <div class="column">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection
