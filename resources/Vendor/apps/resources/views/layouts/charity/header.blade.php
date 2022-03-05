<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="author" content="Oporajoy.org">
        <meta name="description" content="@yield('description') || Oporajoy is an Online Crowdfunding Website in Bangladesh for fundraising of Social, Environment, Children, Accidents, Education, Women Empowerment, Personal and Creative causes. Visit us online!">
        <meta name="keywords" content="@yield('keywords'),crowdfunding Bangladesh, crowdfunding, crowdfunding website, oporajoy, fundraising bangladesh, fundraising bd, crowdfunding bd, oporajoy bd">
        <meta name="google-site-verification" content="7yXbN_kBdggZlfg5iVLGHBMEUcpzR2IdnnhqWjxsLMY" />
        <!-- CSRF Token -->
        <meta content="{{ csrf_token() }}" name="csrf-token">
        <title>@yield('title') {{ get_option('site_title') }} @show </title>
        <!-- Favicon and Touch Icons -->
        <link href="{{ asset('favicon.ico')}}" rel="shortcut icon" type="image/png">
        <!-- Stylesheet -->
        <link href="{{ asset('charity/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('charity/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
       <link href="{{ asset('charity/css/animate.css')}}" rel="stylesheet" type="text/css">
        <!-- main style.css -->
        {{-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('charity/css/css-plugin-collections.css')}}" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        {{-- <link href="{{ asset('charity/css/menuzord-skins/menuzord-rounded-boxed.css" id="menuzord-menu-skins')}}" rel="stylesheet"/> --}}
        <!-- CSS | Main style file -->
        <link href="{{ asset('charity/css/style-main.css')}}" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="{{ asset('charity/css/preloader.css')}}" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="{{ asset('charity/css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="{{ asset('charity/css/responsive.css')}}" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
        <!-- Revolution Slider 5.x CSS settings -->
        <link href="{{ asset('charity/js/revolution-slider/css/settings.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('charity/js/revolution-slider/css/layers.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('charity/js/revolution-slider/css/navigation.css')}}" rel="stylesheet" type="text/css"/>
        <!-- CSS | Theme Color -->
        <link href="{{ asset('charity/css/colors/theme-skin-rolen.css')}}" rel="stylesheet" type="text/css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
         @yield('page-css')
    </head>
    <body class="">
        <div class="clearfix" id="wrapper">
            <header class="header" id="header">
                <div class="header-top bg-theme-colored sm-text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="widget no-border m-0">
                                    <ul class="social-icons icon-dark icon-theme-colored icon-sm sm-text-center">
                                        <li>
                                            <a href="https://www.facebook.com/oporajoy.org/">
                                                <i class="fa fa-facebook">
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/oporajoy_org">
                                                <i class="fa fa-twitter">
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://plus.google.com/u/3/117341634093431184197">
                                                <i class="fa fa-google-plus">
                                                </i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/13666472">
                                                <i class="fa fa-linkedin">
                                                </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget no-border m-0">
                                    <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                                        <li class="m-0 pl-10 pr-10">
                                            <i class="fa fa-mobile text-white">
                                            </i>
                                            <a class="text-white" href="#">
                                                01640951604
                                            </a>
                                        </li>
                                        <li class="text-white m-0 pl-10 pr-10">
                                            <i class="fa fa-clock-o text-white">
                                            </i>
                                            Sun-Thu 10:00AM to 05:00PM
                                        </li>
                                        <li class="m-0 pl-10 pr-10 text-white">
                                            <i class="fa fa-envelope-o text-white">
                                            </i>
                                            support@oporajoy.org
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget no-border m-0">
                                    <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                                        @if (Auth::guest())
                                        <li class="mt-sm-10 mb-sm-10">
                                            <a class="btn btn-default btn-xs bg-light p-5 font-11 pl-10 pr-10" href="{{ route('login') }}">
                                                @lang('app.login')
                                            </a>
                                        </li>
                                        <li class="mt-sm-10 mb-sm-10">
                                            <a class="btn btn-default btn-xs bg-light p-5 font-11 pl-10 pr-10" href="{{ route('register') }}">
                                                @lang('app.register')
                                            </a>
                                        </li>
                                        @else
                                        <li class="mt-sm-10 mb-sm-10">
                                            <a class="btn btn-default btn-xs bg-light p-5 font-11 pl-10 pr-10" href="{{route('dashboard')}}">
                                                <i class="fa fa-dashboard">
                                                </i>
                                                @lang('app.dashboard')
                                            </a>
                                        </li>
                                        <li class="mt-sm-10 mb-sm-10">
                                            <a class="btn btn-default btn-xs bg-light p-5 font-11 pl-10 pr-10" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out">
                                                </i>
                                                @lang('app.logout')
                                            </a>
                                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                            
                                        </li>@endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-nav">
                    <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                        <div class="container">
                            <nav class="menuzord default" id="menuzord-right">
                                <a class="menuzord-brand pull-left flip xs-pull-center" href="{{ route('home') }}">
                                    @if(get_option('logo_settings') == 'show_site_name')
                                    {{ get_option('site_name') }}
                                @else
                                    @if(logo_url())
                                    <img class="main-logo" src="{{ logo_url() }}"/>
                                    @else
                                        {{ get_option('site_name') }}
                                    @endif
                                @endif
                                </a>
                                <ul class="menuzord-menu">
                                    <li class="{{ Request::is('/') ? "active": ""}}">
                                        <a href="{{route('home')}}">
                                            @lang('app.home')
                                        </a>
                                    </li>
                                    @if($header_menu_pages->count() > 0)
                  @foreach($header_menu_pages as $page)
                                    <li class="{{ Request::is($page->slug) ? "active": ""}}">
                                        <a href="{{ route('single_page', $page->slug) }}">
                                            {{ $page->title }}
                                        </a>
                                    </li>
                                    @endforeach
                @endif
                                <li>
                                 <form action="{{route('search')}}" class="navbar-form navbar-right search-form" method="get" style="margin-top: 18px">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg font-16" name="q" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-theme-colored m-0 font-15"><i class="fa fa-search"></i> </button>
                                </form></li>
                            </ul>
                        
                        </nav>
                        </div>
                    </div>
                </div>
            </header>
        </div>
<style type="text/css">
    .btn:hover{
        background-color: #0e9275 !important;
    }
</style>