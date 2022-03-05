@extends('layouts.app.skel')

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
<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row">
                    <div class="col-12">
                        <div class="tiny-single-item">
                            <div class="tiny-slide"><img src="/images/shop/product/single-2.jpg" class="img-fluid rounded" alt=""></div>
        <!--                    <div class="tiny-slide"><img src="/images/shop/product/single-3.jpg" class="img-fluid rounded" alt=""></div>
                            <div class="tiny-slide"><img src="/images/shop/product/single-4.jpg" class="img-fluid rounded" alt=""></div>
                            <div class="tiny-slide"><img src="/images/shop/product/single-5.jpg" class="img-fluid rounded" alt=""></div>
                            <div class="tiny-slide"><img src="/images/shop/product/single-6.jpg" class="img-fluid rounded" alt=""></div>-->
                        </div>
                    </div>
                    
                    <!-- mobile status -->
                    <div class="col-12 d-md-none">
                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 class="">Ms. Urboshi roy is suffering from a rare type of cancer. Your help may give her new life</h4>
                            </div><!-- ends col -->
                            <div class="col-12 mt-3">
                                <div class="progress-box">
                                    <h6 class="title text-muted"> 10,000 raised of 10,00,000</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                            <div class="progress-value d-block text-muted h6"></div>
                                        </div>
                                    </div>
                                </div> 
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="text-bold small"><i data-feather="book" class="fea icon-sm text-info"></i> 20 days left</li>
                                    <li class="text-bold small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                                </ul>
                            </div><!-- ends col -->
                            <div class="col-12 mt-3">
                                <div class="d-grid">
                                    <a href="#" class="btn btn-pills btn-primary">Donate</a>
                                </div>
                            </div><!-- ends col -->
                            <div class="col-12 mt-1">
                                <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
                                    <li class="text-bold small ps-2"><i data-feather="book" class="fea icon-sm text-info"></i> 1523</li>
                                    <li class="text-bold small pe-2"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102</li>
                                </ul>
                            </div><!-- ends col -->
                            <div class="col-12 mt-2">
                                <div class="d-grid">
                                    <a href="#" class="btn btn-pills btn-primary">Share</a>
                                </div>
                            </div><!-- ends col -->
                            <div class="col-12 mt-3">
                                <div class="d-flex align-items-center">
                                    <a class="pe-3" href="#">
                                        <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                    </a>
                                    <div class="flex-1 commentor-detail">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                        <!--<small class="text-muted">1500 viewed</small>-->
                                        <small class="text-bold small"><i data-feather="clock" class="fea icon-sm text-warning"></i> Noakhali, BD</small>
                                    </div>
                                </div>
                            </div><!-- ends col -->
                        </div>
                    </div> <!-- mobile status col ends -->
                    
                    
                    <div class="col-12 mt-5">
                        <ul class="nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden" id="pills-tab" role="tablist">
                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 active rounded" id="description-data" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Description</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 rounded" id="additional-info" data-bs-toggle="pill" href="#additional" role="tab" aria-controls="additional" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Additional Information</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->

                            <li class="nav-item m-1">
                                <a class="nav-link py-2 px-5 rounded" id="review-comments" data-bs-toggle="pill" href="#review" role="tab" aria-controls="review" aria-selected="false">
                                    <div class="text-center">
                                        <h6 class="mb-0">Review</h6>
                                    </div>
                                </a><!--end nav link-->
                            </li><!--end nav item-->
                        </ul>

                        
                        
                        
                        
                        
                        
                        <!-- info tabs starts -->
                        <div class="tab-content mt-5" id="pills-tabContent">
                            <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-data">
                                <p class="text-muted mb-0">Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters and 'words' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area). For this reason, dummy text usually consists of a more or less random series of words or syllables.</p>
                            </div>

                            <div class="card border-0 tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-info">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="width: 100px;">Color</td>
                                            <td class="text-muted">Red, White, Black, Orange</td>
                                        </tr>

                                        <tr>
                                            <td>Material</td>
                                            <td class="text-muted">Cotton</td>
                                        </tr>

                                        <tr>
                                            <td>Size</td>
                                            <td class="text-muted">S, M, L, XL, XXL</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- comment tab starts -->
                            <div class="card border-0 tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-comments">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="media-list list-unstyled mb-0">
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <a class="pe-3" href="#">
                                                        <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                                    </a>
                                                    <div class="flex-1 commentor-detail">
                                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                                        <small class="text-muted">15th August, 2019 at 01:25 pm</small>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <p class="text-muted fst-italic p-3 bg-light rounded">" Awesome product "</p>
                                                </div>
                                            </li>

                                            <li class="mt-4">
                                                <div class="d-flex align-items-center">
                                                    <a class="pe-3" href="#">
                                                        <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                                    </a>
                                                    <div class="flex-1 commentor-detail">
                                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                                        <small class="text-muted">15th August, 2019 at 01:25 pm</small>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <p class="text-muted fst-italic p-3 bg-light rounded">" Awesome product "</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!--end col-->

                                    <div class="col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                        <form class="ms-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Add your review:</h5>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Review:</label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                                            <textarea id="message" placeholder="Your Comment" rows="5" name="message" class="form-control ps-5" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control ps-5" required="">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input id="email" type="email" placeholder="Email" name="email" class="form-control ps-5" required="">
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="send d-grid">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form><!--end form-->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>
                        </div><!-- info tabs ends -->
                        
                        
                        
                    </div> <!-- info col ends -->
                </div> <!-- main content row ends -->
            </div>
            <div class="col-4 d-none d-md-block">
                <!-- sticky starts -->
                <div class="row ms-md-4 sticky s-box-up-md">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <a class="pe-3" href="#">
                                <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                            </a>
                            <div class="flex-1 commentor-detail">
                                <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                <!--<small class="text-muted">1500 viewed</small>-->
                                <small class="text-bold small"><i data-feather="clock" class="fea icon-sm text-warning"></i> Noakhali, BD</small>
                            </div>
                        </div>
<!--                        <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
                            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Avatar</li>
                            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Mujahidul Islam</li>
                            <li class="text-muted small"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102 viewed</li>
                        </ul>-->
                    </div><!-- ends col -->
                    <div class="col-12 mt-3">
                        <div class="progress-box">
                            <h6 class="title text-muted"> 10,000 raised of 10,00,000</h6>
                            <div class="progress">
                                <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                    <div class="progress-value d-block text-muted h6"></div>
                                </div>
                            </div>
                        </div> 
                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                            <li class="text-bold small"><i data-feather="book" class="fea icon-sm text-info"></i> 20 days left</li>
                            <li class="text-bold small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                        </ul>
                    </div><!-- ends col -->
                    <div class="col-12 mt-5">
                        <div class="">
                            <input type="text" class="form-control" placeholder="Enter Donation Amount"  value="">
                        </div>
                    </div><!-- ends col -->
                    <div class="col-12 mt-3">
                        <div class="d-grid">
                            <a href="#" class="btn btn-pills btn-primary">Donate</a>
                        </div>
                    </div><!-- ends col -->
                    <div class="col-12 mt-3">
                        <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
                            <li class="text-bold small ps-2"><i data-feather="book" class="fea icon-sm text-info"></i> 1523</li>
                            <li class="text-bold small pe-2"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102</li>
                        </ul>
                    </div><!-- ends col -->
                    <div class="col-12 mt-2">
                        <div class="d-grid">
                            <a href="#" class="btn btn-pills btn-primary">Share</a>
                        </div>
                    </div><!-- ends col -->
                </div> <!-- sticky row starts -->
            </div>
        </div>
    </div><!--end container-->
    
    
    
    

    <!-- related products starts -->
    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">Related Products</h5>
            </div><!--end col-->

            <div class="col-12 mt-4">
                <div class="tiny-four-item">
                    <div class="tiny-slide">
                        <div class="card shop-list border-0 position-relative m-2">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-danger">Hot</a></li>
                            </ul>
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s1.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-1.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Branded T-Shirt</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$16.00 <del class="text-danger ms-2">$21.00</del> </h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">                            
                        <div class="card shop-list border-0 position-relative m-2">
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s2.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-2.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Shopping Bag</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$21.00 <del class="text-danger ms-2">$25.00</del> </h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="card shop-list border-0 position-relative m-2">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a></li>
                            </ul>
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s3.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-3.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Elegent Watch</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$5.00 <span class="text-success ms-1">30% off</span> </h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="card shop-list border-0 position-relative m-2">
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s4.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-4.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Casual Shoes</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$18.00 <del class="text-danger ms-2">$22.00</del> </h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="card shop-list border-0 position-relative m-2">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a></li>
                            </ul>
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s5.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-5.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Earphones</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$3.00</h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="card shop-list border-0 position-relative m-2">
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s6.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-6.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Elegent Mug</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$4.50 <del class="text-danger ms-2">$6.50</del> </h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="card shop-list border-0 position-relative m-2">
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s7.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-7.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Sony Headphones</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$9.99 <span class="text-success ms-2">20% off</span> </h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="card shop-list border-0 position-relative m-2">
                            <ul class="label list-unstyled mb-0">
                                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Featured</a></li>
                            </ul>
                            <div class="shop-image position-relative overflow-hidden rounded shadow">
                                <a href="shop-product-detail.html"><img src="/images/shop/product/s8.jpg" class="img-fluid" alt=""></a>
                                <a href="shop-product-detail.html" class="overlay-work">
                                    <img src="/images/shop/product/s-8.jpg" class="img-fluid" alt="">
                                </a>
                                <ul class="list-unstyled shop-icons">
                                    <li><a href="javascript:void(0)" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-product-detail.html" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
                                    <li class="mt-2"><a href="shop-cart.html" class="btn btn-icon btn-pills btn-soft-warning"><i data-feather="shopping-cart" class="icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body content pt-4 p-2">
                                <a href="shop-product-detail.html" class="text-dark product-name h6">Wooden Stools</a>
                                <div class="d-flex justify-content-between mt-1">
                                    <h6 class="text-muted small fst-italic mb-0 mt-1">$22.00 <del class="text-danger ms-2">$25.00</del> </h6>
                                    <ul class="list-unstyled text-warning mb-0">
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- related products ends -->

    
    
    
    
    <div class="container-fluid mt-100 mt-60 px-0">
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="shop-product-detail.html" class="text-dark align-items-center">
                                <span class="pro-icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left fea icon-sm"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></span>
                                <span class="text-muted d-none d-md-inline-block">Web Development</span>
                                <img src="/images/work/6.jpg" class="avatar avatar-small rounded shadow ms-2" style="height:auto;" alt="">
                            </a>

                            <a href="index.html" class="btn btn-lg btn-pills btn-icon btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home icons"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a>

                            <a href="shop-product-detail.html" class="text-dark align-items-center">
                                <img src="/images/work/7.jpg" class="avatar avatar-small rounded shadow me-2" style="height:auto;" alt="">
                                <span class="text-muted d-none d-md-inline-block">Web Designer</span>
                                <span class="pro-icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right fea icon-sm"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
                            </a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div><!--end div-->
    </div>
</section><!--end section-->


@endsection


