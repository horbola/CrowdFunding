<!-- layout.dashboard -->
@extends('layout.face.skel')

@section('content')
<!-- hero -->
<section class="bg-profile d-table w-100 bg-primary" style="background: url('images/account/bg.png') center center;">
    <!-- profile banner -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @include('partial.profile-banner');
            </div><!-- col-12 -->
        </div><!-- row -->
    </div><!-- container -->
    <!-- profile banner -->
</section><!-- bg-profile -->
<!-- hero -->


<!-- dashboard menu and content -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12 d-lg-block d-none">
                <div class="sidebar sticky-bar p-2 rounded shadow">
                    @include('partial.menu-dashboard')
                </div><!-- sidebar -->
            </div><!-- col-lg-3 -->
            
            <div class="col-lg-9 col-12">
                @include('partial.flash-msg')
                @yield('dashboard-content')
            </div><!-- col-lg-9 -->
        </div><!-- row -->
    </div><!-- container (dashboard menu and content) -->
</section><!-- section -->
<!-- dashboard menu and content -->
@endsection
