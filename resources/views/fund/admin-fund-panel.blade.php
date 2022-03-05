@extends('layout.dashboard')


@section('dashboard-content')
@php
use App\Models\User;
use App\Models\Donation;
use App\Models\Campaign;
@endphp
<div id="admin-fund-panel">
    <div class="row">
        <div class="col">
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white">
                <div class="legend bg-white position-absolute">User Type</div>
                <a href="{{ route('fund.indexFundableCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Fundable Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $fundableCamps->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.indexPendingCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Pending Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $pendingCamps->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.indexCompFundedCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Completely Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $compCamps->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.indexPartlyFundedCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                partly Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $partlyCamps->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.indexNotFundedCampaigns') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Not Funded Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $notCamps->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('fund.indexFundingBlockedCamps') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Funding Blocked <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ $blockedCamps->count() }}
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
                                {{ $totalFund }}
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
                                {{ $totalReqFund }}
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
                                {{ $totalPaidFund }}
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
                                {{ $totalResFund }}
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
            @include('partial.withdraw-request-table', ['wRequests' => $wRequestsPend, 'adminPending' => 'true'])
        </div>
        <div class="col-12 mt-5">
            <h3 class="text-muted">Completed Request</h3>
            @include('partial.withdraw-request-table', ['wRequests'=>$wRequestsComp])
        </div>
    </div>
</div>
@endsection
