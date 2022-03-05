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
                <div class="legend bg-white position-absolute">User Type</div>
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Fundable Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserFundableCampaigns()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Pending Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserPendingCampaigns()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.showCompletelyFundedCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Completely Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserCompletelyFundedCampaigns()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.showPartlyFundedCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                partly Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserPartlyFundedCampaigns()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.showNotFundedCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Not Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserNotFundedCampaigns()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.showFundingBlockedCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Funding Blocked <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalUserFundingBlockedCampaigns()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
                <div class="legend bg-white position-absolute">User Weight</div>
                <a href="{{ route('user.indexDonors') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Fund Raised <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalFund() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexDonors') }}">
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
                
                <a href="{{ route('user.indexCampaigners') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Withdraw <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Auth::user()->totalPaidFundToUser() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexVolunteerRequests') }}">
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
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-muted">Pending Request</h3>
            @include('partial.withdraw-request-table', ['wRequests'=>$wRequestsPend])
        </div>
        <div class="col-12 mt-5">
            <h3 class="text-muted">Completed Request</h3>
            @include('partial.withdraw-request-table', ['wRequests'=>$wRequestsComp])
        </div>
    </div>
</div>
@endsection
