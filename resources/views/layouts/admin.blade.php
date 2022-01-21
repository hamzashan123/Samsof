<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @routes
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">

        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            
            $(document).ready(function() {
               
                alert('test');
            });
        </script>
        @if (app()->isLocal())
            <script src="http://localhost:8098"></script>
        @endif
    </head>
    <body>
        <div id="app">
            @if (Auth::check())
                <site-layout username="SASMFOS" active="{{ $active }}">
                    <div slot="page">
                        @yield('content')
                    </div>
                </site-layout>
            @else
                @yield('content')
            @endif
        </div>

        {{-- markdown editor for content --}}
        <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
        <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
        @yield('scripts')

        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>

        @if (app()->isLocal())
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endif

    </body>
  
</html>
