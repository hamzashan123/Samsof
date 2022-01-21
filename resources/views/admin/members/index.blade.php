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
                    Members
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
                    <li class="is-active"><a href="#" aria-current="page">Members</a></li>
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
            <form method="get" action="{{ route('admin.members.index') }}">
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input type="text" class="input" name="search" placeholder="search..." value="{{ $search ?: null }}">
                    </div>
                    @if ($search)
                        <div class="control">
                            <a href="{{ route('admin.members.index') }}" class="button is-danger">
                                <fa icon="times"></fa>
                            </a>
                        </div>
                    @endif
                    <div class="control">
                        <button class="button is-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="column">
            <b-button type="is-success" tag="a" href="{{ route('admin.members.create') }}" icon-left="plus">Register a New Member</b-button>
            <b-button type="is-success" tag="a" href="{{ route('admin.members.export') }}" icon-left="download">Export</b-button>
        </div>
    </div>
    <table class="table is-fullwidth">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Last Login</th>
            <th>Membership</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($members as $member)
            <tr>
                <td>
                    {{ $member->name }}
                    @if (!$member->approved)
                        <div class="has-text-danger">
                            Has not been approved. <a href="{{ route('admin.members.approve', [$member]) }}">Approve now</a>
                        </div>
                    @endif
                </td>
                <td><a href="{{ $member->email }}">{{ $member->email }}</a></td>
                <td>{{ $member->presentable_last_login_at }}</td>
                <td>
                    @if ($member->payable)
                        @if (!$member->last_payment_at || $member->last_payment_at->lt(now()))
                            <div class="has-text-danger">
                                Expired {{ $member->next_payment_at ? 'at '.$member->presentable_next_payment_at : '' }}
                            </div>
                        @else
                            <div class="has-text-danger">Expires {{ $member->presentable_next_payment_at }}</div>
                        @endif
                    @else
                        Until {{ $member->presentable_next_payment_at }}
                    @endif

                    @if ($member->pop_uploaded_at && !$member->pop_approved)
                        <div>
                            <strong>Proof of payment uploaded on:</strong>
                            <a href="{{ route('admin.members.pop.download', [$member]) }}">
                                {{ $member->presentable_pop_uploaded_at }}
                            </a>
                        </div>
                    @endif
                </td>
                <td>
{{--                    @if ($member->active)--}}
{{--                        <div class="tag is-success" title="{{ $member->name }} is active on the community portal"><fa icon="check"></fa></div>--}}
{{--                    @endif--}}
                    @if ($member->published)
                        <div class="tag is-info" title="{{ $member->name }} is published to the SASMFOS website"><fa icon="address-card"></fa></div>
                    @endif
                </td>
                <td>
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button is-success is-outlined is-pulled-left is-small" href="{{ route('admin.members.edit', $member->id) }}">
                                <span class="icon">
                                    <fa icon="edit"></fa>
                                </span>
                                <span>Edit</span>
                            </a>
                        </p>
                        <p class="control">
                            <delete-button title="Member" action="{{ route('admin.members.destroy', $member->id) }}"></delete-button>
                        </p>
                    </div>
                    <div>
                        @if ($member->pop_uploaded_at && !$member->pop_approved)
                            <approve-pop :member="{{ $member }}"></approve-pop>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="columns">
        <div class="column">
            {{ $members->appends(request()->only('search'))->links() }}
        </div>
    </div>
</div>
@endsection
