@extends('layouts.admin', ['active' => 'media-releases'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-primary">
                <span class="icon">
                    <span class="mdi mdi-newspaper"></span>
                </span>
                <span>
                    Media Releases
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
                    <li><a href="{{ route('admin.releases.index') }}">Media Releases</a></li>
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
            <form method="post" action="{{ isset($release) ? route('admin.releases.update', $release->id) : route('admin.releases.store')}}">
                @csrf
                @method(isset($release) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Title</label>
                                <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($release) ? $release->title : '') }}">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div>
                                    <date-picker selected-date="{{ $release ? $release->published_at : $date }}" label="Published Date"
                                        field-name="published_at"
                                        :time-active="false"></date-picker>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Content</label>
                                <content-editor 
                                        :images="{{ $images }}" 
                                        value="{{ old('content') ?: (isset($release) ? $release->content : '') }}" 
                                        name="content"></content-editor>
                            </div>
                        </div>
                    </div>
                    <div class="column is-two-fifths has-background-light">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Cover</label>
                                <uploader name="image"
                                    :allowed-file-types="['image/jpeg','image/png']"
                                    image="{{ isset($release) ? $release->thumbnail : null }}"
                                    endpoint="{{ route('admin.upload') }}"></uploader>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Pdf</label>
                                @if ($release)
                                    @if ($release->has_pdf_file)
                                        <div class="has-text-success">
                                            PDF File Exists
                                        </div>
                                    @else
                                        <div class="has-text-success">
                                            No PDF File
                                        </div>
                                    @endif
                                @endif
                                <file-uploader name="pdf"
                                    endpoint="{{ route('admin.pdf.upload') }}"></file-uploader>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Video Link</label>
                                <input class="input {{ $errors->has('video_link') ? 'is-danger' : null }}" type="text" name="video_link"  value="{{ old('video_link') ?: (isset($release) ? $release->video_link : '') }}">
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

