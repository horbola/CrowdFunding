@extends('layout.dashboard')


@section('dashboard-content')
@php
    use App\Models\Campaign;
@endphp
<div id="campaigns-panel-mine">
    <div class="row">
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexMyAllCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">All Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::where('user_id', Auth::user()->id)->count() }}</h4>
                        <style>
                            /*not used*/
                            .key-feature .key-feature-fig {
                                font-size: 23px !important;
                                font-weight: 700;
                                border: 1px solid #adb5bd !important;
                                border-radius: 50px;
                                box-shadow: 0 .5rem 1rem rgba(#000, .15) !important;
                                padding: 5px !important;
                                background-color: #007bff !important;
                                color: #fff !important;
                            }
                        </style>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexMyActiveCampaign') }}">
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
                            $campaign = Campaign::whereStatus(1)->where('user_id', Auth::user()->id)->get()->filter(function ($value, $key) {
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
            <a href="{{ route('campaign.indexMyCompletedCampaign') }}">
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
                            $campaign = Campaign::whereStatus(1)->where('user_id', Auth::user()->id)->get()->filter(function ($value, $key) {
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
            <a href="{{ route('campaign.indexMyPendingCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Pending Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(0)->where('user_id', Auth::user()->id)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexMyCancelledCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Cancelled Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(2)->where('user_id', Auth::user()->id)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexMyBlockedCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Blocked Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(3)->where('user_id', Auth::user()->id)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('campaign.indexMyDeclinedCampaign') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Declined Campaigns</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::whereStatus(4)->where('user_id', Auth::user()->id)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
    </div><!--end row-->
</div>
@endsection

