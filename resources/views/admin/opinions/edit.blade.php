@extends('layouts.admin', ['active' => 'opinions'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-volume-high"></span>
                </span>
                <span>
                    SASMFOS Opinions
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
                    <li><a href="{{ route('admin.opinions.index') }}">SASMFOS Opinions</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($opinion) ? 'Edit' : 'Create' }}</a></li>
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
            <form method="post" action="{{ isset($opinion) ? route('admin.opinions.update', $opinion->id) : route('admin.opinions.store')}}">
                @csrf
                @method(isset($opinion) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <label class="label">Title</label>
                        <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($opinion) ? $opinion->title : '') }}">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label class="label">Content</label>
                        <content-editor
                                        value="{{ old('content') ?: (isset($opinion) ? $opinion->content : '') }}"
                                        name="content"></content-editor>
                    </div>
                    <div class="column">
                        <div class="columns">
                            <div class="column">
                                <label class="label">Pdf</label>
                                    @if ($opinion)
                                        @if ($opinion->has_pdf_file)
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
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($opinion) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($opinion) ? 'Update SASMFOS Opinion' : 'Add SASMFOS Opinion' }}
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
