@extends('layout.dashboard')


@section('dashboard-content')
@php
use App\Models\User;
use App\Models\Donation;
use App\Models\Campaign;
@endphp
<div id="campaigner-fund-panel">
    <div class="row">
        <div class="col">
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white">
                <div class="legend bg-white position-absolute">User Weight</div>
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Raised Fund <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalFund() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Requested Fund <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserRequestedFund() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Withdrawn Fund <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalPaidFundToUser() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Residual Fund <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserResidualFund() }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            
            ---------------------------------------------------------------------------
            
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
                <div class="legend bg-white position-absolute">User Type</div>
                @php $fundableCount = Auth::user()->totalUserFundableCampaigns()->count() @endphp
                <a href="{{ route('fund.showFundableCampaigns') }}" style="{{ !$fundableCount ? 'pointer-events: none;' : '' }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Fundable Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $fundableCount }}
                            </div>
                        </div>
                    </div>
                </a>
                
                @php $pendCount = Auth::user()->totalUserPendingCampaigns()->count() @endphp
                <a href="{{ route('fund.showFundingPendedCampaigns') }}" style="{{ !$pendCount ? 'pointer-events: none;' : '' }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Funding-Pended Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $pendCount }}
                            </div>
                        </div>
                    </div>
                </a>
                
                @php $compCount = Auth::user()->totalUserCompletelyFundedCampaigns()->count() @endphp
                <a href="{{ route('fund.showCompletelyFundedCampaigns') }}" style="{{ !$compCount ? 'pointer-events: none;' : '' }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Completely Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $compCount }}
                            </div>
                        </div>
                    </div>
                </a>
                
                @php $partlyCount = Auth::user()->totalUserPartlyFundedCampaigns()->count() @endphp
                <a href="{{ route('fund.showPartlyFundedCampaigns') }}" style="{{ !$partlyCount ? 'pointer-events: none;' : '' }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Partly Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $partlyCount }}
                            </div>
                        </div>
                    </div>
                </a>
                
                @php $notCount = Auth::user()->totalUserNotFundedCampaigns()->count() @endphp
                <a href="{{ route('fund.showNotFundedCampaigns') }}" style="{{ !$notCount ? 'pointer-events: none;' : '' }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Not Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $notCount }}
                            </div>
                        </div>
                    </div>
                </a>
                
                @php $blockedCount = Auth::user()->totalUserFundingBlockedCampaigns()->count() @endphp
                <a href="{{ route('fund.showFundingBlockedCampaigns') }}" style="{{ !$blockedCount ? 'pointer-events: none;' : '' }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Funding-Blocked Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $blockedCount }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
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
