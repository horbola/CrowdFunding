<div id="campaign-detail-action-btns">
    @php
        $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
    @endphp
    @if(Auth::check() && Auth::user()->hasRole('campaigner') && (($uri_segments[3] ?? '') === 'my-campaigns-panel'))
    <div class="row mb-5 text-right">
        <div class="col">
            <span><a class="btn btn-primary {{$campaign->status !== 0 ? 'disabled' : ''}}" href="{{route('campaign.edit', [$campaign->id])}}">Edit</a></span>
            <span><button type="button" class="btn btn-primary {{$campaign->isCompleted() ? 'disabled' : ''}}" data-toggle="modal" data-target="#campaignUpdateModel">Update</button></span>
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToCancel', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary" {{$campaign->status !== 0 ? 'disabled' : ''}}>Cancel</button>
                </form>
            </span>
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToDeclined', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary" {{!$campaign->isActive() ? 'disabled' : ''}}>Decline</button>
                </form>
            </span>
        </div>
    </div>
    @endif

    @if(request()->indexInvestigation)
    <div class="row mb-5 text-right">
        <div class="col">
            @php
                $isInvestigated = DB::table('investigations')->where('user_id', Auth::user()->id)->where('campaign_id', $campaign->id)->get()->count();
            @endphp
            <span><a class="btn btn-primary {{$isInvestigated ? 'disabled' : ''}}" href="{{route('investigation.create-form', ['campaignId' => $campaign->id])}}">Upload Investigation info</a></span>
        </div>
    </div>
    @endif


    @if(Auth::check() && Auth::user()->hasRole('staff') && (($uri_segments[3] ?? '') === 'admin-campaign-panel'))
    <div class="row mb-5 text-right">
        <div class="col">
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToApproved', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary" {{$campaign->status !== 0 ? 'disabled' : ''}}>Approve</button>
                </form>
            </span>
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToCancel', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary" {{$campaign->status !== 0 ? 'disabled' : ''}}>Cancel</button>
                </form>
            </span>
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToBlock', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary" {{!$campaign->isActive() ? 'disabled' : ''}}>Block</button>
                </form>
            </span>
        </div>
    </div>
    @endif
</div>
