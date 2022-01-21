@extends('layouts.admin', ['active' => 'opinions'])

@section('content')
<section class="hero is-light">
    <div class="hero-body">
        <div class="container has-text-center">
            <h1 class="title">
                    <span class="icon">
                        <span class="mdi mdi-volume-high"></span>
                    </span>
                    <span>
                        SASMFOS Opinions
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
                    <li class="is-active"><a href="#" aria-current="page">SASMFOS Opinions</a></li>
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
            <b-button type="is-success" tag="a" href="{{ route('admin.opinions.create') }}" icon-left="plus">Create SASMFOS Opinion</b-button>
        </div>
    </div>
    @foreach ($opinions as $opinion)
        <div class="columns">
            <div class="column">
                {{ $opinion->title }}
            </div>
            <div class="column is-one-quarter">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.opinions.edit', $opinion->id) }}">
                            <span class="icon">
                                <fa icon="edit"></fa>
                            </span>
                            <span>Edit</span>
                        </a>
                    </p>
                    <p class="control">
                        <delete-button title="SASMFOS Opinion" action="{{ route('admin.opinions.destroy', $opinion->id) }}"></delete-button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    <div class="columns">
        <div class="column">
            {{ $opinions->links() }}
        </div>
    </div>
</div>
@endsection
