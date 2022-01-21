@extends('layouts.admin', ['active' => 'countries'])
@section('content')
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-center">
                <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-account-card-details"></span>
                </span>
                    <span>
                    Countries
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
                        <li><a href="{{ route('admin.countries.index') }}">Countries</a></li>
                        <li class="is-active"><a href="#" aria-current="page">{{ $country ? 'Edit' : 'Create' }}</a></li>
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
                <form method="post" action="{{ $country ? route('admin.countries.update', $country->id) : route('admin.countries.store')}}">
                    @csrf
                    @method(isset($country) ? 'put' : 'post')
                    <div class="columns">
                        <div class="column">
                            <label class="label">Title</label>
                            <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text"
                                   name="title"  value="{{ old('title') ?: ($country ? $country->title : '') }}">
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ $country ? 'edit' : 'plus' }}"></fa>
                            </span>
                                <span>
                                {{ $country ? 'Update Country' : 'Add Country' }}
                            </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
