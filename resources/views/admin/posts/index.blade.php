@extends('layouts.admin', ['active' => 'posts'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
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
                    <li class="is-active"><a href="#" aria-current="page">Posts</a></li>
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
            <b-button type="is-success" tag="a" href="{{ route('admin.posts.create') }}" icon-left="plus">Create Post</b-button>
        </div>
    </div>
    @foreach ($posts as $post)
        <div class="columns">
            <div class="column">
                {{ $post->title }} <span class="tag">{{ $post->category->title }}</span>
            </div>
            <div class="column is-one-quarter">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.posts.edit', $post->id) }}">
                            <span class="icon">
                                <fa icon="edit"></fa>
                            </span>
                            <span>Edit</span>
                        </a>
                    </p>
                    <p class="control">
                        <delete-button title="Post" action="{{ route('admin.posts.destroy', $post->id) }}"></delete-button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="columns">
        <div class="column">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
