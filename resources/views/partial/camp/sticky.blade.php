<div class="row ms-md-4 s-box-up-md">
    @php
        use App\Library\Helper;
    @endphp
    <div class="col-12">
        <div class="d-flex align-items-center">
            <a class="pe-3" href="#">
                <img src="{{$campaign->campaigner->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
            </a>
            <div class="flex-1 commentor-detail">
                <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$campaign->campaigner->name}}</a></h6>
                <!--<small class="text-muted">1500 viewed</small>-->
                <span class="text-bold small d-flex align-items-center"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i><span>{{$campaign->campaigner->location()}}</span></span>
            </div>
        </div>
        <!--
        <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Avatar</li>
            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Mujahidul Islam</li>
            <li class="text-muted small"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102 viewed</li>
        </ul>
        -->
    </div><!-- ends col -->
    <div class="col-12 mt-4">
        <div class="progress-box">
            @php
                $totalDonation = $campaign->totalSuccessfulDonation(true);
                $goal = $campaign->goal;
                $parcent = ((100/$goal) * $totalDonation);
            @endphp
            <div class="d-flex justify-content-between">
                <h6 class="title text-muted">{{ Helper::formatMoneyFigure($totalDonation)}} raised of {{ Helper::formatMoneyFigure($goal) }}</h6>
                <span class="d-block">{{ round($parcent) }}%</span>
            </div>
            <div class="progress">
                <div class="progress-bar-landrick position-relative bg-primary" style="width:0%;">
                    <div class="progress-value d-block text-muted h6"></div>
                </div>
            </div>
        </div>
        <style>
            /*this style is actually landrick style. but brought here becaue of collition with bootsrap progress-bar.*/
            .progress-bar-landrick {
                border-radius: 6px;
                -webkit-animation: animate-positive 3s;
                animation: animate-positive 3s;
                overflow: visible !important;
            }
        </style>
        <script>$('.progress-bar-landrick').css('width', '{{ $parcent }}%')</script>
        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
            <li class="text-bold small d-flex align-items-center"><i data-feather="book" class="fea icon-sm text-info me-1"></i> {{$campaign->daysLeft()}}</li>
            <li class="text-bold small d-flex align-items-center"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i>{{$campaign->donorsCount()}} Donations</li>
        </ul>
    </div><!-- ends col -->

    <div class="col-12">
        <!--this is quick amount component. the style and script for this component is below-->
        <div class="donation-amount">
            <form action="{{route('donation.createDialogues')}}" method="get">
                @csrf
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="">
                            <input type="text" name="amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                        </div>
                    </div><!-- ends col -->
                    <div class="col-12 my-2">
                        <div class="quick-amount">
                            <div class="wrapper">
                                @foreach($campaign->parseAmountPrefilled() as $amount)
                                <span class="outer" onclick="enterAmount(this)"><span class="inner">{{$amount}}</span></span>
                                @endforeach
                            </div>
                        </div>
                    </div><!-- ends col -->
                    @if(Auth::check())
                    <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                    @endif
                    <input name="campaign_id" type="hidden" value="{{$campaign->id}}">
                    <input name="anonymous" type="hidden" value="Open">
                    <div class="col-12">
                        <div class="d-grid">
                            <button id="donation-model-btn" type="submit" class="btn btn-pills btn-primary" {{ !$campaign->isActive()? 'disabled' : '' }}>
                                Donate
                                <span class="anonymous float-right" onclick="anonymous(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="Donate As Anonymous"><i data-feather="eye-off" class=""></i></span>
                                <script> function anonymous(thiss){ $(thiss).closest('form').find('input[name=anonymous]').val('Yes'); } </script>
                            </button>
                        </div>
                    </div><!-- ends col -->
                </div>
            </form>
        </div>
    </div>

    <div class="col-12 mt-3">
        <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
            <li class="text-bold small d-flex align-items-center ms-3"><i data-feather="book" class="fea icon-sm text-info me-1"></i>{{$campaign->viewsCount()}}</li>
            <li class="text-bold small d-flex align-items-center me-3"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i>{{$campaign->likesCount()}}</li>
        </ul>
    </div><!-- ends col -->
    <div class="col-12 mt-2">
        <div class="d-grid">
            <button class="btn btn-pills btn-primary" {{ !$campaign->isActive()? 'disabled' : '' }}>Share</button>
        </div>
    </div><!-- ends col -->
</div> <!-- sticky row ends -->


<!--this style is for quick amount component-->
@section('campaign-detail-sticky-style')
<style>
    .quick-amount {
        display: flex;
        justify-content: center;
        padding: 0 5px;
        margin-right: auto;
    }
    
    .quick-amount .outer {
        display: inline-block;
        width: 44px;
        height: 44px;
        position: relative;
        border: 1px solid #a1a1a1;
        border-radius: 100%;
        margin: 0 1px;
        cursor: pointer;
    }
    .quick-amount .outer:hover {
        background-color: #f3f3f3;
    }
    
    .quick-amount .inner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endsection


<!--this script is for quick amount component-->
@section('campaign-detail-sticky-script-bottom')
<script>
    function enterAmount(thiss){
        $(thiss).siblings().css('box-shadow', 'none');
        $(thiss).css('box-shadow', '1px 1px 2px 2px rgba(0, 0, 0, 0.15)');
        $(thiss).closest('form').find('input[name=amount]').val($(thiss).children().text()).focus();
    }
</script>
@endsection