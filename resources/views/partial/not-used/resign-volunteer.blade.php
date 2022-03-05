@extends('layouts.app.skel')

@section('content')
<!-- Hero Start -->
<section class="bg-profile d-table w-100 bg-primary" style="background: url('images/account/bg.png') center center;">
    <!-- profile banner widget -->
    <div class="container">
        <div class="row">
            <div class="col">
                @include('partial.component.profile-banner');
            </div><!--end col-->
        </div><!--end row-->
    </div><!--ed container (profile banner widget)-->    
</section><!--end section-->
<!-- Hero End -->






<!-- dashboard area Start -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12 d-lg-block d-none">
                <div class="sidebar sticky-bar p-2 rounded shadow">
                    <!-- contains  ajax menus and load partial content's and attaches to '#ajax-content' div -->
                    @include('partial.component.dashboard-menu')
                </div>
            </div><!--end col-->

            <div class="col-lg-9 col-12">
                @include('partial.component.flash-msg')
                @include('partial.dashboard.resign-volunteer-content')
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- dashboard area End -->
@endsection


