@extends('layout.face.skel')


@section('content')

<!-- main content -->
<section class="position-relative" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col">
                @include('partial.camp.action-btns')
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
                        @include('partial.camp.slider-feature')
                    </div>
                    
                    <!-- mobile status -->
                    <div class="col-12 d-md-none px-5">
                        @include('partial.camp.sticky')
                    </div>
                    
                    <!--tabs starts-->
                    <div class="col-12 mt-5">
                        @include('partial.camp.tabs')
                    </div> <!-- info col ends -->
                    <!--tabs ends-->
                    
                </div> <!-- main content row ends -->
            </div>
            <div class="col-4 d-none d-md-block">
                <!-- sticky starts -->
                <div class="sticky-status">
                    @include('partial.camp.sticky')
                </div>
            </div>
        </div>
    </div><!--end container-->
    
    
    @if(!request()->indexInvestigation)
        <!-- related products starts -->
        @include('partial.camp-related')
    @endif
    
    {{--@include('partial.camp.bottom-nav')--}}
</section><!--end section-->

@include('partial.donation-model')
@include('partial.campaign-update-model')
@endsection