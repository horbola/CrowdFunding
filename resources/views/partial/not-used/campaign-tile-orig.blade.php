<div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden">
    <ul class="label list-unstyled mb-0">
        @if(Route::currentRouteName() === 'campaign.indexViewedCampaign')
        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">Viewed: {{$campaign->count}}</a></li>
        @endif
        @if(Route::currentRouteName() === 'campaign.indexDonatedCampaign')
            @if(Auth::check() && (Auth::user()->id === $campaign->user_id))
            <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Donated: {{$campaign->count}}-Own</a></li>
            @else
            <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Donated: {{$campaign->count}}</a></li>
            @endif
        @endif
        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning"></a></li>
    </ul>
    <div class="shop-image position-relative">
        <a href="{{ route('campaign.showGuestCampaign', ['campaignId' => $campaign->id, 'indexInvestigation' => request()->indexInvestigation]) }}">
            <img src="/images/course/1.jpg" class="card-img-top" alt="...">
            <div class="overlay bg-dark"></div>
        </a>
        <ul class="list-unstyled shop-icons">
            <li>
                <button type="button" class="btn btn-icon btn-pills btn-soft-danger {{$campaign->hasLiked() ? 'active' : ''}}" onclick="createLike(this, {{$campaign->id}} )">
                    <i data-feather="heart" class="icons"></i>
                </button>
            </li>
            <!--
            <li>
                <form action="" method="post">
                    @csrf
                    <button type="submit" class="btn btn-icon btn-pills btn-soft-danger"><i data-feather="heart" class="icons"></i></<button>
                </form>
            </li>
            <li class="mt-2"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productview" class="btn btn-icon btn-pills btn-soft-primary"><i data-feather="eye" class="icons"></i></a></li>
            -->
        </ul>
        <div class="teacher d-flex align-items-center">
            <img src="/images/client/01.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
            <div class="ms-2">
                <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">{{ $campaign->campaigner->name }}</a></h6>
                <p class="text-light small my-0">{{ $campaign->campaigner->location() }}</p>
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
        <h5 class="mt-2"><a href="javascript:void(0)" class="title text-dark">{{ $campaign->title }}</a></h5>
        <p class="text-muted">{{ $campaign->short_description }}</p>
        <div class="progress-box">
            @php
                $totalDonation = $campaign->totalSuccessfulDonation(true);
                $goal = $campaign->goal;
                $parcent = ((100/$goal) * $totalDonation);
            @endphp
            <div class="d-flex justify-content-between">
                <h6 class="title text-muted">{{$totalDonation}} raised of {{$goal}}</h6>
                <span class="d-block">{{$parcent}}%</span>
            </div>
            <div class="progress">
                <div class="progress-bar position-relative bg-primary" style="width:0%;">
                    <div class="progress-value d-block text-muted h6"></div>
                </div>
                <script>$('.progress-bar').css('width', '{{ $parcent }}%')</script>
            </div>
        </div> 
        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
            <li class="text-bold small d-flex align-items-center"><i data-feather="book" class="fea icon-sm text-info me-1"></i> {{$campaign->daysLeft()}}</li>
            <li class="text-bold small d-flex align-items-center"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i>{{$campaign->donorsCount()}} Donors</li>
        </ul>
    </div>
    <script>
        function createLike(thiss, campaignId){
            $.ajax({
                url: `/update-like/${campaignId}`,
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){
                    if(data.created){
                        $(thiss).text('like');
                        $(thiss).addclass('active');
                    }
                    else {
                        $(thiss).text('not');
                        $(thiss).removeclass('active');
                    }
                }
            });
        }
    </script>
</div> <!--end card / course-blog-->




