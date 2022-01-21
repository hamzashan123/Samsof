@extends('layouts.admin', ['active' => 'images'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-primary">
                <span class="icon">
                    <span class="mdi mdi-video-vintage"></span>
                </span>
                <span>
                    Post Images
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
                    <li><a href="{{ route('admin.images.index') }}">Images</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($image) ? 'Edit' : 'Upload' }}</a></li>
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
            <form method="post" action="{{ isset($image) ? route('admin.images.update', $image->id) : route('admin.images.store')}}">
                @csrf
                @method(isset($image) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Title</label>
                                <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($image) ? $image->title : '') }}">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Upload Image</label>
                                <uploader name="image"
                                    :allowed-file-types="['image/jpeg','image/png']"
                                    image="{{ isset($image) ? $image->thumbnail : null }}"
                                    endpoint="{{ route('admin.upload') }}"></uploader>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($image) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($image) ? 'Update Image' : 'Upload Image' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
