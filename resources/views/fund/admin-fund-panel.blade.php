@extends('layout.dashboard')


@section('dashboard-content')
@php
    use App\Models\User;
    use App\Models\Donation;
    use App\Models\Campaign;
    use App\Library\Helper;
@endphp
<div id="admin-fund-panel">
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
        </div>
    </div>

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
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure($totalFund) }}</h4>
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
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure($totalReqFund) }}</h4>
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
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure($totalPaidFund) }}</h4>
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
                        <h4 class="title mb-0">{{ Helper::formatMoneyFigure($totalResFund) }}</h4>
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
