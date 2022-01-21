@extends('layouts.admin', ['active' => 'dashboard'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                Dashboard
            </h1>
        </div>
    </div>
</section>
<div class="section">
    <div class="columns">
        <div class="column">
            <div class="card">
                <header class="card-header has-background-light">
                    <div class="card-header-icon">
                        <span class="icon">
                            <fa icon="calendar-day"></fa>
                        </span>
                    </div>
                    <p class="card-header-title">
                        Upcoming Events
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        @foreach ($upcomingEvents as $event)
                            <div class="columns">
                                <div class="column">
                                    {{ $event->title }} <span class="tag">{{ $event->starts_at }}</span>
                                </div>
                                <div class="column is-one-fifth">
                                    <a class="button is-success is-outlined is-pulled-right">
                                        <span class="icon">
                                            <fa icon="edit"></fa>
                                        </span>
                                        <span>
                                            Edit
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($ongoingEvents->count())
                    <header class="card-header has-background-light">
                        <div class="card-header-icon">
                            <span class="icon">
                                <fa icon="calendar-week"></fa>
                            </span>
                        </div>
                        <p class="card-header-title">
                            Ongoing Events
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            @foreach ($ongoingEvents as $event)
                                <div class="columns">
                                    <div class="column">
                                        {{ $event->title }} <span class="tag">{{ $event->starts_at }}</span>
                                    </div>
                                    <div class="column is-one-fifth">
                                        <a class="button is-success is-outlined is-pulled-right">
                                            <span class="icon">
                                                <fa icon="edit"></fa>
                                            </span>
                                            <span>
                                                Edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <footer class="card-footer">
                    <a class="card-footer-item" href="{{ route('admin.calendar') }}">
                        <span class="icon">
                            <fa icon="calendar-day"></fa>
                        </span>
                        <span>
                            View Calendar
                        </span>
                    </a>
                    <a class="card-footer-item" href="{{ route('admin.events.create') }}">
                        <span class="icon">
                            <fa icon="plus"></fa>
                        </span>
                        <span>
                            Create Event
                        </span>
                    </a>
                </footer>
            </div>
        </div>
    </div>
</div>
@endsection
