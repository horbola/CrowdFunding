<div id="withdraw-request-detail-table" class="table-responsive bg-white shadow rounded">
    <table class="display table mb-0 table-center" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Title</th>
                <th>Raised</th>
                <th>Requested</th>
                <th>Paid</th>
                <th>Msg</th>
                <th>View Campaign</th>
            </tr>
        </thead>
        <tbody>
            @php $serial = 0 @endphp
            @foreach($wRequest->withdrawRequestItems()->get() as $item)
            <tr>
                @php $serial++ @endphp
                <td>{{$serial}}</td>
                <td>{{$item->campaign->title}}</td>
                <td>{{$item->campaign->totalSuccessfulDonation()}}</td>
                <td>{{$item->requested_amount}}</td>
                <td>{{$item->paid_amount}}</td>
                <td>{{$item->block_msg}}</td>
                <td>
                    <a href="{{route('campaign.showGuestCampaign', ['campaignId' => $item->campaign_id, 'user_panel_fraction' => Request::segment(4)])}}">View</a>
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
            </tr>
        </tfoot>
    </table>
</div>