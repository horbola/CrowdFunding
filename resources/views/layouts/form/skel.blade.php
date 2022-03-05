<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Oporajoy Crowd Funding') }}</title>
    
    <!-- icons -->
    <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tobii.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- native global styles-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" /><!--landrick provided-->
    <link href="{{ asset('css/colors/default.css') }}" rel="stylesheet" id="color-opt"><!--landrick provided-->
    <style></style>
    <!-- native page styles-->
    @yield('page-style')
    
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}" defer></script>
    <script src="{{ asset('js/tobii.min.js') }}" defer></script>
    <script src="{{ asset('js/feather.min.js') }}" defer></script>
    <!-- native global scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app_landrick.js') }}" defer></script><!--landrick provided-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins.init.js') }}" defer></script><!--landrick provided-->
    <script></script>
    <!-- native page scripts -->
    @yield('page-script')
    <!-- page-script-init is down below -->
</head>
<body>
<div id="app">
    <main class="mt-5">
        @yield('content')
    </main><!-- end main content -->
</div><!-- end app -->
@yield('page-script-init')
</body>
</html>
