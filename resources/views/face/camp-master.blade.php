@extends('layout.face.skel')


@section('content')
<section class="pb-0 bg-light d-table w-100 overflow-hidden border border-2" style="background: url('/images/shapes/shape2.png') top; z-index: 0; margin-top: 90px;">
    <div class="container">
        <div class="row">
            
        </div>
    </div>
</section>


<!-- Start Products -->
<section class="mt-2 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="card border-0 sidebar sticky-bar">
                    <div class="card-body p-0 text-center text-md-start">
                        @include('partial.menu-category')
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                @include('partial.campaign-tiles')
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Products -->


<!-- Product View Start -->
@include('partial.campaign-view')
<!-- Product View End -->

<!-- Wishlist Popup Start -->
<!--------------------------->
<!-- Wishlist Popup End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->
@endsection


