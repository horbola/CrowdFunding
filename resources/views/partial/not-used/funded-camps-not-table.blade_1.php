<div id="funded-camps-not-table" class="table-responsive bg-white shadow rounded">
    <!--<form action="{{ route('withdrawRequest.store') }}" method="post">-->
    @php
        use Illuminate\Support\Facades\Form;
    @endphp
    {{Form::open( ['action'=>route('withdrawRequest.store'), 'method'=>'post'] )}}
        @csrf
        <table class="display table mb-0 table-center" style="width:100%">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Raised</th>
                    <th>Paid</th>
                    <th>View Campaign</th>
                    <th>Include to withdraw request</th>
                    <th>Request Amount</th>
                </tr>
            </thead>
            <tbody>
                    @php $serial = 0 @endphp
                    @foreach($not as $item)
                    <tr>
                        @php $serial++ @endphp
                        <td>{{$serial}}</td>
                        <td>$item->image</td>
                        <td>{{$item->title}}</td>
                        <td id="raised-fund">{{$item->totalSuccessfulDonation()}}</td>
                        <td>{{$item->totalPaidFund()}}</td>
                        <td><a href="{{route('campaign.showGuestCampaign', ['campaignId' => $item->id, 'user_panel_fraction' => Request::segment(4)])}}">View</a></td>
                        <td data-name="request_check">
                            <div class="form-check">
                                <!--<input class="form-check-input" type="checkbox" name="request_check" onclick="fillReqAmount(this);">-->
                                {{Form::checkbox('items[][request_check]', '', ['id'=>'request_check', 'class' => 'form-check-input', 'onclick'=>'fillReqAmount(this);'])}}
                            </div>
                        </td>
                        <td data-name="request_amount">
                            <!--<input type="number" name="request_amount" value="{{old('request_amount')}}">-->
                            {{Form::number('items[][request_amount]', '', ['id'=>'request_amount', 'class' => 'form-control', 'placeholder'=>'', 'value'=>old("request_amount")])}}
                            
                        </td>
                        <td data-name="campaign_id">
                            <input type="hidden" name="campaign_id" value="{{ $item->id }}">
                            {{Form::hidden('items[][campaign_id]', '', ['id'=>'campaign_id', 'value'=>$item->id])}}
                        </td>
                    </tr>
                    @endforeach
                    <script>
                        function fillReqAmount(thiss){
                            var raisedFund = $(thiss).closest('tr').find('#raised-fund').text();
                            var reqAmountElem = $(thiss).closest('tr').find('input[name=request_amount]');

                            if( $(thiss).is(":checked") && ($(reqAmountElem).val() !== 0) )
                                $(reqAmountElem).val(raisedFund);
                            else $(reqAmountElem).val(0);
                        }
                    </script>
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
                    <th><button type="submit" class="btn btn-primary">Withdraw</button></th>
                </tr>
            </tfoot>
        </table>
    <!--</form>-->
    {{Form::close()}}
</div>