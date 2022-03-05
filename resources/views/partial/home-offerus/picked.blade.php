<!-- trending slider -->
<section class="container-fluid trending-slider">
    @php
        use App\Models\Donation;
        use App\Library\Helper;
    @endphp
    <div class="container offer">
        <div class="heading text-center">
            <h2>Trending Fundraisers</h2>
        </div>
        <div class="position-relative">
            <div class=" Trending">
                @foreach($camps as $camp)
                <!-- singulat -->
                <div class="post-body">
                    <a class="wrapped" href="{{ route('campaign.showGuestCampaign', ['campaignSlug' => $camp->slug]) }}">
                        <div class="link-wrapper">
                            <div class="blog-image">
                                <img src="{{ $camp->feature_image }}" alt="">
                            </div>
                            @php
                                $totalDonation = $camp->totalSuccessfulDonation(true);
                                $goal = $camp->goal;
                                $parcent = ((100/$goal) * $totalDonation);
                            @endphp
                            <div class="progressbar">
                                <svg class="radial-progress" data-percentage="{{ $parcent }}" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 10"></circle>
                                    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">{{ round($parcent) }}%</text>
                                </svg>
                            </div>
                            <div class="blog-content">
                                <h3>{{ $camp->title }}</h3>
                                <p class="postCnt">{{ $camp->short_description }}</p>
                            </div>

                            <div class="sec-grp">
                                <div class="text-muted">Raised: {{ Helper::formatMoneyFigure($camp->totalSuccessfulDonation()) }}</div>
                                <div class="text-muted">Goal: {{ Helper::formatMoneyFigure($camp->goal) }}</div>
                            </div>
                        </div>
                    </a>

                    <div class="trendingBnts darkp">
                        <a class="btn-dark-p" href="{{ route('campaign.showGuestCampaign', $camp->slug) }}">Donate Now</a>
                        <a class="btn-mild-p" href="javascript:void(0)"><img src="images/icons/heart.png" alt=""> @php echo Donation::all()->unique('user_id')->count(); @endphp Donors </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-arrows d-none d-md-block">
                <button class="slider-prev-1"><i class="fas fa-arrow-left"></i></button>
                <button class="slider-next-2"><i class="fas fa-arrow-right"></i></button>
            </div>
            <style>
                .post-body .link-wrapper {
                    width: 100%;
                    height: 100%;
                }
                .post-body .link-wrapper h3 {
                    color: #212529;
                }
            </style>
        </div>
    </div>
</section>
<!-- end -->