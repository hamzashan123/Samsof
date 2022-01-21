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
                    <li><a href="{{ route('admin.events.index') }}">Events</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($event) ? 'Edit' : 'Create' }}</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            @if ($errors->count())
                <div class="notification is-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="post" action="{{ isset($event) ? route('admin.events.update', $event->id) : route('admin.events.store')}}">
                @csrf
                @method(isset($event) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <label class="label">Title</label>
                        <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($event) ? $event->title : '') }}">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Start Date and Time</label>
                        <date-time-picker selected-date="{{ $event ? $event->start_date : $date }}"
                            field-name="starts"
                            :time-active="true"></date-time-picker>
                    </div>
                    <div class="column">
                        <label class="label">End Date and Time</label>
                        <date-time-picker selected-date="{{ $event ? $event->end_date : $date }}"
                            field-name="ends"
                            :time-active="true"></date-time-picker>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Description</label>
                                <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : null }}" name="description" rows="15">{{ old('descripition') ?: (isset($event) ? $event->description : '') }}</textarea>
                                <div class="columns">
                                    <div class="column">
                                        <label class="label">Event Link</label>
                                        <input class="input {{ $errors->has('link') ? 'is-danger' : null }}" type="text" name="link"  value="{{ old('link') ?: (isset($event) ? $event->link : '') }}">
                                    </div>
                                    <div class="column">
                                        <label class="label">RSVP Email</label>
                                        <input class="input {{ $errors->has('rsvp') ? 'is-danger' : null }}" type="email" name="rsvp"  value="{{ old('email') ?: (isset($event) ? $event->rsvp : '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <label class="label">Cover</label>
                                <uploader name="image"
                                    :allowed-file-types="['image/jpeg','image/png']"
                                    image="{{ isset($event) ? $event->thumbnail : null }}"
                                    endpoint="{{ route('admin.upload') }}"></uploader>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <file-uploader></file-uploader>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($event) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($event) ? 'Update Event' : 'Add Event' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
