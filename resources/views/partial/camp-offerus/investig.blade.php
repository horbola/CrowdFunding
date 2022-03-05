<!-- investigation -->
<div class="invst-area">
    <div class="heading text-center">
        <h2>Investigation Report</h2>
    </div>
    @if($campaign->investigation)
        <div class="person-holder d-flex justify-content-start">
            <div class="person-image">
                <img src="{{$campaign->investigation->investigator->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
            </div>
            <div class="person-info">
                <p class="name">{{$campaign->investigation->investigator->name}}</p>
                <p class="date"><i class="fas fa-clock"></i>{{App\Library\Helper::formattedTime($campaign->investigation->created_at)}}</p>
            </div>
        </div>
        <div class="invComment">
            <p>{{$campaign->investigation->text_report}}</p>
        </div>



        <!-- This variable is defined in 'action-buttons.blade.php' -->
        @php
            $showInvAppCanBtn = $campaign->investigation
            && Auth::user()
            && Auth::user()->is_admin === 1
            && $campaign->investigation->postedInvReport()
            && $campaign->investigation->is_verified === 'no';
            $invId = $campaign->investigation? $campaign->investigation->id : 0;
        @endphp
        @if( $showInvAppCanBtn )
        <div class="btns text-center">
            <form class="d-inline" action="{{route('investigation.updateApproval', $invId)}}" method="post">
                @csrf
                @method('patch')
                <button type="submit" class="btn-dark-p mx-2">Approve</button>
            </form>
            <form class="d-inline" action="{{route('investigation.updateCancel', $invId)}}" method="post">
                @csrf
                @method('patch')
                <button type="submit" class="btn-dark-p mx-2">Cancel</button>
            </form>
        </div>
        @else
        <div class="btns text-center">
            <a class="btn-dark-p mx-2" href="javascript:void(0)" title="peoples-review" onclick="goToComment(this);">Peoples Review</a>
            <a class="btn-dark-p mx-2" href="javascript:void(0)" title="your-review" onclick="goToComment(this);">Add Your Review</a>
        </div>
        <script>
            function goToComment(thiss){
                if($(thiss).attr('title') === 'peoples-review'){
                    window.scrollTo(0, $('#peoples-review').offset().top - 250);
                }
                else window.scrollTo(0, $('#your-review').offset().top - 200);
            }
        </script>
        @endif
    @else
        <p class="text-muted fst-italic mt-3 rounded">There's no investigation report. This campaign is not verified yet</p>
    @endif
</div>