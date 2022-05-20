<div id="campaign-detail-action-btns">
    @php
        $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
    @endphp
    
    <!--------- campaigner buttons ------------------------------------------------------------------------------------------------------->
    {{--@if(Auth::check() && (Auth::user()->id === $campaign->campaigner->id) && (($uri_segments[3] ?? '') === 'my-campaigns-panel'))--}}
    @php
        $showCampBtns = Auth::check()
        && (Auth::user()->id === $campaign->campaigner->id)
        && ( (($uri_segments[3] ?? '') === 'my-campaigns-panel') || request()->editing );
    @endphp
    @if($showCampBtns)
    <div class="row mb-5 text-right">
        <div class="col">
            <span><a class="btn btn-primary {{ (int)$campaign->status !== 0 ? 'disabled' : '' }}" href="{{route('campaign.edit', [$campaign->id])}}">Edit</a></span>
            <span><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#campaignUpdateModel" {{$campaign->isCompleted() ? 'disabled' : ''}}>Update</button></span>
            <!-- cancel button will appear only before a campaign been active -->
            @if( (int)$campaign->status === 0 )
            <span>
                <form class="d-inline" action="{{route('campaign.campaigner.updateStatusToCancelled', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary" {{ (int)$campaign->status !== 0 ? 'disabled' : '' }}>Cancel</button>
                </form>
            </span>
            @endif
            
            <!-- decline button will appear only after a campaign been active -->
            @if( (int)$campaign->status !== 0 )
            <span>
                <form class="d-inline" action="{{route('campaign.campaigner.updateStatusToDeclined', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary" {{!$campaign->isActive() ? 'disabled' : ''}}>Decline</button>
                </form>
            </span>
            @endif
        </div>
    </div>
    @endif
    <!--------- campaigner buttons ends ------------------------------------------------------------------------------------------------------->

    
    
    
    <!--------- volunteer buttons ------------------------------------------------------------------------------------------------------->
    @php
        $isPosted = $campaign->investigation && $campaign->investigation->postedInvReport();
        $isInvestigated = $campaign->investigation && $campaign->investigation->isInvestigated();
        $showUpInvRepBtn = Auth::check() 
        && (int)Auth::user()->is_volunteer 
        && request()->indexInvestigation
        && !$isInvestigated;
    @endphp
    @if($showUpInvRepBtn)
    <div class="row mb-5 text-right">
        <div class="col">
            <span>
                <form class="d-inline" action="{{route('investigation.create-form')}}" method="get">
                    @csrf
                    <input type="hidden" name="campaignId" value="{{$campaign->id}}">
                    <button type="submit" class="btn btn-primary" {{$isPosted ? 'disabled' : ''}}>Upload Investigation Info</button>
                </form>
            </span>
        </div>
    </div>
    @endif
    <!--------- volunteer buttons ends ------------------------------------------------------------------------------------------------------->


    
    <!--------- admin buttons ------------------------------------------------------------------------------------------------------->
    @php
        $showAdminBtns = Auth::check()
        && (int)Auth::user()->is_admin
        && ( ($uri_segments[3] ?? '') === 'admin-campaign-panel' || session('approving') || request()->editing ); //request()->approving === 'yes' (doesn't work, but is valid)
    @endphp
    @if($showAdminBtns)
    <div class="row mb-5 text-right">
        <div class="col">
            @if( (int)$campaign->status === 0 | $campaign->isActive() )
            <span>
                <form class="d-inline" action="{{route('campaign.edit', ['id' => $campaign->id])}}" method="get">
                    @csrf
                    <input type="hidden" name="menuName" value="campaign">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </span>
            @endif
            
            @if( (int)$campaign->status === 0 )
            <span>
                <form class="d-inline" action="{{route('campaign.updateStatusToApproved', [$campaign->id])}}" method="post">
                    @csrf
                    @method('patch')
                    @if($isInvestigated)
                        <button type="submit" class="btn btn-primary">Approve</button>
                    @else
                        <button type="button" class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#invCheckModel">Approve</button>
                    @endif
                </form>
            </span>
            
            <!-- cancel button will appear only before a campaign been active -->
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
                @if( !(int)$campaign->is_picked )
                <span>
                    <form class="d-inline" action="{{ route('campaign.updatePickedCampaign', $campaign->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary">Pick</button>
                    </form>
                </span>
                @endif
            @endif
            
            <!-- delete button will appear only after a campaign been active -->
            @if( (int)$campaign->status !== 0 )
            <span>
                <form class="d-inline" action="{{route('campaign.delete', [$campaign->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </span>
            @endif
        </div>
    </div>
    @endif
    <!--------- admin buttons ends ------------------------------------------------------------------------------------------------------->
    

    <!-- Investigation checking modal -->
    <div class="modal fade" id="invCheckModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Investigation Report is not chekced</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You did not check the investigation report for this campaign. To approve this campaign you have to review the investigation report.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
