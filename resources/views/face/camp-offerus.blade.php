@extends('layout.face-offerus.skel')


@section('content')
<section style="margin-bottom:0px!important;" class="container-fluid campaign-main">
    <div class="container">
        <div class="row">
            <div class="col">
                @include('partial.camp.action-btns')
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        @include('partial.camp-offerus.heading')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.slider-feature')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.tabs')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.investig')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.sidebar-mobile')
                    </div>
                    <div class="col-12">
                        @include('partial.camp-offerus.comment')
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <div class="col-lg-4">
                @include('partial.camp-offerus.sidebar')
            </div>
        </div>
    </div>
</section>
@include('partial.camp-offerus.related')
@include('partial.camp-offerus.founder')
@endsection


@section('page-style')
<style>
    @media screen and (max-width: 600px){
        @media only screen and (min-width:600px){
            .nav-item.as{
                padding-left: 15px !important;padding-right: 15px !important;
            }
        }
    }
</style>
@endsection