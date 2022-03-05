<div class="col-12 d-md-none">
    <div class="row mt-2">
        <div class="col-12">
            <h4 class="">{{$campaign->short_description}}</h4>
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
                <li class="text-bold small"><i data-feather="book" class="fea icon-sm text-info"></i> {{$campaign->daysLeft()}} days left</li>
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
                    <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$campaign->campaigner->name}}</a></h6>
                    <!--<small class="text-muted">1500 viewed</small>-->
                    <small class="text-bold small"><i data-feather="clock" class="fea icon-sm text-warning"></i> Noakhali, BD</small>
                </div>
            </div>
        </div><!-- ends col -->
    </div>
</div> <!-- mobile status col ends -->