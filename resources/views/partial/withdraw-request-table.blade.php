<div id="withdraw-request-table" class="table-responsive bg-white shadow rounded">
    <table class="display table mb-0 table-center" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Date</th>
                <th>Request Amount</th>
                <th>Paid Amount</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @php $serial = 0 @endphp
            @foreach($wRequests as $wRequest)
            <tr>
                @php $serial++ @endphp
                <td>{{$serial}}</td>
                <td>{{$wRequest->created_at}}</td>
                <td>{{$wRequest->totalRequestAmount()}}</td>
                <td>{{$wRequest->totalPaidAmount()}}</td>
                <td>
                    @php
                        $ap = $adminPending?? false;
                    @endphp
                    @if($ap)
                        <a href="{{route('withdrawRequest.showToAdmin', ['id' => $wRequest->id])}}">View more</a>
                    @else
                        <a href="{{route('withdrawRequest.show', ['id' => $wRequest->id])}}">View</a>
                    @endif
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
            </tr>
        </tfoot>
    </table>
</div>