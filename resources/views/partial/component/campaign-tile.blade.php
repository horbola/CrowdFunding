<div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden">
    <ul class="label list-unstyled mb-0">
        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">New</a></li>
        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Featured</a></li>
        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning">Sale</a></li>
    </ul>
    <div class="shop-image position-relative">
        <a href="{{ route('campaign.indexGuestCampaign', ['campaignID' => '1']) }}">
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
        