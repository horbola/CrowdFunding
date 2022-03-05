@extends('layout.dashboard')


@section('dashboard-content')
@php
use App\Models\Campaign;
@endphp
<div id="campaigns-panel-admin">
    <div class="row">
        <div class="col">
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white">
                <div class="legend bg-white position-absolute">Campaign Status</div>
                <a href="{{ route('campaign.indexAdminAllCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                All Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::All()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminActiveCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Active Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                @php
                                $campaign = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
                                    return $value->isActive();
                                });
                                echo $campaign->count();
                                @endphp
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminCompletedCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Completed Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                @php
                                $campaign = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
                                    return $value->isCompleted();
                                });
                                echo $campaign->count();
                                @endphp
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminPendingCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Pending Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(0)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminCancelledCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Cancelled Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(2)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminBlockedCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Blocked Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(3)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminDeclinedCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Declined Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(4)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
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
