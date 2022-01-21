@extends('layouts.admin', ['active' => 'media'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-format-list-bulleted-type"></span>
                </span>
                <span>
                    Media
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
                    <li><a href="{{ route('admin.medias.index') }}">Media</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($media) ? 'Edit' : 'Create' }}</a></li>
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
            <form method="post" action="{{ isset($media) ? route('admin.medias.update', $media->id) : route('admin.medias.store')}}">
                @csrf
                @method(isset($media) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Title</label>
                                <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($media) ? $media->title : '') }}">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div>
                                    <date-picker selected-date="{{ $media ? $media->published_at : $date }}" label="Published Date"
                                        field-name="published_at"
                                        :time-active="false"></date-picker>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Headline</label>
                                <input class="input {{ $errors->has('headline') ? 'is-danger' : null }}" type="text" name="headline"  value="{{ old('headline') ?: (isset($media) ? $media->headline : '') }}">
                            </div>
                            <div class="column">
                            <label class="label">Media Type</label>
                                <media-selector selected-option="{{ isset($media) ? $media->media_type : null }}"
                                    image="{{ isset($post) ? $post->thumbnail : null }}"
                                    image-endpoint="{{ route('admin.upload') }}"
                                    pdf-endpoint="{{ route('admin.pdf.upload') }}"
                                    media-link="{{ old('video_link') ?: (isset($media) ? $media->video_link : '') }}"></media-selector>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Content</label>
                                <textarea class="textarea {{ $errors->has('content') ? 'is-danger' : null }}" name="content" rows="10">{{ old('content') ?: (isset($media) ? $media->content : '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($media) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($media) ? 'Update Post' : 'Add Post' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
