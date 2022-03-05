<div id=campaigns-table-area" class="table-responsive bg-white shadow rounded">
    <table id="campaigns-table" class="table table-center" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Campaigner Name</th>
                <th>Country</th>
                <th>Address</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Goal</th>
                <th>End Method</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Is Funded</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $serial = 0 @endphp
            @foreach($campaigns as $campaign)
            <tr>
                @php $serial++ @endphp
                <td>{{$serial}}</td>
                <td>{{$campaign->campaigner->name}}</td>
                <td>{{$campaign->country->nicename}}</td>
                <td>{{$campaign->address}}</td>
                <td>{{$campaign->category->category_name}}</td>
                <td>{{$campaign->title}}</td>
                <td>{{$campaign->short_description}}</td>
                <td>{{$campaign->goal}}</td>
                <td>{{$campaign->end_method}}</td>
                <td>{{$campaign->start_date}}</td>
                <td>{{$campaign->end_date}}</td>
                @switch($campaign->status)
                    @case(0)
                        <td>{{'Pending'}}</td>
                        @break
                    @case(1)
                        <td>{{'Approved'}}</td>
                        @break
                    @case(2)
                        <td>{{'Cancelled'}}</td>
                        @break
                    @case(3)
                        <td>{{'Blocked'}}</td>
                        @break
                    @case(4)
                        <td>{{'Declined'}}</td>
                        @break
                    @default
                        'Can\'t Define'
                @endswitch
                <td>{{$campaign->is_funded}}</td>
                <td>
                    <a href="{{ route('campaign.showGuestCampaign', $campaign->id) }}">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>