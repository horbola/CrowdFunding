@extends('layouts.app.skel')

@section('content')
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div class="row align-items-center mt-5 mt-sm-0">
            <div class="col-md-6">
                <div class="title-heading text-center text-md-start">
                    <span class="badge rounded-pill bg-soft-primary">Oporajoy.org</span>
                    <h1 class="heading fw-bold mb-3">Funds For <span class="text-primary text-decoration-underline typewrite" data-period="2000" data-type='[ "Medical", "Cancer", "Startups", "Education" ]'> <span class="wrap"></span> </span> <br> Oporajoy ensures maximum funds for you</h1>
                    <p class="text-muted mb-0 para-dark para-desc mx-auto ms-md-auto">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>

                    <div class="mt-4">
                        <a href="javascript:void(0)" class="btn btn-primary">Sign up & Start growing</a>
                        <p class="text-muted mt-1 mb-0">*No Credit Card Required</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-6 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="freelance-hero position-relative">
                    <div class="bg-shape position-relative">
                        <img src="/images/personal/need.png" class="mx-auto d-block img-fluid" alt="">
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->

<!-- Start categories -->
<section class="bg-light">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-center">
            <div class="col-xl-2 col-lg-4 col-md-4">
                <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => '1']) }}">
                    <div class="card features fea-primary text-center rounded-0 px-4 py-5 bg-light bg-gradient position-relative overflow-hidden border-0">
                        <span class="h2 icon2 text-primary">
                            <i class="uil uil-crosshair"></i>
                        </span>
                        <div class="card-body p-0 content">
                            <h5 class="text-dark">Medical</h5>
                            <p class="para text-muted mb-0">It is a long established fact that a reader will be will be of at its layout.</p>
                        </div>
                    </div>
                </a>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4">
                <a href="{{ route('campaign.indexGuestCampaign', 3) }}">
                    <div class="card features fea-primary text-center rounded-0 px-4 py-5 bg-light bg-gradient position-relative overflow-hidden border-0">
                        <span class="h2 icon2 text-primary">
                            <i class="uil uil-search"></i>
                        </span>
                        <div class="card-body p-0 content">
                            <h5 class="text-dark">Accident</h5>
                            <p class="para text-muted mb-0">It is a long established fact that a reader will be will be of at its layout.</p>
                        </div>
                    </div>
                </a>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4">
                <a href="{{ route('campaign.indexGuestCampaign', 4) }}">
                    <div class="card features fea-primary text-center rounded-0 px-4 py-5 bg-light bg-gradient position-relative overflow-hidden border-0">
                        <span class="h2 icon2 text-primary">
                            <i class="uil uil-lightbulb-alt"></i>
                        </span>
                        <div class="card-body p-0 content">
                            <h5 class="text-dark">Cancer</h5>
                            <p class="para text-muted mb-0">It is a long established fact that a reader will be will be of at its layout.</p>
                        </div>
                    </div>                    
                </a>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4">
                <a href="{{ route('campaign.indexGuestCampaign', 5) }}">
                    <div class="card features fea-primary text-center rounded-0 px-4 py-5 bg-light bg-gradient position-relative overflow-hidden border-0">
                        <span class="h2 icon2 text-primary">
                            <i class="uil uil-usd-circle"></i>
                        </span>
                        <div class="card-body p-0 content">
                            <h5 class="text-dark">Education</h5>
                            <p class="para text-muted mb-0">It is a long established fact that a reader will be will be of at its layout.</p>
                        </div>
                    </div>
                </a>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4">
                <a href="{{ route('campaign.indexGuestCampaign', ['category' => 'child-welfare']) }}">
                    <div class="card features fea-primary text-center rounded-0 px-4 py-5 bg-light bg-gradient position-relative overflow-hidden border-0">
                        <span class="h2 icon2 text-primary">
                            <i class="uil uil-analytics"></i>
                        </span>
                        <div class="card-body p-0 content">
                            <h5 class="text-dark">Child Welfare</h5>
                            <p class="para text-muted mb-0">It is a long established fact that a reader will be will be of at its layout.</p>
                        </div>
                    </div>                    
                </a>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4">
                <a href="{{ route('campaign.indexGuestCampaign', 6) }}">
                    <div class="card features fea-primary text-center rounded-0 px-4 py-5 bg-light bg-gradient position-relative overflow-hidden border-0">
                        <span class="h2 icon2 text-primary">
                            <i class="uil uil-invoice"></i>
                        </span>
                        <div class="card-body p-0 content">
                            <h5 class="text-dark">Creative</h5>
                            <p class="para text-muted mb-0">It is a long established fact that a reader will be will be of at its layout.</p>
                        </div>
                    </div>
                </a>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End categories -->


<section class="section overflow-hidden">
    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 col-12">
                <div class="social-feature-left">
                    <img src="/images/payments/6.png" class="img-fluid" alt="">
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ms-lg-4">
                    <p class="text-primary h2 mb-3"><i class="uil uil-airplay"></i></p>
                    <h4 class="title mb-3">Manage Your All <br> <span class="text-primary">Social Media</span> Account</h4>
                    <p class="text-muted">Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters visual impact.</p>
                    <div class="mt-4">
                        <a href="javascript:void(0)" class="btn btn-primary">Get Start Now <i class="uil uil-angle-right-b"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->


<!-- Start -->
<section class="section">
    <div class="container mt-100 mt-60">
        <div class="title-heading margin-top-100">
            <h1 class="heading mb-3 text-center">Pre-Ready Campaign</h1>
            <p class="para-desc mx-auto text-muted">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap v5 html page.</p>
        </div>

        <div class="row">
            <div class="col-md-4 mt-4 pt-2">
                <ul class="nav nav-pills nav-justified flex-column bg-white rounded shadow p-3 mb-0 sticky-bar" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded active" id="proposal" data-bs-toggle="pill" href="#developing" role="tab" aria-controls="developing" aria-selected="false">
                            <div class="text-start d-flex align-items-center justify-content-between py-1 px-2">
                                <h6 class="mb-0"><i class="uil uil-postcard me-2 h5"></i> Business Purpose</h6>
                                <i class="uil uil-angle-right-b"></i>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="mt-2">
                        <a class="rounded" id="contract" data-bs-toggle="pill" href="#data-analise" role="tab" aria-controls="data-analise" aria-selected="false">
                            <div class="text-start d-flex align-items-center justify-content-between py-1 px-2">
                                <h6 class="mb-0"><i class="uil uil-notes me-2 h5"></i> Treatment</h6>
                                <i class="uil uil-angle-right-b"></i>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item mt-2">
                        <a class="nav-link rounded" id="crm" data-bs-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                            <div class="text-start d-flex align-items-center justify-content-between py-1 px-2">
                                <h6 class="mb-0"><i class="uil uil-folder-check me-2 h5"></i> Enterprenure</h6>
                                <i class="uil uil-angle-right-b"></i>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item mt-2">
                        <a class="nav-link rounded" id="timetracking" data-bs-toggle="pill" href="#time-track" role="tab" aria-controls="time-track" aria-selected="false">
                            <div class="text-start d-flex align-items-center justify-content-between py-1 px-2">
                                <h6 class="mb-0"><i class="uil uil-clock me-2 h5"></i> Disability</h6>
                                <i class="uil uil-angle-right-b"></i>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item mt-2">
                        <a class="nav-link rounded" id="invoice" data-bs-toggle="pill" href="#invoices" role="tab" aria-controls="invoices" aria-selected="false">
                            <div class="text-start d-flex align-items-center justify-content-between py-1 px-2">
                                <h6 class="mb-0"><i class="uil uil-invoice me-2 h5"></i> Cancer</h6>
                                <i class="uil uil-angle-right-b"></i>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item mt-2">
                        <a class="nav-link rounded" id="tasktracking" data-bs-toggle="pill" href="#task-track" role="tab" aria-controls="task-track" aria-selected="false">
                            <div class="text-start d-flex align-items-center justify-content-between py-1 px-2">
                                <h6 class="mb-0"><i class="uil uil-exchange-alt me-2 h5"></i> More</h6>
                                <i class="uil uil-angle-right-b"></i>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                </ul><!--end nav pills-->
            </div><!--end col-->

            <div class="col-md-8 col-12 mt-4 pt-2">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade bg-white show active p-4 rounded shadow" id="developing" role="tabpanel" aria-labelledby="proposal">
                        <h4 class="mb-4">Win More Work</h4>
                        <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody.</p>

                        <div class="mt-4">
                            <a href="javascript:void(0)" class="text-primary h6">Explore Proposals <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>

                        <div class="mt-4">
                            <img src="/images/freelancer/proposals.png" class="img-fluid" alt="">
                        </div>
                    </div><!--end teb pane-->

                    <div class="tab-pane fade bg-white p-4 rounded shadow" id="data-analise" role="tabpanel" aria-labelledby="contract">
                        <h4 class="mb-4">Protect Your Business</h4>
                        <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody.</p>

                        <div class="mt-4">
                            <a href="javascript:void(0)" class="text-primary h6">Explore Contracts <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>

                        <div class="mt-4">
                            <img src="/images/freelancer/contract.png" class="img-fluid" alt="">
                        </div>
                    </div><!--end teb pane-->

                    <div class="tab-pane fade bg-white p-4 rounded shadow" id="security" role="tabpanel" aria-labelledby="crm">
                        <h4 class="mb-4">Stay Organized</h4>
                        <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody.</p>

                        <div class="mt-4">
                            <a href="javascript:void(0)" class="text-primary h6">Explore Projects <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>

                        <div class="mt-4">
                            <img src="/images/freelancer/crm.png" class="img-fluid" alt="">
                        </div>
                    </div><!--end teb pane-->

                    <div class="tab-pane fade bg-white p-4 rounded shadow" id="time-track" role="tabpanel" aria-labelledby="timetracking">
                        <h4 class="mb-4">Keep It Simple</h4>
                        <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody.</p>

                        <div class="mt-4">
                            <a href="javascript:void(0)" class="text-primary h6">Explore Time Tracking <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>

                        <div class="mt-4">
                            <img src="/images/freelancer/time.png" class="img-fluid" alt="">
                        </div>
                    </div><!--end teb pane-->

                    <div class="tab-pane fade bg-white p-4 rounded shadow" id="invoices" role="tabpanel" aria-labelledby="invoice">
                        <h4 class="mb-4">Get Paid Faster</h4>
                        <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody.</p>

                        <div class="mt-4">
                            <a href="javascript:void(0)" class="text-primary h6">Explore Invoice <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>

                        <div class="mt-4">
                            <img src="/images/freelancer/invoice.png" class="img-fluid" alt="">
                        </div>
                    </div><!--end teb pane-->

                    <div class="tab-pane fade bg-white p-4 rounded shadow" id="task-track" role="tabpanel" aria-labelledby="tasktracking">
                        <h4 class="mb-4">Be More Effective</h4>
                        <p class="text-muted mb-0">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody.</p>

                        <div class="mt-4">
                            <a href="javascript:void(0)" class="text-primary h6">Explore Task Tracking <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>

                        <div class="mt-4">
                            <img src="/images/freelancer/task.png" class="img-fluid" alt="">
                        </div>
                    </div><!--end teb pane-->
                </div><!--end tab content-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h6 class="text-primary">Features</h6>
                    <h4 class="title mb-4">Why Oporajoy Crowdfunding</h4>
                    <p class="text-muted para-desc mb-0 mx-auto">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-airplay d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body p-0 content">
                        <h5 class="mt-4"><a href="javascript:void(0)" class="title text-dark">Design & Development</a></h5>
                        <p class="text-muted">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated</p>                                
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-clipboard-alt d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body p-0 content">
                        <h5 class="mt-4"><a href="javascript:void(0)" class="title text-dark">Management & Marketing</a></h5>
                        <p class="text-muted">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated</p>                               
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card features feature-clean explore-feature p-4 px-md-3 border-0 rounded-md shadow text-center">
                    <div class="icons text-primary text-center mx-auto">
                        <i class="uil uil-credit-card-search d-block rounded h3 mb-0"></i>
                    </div>

                    <div class="card-body p-0 content">
                        <h5 class="mt-4"><a href="javascript:void(0)" class="title text-dark">Stratagy & Research</a></h5>
                        <p class="text-muted">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated</p>                                
                    </div>
                </div>
            </div><!--end col-->

        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->



<section class="section border-bottom">
    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5 col-12">
                <img src="/images/illustrator/envelope.svg" class="img-fluid mx-auto d-block" alt="">
            </div><!--end col-->

            <div class="col-lg-7 col-md-7 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="section-title">
                    <div class="alert alert-light alert-pills" role="alert">
                        <span class="badge bg-primary rounded-pill me-1">Apps</span>
                        <span class="content">Download now <i class="uil uil-angle-right-b align-middle"></i></span>
                    </div>
                    <h4 class="title mb-4">Available for your <br> Smartphones</h4>
                    <p class="text-muted para-desc mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                    <div class="my-4">
                        <a href="javascript:void(0)" class="btn btn-lg btn-dark mt-2 me-2"><i class="uil uil-apple"></i> App Store</a>
                        <a href="javascript:void(0)" class="btn btn-lg btn-dark mt-2"><i class="uil uil-google-play"></i> Play Store</a>
                    </div>

                    <div class="d-inline-block">
                        <div class="pt-4 d-flex align-items-center border-top">
                            <i data-feather="smartphone" class="fea icon-md me-2 text-primary"></i>
                            <div class="content">
                                <h6 class="mb-0">Install app now on your cellphones</h6>
                                <a href="javascript:void(0)" class="text-primary h6">Learn More <i class="uil uil-angle-right-b"></i></a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>


<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-light">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->
@endsection


