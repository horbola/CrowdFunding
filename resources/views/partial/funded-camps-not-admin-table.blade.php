<div id="funded-camps-not-admin-table" class="table-responsive bg-white shadow rounded">
    <table class="display table mb-0 table-center" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Image</th>
                <th>Title</th>
                <th>Raised</th>
                <th>Paid</th>
                <th>View Campaign</th>
            </tr>
        </thead>
        <tbody>
            @php $serial = 0 @endphp
            @foreach($notFundedCamps as $item)
            <tr>
                @php $serial++ @endphp
                <td>{{$serial}}</td>
                <td>$item->image</td>
                <td>{{$item->title}}</td>
                <td>{{$item->totalSuccessfulDonation()}}</td>
                <td>{{$item->totalPaidFund()}}</td>
                <td>
                    <a href="{{route('campaign.showGuestCampaign', ['campaignId' => $item->id, 'user_panel_fraction' => Request::segment(4)])}}">View</a>
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
            </tr>
        </tfoot>
    </table>
</div>