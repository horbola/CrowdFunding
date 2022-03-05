<!doctype html>
<!-- offerus skel -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php use Illuminate\Support\Facades\URL; @endphp
    <meta name="idlePage" content="{{ URL::current() }}">
    {{ session(['idlePage' => URL::current()]) }}
    <!--<title>{{ config('app.name', 'Oporajoy Crowd Funding') }}</title>-->
    <title>{{ $title?? '' }}</title>
    
    @yield('og')
    
    <!-- icons -->
    <link href="{{ asset('images/logo-b.png') }}" rel="shortcut icon">
    <script src="https://kit.fontawesome.com/ee1b5a4573.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    
    <!-- Styles -->
    <link href="{{ asset('css/offerus-bootstrap.min.css') }}" rel="stylesheet" type="text/css"><!-- version: -->
    <link href="{{ asset('css/offerus-slick.css') }}" rel="stylesheet" type="text/css"><!-- version: -->
    <!-- native global styles-->
    <link href="{{ asset('css/offerus-style.css') }}" rel="stylesheet" type="text/css" /><!-- version: -->
    <link href="{{ asset('css/offerus-media.css') }}" rel="stylesheet" type="text/css" /><!-- version: -->
    <style></style>
    <!-- native page styles-->
    @yield('page-style')
    @yield('campaign-detail-image-style')
    @yield('campaign-detail-image-test-style')
    @yield('comments-style')
    
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/offerus-bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/offerus-owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/offerus-slick.min.js') }}" defer></script>
    <!-- native global scripts -->
    <script src="{{ asset('js/library.js') }}" defer></script><!-- utility functions and classes -->
    <script src="{{ asset('js/offerus-main.js') }}" defer></script><!-- utility functions and classes -->
    <script></script>   
    <!-- native page scripts -->
    @yield('page-script')
    <!-- 'page-script-bottom' and 'page-script-bottom-init' is down below -->
</head>
<body class="home">
<div id="">
    @if(Route::currentRouteName() === 'home')
        @include('layout.face-offerus.header')
    @else
        @include('layout.face.header-offer-land')
    @endif
    <main>
        @include('partial.search-panel')
        @yield('content')
    </main><!-- end main content -->
    @include('layout.face-offerus.footer')
    @include('partial.search-script')
</div><!-- end app -->
@yield('page-script-bottom')
@yield('campaign-detail-image-script-bottom')
@yield('campaign-detail-image-test-script-bottom')
@yield('campaign-detail-tabs-script-bottom')
@yield('comments-script-bottom')
@yield('camp-detail-sidebar-script-bottom')
</body>
</html>



