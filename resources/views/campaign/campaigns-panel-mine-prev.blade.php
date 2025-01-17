@extends('layout.dashboard')


@section('dashboard-content')
@php
    use App\Models\Campaign;
@endphp
<div id="campaigns-panel-mine">
    <div class="row">
        <div class="col">
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white">
                <div class="legend bg-white position-absolute">User Type</div>
                
                <a href="{{ route('campaign.indexMyAllCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                All Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::where('user_id', Auth::user()->id)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexMyActiveCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Active Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                @php
                                $campaign = Campaign::whereStatus(1)->where('user_id', Auth::user()->id)->get()->filter(function ($value, $key) {
                                    return $value->isActive();
                                });
                                echo $campaign->count();
                                @endphp
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexMyCompletedCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Completed Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                @php
                                $campaign = Campaign::whereStatus(1)->where('user_id', Auth::user()->id)->get()->filter(function ($value, $key) {
                                    return $value->isCompleted();
                                });
                                echo $campaign->count();
                                @endphp
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexMyPendingCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Pending Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(0)->where('user_id', Auth::user()->id)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexMyCancelledCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Cancelled Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(2)->where('user_id', Auth::user()->id)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexMyBlockedCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Blocked Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(3)->where('user_id', Auth::user()->id)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexMyDeclinedCampaign') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Declined Campaigns <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::whereStatus(4)->where('user_id', Auth::user()->id)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

