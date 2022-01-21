@extends('layouts.admin', ['active' => 'cities'])

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
                        <li class="is-active"><a href="#" aria-current="page">Cities</a></li>
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
                <b-button type="is-success" tag="a" href="{{ route('admin.cities.create') }}" icon-left="plus">Add a City</b-button>
            </div>
        </div>
        <table class="table is-fullwidth">
            <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Hospitals</th>
                <th>Members</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->title }}</td>
                    <td>{{ $city->country->title }}</td>
                    <td>{{ $city->hospitals_count }}</td>
                    <td>{{ $city->members_count }}</td>
                    <td>
                        <div class="field is-grouped">
                            <p class="control">
                                <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.cities.edit', $city) }}">
                                <span class="icon">
                                    <fa icon="edit"></fa>
                                </span>
                                    <span>Edit</span>
                                </a>
                            </p>
                            <p class="control">
                                <delete-button title="Country" action="{{ route('admin.cities.destroy', $city) }}"></delete-button>
                            </p>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
