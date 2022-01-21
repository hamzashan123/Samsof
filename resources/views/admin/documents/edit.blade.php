@extends('layouts.admin', ['active' => 'documents'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-file-pdf"></span>
                </span>
                <span>
                    Documents
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
                    <li><a href="{{ route('admin.documents.index') }}">Documents</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($document) ? 'Edit' : 'Upload' }}</a></li>
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
            <form method="post" action="{{ isset($document) ? route('admin.documents.update', $document->id) : route('admin.documents.store')}}">
                @csrf
                @method(isset($document) ? 'put' : 'post')
                <div class="columns">
                        <div class="column">
                            <label class="label">Title</label>
                            <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($document) ? $document->title : '') }}">
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <label class="label">Pdf</label>
                            @if ($document)
                                @if ($document->has_pdf_file)
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
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($document) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($document) ? 'Update Document' : 'Upload Document' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
