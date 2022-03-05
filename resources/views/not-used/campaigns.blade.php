@extends('layouts.app.skel')

@section('content')
<!-- Hero Start -->
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden border border-2" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <!--this was for profile banner-->
                <div></div>
            </div>
        </div>
    </div>
</section>
<!--Hero ends-->

<!-- users page starts -->
<section class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="card border-0 sidebar sticky-bar">
                    <div class="card-body p-0 text-center text-md-start">
                        @include('partial.component.dashboard-menu')
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                 @yield('dashboard-content')
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- users page ends -->
@endsection
