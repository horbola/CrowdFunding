<!-- layout.campaign-master -->
@extends('layout.face.skel')



@section('content')
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden border border-2" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div></div>
            </div>
        </div>
    </div>
</section>


<!-- Start Products -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="card border-0 sidebar sticky-bar">
                    <div class="card-body p-0 text-center text-md-start">
                        <!-- SEARCH -->
                        <div class="widget">
                            <form role="search" method="get">
                                <div class="input-group mb-3 border rounded">
                                    <input type="text" id="s" name="s" class="form-control border-0" placeholder="Search Keywords...">
                                    <button type="submit" class="input-group-text bg-white border-0" id="searchsubmit"><i class="uil uil-search"></i></button>
                                </div>
                            </form>
                        </div>
                        @include('partial.category-menu')
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                @yield('campaign-master-content')
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


