@extends('layouts.admin', ['active' => 'media-coverage'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
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
                    <li class="is-active"><a href="#" aria-current="page">Media Coverage</a></li>
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
            <b-button type="is-success" tag="a" href="{{ route('admin.coverages.create') }}" icon-left="plus">Create Media Coverage</b-button>
        </div>
    </div>
    @foreach ($coverages as $coverage)
        <div class="columns">
            <div class="column">
                {{ $coverage->title }}
            </div>
            <div class="column is-one-quarter">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.coverages.edit', $coverage->id) }}">
                            <span class="icon">
                                <fa icon="edit"></fa>
                            </span>
                            <span>Edit</span>
                        </a>
                    </p>
                    <p class="control">
                        <delete-button title="Media Coverage" action="{{ route('admin.coverages.destroy', $coverage->id) }}"></delete-button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="columns">
        <div class="column">
            {{ $coverages->links() }}
        </div>
    </div>
</div>
@endsection
