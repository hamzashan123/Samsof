@extends('layouts.admin', ['active' => 'videos'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-filmstrip"></span>
                </span>
                <span>
                    Videos
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
                    <li><a href="{{ route('admin.videos.index') }}">Videos</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($video) ? 'Edit' : 'Upload' }}</a></li>
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
            <form method="post" action="{{ isset($video) ? route('admin.videos.update', $video->id) : route('admin.videos.store')}}">
                @csrf
                @method(isset($video) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <label class="label">Title</label>
                        <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($video) ? $video->title : '') }}">
                    </div>
                </div>
                <div class="columns">
                        <div class="column">
                            <label class="label">Link</label>
                            <input class="input {{ $errors->has('link') ? 'is-danger' : null }}" type="text" name="link"  value="{{ old('link') ?: (isset($video) ? $video->link : '') }}">
                        </div>
                    </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($video) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($video) ? 'Update Video' : 'Upload Video' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
