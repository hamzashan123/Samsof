@extends('layouts.admin', ['active' => 'posts'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-primary">
                <span class="icon">
                    <span class="mdi mdi-newspaper"></span>
                </span>
                <span>
                    Posts
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
                    <li><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($post) ? 'Edit' : 'Create' }}</a></li>
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
            <form method="post" action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store')}}">
                @csrf
                @method(isset($post) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Title</label>
                                <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($post) ? $post->title : '') }}">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div>
                                    <date-picker selected-date="{{ $post ? $post->published_at : $date }}" label="Published Date"
                                        field-name="published_at"
                                        :time-active="false"></date-picker>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Headline</label>
                                <input class="input {{ $errors->has('headline') ? 'is-danger' : null }}" type="text" name="headline"  value="{{ old('headline') ?: (isset($post) ? $post->headline : '') }}">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Content</label>
                                <textarea class="textarea {{ $errors->has('content') ? 'is-danger' : null }}" name="content" rows="10">{{ old('content') ?: (isset($post) ? $post->content : '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="column is-two-fifths has-background-light">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Post Category</label>
                                <div class="select">
                                    <select name="category_id">
                                        <option>Select Category...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $post && $post->category_id === $category->id ? 'selected' : null }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Cover</label>
                                <uploader name="image"
                                    :allowed-file-types="['image/jpeg','image/png']"
                                    image="{{ isset($post) ? $post->thumbnail : null }}"
                                    endpoint="{{ route('admin.upload') }}"></uploader>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Has Media</label>
                                <media-switch
                                activate-switch="{{ $post && $post->media === null ? 'No' : 'Yes' }}"
                                value="{{ old('media') ?: (isset($post) ? $post->media : '') }}">
                                    <div class="select" slot="dropdown">
                                        <select name="media_type">
                                            <option>Select Media Type</option>
                                            <option value="youtube" {{ $post && $post->media_type === 'youtube' ? 'selected' : null }}>YouTube</option>
                                            <option value="vimeo" {{ $post && $post->media_type === 'vimeo' ? 'selected' : null }}>Vimeo</option>
                                            <option value="podcast" {{ $post && $post->media_type === 'podcast' ? 'selected' : null }}>Podcast</option>
                                            <option value="website" {{ $post && $post->media_type === 'website' ? 'selected' : null }}>Website</option>
                                        </select>
                                    </div>
                                </media-switch>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($post) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($post) ? 'Update Post' : 'Add Post' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
