@extends('layout.dashboard')


@section('dashboard-content')
@php
    use App\Models\User;
    use App\Models\Donation;
    use App\Models\Campaign;
    use App\Library\Helper;
@endphp
<div id="campaigner-fund-panel">
    <div class="row">
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="javascript:void(0)">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Total Raised Fund</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure(Auth::user()->totalFund()) }}</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="javascript:void(0)">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Total Requested Fund</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure(Auth::user()->totalUserRequestedFund()) }}</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="javascript:void(0)">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Total Withdrawn Fund</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure(Auth::user()->totalPaidFundToUser()) }}</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="javascript:void(0)">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Residual Fund</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure(Auth::user()->totalUserResidualFund()) }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
        
    <hr />
         
    <div class="row">
        <!--<div class="col-lg-6 col-md-12 mt-4 pt-2">-->
        <div class="col-12 mt-4 pt-2">
            @php $notCount = Auth::user()->totalUserNotFundedCampaigns()->count() @endphp
            <a href="{{ route('fund.showNotFundedCampaigns') }}">
                <div class="d-flex key-feature p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Withdraw Fund From These New Campaigns</h4>
                        <div class="foot-note">
                            This category includes the campaigns from which you never withdrawn money. 
                            If you withdraw money partially then camps from this category goes to the partial categroy. 
                            Initially this camps are included in the total category also.
                        </div>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $notCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 mt-4 pt-2">
            @php $partlyCount = Auth::user()->totalUserPartlyFundedCampaigns()->count() @endphp
            <a href="{{ route('fund.showPartlyFundedCampaigns') }}">
                <div class="d-flex key-feature p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Withdraw Rest Of The Money From These Campaigns</h4>
                        <div class="foot-note">
                            This category includes the campaigns from which you have withdrawn money partially, but still there are money within this campaigns. 
                            Campaigns from this category are also included in total category.
                        </div>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $partlyCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 mt-4 pt-2">
            @php $fundableCount = Auth::user()->totalUserFundableCampaigns()->count() @endphp
            <!--<a href="{{ route('fund.showFundableCampaigns') }}" style="{{ !$fundableCount ? 'pointer-events: none;' : '' }}">-->
            <a href="{{ route('fund.showFundableCampaigns') }}">
                <div class="d-flex key-feature p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Withdraw Fund From These Total Campaigns</h4>
                        <div class="foot-note">This category includes total campaigns from which you have withdrawn money partially or not withdrawn at all</div>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $fundableCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 mt-4 pt-2">
            @php $pendCount = Auth::user()->totalUserPendingCampaigns()->count() @endphp
            <a href="{{ route('fund.showFundingPendedCampaigns') }}">
                <div class="d-flex key-feature p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">These Campaigns Are Pending With Withdraw Request</h4>
                        <div class="foot-note">
                            You already have made some withdraw request from this campaigns. The long the campaigns are pending,
                            The long the campaigns stays within this category. Depending on the the results, campaigns from this category 
                            may go to either completely funded or partially funded or blocked category.
                        </div>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $pendCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 mt-4 pt-2">
            @php $compCount = Auth::user()->totalUserCompletelyFundedCampaigns()->count() @endphp
            <a href="{{ route('fund.showCompletelyFundedCampaigns') }}">
                <div class="d-flex key-feature p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">These Campaigns Are Completely Funded</h4>
                        <div class="foot-note">You have withdrawn money completely from this campaigns</div>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $compCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-12 mt-4 pt-2">
            @php $blockedCount = Auth::user()->totalUserFundingBlockedCampaigns()->count() @endphp
            <a href="{{ route('fund.showFundingBlockedCampaigns') }}">
                <div class="d-flex key-feature p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Campaigns Which Are Blocked From Funding</h4>
                        <div class="foot-note">You can not withdraw money from these campaigns. These are blocked for malfunction. Contact the authority to correct issues</div>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $blockedCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <hr />
    
    <div class="row mt-5">
        <div class="col-12">
            @if($wRequestsPend->count())
            <h3 class="text-muted">Pending Withdraw Request</h3>
            @include('partial.withdraw-request-table', ['wRequests' => $wRequestsPend])
            @endif
        </div>
        <div class="col-12 mt-5">
            @if($wRequestsComp->count())
            <h3 class="text-muted">Completed Withdraw Request</h3>
            @include('partial.withdraw-request-table', ['wRequests' => $wRequestsComp])
            @endif
        </div>
        <div class="col-12 mt-5">
            @if($wRequestsCan->count())
            <h3 class="text-muted">Cancelled Withdraw Request</h3>
            @include('partial.withdraw-request-table', ['wRequests' => $wRequestsCan])
            @endif
        </div>
    </div>
    
    <style>
        .foot-note {
            font-size: .7em;
            color: #101010;
            line-height: 1.3em;
            padding-right: 4em;
        }
    </style>
</div>
@endsection
