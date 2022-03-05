@extends('layout.face.skel')

@section('content')
<div class="back-to-home rounded d-none d-sm-block">
    <a href="index.html" class="btn btn-icon btn-primary"><i data-feather="home" class="icons"></i></a>
</div>

<!-- COMING SOON PAGE -->
<video autoplay muted loop style="position: absolute; right: 0; bottom: 0; min-width: 100%;  min-height: 100%;">
    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
    <!--Here is your webm not YouTube-->

            <!-- <source src="images/1.mp4" type="video/mp4"> -->
    <!-- Here is your videos path link -->
</video>
<section class="bg-home bg-animation-left dark-left d-flex align-items-center" id="home">
    <div class="container position-relative text-md-start text-center" style="z-index: 1;">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0)" class="logo h5"><img src="images/logo-light.png" height="24" alt=""></a>
                <h1 class="text-uppercase text-white title-dark mt-2 mb-4 coming-soon"><span class="text-white typewrite" data-period="2000" data-type='[ "We are Coming soon...", "We are Be Ready to", "We are Connected with us" ]'> <span class="wrap"></span> </span></h1>
                <p class="text-light para-dark para-desc">Start working with <span class="fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="countdown">
                    <ul class="count-down list-unstyled">
                        <li id="days" class="count-number list-inline-item m-2"></li>
                        <li id="hours" class="count-number list-inline-item m-2"></li>
                        <li id="mins" class="count-number list-inline-item m-2"></li>
                        <li id="secs" class="count-number list-inline-item m-2"></li>
                        <li id="end" class="h1"></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">  
                <a href="index.html" data-bs-toggle="modal" data-bs-target="#LoginForm" class="btn btn-primary mt-4 me-2"><i class="mdi mdi-check"></i> Notify Me</a>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- COMING SOON PAGE -->

<!-- Subscribe start -->
<div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Subscribe Me</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bg-white p-3 rounded box-shadow">
                    <p>We are comingsoon. Please, Enter your mail id and subscribe.</p>
                    <div class="input-group mb-3">
                        <input name="email" id="email2" type="email" class="form-control" placeholder="Your Email :" required="">
                        <button class="btn btn-primary submitBnt" type="submit" id="email">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe end -->
@endsection
