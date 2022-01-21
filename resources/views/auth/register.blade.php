@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Who We Are')
@section('content')
    <navigator active="who"></navigator>
    <page-banner src="{{ asset('images/banners/who-we-are.jpg') }}" :breadcrumb="['Home']" placement="top">
        <template v-slot:title>
            <span>Member</span> Registration
        </template>
    </page-banner>

    <registration-form :countries="{{ $countries }}"
                       :cities="{{ $cities }}"
                       :hospitals="{{ $hospitals }}" :registered="{{ session()->has('registered') ? 'true' : 'false' }}"></registration-form>
@endsection
