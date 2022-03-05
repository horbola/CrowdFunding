<div class="sidebar">
    <div class="sidebar-top-holder  mobile-hide">
        @include('partial.camp-offerus.sidebar-common')
    </div>
    <!-- siderbar bottom -->
    <div class="sidebar-bottom-holder">
        <div class="d-flex justify-content-start">
            <div>
                <img src="{{ $campaign->campaigner->avatar() }}" alt=""  class="img-fluid avatar avatar-md-sm rounded-circle shadow">
            </div>
            <div class="pInfo d-flex align-items-center">
                <div>
                    <p class="name">
                        {{ $campaign->campaigner->name }}
                        @if( $campaign->campaigner->isVolunteer() )
                            <img class="verimg" src="/images/verify.png" alt="">
                        @endif
                    </p>
                    <p class="title">Organizing this Fundraiser</p>
                </div>
            </div>
        </div>
        <div class="about">
            <p>
                <span>About:</span> {{ $campaign->campaigner->about }}
            </p>
        </div>
    </div>
</div>