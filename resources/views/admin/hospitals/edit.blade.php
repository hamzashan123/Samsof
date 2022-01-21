@extends('layouts.admin', ['active' => 'hospitals'])

@section('content')
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-center">
                <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-account-card-details"></span>
                </span>
                    <span>
                    Hospitals
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
                        <li class="is-active"><a href="#" aria-current="page">Hospitals</a></li>
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

                <form method="post" action="{{ $hospital ? route('admin.hospitals.update', [$hospital]) : route('admin.hospitals.store') }}">
                    @csrf
                    @method($hospital ? 'put' : 'post')
                    <div class="columns">
                        <div class="column is-3">
                            <label class="label">City</label>
                            <div class="select">
                                <select name="city_id">
                                    <option value="">None</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ $hospital && $hospital->city_id === $city->id ? 'selected' : null }}>{{ $city->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <label class="label">Title</label>
                            <input class="input {{ $errors->has('title') ? 'is-danger' : null }}" type="text"
                                   name="title"  value="{{ old('title') ?: ($hospital ? $hospital->title : '') }}">
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
{{--                            <a class="button is-light is-pulled-right" href="{{ route('admin.hospitals.index') }}">Cancel</a>--}}
                            <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ $city ? 'edit' : 'plus' }}"></fa>
                            </span>
                                <span>
                                {{ $city ? 'Update Hospital' : 'Add Hospital' }}
                            </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
