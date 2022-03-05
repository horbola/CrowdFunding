@extends('layouts.charity.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('content')
<!-- Section: home -->
<section class="divider" id="home">
    <div class="container-fluid p-0">
        <!-- START REVOLUTION SLIDER 5.0.7 -->
        <div class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery34" id="rev_slider_home_wrapper" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
            <div class="rev_slider fullwidthabanner" data-version="5.0.7" id="rev_slider_home" style="display:none;">
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-index="rs-1" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="{{asset('assets/images/slider/1.jpg')}}" data-title="Make an Impact" data-transition="slidingoverlayhorizontal">
                        <!-- MAIN IMAGE -->
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{asset('assets/images/slider/1.jpg')}}">
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" data-basealign="slide" data-height="full" data-hoffset="['0','0','0','0']" data-responsive_offset="on" data-start="1000" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-voffset="['0','0','0','0']" data-whitespace="normal" data-width="full" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" id="slide-1-layer-1" style="z-index: 5;background-color:rgba(0, 0, 0, 0.15);border-color:rgba(0, 0, 0, 1.00);">
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" data-fontsize="['28','24','24','24']" data-fontweight="['600','600','600','600']" data-height="none" data-hoffset="['50','50','50','30']" data-lineheight="['33','30','30','30']" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['120','100','70','90']" data-whitespace="nowrap" data-width="none" data-x="['left','left','left','left']" data-y="['top','top','top','top']" id="slide-1-layer-2" style="z-index: 7; white-space: nowrap;">
                                We can't help everyone,
                            </div>
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" data-fontsize="['75','70','65','40']" data-fontweight="['800','700','700','700']" data-height="none" data-hoffset="['50','50','50','30']" data-lineheight="['80','75','70','45']" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['165','135','105','130']" data-whitespace="normal" data-width="['700','650','600','420']" data-x="['left','left','left','left']" data-y="['top','top','top','top']" id="slide-1-layer-3" style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">
                               But Everyone can help someone.
                            </div>
                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption rs-parallaxlevel-0" data-height="none" data-hoffset="['53','53','53','30']" data-mask_in="x:0px;y:0px;" data-mask_out="x:0;y:0;" data-responsive="off" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['431','371','331','295']" data-whitespace="nowrap" data-width="none" data-x="['left','left','left','left']" data-y="['top','top','top','top']" id="slide-1-layer-4" style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                                <a class="btn btn-dark btn-theme-colored btn-xl" href="https://oporajoy.org/login">
                                    Help Save Acres
                                </a>
                                <a class="btn btn-dark btn-theme-colored btn-xl" href="https://oporajoy.org/register">
                                    Join Us
                                </a>
                            </div>
                        </img>
                    </li>
                    <!-- SLIDE 2 -->
                    <li data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-index="rs-2" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="{{asset('assets/images/slider/2.jpg')}}" data-title="Make an Impact" data-transition="slidingoverlayhorizontal">
                        <!-- MAIN IMAGE -->
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{asset('assets/images/slider/2.jpg')}}">
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" data-basealign="slide" data-height="full" data-hoffset="['0','0','0','0']" data-responsive_offset="on" data-start="1000" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-voffset="['0','0','0','0']" data-whitespace="normal" data-width="full" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" id="slide-2-layer-1" style="z-index: 5;background-color:rgba(0, 0, 0, 0.35);border-color:rgba(0, 0, 0, 1.00);">
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" data-fontsize="['28','24','24','24']" data-fontweight="['600','600','600','600']" data-height="none" data-hoffset="['0','0','0','0']" data-lineheight="['33','30','30','30']" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['120','100','70','90']" data-whitespace="nowrap" data-width="none" data-x="['center','center','center','center']" data-y="['top','top','top','top']" id="slide-2-layer-2" style="z-index: 7; white-space: nowrap;">
                                It's not how much we give,
                            </div>
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme text-white text-center rs-parallaxlevel-0" data-fontsize="['75','70','65','40']" data-fontweight="['800','700','700','700']" data-height="none" data-hoffset="['0','0','0','0']" data-lineheight="['80','75','70','45']" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['165','135','105','130']" data-whitespace="normal" data-width="['700','650','600','420']" data-x="['center','center','center','center']" data-y="['top','top','top','top']" id="slide-2-layer-3" style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">
                                But how much love we put into giving.
                            </div>
                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption rs-parallaxlevel-0" data-height="none" data-hoffset="['0','0','0','0']" data-mask_in="x:0px;y:0px;" data-mask_out="x:0;y:0;" data-responsive="off" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['431','371','331','245']" data-whitespace="nowrap" data-width="none" data-x="['center','center','center','center']" data-y="['top','top','top','top']" id="slide-2-layer-4" style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                                <a class="btn btn-dark btn-theme-colored btn-xl" href="#">
                                    Help Save Acres
                                </a>
                            </div>
                        </img>
                    </li>
                    <!-- SLIDE 3 -->
                    <li data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-index="rs-3" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="{{asset('assets/images/slider/3.jpg')}}" data-title="Make an Impact" data-transition="slidingoverlayhorizontal">
                        <!-- MAIN IMAGE -->
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{asset('assets/images/slider/3.jpg')}}">
                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" data-basealign="slide" data-height="full" data-hoffset="['0','0','0','0']" data-responsive_offset="on" data-start="1000" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-voffset="['0','0','0','0']" data-whitespace="normal" data-width="full" data-x="['center','center','center','center']" data-y="['middle','middle','middle','middle']" id="slide-3-layer-1" style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 1.00);">
                            </div>
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" data-fontsize="['70','65','60','40']" data-fontweight="['800','700','700','700']" data-height="none" data-hoffset="['310','33','0','0']" data-lineheight="['75','70','65','45']" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:0;y:0;s:inherit;e:inherit;" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['165','135','105','130']" data-whitespace="normal" data-width="['600','550','500','420']" data-x="['center','center','center','center']" data-y="['top','top','top','top']" id="slide-3-layer-3" style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">
                                No one is useless in this world.
                            </div>
                            <!-- LAYER NR. 3 -->
                            <div class="tp-caption rs-parallaxlevel-0" data-height="none" data-hoffset="['110','33','0','0']" data-mask_in="x:0px;y:0px;" data-mask_out="x:0;y:0;" data-responsive="off" data-responsive_offset="on" data-splitin="none" data-splitout="none" data-start="1000" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" data-voffset="['431','371','331','245']" data-whitespace="nowrap" data-width="none" data-x="['center','center','center','center']" data-y="['top','top','top','top']" id="slide-3-layer-4" style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;">
                                <a class="btn btn-dark btn-theme-colored btn-xl" href="#">
                                    Help Save Acres
                                </a>
                            </div>
                        </img>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(166, 216, 236, 1.00);">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Staff Picks: Causes -->
<section>
    <div class="container pt-50 pb-sm-50 pb-xs-50">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="mt-0 line-height-1 text-uppercase">
                        Verified
                        <span class="text-theme-colored">
                            Campaign
                        </span>
                    </h2>
                    <p>
                        View the fundraisers that are most active right now
                    </p>
                </div>
            </div>
        </div>
        <div class="section-content">
            @if($staff_picks->count() > 0)
            @php $count = 0; @endphp
            @foreach($staff_picks as $spc)
            @if($count == 0)
            <div class="row mtli-row-clearfix">
                @endif
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="causes maxwidth500 mb-sm-50">
                        <div class="thumb">
                            <img alt="" class="img-fullwidth trending-img" src="{{ $spc->feature_img_url()}}">
                            </img>
                        </div>
                        <ul class="list-inline clearfix p-5 p-sm-10 pt-15 pb-5 ml-0">
                            @php
                    $percent_raised = $spc->percent_raised();
                @endphp
                            <li class="pull-left flip pr-10 pr-sm-10 pt-10 pl-0">
                                Raised:
                                <span class="font-weight-300">
                                    {{get_amount($spc->success_payments->sum('amount'))}}
                                </span>
                            </li>
                            <li class="pull-left flip pr-0 pl-0">
                                
                            </li>
                            <li class="text-theme-colored pull-right flip pr-0 pt-10">
                                Goal:
                                <span class="font-weight-300">
                                    {{get_amount($spc->goal)}}
                                </span>
                            </li>
                        </ul>
                        <div class="donate-piechart piechart-absolute">
                                    <div class="piechart-block">
                                        <div class="piechart" data-barcolor="#0cbd97" data-linewidth="8" data-percent="{{$percent_raised}}" data-trackcolor="#fff">
                                            <span class="percent text-white font-weight-300">
                                                {{$percent_raised}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        <div class="causes-details clearfix">
                            <div class="p-30 pt-15 p-sm-15">
                                <h4 class="mt-0 text-center">
                                    <a href="{{route('campaign_single', [$spc->id, $spc->slug])}}">
                                        {!! str_limit(strip_tags($spc->title), 25) !!}
                                    </a>
                                </h4>
                                <p class="text-center">
                                    {!! str_limit(strip_tags($spc->short_description), 56) !!}
                                </p>
                                <div class="mt-10 clearfix">
                                    <a class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10" href="{{route('campaign_single', [$spc->id, $spc->slug])}}">
                                        Donate Now
                                    </a>
                                    <div class="pull-right mt-10">
                                        <i class="fa fa-heart text-theme-colored">
                                        </i>
                                        {{$spc->success_payments->count()}} Donors
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php $count++; @endphp 
            @if($count == 3)
            </div>
            @php $count = 0; @endphp
            @endif
            
            @endforeach
          @endif
        </div>
    </div>
</section>
<br>
<style type="text/css">
    img.trending-img {
            display:  block;
            height: 240px;
        }
#causesListing #topCauses .cause {
            position: relative;
            height: 300px;
            overflow: hidden;
            padding: 0;
        }

#causesListing #topCauses .cause img {
            position: absolute;
            z-index: 98;
            width: 100%;
            height: auto;
            left: 0;
            top: 0;
            -moz-transition-duration: 250ms;
            -o-transition-duration: 250ms;
            -webkit-transition-duration: 250ms;
            transition-duration: 250ms;
        }
#causesListing #topCauses .cause:hover img{
              -moz-transform: scale(1.1);
              -webkit-transform: scale(1.1);
              transform: scale(1.1);
        }

#causesListing #topCauses .cause a {
            color: #FFF;
            display: block;
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 100;
            left: 0;
            top: 0;
            background-color: rgba(0,0,0,0.5);
        }

#causesListing #topCauses .cause h2 {
            position: absolute;
            top: 36%;
            left: 5%;
            text-align: center;
            width: 90%;
            margin-top: 0;
            font-size: 24px;
            color: #FFF;
        }
.how-it-work-title{
          font-family: "Monsterrat-light", sans-serif;
          font-size: 2em;
          padding-top: 5px;
          text-align: center;
        }
.how-it-work-title-p{
            padding-bottom: 50px;
        }
.how-work{background: #f5f5f5;
        padding: 50px;
        }
</style>
<!-- How it Work -->
<section class="how-work">
      <div class="container pt-30 pb-sm-50 pb-xs-50">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <h2 class="mt-0 line-height-1 text-center text-uppercase">How it <span class="text-theme-colored">Work</span></h2>
              <p class="how-it-work-title-p text-center">How way you can get Fundting to this Website</p>
              <div class="col-md-4">
                <div class="icon-box left media sm-text-center mb-sm-10"> <a href="/register" class="icon icon-circled icon-lg border-1px border-theme-colored2 sm-pull-none pull-left flip"><i class="fa fa-pencil-square-o"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading">Create </h4>
                    <p>Create a campaign to raise funds for your cause.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="icon-box left media sm-text-center mb-sm-10"> <a href="https://www.facebook.com/oporajoy.org/" class="icon icon-circled icon-lg border-1px border-theme-colored2 sm-pull-none pull-left flip"><i class="fa fa-share"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading">Share</h4>
                    <p>Share it on all social media platforms, we mean, ALL!</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="icon-box left media sm-text-center mb-sm-10"> <a href="/login" class="icon icon-circled icon-lg border-1px border-theme-colored2 sm-pull-none pull-left flip"><i class="fa fa-usd"></i></a>
                  <div class="media-body">
                    <h4 class="media-heading heading">Fund</h4>
                    <p>Receive donations to your cause direct to your account.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>

<!-- Cause Category -->
<div class="container pt-50 pb-sm-50 pb-xs-50">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="mt-0 line-height-1 text-uppercase">
                        All Featured Campaign
                        <span class="text-theme-colored">
                            Right Now
                        </span>
                    </h2>
                    <p>
                        Raise more money and change more lives with Oporajoy.
                    </p>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid" id="causesListing">
    <div class="clearfix" id="topCauses">
        @foreach($categories as $cat)
        <div class="col-md-4 col-xs-12 cause">
            <img src="{{ $cat->get_image_url() }}">
                <a href="{{route('single_category', [$cat->id, $cat->category_slug])}}">
                    <h2>
                        <span class="icons-catgeory">
                        </span>
                        {{ $cat->category_name }}
                        <!-- <p>209 Campaigns</p> -->
                    </h2>
                </a>
            </img>
        </div>
        @endforeach
        <div class="col-md-4 col-xs-12 cause view-all">
            <img src="https://d1vdjc70h9nzd9.cloudfront.net/images/view-all.jpg">
                <a href="{{route('browse_categories')}}">
                    <h2>
                        <span>
                            View all fundraisers
                        </span>
                        <!-- <p>170 Campaigns </p> -->
                    </h2>
                </a>
            </img>
        </div>
    </div>
</div>
<!-- Recent Cause -->
 <!-- Section: -->
<section>
      <div class="container pt-50 pb-sm-50 pb-xs-50">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
              <h2 class="mt-0 line-height-1 text-center text-uppercase">Recent <span class="text-theme-colored">Cause</span></h2>
              <p>Recenlty created cause</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="store border-1px text-center">
                <div class="owl-carousel-3col">
                @if($new_campaigns->count() > 0)
                @foreach($new_campaigns as $nc)
                  <div class="item">
                    <div class="causes maxwidth500 mb-sm-50">
                        <div class="thumb">
                            <img alt="" class="img-fullwidth trending-img" src="{{ $nc->feature_img_url()}}">
                            </img>
                        </div>
                        <ul class="list-inline clearfix p-5 p-sm-10 pt-15 pb-5 ml-0">
                            @php
                    $percent_raised = $nc->percent_raised();
                @endphp
                            <li class="pull-left flip pr-10 pr-sm-10 pt-10 pl-0">
                                Raised:
                                <span class="font-weight-300">
                                    {{get_amount($nc->success_payments->sum('amount'))}}
                                </span>
                            </li>
                            <li class="pull-left flip pr-0 pl-0">
                               
                            </li>
                            <li class="text-theme-colored pull-right flip pr-0 pt-10">
                                Goal:
                                <span class="font-weight-300">
                                    {{get_amount($nc->goal)}}
                                </span>
                            </li>
                        </ul>
                         <div class="donate-piechart piechart-absolute">
                                    <div class="piechart-block">
                                        <div class="piechart" data-barcolor="#0cbd97" data-linewidth="8" data-percent="{{$percent_raised}}" data-trackcolor="#fff">
                                            <span class="percent text-white font-weight-300">
                                                {{$percent_raised}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        <div class="causes-details clearfix">
                            <div class="p-30 pt-15 p-sm-15">
                                <h4 class="mt-0 text-center">
                                    <a href="{{route('campaign_single', [$nc->id, $nc->slug])}}">
                                        {!! str_limit(strip_tags($nc->title), 25) !!}
                                    </a>
                                </h4>
                                <p class="text-center">
                                    {!! str_limit(strip_tags($nc->short_description), 56) !!}
                                </p>
                                <div class="mt-10 clearfix">
                                    <a class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10" href="{{route('campaign_single', [$nc->id, $nc->slug])}}">
                                        Donate Now
                                    </a>
                                    <div class="pull-right mt-10">
                                        <i class="fa fa-heart text-theme-colored">
                                        </i>
                                        {{$nc->success_payments->count()}} Donors
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                  </div>
                @endforeach
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>
@endsection