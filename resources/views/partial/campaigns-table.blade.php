<div id=campaigns-table" class="table-responsive bg-white shadow rounded">
    <table id="campaigns-table" class="table table-center" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Campaigner</th>
                <th>Mobile</th>
                <th>Category</th>
                <th>Title</th>
                <th>Goal</th>
                <th>Status</th>
                <th>Funded</th>
                <th>Details</th>
                @if( isset($option) && $option==='picked' )
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
                $serial = 0;
                if(!is_null($campaigns) && $campaigns->count() && $campaigns instanceof Illuminate\Contracts\Pagination\Paginator)
                    $serial = $campaigns->firstItem() - 1;
            @endphp
            @if(!is_null($campaigns))
                @foreach($campaigns as $campaign)
                <tr>
                    @php $serial++ @endphp
                    <td>{{$serial}}</td>
                    <td>
                        <a href="{{ route('user.show', ['id' => $campaign->campaigner->id, 'user_panel_fraction' => Request::segment(4)]) }}" target="_blank">{{$campaign->campaigner->name}}</a>
                    </td>
                    <td>{{$campaign->campaigner->userExtra->phone}}</td>
                    <td>{{$campaign->category->category_name}}</td>
                    <td>{{$campaign->title}}</td>
                    <td>{{$campaign->goal}}</td>
                    @switch($campaign->status)
                        @case(0) <td>{{'Pending'}}</td>
                            @break
                        @case(1) <td>{{'Approved'}}</td>
                            @break
                        @case(2) <td>{{'Cancelled'}}</td>
                            @break
                        @case(3) <td>{{'Blocked'}}</td>
                            @break
                        @case(4) <td>{{'Declined'}}</td>
                            @break
                        @default
                            'Can\'t Define'
                    @endswitch
                    <td>
                    @switch($campaign->is_funded)
                        @case(0) {{'Not Requested'}}
                            @break
                        @case(1) {{'Requested'}}
                            @break
                        @case(2) {{'Funded'}}
                            @break
                        @case(3) {{'Blocked'}}
                    @endswitch
                    </td>
                    <td>
                        <a href="{{ route('campaign.showGuestCampaign', $campaign->slug) }}" target="_blank">View</a>
                    </td>
                    
                    @if( isset($option) && $option==='picked' )
                    <td>
                        <form class="d-inline" action="{{ route('campaign.updatePickedCampaign', $campaign->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-sm btn-primary">Unpick</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>