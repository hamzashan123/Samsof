@extends('layouts.admin', ['active' => 'images'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-image-multiple"></span>
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
                    <li class="is-active"><a href="#" aria-current="page">Post Images</a></li>
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
            <b-button type="is-success" tag="a" href="{{ route('admin.images.create') }}" icon-left="plus">Upload Image</b-button>
        </div>
    </div>
    <div class="columns is-multiline">
        @foreach ($images as $image)
            <div class="column is-one-third">
                <div class="card h-100">
                    <div class="card-image">
                        <figure class="image">
                            <img src="{{ $image->thumbnail }}" alt="{{ $image->title }}">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <p>{{ $image->title }}</p>
                            <div class="field is-grouped">
                                <p class="control">
                                    <delete-button title="Photo" action="{{ route('admin.images.destroy', $image->id) }}"></delete-button>
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
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection
