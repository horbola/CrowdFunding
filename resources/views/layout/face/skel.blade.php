<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php use Illuminate\Support\Facades\URL; @endphp
    <meta name="idlePage" content="{{ URL::current() }}">
    {{ session(['idlePage' => URL::current()]) }}
    <!--<title>{{ config('app.name', 'Oporajoy Crowd Funding') }}</title>-->
    <title>{{ $title?? '' }}</title>
    
    <!-- icons -->
    <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <!--<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">-->
    <!-- native global styles-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt" /><!--landrick provided-->
    <link href="{{ asset('css/colors/default.css') }}" rel="stylesheet" id="color-opt"><!--landrick provided-->
    <style></style>
    <!-- native page styles-->
    @yield('page-style')
    @yield('campaign-detail-image-style')
    @yield('campaign-detail-sticky-style')
    @yield('campaign-detail-tabs-style')
    @yield('comments-display-style')
    @yield('profile-style')
    @yield('profile-edit-style')
    
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}" defer></script>
    <!-- native global scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app_landrick.js') }}" defer></script><!--landrick provided-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins.init.js') }}" defer></script><!--landrick provided-->
    <script src="{{ asset('js/library.js') }}" defer></script><!-- utility functions and classes -->
    <script></script>
    <!-- native page scripts -->
    @yield('page-script')
    <!-- 'page-script-bottom' and 'page-script-bottom-init' is down below -->
</head>
<body>
<div id="app">
    @include('layout.face.header')
    <main>
        @yield('content')
    </main><!-- end main content -->
    @include('layout.face.footer-dark')
    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
</div><!-- end app -->
@yield('page-script-bottom')
@yield('campaign-detail-image-script-bottom')
@yield('campaign-detail-sticky-script-bottom')
@yield('campaign-detail-tabs-script-bottom')
@yield('comments-display-script')
@yield('profile-script')
</body>
</html>



