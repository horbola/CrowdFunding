{{-- <div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden" onclick="clickCampTile('{{ route('campaign.showGuestCampaign', $campaign->id) }}', '{{request()->indexInvestigation}}', 'get');"> --}}
<div class="card blog shop-list rounded border-0 shadow-lg overflow-hidden">
    @php
        use App\Library\Helper;
    @endphp
    <ul class="label list-unstyled mb-0">
        @if((Route::currentRouteName() === 'campaign.indexGuestCampaign') && $campaign->isVerified())
            <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Verified {{$campaign->count}}</a></li>
        @elseif(Route::currentRouteName() === 'campaign.indexViewedCampaign')
            <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-primary">Viewed: {{$campaign->count}}</a></li>
        @elseif(Route::currentRouteName() === 'campaign.indexDonatedCampaign')
            @if(Auth::check() && (Auth::user()->id === $campaign->user_id))
                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Donated: {{$campaign->count}}-Own</a></li>
            @else
                <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-success">Donated: {{$campaign->count}}</a></li>
            @endif
        @endif
        <li><a href="javascript:void(0)" class="badge badge-link rounded-pill bg-warning"></a></li>
    </ul>
    <div class="shop-image position-relative">
        <a href="{{ route('campaign.showGuestCampaign', ['campaignSlug' => $campaign->slug, 'indexInvestigation' => request()->indexInvestigation]) }}">
            <img src="{{ $campaign->feature_image }}" class="card-img-top" alt="...">
            <div class="overlay bg-dark"></div>
        </a>
        <ul class="list-unstyled shop-icons">
            <li>
                <button type="button" class="btn btn-icon btn-pills btn-soft-danger" onclick="createLike(this, {{$campaign->id}} )">
                    <i class="far {{$campaign->hasLiked() ? 'fa-heart' : 'fa-thumbs-up'}}  "></i>
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
            <div class="ms-2">
                <h6 class="mb-0"><a href="javascript:void(0)" class="text-light user">{{ $campaign->campaigner->name }}</a></h6>
                <p class="text-light small my-0 py-0">{{ $campaign->campaigner->location() }}</p>
            </div>
        </div>
        <!--
        <div class="course-fee bg-info text-center shadow-lg rounded-circle">
            <a href="javascript:void(0)" class="text-primary fee">
                <i data-feather="heart" class="icons"></i>
            </a>
        </div>
        -->
    </div>
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <a href="{{ route('campaign.showGuestCampaign', ['campaignSlug' => $campaign->slug, 'indexInvestigation' => request()->indexInvestigation]) }}" class="title text-dark">
        <div class="card-body content">
            <h5 class="mt-2">{{ $campaign->title }}</h5>
            <p class="text-muted">{{ $campaign->short_description }}</p>
            <div class="progress-box">
                @php
                    $totalDonation = $campaign->totalSuccessfulDonation(true);
                    $goal = $campaign->goal;
                    $parcent = ((100/$goal) * $totalDonation);
                @endphp
                <div class="d-flex justify-content-between">
                    <h6 class="title text-muted">{{ Helper::formatMoneyFigure($totalDonation)}} raised of {{ Helper::formatMoneyFigure($goal) }}</h6>
                    <span class="d-block">{{round($parcent)}}%</span>
                </div>
                <div class="progress">
                    <div class="progress-bar position-relative bg-primary" style="width:0%;">
                        <div class="progress-value d-block text-muted h6"></div>
                    </div>
                    <script>$('.progress-bar').css('width', '{{ $parcent }}%')</script>
                </div>
            </div> 
            <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                <li class="text-bold small d-flex align-items-center"><i data-feather="book" class="fea icon-sm text-info me-1"></i> {{$campaign->completionStatus()}}</li>
                <li class="text-bold small d-flex align-items-center"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i>{{$campaign->donorsCount()}} Donors</li>
            </ul>
        </div>
    </a>
    <!--
    <script>
        function clickCampTile(location, indexInvestigation, method){
            var form = new Form(location, method);
            if(indexInvestigation){
                form.append('indexInvestigation', indexInvestigation);
            }
            form.submit();
        }
    </script>
    -->
</div> <!--end card / course-blog-->




