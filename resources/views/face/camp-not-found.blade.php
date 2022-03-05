@extends('layout.face.skel')


@section('content')
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div></div>
            </div>
        </div>
    </div>
</section>


<!-- main content -->
<section class="position-relative">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="not-found text-center">Sorry no campaign is found</p>
            </div>
        </div>
    </div><!--end container-->
</section><!--end section-->

@endsection



@section('page-style')
<style>
    .not-found {
        height: 50vh;
        font-size: 25px;
        padding-top: 20px;
    }
</style>
@endsection()