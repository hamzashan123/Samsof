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
                    Cities
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
                        <li><a href="{{ route('admin.cities.index') }}">Cities</a></li>
                        <li class="is-active"><a href="#" aria-current="page">{{ $city ? 'Edit' : 'Create' }}</a></li>
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
                <form method="post" action="{{ $city ? route('admin.cities.update', $city) : route('admin.cities.store')}}">
                    @csrf
                    @method(isset($city) ? 'put' : 'post')
                    <div class="columns">
                        <div class="column is-3">
                            <label class="label">Country</label>
                            <div class="select">
                                <select name="country_id">
                                    <option value="" disabled {{ !$city ? 'selected' : null }}>[Select a country]</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ $city && $city->country_id === $country->id ? 'selected' : null }}>{{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <label class="label">Title</label>
                            <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text"
                                   name="title"  value="{{ old('title') ?: ($city ? $city->title : '') }}">
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ $city ? 'edit' : 'plus' }}"></fa>
                            </span>
                                <span>
                                {{ $city ? 'Update Country' : 'Add Country' }}
                            </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
