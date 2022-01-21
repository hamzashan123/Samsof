@extends('layouts.admin', ['active' => 'photos'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-primary">
                <span class="icon">
                    <span class="mdi mdi-video-vintage"></span>
                </span>
                <span>
                    Photos
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
                    <li><a href="{{ route('admin.photos.index') }}">Photos</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($photo) ? 'Edit' : 'Upload' }}</a></li>
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
            <form method="post" action="{{ isset($photo) ? route('admin.photos.update', $photo->id) : route('admin.photos.store')}}">
                @csrf
                @method(isset($photo) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Title</label>
                                <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($photo) ? $photo->title : '') }}">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Upload Photo</label>
                                <uploader name="image"
                                    :allowed-file-types="['image/jpeg','image/png']"
                                    image="{{ isset($photo) ? $photo->thumbnail : null }}"
                                    endpoint="{{ route('admin.upload') }}"></uploader>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($photo) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($photo) ? 'Update Photo' : 'Upload Photo' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
