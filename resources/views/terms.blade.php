@extends('layouts.master', ['footerSidebar' => false])
@section('title', 'Terms and Conditions')
@section('content')
    <navigator active="conference"></navigator>
    <page-banner src="{{ asset('images/banners/media.jpg') }}" :breadcrumb="['Home']">
        <template v-slot:title>
            <span>Terms</span> &amp; Conditions <br>
        </template>
    </page-banner>

@endsection
