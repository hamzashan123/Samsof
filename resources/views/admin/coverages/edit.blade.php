@extends('layouts.admin', ['active' => 'media-coverage'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-primary">
                <span class="icon">
                    <span class="mdi mdi-video-vintage"></span>
                </span>
                <span>
                    Media Coverage
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
                    <li><a href="{{ route('admin.coverages.index') }}">Media Coverage</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($release) ? 'Edit' : 'Create' }}</a></li>
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
            <form method="post" action="{{ isset($coverage) ? route('admin.coverages.update', $coverage->id) : route('admin.coverages.store')}}">
                @csrf
                @method(isset($coverage) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <label class="label">Title</label>
                        <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($coverage) ? $coverage->title : '') }}">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Content</label>
                        <content-editor 
                                        :images="{{ $images }}" 
                                        value="{{ old('content') ?: (isset($coverage) ? $coverage->content : '') }}" 
                                        name="content"></content-editor>
                    </div>
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <div class="columns">
                                    <div class="column">
                                        <div>
                                            <date-picker selected-date="{{ $coverage ? $coverage->published_at : $date }}" label="Published Date"
                                                field-name="published_at"
                                                :time-active="false"></date-picker>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <label class="label">Link</label>
                                        <input class="input {{ $errors->has('link') ? 'is-danger' : null }}" type="text" name="link"  value="{{ old('link') ?: (isset($coverage) ? $coverage->link : '') }}">
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <label class="label">Icon</label>
                                        <div class="select">
                                            <select name="link_type">
                                                <option disabled>Select Icon...</option>
                                                <option value="youtube" {{ $coverage && $coverage->link_type === 'youtube' ? 'selected' : null }}>YouTube</option>
                                                <option value="vimeo" {{ $coverage && $coverage->link_type === 'vimeo' ? 'selected' : null }}>Vimeo</option>
                                                <option value="podcast" {{ $coverage && $coverage->link_type === 'podcast' ? 'selected' : null }}>Podcast</option>
                                                <option value="link" {{ $coverage && $coverage->link_type === 'link' ? 'selected' : null }}>Link</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <label class="label">Cover</label>
                                        <uploader name="image"
                                            :allowed-file-types="['image/jpeg','image/png']"
                                            image="{{ isset($coverage) ? $coverage->thumbnail : null }}"
                                            endpoint="{{ route('admin.upload') }}"></uploader>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($release) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($release) ? 'Update Media Release' : 'Create Media Release' }}
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

