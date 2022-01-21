@extends('layouts.admin', ['active' => 'media'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-file-video"></span>
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
                    <li class="is-active"><a href="#" aria-current="page">Media</a></li>
                </ul>
            </nav>
        </div>
    </div>
    @if(session()->has('success'))
        <div class="columns">
            <div class="column">
                <success-notification message="{{ session()->get('success') }}"></success-notification>
            </div>
        </div>
    @endif
    <div class="columns">
        <div class="column">
            <b-button type="is-success" tag="a" href="{{ route('admin.medias.create') }}" icon-left="plus">Create Media Item</b-button>
        </div>
    </div>
    @foreach ($medias as $media)
        <div class="columns">
            <div class="column">
                {{ $media->title }} <span class="tag">{{ $media->media_type }}</span>
            </div>
            <div class="column is-one-quarter">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.medias.edit', $media->id) }}">
                            <span class="icon">
                                <fa icon="edit"></fa>
                            </span>
                            <span>Edit</span>
                        </a>
                    </p>
                    <p class="control">
                        <delete-button title="Media" action="{{ route('admin.medias.destroy', $media->id) }}"></delete-button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
