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
        @if(session()->has('success'))
            <div class="columns">
                <div class="column">
                    <success-notification message="{{ session()->get('success') }}"></success-notification>
                </div>
            </div>
        @endif
        <div class="columns">
            <div class="column">
                <b-button type="is-success" tag="a" href="{{ route('admin.cities.create') }}" icon-left="plus">Add a Hospital</b-button>
            </div>
        </div>
        <table class="table is-fullwidth">
            <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Members</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($hospitals as $hospital)
                <tr>
                    <td>{{ $hospital->title }}</td>
                    <td>{{ $hospital->city ? $hospital->city->title : '-' }}</td>
                    <td>{{ $hospital->members_count }}</td>
                    <td>
                        <div class="field is-grouped">
                            <p class="control">
                                <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.hospitals.edit', $hospital) }}">
                                <span class="icon">
                                    <fa icon="edit"></fa>
                                </span>
                                    <span>Edit</span>
                                </a>
                            </p>
                            <p class="control">
                                <delete-button title="Country" action="{{ route('admin.hospitals.destroy', $hospital) }}"></delete-button>
                            </p>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="columns">
            <div class="column">
                {{ $hospitals->appends(request()->only('search'))->links() }}
            </div>
        </div>
    </div>
@endsection
