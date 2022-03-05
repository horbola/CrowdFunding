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
                @include('partial.campaign-detail-action-btns')
            </div>
        </div>
        <!--
        if this overflow-visible inn't used then sticky element works only for first tab.
        may be bootstrap change the property of parent on click on any tab.
        -->
        <div class="row overflow-visible">
            <div class="col-12 col-md-8 border border-0">
                <div class="row">
                    <div class="col-12">
                        @include('partial.campaign-detail-image')
                    </div>
                    
                    <!-- mobile status -->
                    <div class="col-12 d-md-none px-5">
                        @include('partial.campaign-detail-sticky')
                    </div>
                    
                    <!--tabs starts-->
                    <div class="col-12 mt-5">
                        @include('partial.campaign-detail-tabs')
                    </div> <!-- info col ends -->
                    <!--tabs ends-->
                    
                </div> <!-- main content row ends -->
            </div>
            <div class="col-4 d-none d-md-block">
                <!-- sticky starts -->
                <div class="sticky-status">
                    @include('partial.campaign-detail-sticky')
                </div>
            </div>
        </div>
    </div><!--end container-->
    
    
    @if(!request()->indexInvestigation)
        <!-- related products starts -->
        @include('partial.campaigns-related')
    @endif
    
    @include('partial.campaign-detail-bottom-nav')
</section><!--end section-->

@include('partial.donation-model')
@include('partial.campaign-update-model')
@endsection