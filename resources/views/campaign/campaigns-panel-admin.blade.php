@extends('layout.dashboard')


@section('dashboard-content')
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
                                14
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
                                14
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
                                14
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
                                14
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
                                1050
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
                                50
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
                                50
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            
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
                                1050
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
                                50
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
                                14
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
