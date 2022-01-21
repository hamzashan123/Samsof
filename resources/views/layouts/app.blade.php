<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph meta tags --}}
    <meta property="og:image:height" content="519">
    <meta property="og:image:width" content="991">
    <meta property="og:title" content="SASMFOS">
    <meta property="og:description" content="South African Society of Maxillofacial and Oral Surgeons">
    <meta property="og:url" content="https://sasmfos.org/">
    <meta property="og:image" content="https://sasmfos.org/images/og-image.jpg">

    <title>SASMFOS Members Area • @yield('title')</title>

    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#21c5e5">
    <meta name="msapplication-TileColor" content="#21c5e5">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="{{ mix('css/public.css') }}">

    @routes

    @if (app()->isLocal())
        <script src="http://localhost:8098"></script>
    @endif
</head>

<body>
    <div id="app" class="{{ isset($rightGap) ? 'right-gap' : null }}">

        <div class="columns is-gapless">
            <div class="column is-narrow is-hidden-mobile">
                <div class="sidebar-left is-flex flex-column has-space-between has-text-centered">
                    @include('home.partials.left-sidebar')
                </div>
            </div>
            <div class="column">
                <b-navbar>
                    <template slot="brand">
                        <b-navbar-item href="{{ route('members.dashboard') }}"><strong>{{ auth()->user()->name }}</strong></b-navbar-item>
                    </template>
                    <template slot="start">
                        <b-navbar-item href="{{ route('members.dashboard') }}" :active="{{ $active === 'dashboard' ? 'true' : 'false' }}">Dashboard</b-navbar-item>
                        <b-navbar-item href="{{ route('members.account.edit') }}" :active="{{ $active === 'account' ? 'true' : 'false' }}">Account Settings</b-navbar-item>
                        <b-navbar-item href="{{ route('members.password.edit') }}" :active="{{ $active === 'password' ? 'true' : 'false' }}">Password</b-navbar-item>
                        <b-navbar-item href="{{ route('members.payments.index') }}" :active="{{ $active === 'payments' ? 'true' : 'false' }}">Payments</b-navbar-item>
                    </template>
                    <template slot="end">
                        <form method="post" action="{{ route('members.logout') }}">
                            @csrf
                            <b-navbar-item tag="div">
                                <button class="button is-light">Logout</button>
                            </b-navbar-item>
                        </form>
                    </template>
                </b-navbar>
                <page-banner src="{{ asset('images/banners/who-we-are.jpg') }}">
                    <template v-slot:title>
                        <span>SASMFOS</span> Members
                    </template>
                </page-banner>
                @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')

    @if (app()->isLocal())
        <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    @endif
</body>

</html>
