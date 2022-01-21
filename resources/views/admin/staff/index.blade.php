@extends('layouts.admin', ['active' => 'staff'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-account-group"></span>
                </span>
                <span>
                    Staff Members
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
                    <li class="is-active"><a href="#" aria-current="page">Staff Members</a></li>
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
            <b-button type="is-success" tag="a" href="{{ route('admin.staff.create') }}" icon-left="plus">Add Staff Member</b-button>
        </div>
    </div>
    @foreach ($staff as $staff)
        <div class="columns">
            <div class="column">
                {{ $staff->name }} <span class="tag">{{ $staff->position }}</span>
            </div>
            <div class="column is-one-quarter">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.staff.edit', $staff->id) }}">
                            <span class="icon">
                                <fa icon="edit"></fa>
                            </span>
                            <span>Edit</span>
                        </a>
                    </p>
                    <p class="control">
                        <delete-button title="Staff Member" action="{{ route('admin.staff.destroy', $staff->id) }}"></delete-button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
