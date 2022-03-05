<div id="funded-camps-not-table" class="table-responsive bg-white shadow rounded">
    <!--<form action="{{ route('withdrawRequest.store') }}" method="post">-->
    <form>
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
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="request_check" onclick="fillReqAmount(this);">
                            </div>
                        </td>
                        <td>
                            <input type="number" name="request_amount" value="{{old('request_amount')}}" onkeypress="checkRequestCheckBox(this);">
                            
                        </td>
                        <td data-name="campaign_id">
                            <input type="hidden" name="campaign_id" value="{{ $item->id }}">
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
                        
                        function checkRequestCheckBox(thiss){
                            var reqCheckElem = $(thiss).closest('tr').find('input[name=request_check]');
                            if( !$(reqCheckElem).is(":checked") )
                                $(reqCheckElem).prop('checked', 'checked');
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
                    <th><button type="button" class="btn btn-primary" onclick="submitData(this);">Withdraw</button></th>
                    <script>
                        function submitData(thiss){
                            var tr = '#funded-camps-not-table tr';
                            var rows = [];
                            $(tr).not(':first,:last').each(function(index, item, array){
                                var col = {};
                                col.campaign_id = $(this).find('input[name=campaign_id]').val();
                                col.request_amount = $(this).find('input[name=request_amount]').val().trim();
                                col.request_check = $(this).find('input[name=request_check]').is(':checked');
                                rows.push(col);
                            });
                            // alert(JSON.stringify(rows));
                            var form = new Form("{{ route('withdrawRequest.store') }}", 'post');
                            form.append('_token', $('meta[name=csrf-token]').attr('content'));
                            form.append('withdraw_request', JSON.stringify(rows));
                            form.submit();
                        }
                    </script>
                </tr>
            </tfoot>
        </table>
    </form>
</div>