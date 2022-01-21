@extends('layouts.admin', ['active' => 'photos'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-image-multiple"></span>
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
                    <li class="is-active"><a href="#" aria-current="page">Photos</a></li>
                </ul>
            </nav>
        </div>
    </div>
    @if(session()->has('success'))
        <success-notification message="{{ session()->get('success') }}"></success-notification>
    @endif
    <div class="columns">
        <div class="column">
            <b-button type="is-success" tag="a" href="{{ route('admin.photos.create') }}" icon-left="upload">Upload Photo</b-button>
        </div>
    </div>
    <div class="columns is-multiline">
        @foreach ($photos as $photo)
            <div class="column is-one-third">
                <div class="card h-100">
                    <div class="card-image">
                        <figure class="image">
                            <img src="{{ $photo->thumbnail }}" alt="{{ $photo->title }}">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <p>{{ $photo->title }}</p>
                            <div class="field is-grouped">
                                <p class="control">
                                    <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.photos.edit', $photo->id) }}">
                                        <span class="icon">
                                            <fa icon="edit"></fa>
                                        </span>
                                        <span>Edit</span>
                                    </a>
                                </p>
                                <p class="control">
                                    <delete-button title="Photo" action="{{ route('admin.photos.destroy', $photo->id) }}"></delete-button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="columns">
        <div class="column">
            {{ $photos->links() }}
        </div>
    </div>
</div>
@endsection
