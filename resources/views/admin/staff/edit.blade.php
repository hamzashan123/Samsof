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
                    <li><a href="{{ route('admin.staff.index') }}">Staff Members</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ isset($staff) ? 'Edit' : 'Create' }}</a></li>
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
            <form method="post" action="{{ isset($staff) ? route('admin.staff.update', $staff->id) : route('admin.staff.store')}}">
                @csrf
                @method(isset($staff) ? 'put' : 'post')
                <div class="columns">
                    <div class="column">
                        <label>Name</label>
                        <input class="input {{ $errors->has('name') ? 'is-danger' : null }}" type="text" name="name"  value="{{ old('name') ?: (isset($staff) ? $staff->name : '') }}">
                    </div>
                    <div class="column">
                        <label>Position</label>
                        <input class="input {{ $errors->has('position') ? 'is-danger' : null }}" type="text" name="position"  value="{{ old('position') ?: (isset($staff) ? $staff->position : '') }}">
                    </div>
                    <div class="column is-one-fifth">
                        <label>Order</label>
                        <input class="input {{ $errors->has('order') ? 'is-danger' : null }}" type="number" name="order" value="{{ old('order') ?: (isset($staff) ? $staff->order : '0') }}">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <list-editor :items="{{ isset($staff) ? json_encode($staff->qualifications) : '[]' }}"
                                label="Qualification"
                                name="qualifications"
                                :error="{{ $errors->has('qualifications') ? 'true' : 'false' }}"></list-editor>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label>Description</label>
                        <textarea class="textarea  {{ $errors->has('description') ? 'is-danger' : null }}" placeholder="" name="description" rows="10">{{ old('description') ?: (isset($staff) ? $staff->description : '') }}</textarea>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <label>Phone</label>
                        <input class="input  {{ $errors->has('phone') ? 'is-danger' : null }}" type="text" name="phone" value="{{ old('phone') ?: (isset($staff) ? $staff->phone : '') }}">
                    </div>
                    <div class="column">
                        <label>Email</label>
                        <input class="input  {{ $errors->has('email') ? 'is-danger' : null }}" type="email" name="email" value="{{ old('email') ?: (isset($staff) ? $staff->email : '') }}">
                    </div>
                    <div class="column">
                        <label>LinkedIn</label>
                        <input class="input  {{ $errors->has('social') ? 'is-danger' : null }}" type="text" name="social" value="{{ old('social') ?: (isset($staff) ? $staff->social : '') }}">
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <button type="submit" class="button is-success is-pulled-right">
                            <span class="icon">
                                <fa icon="{{ isset($staff) ? 'edit' : 'plus' }}"></fa>
                            </span>
                            <span>
                                {{ isset($staff) ? 'Update Staff Member' : 'Add Staff Member' }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
