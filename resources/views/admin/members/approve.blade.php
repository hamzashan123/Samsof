@extends('layouts.admin', ['active' => 'members'])
@section('content')
    <section class="hero is-light">
        <div class="hero-body">
            <div class="container has-text-center">
                <h1 class="title">
                <span class="icon">
                    <span class="mdi mdi-account-card-details"></span>
                </span>
                    <span>
                    Member Approval
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
                        <li><a href="{{ route('admin.members.index') }}">Members</a></li>
                        <li><a href="{{ route('admin.members.show', [$member]) }}">{{ $member->name }}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="content">
                    <p>
                        Once approved, a member will be able to log into their own account where they can manage their
                        contact information and make payments for their annual SASMFOS fees.
                    </p>
                </div>
                <form method="post" action="{{ route('admin.members.approve', [$member]) }}">
                    @csrf
                    <button class="button is-primary">Approve {{ $member->name }}</button>
                </form>
            </div>
        </div>
    </div>
@stop
