@extends('layout.dashboard')


@section('dashboard-content')
@php
use App\Models\Campaign;
@endphp
<div id="campaigns-panel-admin">
    <div class="row">
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminAllCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">All Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::All()->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminActiveCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Active Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">
                            @php
                                $campaign = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
                                    return $value->isActive();
                                });
                                echo $campaign->count();
                            @endphp
                        </h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminCompletedCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Completed Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">
                            @php
                                $campaign = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
                                    return $value->isCompleted();
                                });
                                echo $campaign->count();
                            @endphp
                        </h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminPendingCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Pending Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(0)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminCancelledCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Cancelled Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(2)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminBlockedCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Blocked Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(3)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminDeclinedCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Declined Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(4)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <hr />
    
    <div class="row">
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexAdminPickedCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Picked Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereIsPicked(true)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <!--
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
                <div class="legend bg-white position-absolute">Campaigns Amount</div>
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Top donated Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Longer Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="javascript:void(0)">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Shorter <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            -->
        </div>
    </div>
</div>
@endsection
