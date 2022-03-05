<!-- trending slider -->
<section style="background-image: url(/images/trend.png)!important;" class="container-fluid  trending-slider ">
    <div class="container offer ">
        <div class="heading text-center">
            <h2 class="text-white">Related Campaign</h2>
        </div>
        <div class="position-relative">
            <div class="slider-3">
            @if($campaign->related()->count())
                @foreach($campaign->related() as $campaign)
                <div class="post-body" data-url="{{ route('campaign.showGuestCampaign', ['campaignSlug' => $campaign->slug, 'indexInvestigation' => request()->indexInvestigation]) }}">
                    <!--<style scoped="scoped" onload="glasspane(this.parentElement, event);"></style>-->
                    <a class="wrapped" href="{{ route('campaign.showGuestCampaign', ['campaignSlug' => $campaign->slug, 'indexInvestigation' => request()->indexInvestigation]) }}">
                        <div class="link-wrapper">
                            <div class="blog-image">
                                <img src="{{ $campaign->feature_image }}" alt="">
                            </div>
                            <div class="progressbar">
                                <svg class="radial-progress" data-percentage="60" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
                                    <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">28%</text>
                                </svg>
                            </div>
                            <div class="blog-content">
                                <h3>{{ $campaign->title }}</h3>
                                <p class="postCnt">
                                    {{ $campaign->short_description }}
                                </p>
                            </div>

                            <div class="sec-grp d-flex justify-content-between">
                                @php
                                    $totalDonation = $campaign->totalSuccessfulDonation(true);
                                    $goal = $campaign->goal;
                                    $parcent = ((100/$goal) * $totalDonation);
                                @endphp
                                <p>Raised {{$totalDonation}} out of {{$goal}}</p>
                            </div>
                        </div>
                    </a>
                    <div class="trendingBnts">
                        <a class="btn-dark-p" href="{{route('donation.createDialogues', ['amount'=>1000, 'campaign_id'=>$campaign->id])}}">Donate Now </a>
                        <a class="btn-mild-p" href="#"><img src="/images/icons/heart.png" alt="">{{$campaign->donorsCount()}}</a>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
            <div class="slider-arrows d-none d-md-block">
                <button class="slider-prev"><i class="fas fa-arrow-left"></i></button>
                <button class="slider-next"><i class="fas fa-arrow-right"></i></button>
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