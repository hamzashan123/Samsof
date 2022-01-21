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
                    Categories
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
                    <li><a href="{{ route('admin.categories.index') }}">Post Categories</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($category) ? 'Edit' : 'Create' }}</a></li>
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
            <form method="post" action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store')}}">
                @csrf
                @method(isset($category) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <label class="label">Title</label>
                        <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text" name="title"  value="{{ old('title') ?: (isset($category) ? $category->title : '') }}">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($category) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($category) ? 'Update Category' : 'Add Category' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
