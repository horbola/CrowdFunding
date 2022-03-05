@extends('layout.face-offerus.skel')


@section('content')
@include('partial.home-offerus.banner')
@include('partial.home-offerus.categories')
@include('partial.home-offerus.payment')
@include('partial.home-offerus.picked')
@include('partial.home-offerus.best')
@include('partial.home-offerus.founder')
@include('partial.home-offerus.stories')
@include('partial.home-offerus.process')
@include('partial.home-offerus.featured-in')
@include('partial.home-offerus.app')
@endsection



@section('page-style')
<style>
    li.nav-item.blue-btn,.cnt-tab.cnt-tab-1.d-flex {
        transition: 0.8s;
    }
    .hero-banner .hero-imageCnt .cnt-tab-2{
        transition: 0.8s;
    }
    /*-----------for sider---*/

    img.hero-image {
        width: 85%;
        position: relative;
        left: 60px;
        top: 27px;
    }
    .carousel-inner {

        height: 684px;
        border-radius: 50%;
        overflow: hidden;
    }

    .home .blue-btn {
        background: #ffffff;
        background-color: rgb(255, 255, 255);
        color: #42CCAE;
        border-radius: 44px;
        padding: 0px 7px;
        padding-left: 7px;
        height: 46px;
        line-height: 23px!important;
    }

    .blue-btn, .home.sc .blue-btn {
        background-color: #Ffffff!important;
        border: 1px solid #42CCAE;
        border-radius: 50px;
        color: #fff !important;
    }

    .blue-btn, .home.sc .blue-btn {
        background-color: #Ffffff !important;
        border-top: 1px solid #454968!important;
        border-bottom-color: rgb(66, 204, 174);
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-radius: 50px;
        color: #fff !important;
    }

    @media only screen and (max-width: 1400px) {
        .owl-item {
            width: 10%!important;
        }
        .owl-stage-outer .owl-item.active {
            margin-right: 112px!important;
        }
        .owl-stage-outer .owl-item {
            margin-right: 108px!important;}
    }
    @media only screen and (max-width: 600px) {
        .blow {
            margin-left: 16px!important;
        }
    }
</style>
@endsection()