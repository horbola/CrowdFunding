<div id="campaign-tabs">
    <ul class="nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden" id="pills-tab" role="tablist">
        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 active rounded" id="description-data" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">
                <div class="text-center">
                    <h6 class="mb-0">Description</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->

        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 rounded" id="document-info" data-bs-toggle="pill" href="#document" role="tab" aria-controls="additional" aria-selected="false">
                <div class="text-center">
                    <h6 class="mb-0">Documents</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->

        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 rounded" id="update-number" data-bs-toggle="pill" href="#update" role="tab" aria-controls="review" aria-selected="false">
                <div class="text-center">
                    <h6 class="mb-0">Updates</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->

        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 rounded" id="donor-comments" data-bs-toggle="pill" href="#donor" role="tab" aria-controls="review" aria-selected="false">
                <div class="text-center">
                    <h6 class="mb-0">Donors</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->
    </ul>

    <!-- info tabs starts -->
    <div class="tab-content mt-5" id="pills-tabContent">
        <!--description tab starts-->
        <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-data">
            <div class="descrip">
                <p class="text-muted mb-0">{{ $campaign->description }}</p>
            </div>
            <hr />
            
            <div class="investigation">
                <h4 class="text-center">Investigation Report</h4>
                <div class="d-flex align-items-center mt-3">
                    <a class="pe-3" href="#">
                        <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                    </a>
                    <div class="flex-1 commentor-detail">
                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                        <small class="text-muted">15th August, 2019 at 01:25 pm</small>
                    </div>
                </div>
                <p class="text-muted fst-italic mt-3 p-3 bg-light rounded">{{$campaign->investigation->text_report}}</p>
            </div>
            <hr />
            
            <div class="reviw mt-5">
                <div class="row">
                    <div class="col text-center">
                        <a href="#peoples-review" class="btn btn-primary">People's Reviews</a>
                        <a href="#your-review" class="btn btn-primary">Add Your Review</a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div id="peoples-review" class="col-12">
                        <ul class="media-list list-unstyled mb-0">
                            @include('partial.component.comments-display', ['comments' => $campaign->comments])
                        </ul>
                    </div><!--end col-->

                    <div id="your-review" class="col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                        <form class="ms-lg-4" action="{{route('comment.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5>Add your review:</h5>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Review:</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                            <textarea id="message" placeholder="Your Comment" rows="5" name="body" class="form-control ps-5" required></textarea>
                                            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
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
        </div>
        <!--description tab ends-->

        <!--document tab starts-->
        <div class="card border-0 tab-pane fade" id="document" role="tabpanel" aria-labelledby="additional-info">
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
        <!--document tab endss-->

        <!--update tab starts-->
        <div class="card border-0 tab-pane fade" id="update" role="tabpanel" aria-labelledby="additional-info">
            <div class="col-12">
                <div class="quick-input">
                    <form action="{{route('donation.store', ['campaignId' => $campaign->id])}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-5">
                                <div class="">
                                    <input type="text" name="amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                                </div>
                            </div><!-- ends col -->
                            <div class="col-12 mt-5">
                                <div class="quick-amount">
                                    <input type="text" name="quick-amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                                </div>
                            </div><!-- ends col -->
                            <div class="col-12 mt-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-pills btn-primary">Donate</button>
                                </div>
                            </div><!-- ends col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--update tab ends-->

        <!-- donor tab starts -->
        <div class="card border-0 tab-pane fade" id="donor" role="tabpanel" aria-labelledby="review-comments">
            <ul class="list-unstyled">
                @foreach($campaign->donations as $donation)
                <li class="mt-4 ml-3">
                    <div class="d-flex align-items-center mt-3">
                        <a class="pe-3" href="#">
                            <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                        </a>
                        <div class="flex-1 commentor-detail">
                            <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$donation->donor->name}}</a></h6>
                            <small class="text-muted">15th August, 2019 at 01:25 pm</small>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- donor tab starts -->
    </div><!-- info tabs content ends -->
</div>