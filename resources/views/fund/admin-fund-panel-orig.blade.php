@extends('layout.dashboard')


@section('dashboard-content')
@php
use App\Models\User;
use App\Models\Donation;
use App\Models\Campaign;
@endphp
<div id="admin-fund-panel">
    @php
        use App\Library\Helper;
    @endphp
    <div class="row">
        <div class="col">
            <!--
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
                                Total Funding-Pended Campaigns <span class="ps-4">:</span>
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
                                Funding Blocked Campaigns <span class="ps-4">:</span>
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
            -->
            
            
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
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
                                {{ Helper::formatMoneyFigure($totalFund) }}
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
                                {{ Helper::formatMoneyFigure($totalReqFund) }}
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
                                {{ Helper::formatMoneyFigure($totalPaidFund) }}
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
                                {{ Helper::formatMoneyFigure($totalResFund) }}
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
            @include('partial.withdraw-request-table', ['wRequests' => $wRequestsPend, 'adminPending' => 'true'])
            @endif
        </div>
        <div class="col-12 mt-5">
            @if($wRequestsComp->count())
            <h3 class="text-muted">Completed Withdraw Request</h3>
            @include('partial.withdraw-request-table', ['wRequests'=>$wRequestsComp, 'adminComp' => 'true'])
            @endif
        </div>
        <div class="col-12 mt-5">
            @if($wRequestsCan->count())
            <h3 class="text-muted">Cancelled Withdraw Request</h3>
            @include('partial.withdraw-request-table', ['wRequests' => $wRequestsCan, 'adminCan' => 'true'])
            @endif
        </div>
    </div>
</div>
@endsection
