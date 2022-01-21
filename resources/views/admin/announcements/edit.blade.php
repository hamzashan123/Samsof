@extends('layouts.admin', ['active' => 'announcements'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-primary">
                <span class="icon">
                    <span class="mdi mdi-video-vintage"></span>
                </span>
                <span>
                    Announcement
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
                    <li><a href="{{ route('admin.announcements.index') }}">Announcement</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($announcement) ? 'Edit' : 'Create' }}</a></li>
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
            <form method="post" action="{{ isset($announcement) ? route('admin.announcements.update', $announcement->id) : route('admin.announcements.store')}}">
                @csrf
                @method(isset($announcement) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <label class="label">Title</label>
                        <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($announcement) ? $announcement->title : '') }}">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Link</label>
                        <input class="input {{ $errors->has('link') ? 'is-danger' : null }}" type="text" name="link"  value="{{ old('link') ?: (isset($announcement) ? $announcement->link : '') }}">
                    </div>
                    {{-- <div class="column">
                        <label class="checkbox">
                            <input type="checkbox" name="notify_members" :checked="{{ isset($announcement) && !$announcement->notify_members ? 'false' : 'true' }}">
                            Notify Members
                        </label>
                    </div> --}}
                </div>
                
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($announcement) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($announcement) ? 'Update Announcement' : 'Create Announcement' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var easyMDE = new EasyMDE({
            element: document.getElementById('text-editor'),
        });
    </script>
@endsection

