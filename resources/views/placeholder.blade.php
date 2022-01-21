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

    <title>SASMFOS • Home</title>

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

    @if (app()->isLocal())
        <script src="http://localhost:8098"></script>
    @endif

    @routes
</head>

<body>
    <div id="app" class="{{ isset($rightGap) ? 'right-gap' : null }}">
        <div class="has-background-white">
            <covid-banner></covid-banner>
            <placeholder-hero-banner :slider-images="{{ json_encode($sliderImages) }}"></placeholder-hero-banner>
            <feature-grid></feature-grid>
        </div>
    </div>

    @yield('scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    @if (app()->isLocal())
        <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    @endif

    @env('production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146799199-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-146799199-1');
        </script>
    @endenv
</body>

</html>
