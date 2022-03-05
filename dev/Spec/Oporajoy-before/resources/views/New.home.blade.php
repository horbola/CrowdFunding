@extends('layouts.charity.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('content')
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider">
      <div class="container-fluid p-0">

        <!-- START REVOLUTION SLIDER 5.0.7 -->
        <div id="rev_slider_home_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery34" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
          <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
          <div id="rev_slider_home" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
            <ul>
              <!-- SLIDE 1 -->
              <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="http://placehold.it/1920x1280" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Make an Impact">
                <!-- MAIN IMAGE -->
                <img src="http://placehold.it/1920x1280" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
                  id="slide-1-layer-1" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                  data-width="full"
                  data-height="full"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-start="1000" 
                  data-basealign="slide" 
                  data-responsive_offset="on" 
                  style="z-index: 5;background-color:rgba(0, 0, 0, 0.15);border-color:rgba(0, 0, 0, 1.00);"> 
                </div>
                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" 
                  id="slide-1-layer-2" 
                  data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']" 
                  data-y="['top','top','top','top']" data-voffset="['120','100','70','90']" 
                  data-fontsize="['28','24','24','24']"
                  data-lineheight="['33','30','30','30']"
                  data-fontweight="['600','600','600','600']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                  data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 7; white-space: nowrap;">Conservation Means 
                </div>
                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" 
                  id="slide-1-layer-3" 
                  data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']" 
                  data-y="['top','top','top','top']" data-voffset="['165','135','105','130']" 
                  data-fontsize="['75','70','65','40']"
                  data-lineheight="['80','75','70','45']"
                  data-fontweight="['800','700','700','700']"
                  data-width="['700','650','600','420']"
                  data-height="none"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                  data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">Do Something For Our Fututre Generation 
                </div>
                <!-- LAYER NR. 4 -->
                <div class="tp-caption rs-parallaxlevel-0" 
                  id="slide-1-layer-4" 
                  data-x="['left','left','left','left']" data-hoffset="['53','53','53','30']" 
                  data-y="['top','top','top','top']" data-voffset="['431','371','331','295']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;" 
                  data-mask_out="x:0;y:0;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  data-responsive="off"
                  style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><a href="#" class="btn btn-dark btn-theme-colored btn-xl">Help Save Acres</a> <a href="#" class="btn btn-dark btn-theme-colored btn-xl">Join Us</a>
                </div>
              </li>

              <!-- SLIDE 2 -->
              <li data-index="rs-2" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="http://placehold.it/1920x1280" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Make an Impact">
                <!-- MAIN IMAGE -->
                <img src="http://placehold.it/1920x1280" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
                  id="slide-2-layer-1" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                  data-width="full"
                  data-height="full"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-start="1000" 
                  data-basealign="slide" 
                  data-responsive_offset="on" 
                  style="z-index: 5;background-color:rgba(0, 0, 0, 0.35);border-color:rgba(0, 0, 0, 1.00);"> 
                </div>
                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" 
                  id="slide-2-layer-2" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['top','top','top','top']" data-voffset="['120','100','70','90']" 
                  data-fontsize="['28','24','24','24']"
                  data-lineheight="['33','30','30','30']"
                  data-fontweight="['600','600','600','600']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                  data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 7; white-space: nowrap;">Conservation Means 
                </div>
                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-white text-center rs-parallaxlevel-0" 
                  id="slide-2-layer-3" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['top','top','top','top']" data-voffset="['165','135','105','130']" 
                  data-fontsize="['75','70','65','40']"
                  data-lineheight="['80','75','70','45']"
                  data-fontweight="['800','700','700','700']"
                  data-width="['700','650','600','420']"
                  data-height="none"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                  data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">Always Helpful Hand For Poor Student
                </div>
                <!-- LAYER NR. 4 -->
                <div class="tp-caption rs-parallaxlevel-0" 
                  id="slide-2-layer-4" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['top','top','top','top']" data-voffset="['431','371','331','245']" 
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;" 
                  data-mask_out="x:0;y:0;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  data-responsive="off"
                  style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><a href="#" class="btn btn-dark btn-theme-colored btn-xl">Help Save Acres</a>
                </div>
              </li>

              <!-- SLIDE 3 -->
              <li data-index="rs-3" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="http://placehold.it/1920x1280" data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Make an Impact">
                <!-- MAIN IMAGE -->
                <img src="http://placehold.it/1920x1280" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
                  id="slide-3-layer-1" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                  data-width="full"
                  data-height="full"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-start="1000" 
                  data-basealign="slide" 
                  data-responsive_offset="on" 
                  style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 1.00);"> 
                </div>
                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" 
                  id="slide-3-layer-2" 
                  data-x="['center','center','center','center']" data-hoffset="['153','33','0','0']" 
                  data-y="['top','top','top','top']" data-voffset="['120','100','70','90']" 
                  data-fontsize="['28','24','24','24']"
                  data-lineheight="['33','30','30','30']"
                  data-fontweight="['600','600','600','600']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                  data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 7; white-space: nowrap;">Conservation Means 
                </div>
                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme text-white rs-parallaxlevel-0" 
                  id="slide-3-layer-3" 
                  data-x="['center','center','center','center']" data-hoffset="['310','33','0','0']" 
                  data-y="['top','top','top','top']" data-voffset="['165','135','105','130']" 
                  data-fontsize="['70','65','60','40']"
                  data-lineheight="['75','70','65','45']"
                  data-fontweight="['800','700','700','700']"
                  data-width="['600','550','500','420']"
                  data-height="none"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                  data-mask_out="x:0;y:0;s:inherit;e:inherit;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;">Support Us & Donate For Strave Child 
                </div>
                <!-- LAYER NR. 4 -->
                <div class="tp-caption rs-parallaxlevel-0" 
                  id="slide-3-layer-4" 
                  data-x="['center','center','center','center']" data-hoffset="['110','33','0','0']" 
                  data-y="['top','top','top','top']" data-voffset="['431','371','331','245']" 
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;"
                  data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                  data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
                  data-mask_in="x:0px;y:0px;" 
                  data-mask_out="x:0;y:0;" 
                  data-start="1000" 
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  data-responsive="off"
                  style="z-index: 8; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><a href="#" class="btn btn-dark btn-theme-colored btn-xl">Help Save Acres</a>
                </div>
              </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(166, 216, 236, 1.00);"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: welcome -->
   {{--  <section>
      <div class="container pt-0 pb-0">
        <div class="section-content">
          <div class="row equal-height-inner mt-sm-0" data-margin-top="-150px">
            <div class="col-sm-4 col-md-4 pl-0 pr-0 pr-xs-15 pl-xs-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay1">
              <div class="sm-height-auto" data-bg-img="http://placehold.it/390x345">
                <div class="p-30 p-sm-5 pt-sm-10 pb-sm-10 text-center">
                  <h3 class="text-white text-uppercase mt-0">Indoor School</h3>
                  <div class="clearfix">
                  <h4 class="text-theme-colored text-uppercase mt-sm-0 mb-sm-0">Student 150 </h4>
                  </div>
                  <p class="text-white-f1 mt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas odit unde dolor inventore autem quod vero incidunt labore sunt reprehenderit.</p>
                  <a href="page-donate.html" class="btn btn-sm btn-theme-colored mt-10 ">Donate now</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 pl-0 pr-0 pl-xs-15 pr-xs-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay2">
              <div class="sm-height-auto" data-bg-img="http://placehold.it/390x345">
                <div class="p-30 p-sm-5 pt-sm-10 pb-sm-10 text-center">
                  <h3 class="text-white text-uppercase mt-0">Outdoor School</h3>
                  <div class="clearfix">
                  <h4 class="text-theme-colored text-uppercase mt-sm-0 mb-sm-0">Student 150 </h4>
                  </div>
                  <p class="text-white-f1 mt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas odit unde dolor inventore autem quod vero incidunt labore sunt reprehenderit.</p>
                  <a href="page-donate.html" class="btn btn-sm btn-theme-colored mt-10 ">Donate now</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 pr-0 pl-0 pl-xs-15 pr-xs-15 sm-height-auto mt-sm-0 wow fadeInLeft animation-delay2">
              <div class="sm-height-auto" data-bg-img="http://placehold.it/390x345">
                <div class="p-30 p-sm-5 pt-sm-10 pb-sm-10 text-center">
                  <h3 class="text-white text-uppercase mt-0">Floating School</h3>
                  <div class="clearfix">
                  <h4 class="text-theme-colored text-uppercase mt-sm-0 mb-sm-0">Student 150 </h4>
                  </div>
                  <p class="text-white-f1 mt-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas odit unde dolor inventore autem quod vero incidunt labore sunt reprehenderit.</p>
                  <a href="page-donate.html" class="btn btn-sm btn-theme-colored mt-10 ">Donate now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: Our Mission -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-sm-6 col-md-8">
              <h2 class="mt-0 line-height-1 line-bottom"><span>Welcome to </span> <span class="text-theme-colored">Charityfaith</span></h2>
              <div class="row">
                  <div class="col-sm-6 col-md-6">
                  <div class="thumb">
                    <img src="http://placehold.it/360x270" class="mt-5" alt="">
                  </div>
                  <div class="mb-20">
                    <h4 class="mt-20 font-droid font-weight-700"><a href="#">Our History</a></h4>
                    <p>Lorem ipsum dolor sit amet,  adipisicing elit. Veniam quas, quidem totam, fuga iste et tempora molestiae ipsa. Similique...</p>
                    <a class="btn btn-colored btn-sm btn-theme-colored mt-10" href="page-about1.html">Read more</a>
                  </div>
                  </div>
                  <div class=" col-sm-6 col-md-6">
                  <div class="thumb">
                    <img src="http://placehold.it/360x270" class="mt-5" alt="">
                  </div>
                  <div class="mb-20">
                    <h4 class="mt-20 font-droid font-weight-700"><a href="#">Support Children</a></h4>
                    <p>Lorem ipsum dolor sit amet,  adipisicing elit. Veniam quas, quidem totam, fuga iste et tempora molestiae ipsa. Similique...</p>
                    <a class="btn btn-colored btn-sm btn-theme-colored mt-10" href="page-about1.html">Read more</a>
                  </div>
                  </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <h2 class="mt-0 line-height-1 line-bottom"><span>Get</span> Event</h2>
              <div class="bxslider bx-nav-top" data-count="4" >
                <div class="event media mt-0 no-bg no-border">
                  <div class="event-date media-left text-center flip bg-theme-colored p-15">
                    <ul>
                      <li class="font-26 text-white font-weight-600">28</li>
                      <li class="font-20 text-uppercase text-white">Feb</li>
                    </ul>
                  </div>
                  <div class="media-body event-hvr">
                    <div class="event-content pull-left flip pl-20 pl-xs-10">
                      <h4 class="event-title media-heading font-raleway font-weight-700 mb-0 pt-5"><a href="#">Gear up for giving</a></h4>
                      <span class="mb-5 font-12 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored"></i> at 5.00 pm - 7.30 pm</span>
                      <span class="font-12"><i class="fa fa-map-marker mr-5 text-theme-colored"></i> 25 Newyork City</span>
                      <p class="mb-5">Lorem ipsum dolor sit amet</p>
                    </div>
                    <img src="http://placehold.it/300x100" alt="">
                  </div>
                </div>
                <div class="event media mt-0 no-bg no-border">
                  <div class="event-date media-left text-center flip bg-theme-colored p-15">
                    <ul>
                      <li class="font-26 text-white font-weight-600">28</li>
                      <li class="font-20 text-uppercase text-white">Feb</li>
                    </ul>
                  </div>
                  <div class="media-body event-hvr">
                    <div class="event-content pull-left flip pl-20 pl-xs-10">
                      <h4 class="event-title media-heading font-raleway font-weight-700 mb-0 pt-5"><a href="#">Gear up for giving</a></h4>
                      <span class="mb-5 font-12 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored"></i> at 5.00 pm - 7.30 pm</span>
                      <span class="font-12"><i class="fa fa-map-marker mr-5 text-theme-colored"></i> 25 Newyork City</span>
                      <p class="mb-5">Lorem ipsum dolor sit amet</p>
                    </div>
                    <img src="http://placehold.it/300x100" alt="">
                  </div>
                </div>
                <div class="event media mt-0 no-bg no-border">
                  <div class="event-date media-left text-center flip bg-theme-colored p-15">
                    <ul>
                      <li class="font-26 text-white font-weight-600">28</li>
                      <li class="font-20 text-uppercase text-white">Feb</li>
                    </ul>
                  </div>
                  <div class="media-body event-hvr">
                    <div class="event-content pull-left flip pl-20 pl-xs-10">
                      <h4 class="event-title media-heading font-raleway font-weight-700 mb-0 pt-5"><a href="#">Gear up for giving</a></h4>
                      <span class="mb-5 font-12 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored"></i> at 5.00 pm - 7.30 pm</span>
                      <span class="font-12"><i class="fa fa-map-marker mr-5 text-theme-colored"></i> 25 Newyork City</span>
                      <p class="mb-5">Lorem ipsum dolor sit amet</p>
                    </div>
                    <img src="http://placehold.it/300x100" alt="">
                  </div>
                </div>
                <div class="event media mt-0 no-bg no-border">
                  <div class="event-date media-left text-center flip bg-theme-colored p-15">
                    <ul>
                      <li class="font-26 text-white font-weight-600">28</li>
                      <li class="font-20 text-uppercase text-white">Feb</li>
                    </ul>
                  </div>
                  <div class="media-body event-hvr">
                    <div class="event-content pull-left flip pl-20 pl-xs-10">
                      <h4 class="event-title media-heading font-raleway font-weight-700 mb-0 pt-5"><a href="#">Gear up for giving</a></h4>
                      <span class="mb-5 font-12 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored"></i> at 5.00 pm - 7.30 pm</span>
                      <span class="font-12"><i class="fa fa-map-marker mr-5 text-theme-colored"></i> 25 Newyork City</span>
                      <p class="mb-5">Lorem ipsum dolor sit amet</p>
                    </div>
                    <img src="http://placehold.it/300x100" alt="">
                  </div>
                </div>
                <div class="event media mt-0 no-bg no-border">
                  <div class="event-date media-left text-center flip bg-theme-colored p-15">
                    <ul>
                      <li class="font-26 text-white font-weight-600">28</li>
                      <li class="font-20 text-uppercase text-white">Feb</li>
                    </ul>
                  </div>
                  <div class="media-body event-hvr">
                    <div class="event-content pull-left flip pl-20 pl-xs-10">
                      <h4 class="event-title media-heading font-raleway font-weight-700 mb-0 pt-5"><a href="#">Gear up for giving</a></h4>
                      <span class="mb-5 font-12 mr-10"><i class="fa fa-clock-o mr-5 text-theme-colored"></i> at 5.00 pm - 7.30 pm</span>
                      <span class="font-12"><i class="fa fa-map-marker mr-5 text-theme-colored"></i> 25 Newyork City</span>
                      <p class="mb-5">Lorem ipsum dolor sit amet</p>
                    </div>
                    <img src="http://placehold.it/300x100" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="divider parallax layer-overlay overlay-dark-2" data-bg-img="http://placehold.it/1172x190" data-parallax-ratio="0.7">
      <div class="container pt-90">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center">
            <h1 class="mt-0 text-white">Featured project to built a School</h1>
              <p class="lead text-white">We are charity/ non-profit/ fundraising/ NGO organizations. Our charity activities are taken place around the 
              world,let contribute to them with us by your hand to be a better life</p>
            <div class="progress-item mt-0">
              <div class="progress mb-0">
                <div class="progress-bar bg-theme-colored-lighter4" data-percent="85"><i class="fa fa-3x fa-heart text-theme-colored" aria-hidden="true"></i></div>
              </div>
            </div>
            <div class="row mt-20">
              <div class="col-xs-4 col-md-4 text-left text-white">
                Raised: $2,900
              </div>
              <div class="col-xs-4 col-md-4 text-white">
                Donators: 20
              </div>
              <div class="col-xs-4 col-md-4 text-right text-white">
                Goal: $3,600
              </div>
              <div class="clearfix"></div>
            </div>
            <a style="transition: none 0s ease 0s ; line-height: 16px; border-width: 0px; padding: 8px 20px; letter-spacing: 1px; font-weight: 400; font-size: 13px;" class="btn btn-circled btn-transparent bg-theme-colored pl-20 pr-20 text-white mt-30" href="page-donate.html">Donate Now</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Choose us  -->
    <section>
      <div class="container pb-10 pb-sm-80">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
              <h3 class="title mt-0 line-height-1 mb-40 sm-text-center">Why People Choose Us</h3>
              <div class="icon-box left media sm-text-center mb-sm-10"> <a href="#" class="icon icon-circled icon-lg border-1px border-theme-colored2 sm-pull-none pull-left flip"><i class="flaticon-charity-scholarship-2"></i></a>
                <div class="media-body">
                  <h4 class="media-heading heading">Free Scholarship </h4>
                  <p>Charityfaith is a nonprofit organization for poor student. It's also provide food and scholarship</p>
                </div>
              </div>
              <div class="icon-box left media sm-text-center mb-sm-10"> <a href="#" class="icon icon-circled icon-lg border-1px border-theme-colored2 sm-pull-none pull-left flip"><i class="flaticon-charity-reader-2"></i></a>
                <div class="media-body">
                  <h4 class="media-heading heading">Teaching Poor Student</h4>
                  <p>Charityfaith is a nonprofit organization for poor student. It's also provide food and scholarship</p>
                </div>
              </div>
              <div class="icon-box left media sm-text-center mb-sm-10"> <a href="#" class="icon icon-circled icon-lg border-1px border-theme-colored2 sm-pull-none pull-left flip"><i class="flaticon-charity-charity-1"></i></a>
                <div class="media-body">
                  <h4 class="media-heading heading">Nutrition Food for Student</h4>
                  <p>Charityfaith is a nonprofit organization for poor student. It's also provide food and scholarship</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 sm-text-center">
              <img class="hidden-sm" src="http://placehold.it/176x519" alt="">
            </div> 
          </div>
        </div>
      </div>
    </section>

    <section class="divider mb-100">
      <div class="container p-0" data-bg-img="http://placehold.it/1172x250">
        <div class="row">
          <div class="col-md-12">
            <div class="call-to-action pt-60 pb-80 text-center for-boxshadow">
              <h3 class="text-white mb-20">EVERY PEOPLE DESERVES THE OPPORTUNITY TO GO TO SCHOOL.</h3>
              <a class="btn btn-lg mr-10 text-white border-theme-colored2" href="#">Purchase Now</a> 
              <a class="btn btn-gray btn-theme-colored btn-lg" href="#">Learn More</a>
            </div>
          </div>
        </div>
       </div>        
    </section>

    <!-- Section: Causes -->
    <section>
      <div class="container pt-0 pb-sm-50 pb-xs-50">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="mt-0 line-height-1 text-uppercase">Latest <span class="text-theme-colored">Causes</span></h2>
              <p>We are charity/ non-profit/ fundraising/ NGO organizations. Our charity activities are taken place around the 
              world,let contribute to them with us by your hand to be a better life</p>
            </div>
          </div>
        </div>
        {{$new_campaigns->count()}}
        @if($funded_campaigns->count())
        <div class="section-content">
          <div class="row mtli-row-clearfix">
            @foreach($new_campaigns as $fc)
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="causes maxwidth500 mb-sm-50">
                <div class="thumb">
                  <img class="img-fullwidth" alt="" src="{{ $fc->feature_img_url()}}">
                </div>
                <ul class="list-inline clearfix p-30 p-sm-10 pt-15 pb-5 ml-0">
                  <li class="pull-left flip pr-20 pr-sm-10 pt-10 pl-0">Raised: <span class="font-weight-700">{{get_amount($fc->success_payments->sum('amount'))}}</span></li>
                  <li class="pull-left flip pr-0 pl-0">
                    <div class="donate-piechart piechart-absolute">
                      <div class="piechart-block">
                        @php
                            $percent_raised = $fc->percent_raised();
                        @endphp
                        <div class="piechart" data-barcolor="#85d813" data-trackcolor="#fff" data-percent="{{$percent_raised}}" data-linewidth="8">
                          <span class="percent text-white font-weight-700">{{$percent_raised}} </span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="text-theme-colored pull-right flip pr-0 pt-10">Goal: <span class="font-weight-700">{{get_amount($fc->goal)}}</span></li>
                </ul>
                <div class="causes-details clearfix">
                  <div class="p-30 pt-15 p-sm-15">
                    <h4 class="mt-0 text-center"><a href="{{route('campaign_single', [$fc->id, $fc->slug])}}">{{$fc->title}}</a></h4>
                    <p class="text-center">{{$fc->short_description}}</p>
                    <div class="mt-10 clearfix">
                     <a class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10" href="{{route('campaign_single', [$fc->id, $fc->slug])}}">Donate Now</a>
                     <div class="pull-right mt-10"><i class="fa fa-heart text-theme-colored"></i> 89 Donors</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>
    </section>
    <!-- Section: Gallery-->
    <section>
      <div class="container pb-0">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
              <h2 class="mt-0 line-height-1 text-center text-uppercase">Our <span class="text-theme-colored">Gallery</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem temporibus quisquam voluptas natus, provident porro et odio perferendis ipsam, amet sint</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <!-- Portfolio Filter -->
              <div class="portfolio-filter font-alt text-center mb-6 0">
                <a href="#" class="active" data-filter="*">All</a>
                <a href="#branding" class="" data-filter=".branding">Branding</a>
                <a href="#design" class="" data-filter=".design">Design</a>
                <a href="#photography" class="" data-filter=".photography">Photography</a>
              </div>
              <!-- End Portfolio Filter -->
            
              <!-- Portfolio Gallery Grid -->
              <div id="grid" class="gallery-isotope masonry grid-3 gutter clearfix">
                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/375x515" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="http://placehold.it/375x515"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="http://placehold.it/375x515">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item design">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/375x256" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="http://placehold.it/375x256">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item branding">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/375x515" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a class="popup-vimeo" href="https://vimeo.com/45830194"><i class="fa fa-play"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/375x256" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="fa fa-youtube-play"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item design">
                  <div class="thumb">
                    <div class="flexslider-wrapper">
                      <div class="flexslider">
                        <ul class="slides">
                          <li><a href="http://placehold.it/375x256" title="Portfolio Gallery - Photo 1"><img src="http://placehold.it/375x256" alt=""></a></li>
                          <li><a href="http://placehold.it/375x256" title="Portfolio Gallery - Photo 2"><img src="http://placehold.it/375x256" alt=""></a></li>
                          <li><a href="http://placehold.it/375x256" title="Portfolio Gallery - Photo 3"><img src="http://placehold.it/375x256" alt=""></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="#"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item branding wide">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/560x381" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="#"><i class="fa fa-link"></i></a>
                          <a href="#"><i class="fa fa-heart-o"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="http://placehold.it/560x381">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/375x256" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="http://placehold.it/375x256"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="http://placehold.it/375x256">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->

                <!-- Portfolio Item Start -->
                <div class="gallery-item design">
                  <div class="thumb">
                    <div class="flexslider-wrapper" data-direction="vertical">
                      <div class="flexslider">
                        <ul class="slides">
                          <li><a href="http://placehold.it/375x256" title="Portfolio Gallery - Photo 1"><img src="http://placehold.it/375x256" alt=""></a></li>
                          <li><a href="http://placehold.it/375x256" title="Portfolio Gallery - Photo 2"><img src="http://placehold.it/375x256" alt=""></a></li>
                          <li><a href="http://placehold.it/375x256" title="Portfolio Gallery - Photo 3"><img src="http://placehold.it/375x256" alt=""></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="#"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/375x256" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="http://placehold.it/375x256"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="http://placehold.it/375x256">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                
                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="http://placehold.it/375x256" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="http://placehold.it/375x256"><i class="fa fa-plus"></i></a>
                          <a href="#"><i class="fa fa-link"></i></a>
                        </div>
                      </div>
                    </div>
                    <a class="hover-link" data-lightbox="image" href="http://placehold.it/375x256">View more</a>
                  </div>
                </div>
                <!-- Portfolio Item End -->
              </div>
              <!-- End Portfolio Gallery Grid -->

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: -->
    <section class="divider parallax" data-bg-img="http://placehold.it/1172x190" data-parallax-ratio="0.7">
      <div class="container">
        <div class="section-title">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-white text-center line-height-1 mt-0">Our Volunteers <span class="text-theme-colored">Success</span></h2>
              <p class="text-white-f2 text-center">Lorem ipsum dolor simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="funfact">
                    <i class="pe-7s-smile text-theme-colored mt-20 font-48 pull-left flip"></i>
                    <div class="ml-60">
                      <h2 class="animate-number text-white-f1 mt-0 mb-0 font-48 line-bottom-new" data-value="754" data-animation-duration="2000">0</h2>
                      <div class="clearfix"></div>
                      <h5 class="text-white-f2">Happy Donators</h5>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
                  <div class="funfact">
                    <i class="pe-7s-rocket text-theme-colored mt-20 font-48 pull-left flip"></i>
                    <div class="ml-60">
                      <h2 class="animate-number text-white-f1 mt-0 mb-0 font-48 line-bottom-new" data-value="125" data-animation-duration="2500">0</h2>
                      <div class="clearfix"></div>
                      <h5 class="text-white-f2">Success Mission</h5>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="funfact">
                    <i class="pe-7s-add-user text-theme-colored mt-20 font-48 pull-left flip"></i>
                    <div class="ml-60">
                      <h2 class="animate-number text-white-f1 mt-0 mb-0 font-48 line-bottom-new" data-value="150" data-animation-duration="3000">0</h2>
                      <div class="clearfix"></div>
                      <h5 class="text-white-f2">Volunteer Reached</h5>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="funfact">
                    <i class="pe-7s-global text-theme-colored mt-20 font-48 pull-left flip"></i>
                    <div class="ml-60">
                      <h2 class="animate-number text-white-f1 mt-0 mb-0 font-48 line-bottom-new" data-value="150" data-animation-duration="3000">0</h2>
                      <div class="clearfix"></div>
                      <h5 class="text-white-f2">Globalization Work</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: blog -->
    <section id="blog" class="bg-light">
      <div class="container pb-70">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
              <h2 class="mt-0 line-height-1 text-center text-uppercase">Latest <span class="text-theme-colored">News</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem temporibus quisquam voluptas natus, provident porro et odio perferendis ipsam, amet sint</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4">
              <article class="post clearfix maxwidth600 mb-30 border-1px bg-white">
                <div class="entry-header-new">
                  <div class="post-thumb thumb"><img src="http://placehold.it/360x250" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="pr-20 pl-20 pb-20">
                  <h3 class="entry-title mt-0 pt-0"><a class="text-theme-colored" href="#">The Celebration</a></h3>
                  <ul class="list-inline entry-date font-13 mt-5">
                    <li><i class="fa fa-clock-o mr-5"></i> Dec - 21 </li>
                    <li><i class="fa fa-map-marker mr-5"></i>  121 King Street, Melbourne </li>
                  </ul>
                  <p class="mt-10">Lorem ipsum dolor sit amet. Reiciendis impedit expedita sit deleniti culpa nam fuga neque smile similique corporis. Sed eligendi perspiciatis.</p>
                  <a class="mt-0 text-theme-colored" href="#">Read more <i class="fa fa-angle-double-right text-theme-colored2"></i></a>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <article class="post clearfix maxwidth600 mb-30 border-1px bg-white">
                <div class="entry-header-new">
                  <div class="post-thumb thumb"><img src="http://placehold.it/360x250" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="pr-20 pl-20 pb-20">
                  <h3 class="entry-title mt-0 pt-0"><a class="text-theme-colored" href="#">The Celebration</a></h3>
                  <ul class="list-inline entry-date font-13 mt-5">
                    <li><i class="fa fa-clock-o mr-5"></i> Dec - 21 </li>
                    <li><i class="fa fa-map-marker mr-5"></i>  121 King Street, Melbourne </li>
                  </ul>
                  <p class="mt-10">Lorem ipsum dolor sit amet. Reiciendis impedit expedita sit deleniti culpa nam fuga neque smile similique corporis. Sed eligendi perspiciatis.</p>
                  <a class="mt-0 text-theme-colored" href="#">Read more <i class="fa fa-angle-double-right text-theme-colored2"></i></a>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <article class="post clearfix maxwidth600 mb-30 border-1px bg-white">
                <div class="entry-header-new">
                  <div class="post-thumb thumb"><img src="http://placehold.it/360x250" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="pr-20 pl-20 pb-20">
                  <h3 class="entry-title mt-0 pt-0"><a class="text-theme-colored" href="#">The Celebration</a></h3>
                  <ul class="list-inline entry-date font-13 mt-5">
                    <li><i class="fa fa-clock-o mr-5"></i> Dec - 21 </li>
                    <li><i class="fa fa-map-marker mr-5"></i>  121 King Street, Melbourne </li>
                  </ul>
                  <p class="mt-10">Lorem ipsum dolor sit amet. Reiciendis impedit expedita sit deleniti culpa nam fuga neque smile similique corporis. Sed eligendi perspiciatis.</p>
                  <a class="mt-0 text-theme-colored" href="#">Read more <i class="fa fa-angle-double-right text-theme-colored2"></i></a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Countdown  -->
    <section class="bg-theme-colored">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-md-12">
            <div class="divider call-to-action sm-text-center pt-10 pb-30">
              <div class="col-md-6">
                <h3 class="mt-20 text-white">Please donate us for Upcoming projects</h3>
                <h6 class="mb-20 text-white">Changing lives to make easier for child education and drinking water!</h6>
                <a class="btn btn-default btn-circled btn-sm border-theme-color2-1px" href="page-donate.html">Donate Now</a>
              </div>
              <div class="col-md-6">
                <div id="legacy-clock" class="text-right flip sm-text-center font-20 text-white mt-40 pt-5 mb-sm-20"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

@endsection