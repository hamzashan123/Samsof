@extends('layouts.admin', ['active' => 'categories'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-format-list-bulleted-type"></span>
                </span>
                <span>
                    Post Categories
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
                    <li class="is-active"><a href="#" aria-current="page">Categories</a></li>
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
            <b-button type="is-success" tag="a" href="{{ route('admin.categories.create') }}" icon-left="plus">Create Category</b-button>
        </div>
    </div>
    @foreach ($categories as $category)
        <div class="columns">
            <div class="column">
                {{ $category->title }} <span class="tag">{{ $category->posts->count() }} {{ $category->posts->count() > 1 ? 'Posts' : 'Post'}}</span>
            </div>
            <div class="column is-one-quarter">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.categories.edit', $category->id) }}">
                            <span class="icon">
                                <fa icon="edit"></fa>
                            </span>
                            <span>Edit</span>
                        </a>
                    </p>
                    <p class="control">
                        <delete-button title="Category" action="{{ route('admin.categories.destroy', $category->id) }}"
                            warning="Note: This will not delete posts attached to this category but the posts will not be visible on the site unless linked to another category"></delete-button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    <div class="columns">
        <div class="column">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
