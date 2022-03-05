@extends('layouts.app.skel')

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
                        <!-- SEARCH -->
                        
                        <div id="dashboard-menu" class="widget">
                            <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
                                <li class="navbar-item account-menu px-0 @if($category === 'medical') active @endif">
                                    <a href="{{ route('campaign.indexGuestCampaign', ['category' => 'medical']) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                                        <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                                        <h6 class="mb-0 ms-2">Medical</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu px-0 mt-2 @if($category === 'accident') active @endif">
                                    <a href="{{ route('campaign.indexGuestCampaign', ['category' => 'accident']) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                                        <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                                        <h6 class="mb-0 ms-2">Accident</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu px-0 mt-2 @if($category === 'cancer') active @endif">
                                    <a href="{{ route('campaign.indexGuestCampaign', ['category' => 'cancer']) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                                        <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                                        <h6 class="mb-0 ms-2">Cancer</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu px-0 mt-2 @if($category === 'education') active @endif">
                                    <a href="{{ route('campaign.indexGuestCampaign', ['category' => 'education']) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                                        <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                                        <h6 class="mb-0 ms-2">Education</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu px-0 mt-2 @if($category === 'child-welfare') active @endif">
                                    <a href="{{ route('campaign.indexGuestCampaign', ['category' => 'child-welfare']) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                                        <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                                        <h6 class="mb-0 ms-2">Child Welfare</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu px-0 mt-2 @if($category === 'creative') active @endif">
                                    <a href="{{ route('campaign.indexGuestCampaign', ['category' => 'creative']) }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                                        <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                                        <h6 class="mb-0 ms-2">Creative</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-9 col-md-8 col-12 mt-5 pt-2 mt-sm-0 pt-sm-0">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-7 text-center text-md-start">
                        <div class="section-title">
                            <h5 class="mb-0 mt-4 mt-md-0">Showing 1–15 of 47 results</h5>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="form custom-form">
                            <div class="mb-0">
                                <select class="form-select form-control" aria-label="Default select example" id="Sortbylist-job">
                                    <option selected>Sort by latest</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by rating</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-12 col-lg-6 mt-4 pt-2">
                        <div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">New</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Featured</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a></li>
                            </ul>
                            <div class="shop-image position-relative">
                                <a href="{{ route('campaign.showGuestCampaign', ['campaignID' => '1']) }}">
                                    <img src="/images/course/1.jpg" class="card-img-top" alt="...">
                                    <div class="overlay bg-dark"></div>
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productview" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                </ul>
                                <div class="teacher d-flex align-items-center">
                                    <img src="/images/client/01.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                    <div class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">Mujahidul Islam</a></h6>
                                        <p class="text-light small my-0">Bangladesh</p>
                                    </div>
                                </div>
                                <div class="course-fee bg-info text-center shadow-lg rounded-circle">
                                    <a href="javascript:void(0)" class="text-primary fee">
                                        <i data-feather="heart" class="icons"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="shape overflow-hidden text-white">
                                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body content">
                                <h5 class="mt-2"><a href="javascript:void(0)" class="title text-dark">Program for Missionaries</a></h5>
                                <p class="text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                                <div class="progress-box">
                                    <h6 class="title text-muted">Raised 50,000tk out of 10,00,000tk</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:22%;">
                                            <div class="progress-value d-block text-muted h6"></div>
                                        </div>
                                    </div>
                                </div> 
                                <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                    <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> 20 days left</li>
                                    <li class="text-muted small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                                </ul>
                            </div>
                        </div> <!--end card / course-blog-->
                    </div><!--end col-->
                    
                    <div class="col-12 col-lg-6 mt-4 pt-2">
                        <div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">New</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Featured</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a></li>
                            </ul>
                            <div class="shop-image position-relative">
                                <a href="{{ route('campaign.showGuestCampaign', ['campaignID' => '1']) }}">
                                    <img src="/images/course/1.jpg" class="card-img-top" alt="...">
                                    <div class="overlay bg-dark"></div>
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productview" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                </ul>
                                <div class="teacher d-flex align-items-center">
                                    <img src="/images/client/01.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                    <div class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">Mujahidul Islam</a></h6>
                                        <p class="text-light small my-0">Bangladesh</p>
                                    </div>
                                </div>
                                <div class="course-fee bg-info text-center shadow-lg rounded-circle">
                                    <a href="javascript:void(0)" class="text-primary fee">
                                        <i data-feather="heart" class="icons"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="shape overflow-hidden text-white">
                                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body content">
                                <h5 class="mt-2"><a href="javascript:void(0)" class="title text-dark">Program for Missionaries</a></h5>
                                <p class="text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                                <div class="progress-box">
                                    <h6 class="title text-muted">Raised 50,000tk out of 10,00,000tk</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:22%;">
                                            <div class="progress-value d-block text-muted h6"></div>
                                        </div>
                                    </div>
                                </div> 
                                <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                    <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> 20 days left</li>
                                    <li class="text-muted small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                                </ul>
                            </div>
                        </div> <!--end card / course-blog-->
                    </div><!--end col-->
                    
                    <div class="col-12 col-lg-6 mt-4 pt-2">
                        <div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">New</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Featured</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a></li>
                            </ul>
                            <div class="shop-image position-relative">
                                <img src="/images/course/1.jpg" class="card-img-top" alt="...">
                                <div class="overlay bg-dark"></div>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productview" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                </ul>
                                <div class="teacher d-flex align-items-center">
                                    <img src="/images/client/01.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                    <div class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">Mujahidul Islam</a></h6>
                                        <p class="text-light small my-0">Bangladesh</p>
                                    </div>
                                </div>
                                <div class="course-fee bg-info text-center shadow-lg rounded-circle">
                                    <a href="javascript:void(0)" class="text-primary fee">
                                        <i data-feather="heart" class="icons"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="shape overflow-hidden text-white">
                                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body content">
                                <h5 class="mt-2"><a href="javascript:void(0)" class="title text-dark">Program for Missionaries</a></h5>
                                <p class="text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                                <div class="progress-box">
                                    <h6 class="title text-muted">Raised 50,000tk out of 10,00,000tk</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:22%;">
                                            <div class="progress-value d-block text-muted h6"></div>
                                        </div>
                                    </div>
                                </div> 
                                <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                    <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> 20 days left</li>
                                    <li class="text-muted small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                                </ul>
                            </div>
                        </div> <!--end card / course-blog-->
                    </div><!--end col-->
                    
                    <div class="col-12 col-lg-6 mt-4 pt-2">
                        <div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">New</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Featured</a></li>
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a></li>
                            </ul>
                            <div class="shop-image position-relative">
                                <img src="/images/course/1.jpg" class="card-img-top" alt="...">
                                <div class="overlay bg-dark"></div>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productview" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                </ul>
                                <div class="teacher d-flex align-items-center">
                                    <img src="/images/client/01.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                    <div class="ms-2">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">Mujahidul Islam</a></h6>
                                        <p class="text-light small my-0">Bangladesh</p>
                                    </div>
                                </div>
                                <div class="course-fee bg-info text-center shadow-lg rounded-circle">
                                    <a href="javascript:void(0)" class="text-primary fee">
                                        <i data-feather="heart" class="icons"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="shape overflow-hidden text-white">
                                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body content">
                                <h5 class="mt-2"><a href="javascript:void(0)" class="title text-dark">Program for Missionaries</a></h5>
                                <p class="text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                                <div class="progress-box">
                                    <h6 class="title text-muted">Raised 50,000tk out of 10,00,000tk</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:22%;">
                                            <div class="progress-value d-block text-muted h6"></div>
                                        </div>
                                    </div>
                                </div> 
                                <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                                    <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> 20 days left</li>
                                    <li class="text-muted small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                                </ul>
                            </div>
                        </div> <!--end card / course-blog-->
                    </div><!--end col-->
                    
              
                    
                    
                    

                    <!-- PAGINATION START -->
                    <div class="col-12 mt-4 pt-2">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous"><i class="mdi mdi-arrow-left"></i> Prev</a></li>
                            <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next <i class="mdi mdi-arrow-right"></i></a></li>
                        </ul>
                    </div><!--end col-->
                    <!-- PAGINATION END -->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Products -->


<!-- Product View Start -->
<div class="modal fade" id="productview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content rounded shadow border-0">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="productview-title">Branded T-Shirts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="container-fluid px-0">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="tiny-single-item">
                                <div class="tiny-slide"><img src="/images/shop/product/single-2.jpg" class="img-fluid rounded" alt=""></div>
                                <div class="tiny-slide"><img src="/images/shop/product/single-3.jpg" class="img-fluid rounded" alt=""></div>
                                <div class="tiny-slide"><img src="/images/shop/product/single-4.jpg" class="img-fluid rounded" alt=""></div>
                                <div class="tiny-slide"><img src="/images/shop/product/single-5.jpg" class="img-fluid rounded" alt=""></div>
                                <div class="tiny-slide"><img src="/images/shop/product/single-6.jpg" class="img-fluid rounded" alt=""></div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-7 mt-4 mt-lg-0 pt-2 pt-lg-0">
                            <h4 class="title">Branded T-Shirts</h4>
                            <h5 class="text-muted">$21.00 <del class="text-danger ms-2">$25.00</del> </h5>
                            <ul class="list-unstyled text-warning h5">
                                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                            </ul>

                            <h5 class="mt-4">Overview :</h5>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero exercitationem, unde molestiae sint quae inventore atque minima natus fugiat nihil quisquam voluptates ea omnis. Modi laborum soluta tempore unde accusantium.</p>

                            <div class="row mt-4 pt-2">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0">Your Size:</h6>
                                        <ul class="list-unstyled mb-0 ms-3">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">S</a></li>
                                            <li class="list-inline-item ms-1"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">M</a></li>
                                            <li class="list-inline-item ms-1"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">L</a></li>
                                            <li class="list-inline-item ms-1"><a href="javascript:void(0)" class="btn btn-icon btn-soft-primary">XL</a></li>
                                        </ul>
                                    </div>
                                </div><!--end col-->

                                <div class="col-12 mt-4">
                                    <div class="d-flex shop-list align-items-center">
                                        <h6 class="mb-0">Quantity:</h6>
                                        <div class="ms-3">
                                            <div class="qty-icons">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-icon btn-soft-primary minus">-</button>
                                                <input min="0" name="quantity" value="0" type="number" class="btn btn-icon btn-soft-primary qty-btn quantity">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-icon btn-soft-primary plus">+</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div><!--end col-->
                            </div><!--end row-->

                            <div class="mt-4 pt-2">
                                <a href="javascript:void(0)" class="btn btn-primary">Shop Now</a>
                                <a href="shop-cart.html" class="btn btn-soft-primary ms-2">Add to Cart</a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </div>
    </div>
</div>
<!-- Product View End -->

<!-- Wishlist Popup Start -->
<div class="modal fade" id="wishlist" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded shadow-lg border-0 overflow-hidden">
            <div class="modal-body py-5">
                <div class="text-center">
                    <div class="icon d-flex align-items-center justify-content-center bg-soft-danger rounded-circle mx-auto" style="height: 95px; width:95px;">
                        <h1 class="mb-0"><i class="uil uil-heart-break align-middle"></i></h1>
                    </div>
                    <div class="mt-4">
                        <h4>Your wishlist is empty.</h4>
                        <p class="text-muted">Create your first wishlist request...</p>
                        <div class="mt-4">
                            <a href="javascript:void(0)" class="btn btn-outline-primary">+ Create new wishlist</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wishlist Popup End -->

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->



@endsection


