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
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            @php $fundableCount = Auth::user()->totalUserFundableCampaigns()->count() @endphp
            <!--<a href="{{ route('fund.showFundableCampaigns') }}" style="{{ !$fundableCount ? 'pointer-events: none;' : '' }}">-->
            <a href="{{ route('fund.showFundableCampaigns') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Total Fundable Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $fundableCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            @php $pendCount = Auth::user()->totalUserPendingCampaigns()->count() @endphp
            <a href="{{ route('fund.showFundingPendedCampaigns') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Total Funding-Pended Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $pendCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            @php $compCount = Auth::user()->totalUserCompletelyFundedCampaigns()->count() @endphp
            <a href="{{ route('fund.showCompletelyFundedCampaigns') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Completely Funded Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $compCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            @php $partlyCount = Auth::user()->totalUserPartlyFundedCampaigns()->count() @endphp
            <a href="{{ route('fund.showPartlyFundedCampaigns') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Partly Funded Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $partlyCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            @php $notCount = Auth::user()->totalUserNotFundedCampaigns()->count() @endphp
            <a href="{{ route('fund.showNotFundedCampaigns') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Not Funded Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ $notCount }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            @php $blockedCount = Auth::user()->totalUserFundingBlockedCampaigns()->count() @endphp
            <a href="{{ route('fund.showFundingBlockedCampaigns') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Funding-Blocked Campaigns</h4>
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
</div>
@endsection
