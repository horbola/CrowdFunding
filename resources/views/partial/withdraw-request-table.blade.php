<div id="withdraw-request-table" class="table-responsive bg-white shadow rounded">
    @php
        use App\Library\Helper;
    @endphp
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
                <td><small class="text-muted">{{ App\Library\Helper::formattedTime($wRequest->created_at) }}</small></td>
                <td>{{ Helper::formatMoneyFigure($wRequest->totalRequestAmount()) }}</td>
                <td>{{ Helper::formatMoneyFigure($wRequest->totalPaidAmount()) }}</td>
                <td>
                    @php
                        $aPen = $adminPending?? false;
                        $aComp = $adminComp?? false;
                        $aCan = $adminCan?? false;
                    @endphp
                    @if($aPen)
                        <a href="{{route('withdrawRequest.showPendingToAdmin', ['id' => $wRequest->id])}}">View</a>
                    @elseif($aComp)
                        <a href="{{route('withdrawRequest.showCompletedToAdmin', ['id' => $wRequest->id])}}">View</a>
                    @elseif($aCan)
                        <a href="{{route('withdrawRequest.showCancelledToAdmin', ['id' => $wRequest->id])}}">View</a>
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