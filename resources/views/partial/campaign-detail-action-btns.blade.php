<div id="campaign-detail-action-btns">
    @php
        $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
    @endphp
    @if(Auth::check() && (Auth::user()->id === $campaign->campaigner->id) && (($uri_segments[3] ?? '') === 'my-campaigns-panel'))
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

    @if(Auth::check() && Auth::user()->is_volunteer && request()->indexInvestigation)
    <div class="row mb-5 text-right">
        <div class="col">
            @php
                $isInvestigated = DB::table('investigations')->where('user_id', Auth::user()->id)->where('campaign_id', $campaign->id)->get()->count();
            @endphp
            <span><a class="btn btn-primary {{$isInvestigated ? 'disabled' : ''}}" href="{{route('investigation.create-form', ['campaignId' => $campaign->id])}}">Upload Investigation info</a></span>
        </div>
    </div>
    @endif


    @if(Auth::check() && Auth::user()->is_admin && (($uri_segments[3] ?? '') === 'admin-campaign-panel'))
    <div class="row mb-5 text-right">
        <div class="col">
            @if($campaign->status === 0 | $campaign->isActive())
            <span>
                <form class="d-inline" action="{{route('campaign.edit', [$campaign->id])}}" method="get">
                    @csrf
                    <input type="hidden" name="adminCampaignMenu" value="true">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </span>
            @endif
            
            @if($campaign->status === 0)
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToApproved', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary">Approve</button>
                </form>
            </span>
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToCancel', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary">Cancel</button>
                </form>
            </span>
            @endif
            
            @if($campaign->isActive())
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToBlock', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary">Block</button>
                </form>
            </span>
            @endif
            
            <span>
                <form class="d-inline" action="{{route('campaign.delete', [$campaign->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </span>
        </div>
    </div>
    @endif
</div>
