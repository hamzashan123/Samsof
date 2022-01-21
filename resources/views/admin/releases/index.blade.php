@extends('layouts.admin', ['active' => 'media-releases'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
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
                    <li class="is-active"><a href="#" aria-current="page">Media Releases</a></li>
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
            <b-button type="is-success" tag="a" href="{{ route('admin.releases.create') }}" icon-left="plus">Create Media Release</b-button>
        </div>
    </div>
    @foreach ($releases as $release)
        <div class="columns">
            <div class="column">
                {{ $release->title }}
                @if ($release->has_pdf_file)
                    <span class="tag">PDF</span>
                @endif
                @if ($release->video_link)
                    <span class="tag">Video</span>
                @endif
            </div>
            <div class="column is-one-quarter">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.releases.edit', $release->id) }}">
                            <span class="icon">
                                <fa icon="edit"></fa>
                            </span>
                            <span>Edit</span>
                        </a>
                    </p>
                    <p class="control">
                        <delete-button title="Media Release" action="{{ route('admin.releases.destroy', $release->id) }}"></delete-button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="columns">
        <div class="column">
            {{ $releases->links() }}
        </div>
    </div>
</div>
@endsection
