<!-- layout.dashboard-fluid -->
@extends('layout.face.skel')

@section('content')
<!-- hero -->
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden border border-2" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <!-- profile banner -->
    <div class="container">
        <div class="row">
            <div class="col">
                
            </div><!-- col-12 -->
        </div><!-- row -->
    </div><!-- container -->
    <!-- profile banner -->
</section><!-- bg-profile -->
<!-- hero -->



<!-- dashboard menu and content (fluid area) -->
<section class="section">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title position-relative">
                    <div class="title-text">{{ $title?? '' }}</div>
                </div>
                <style>
                    .title-text {
                        position: absolute;
                        top: -50px;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        font-weight: 600;
                        font-size: 30px;
                    }
                </style>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="sidebar sticky-bar p-2 rounded shadow">
                    @include('partial.menu-dashboard')
                </div><!-- sidebar -->
            </div><!-- col -->

            <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                @include('partial.flash-msg')
                @yield('dashboard-content-fluid')
            </div><!-- col-lg-9 -->
        </div><!-- row -->
    </div><!-- container (dashboard menu and content (fluid area)) -->
</section><!-- section -->
<!-- dashboard menu and content (fluid area) -->
@endsection
