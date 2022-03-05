<div id="pending-req-table" class="table-responsive bg-white shadow rounded">
    <form>
        <table class="display table mb-0 table-center" style="width:100%">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Title</th>
                    <th>Raised</th>
                    <th>Paid</th>
                    <th>Requested</th>
                    <th>View Campaign</th>
                    <th>Payable Amount</th>
                    <th>Is Blocked</th>
                    <th>Block Message</th>
                </tr>
            </thead>
            <tbody>
                    @php $serial = 0 @endphp
                    @foreach($wRequest->withdrawRequestItems as $item)
                    <tr>
                        @php $serial++ @endphp
                        <td>{{$serial}}</td>
                        <td>{{$item->campaign->title}}</td>
                        <td>{{$item->campaign->totalSuccessfulDonation()}}</td>
                        <td>{{$item->campaign->totalPaidFund()}}</td>
                        <td class="req-amount">{{$item->requested_amount}}</td>
                        <td><a href="{{route('campaign.showGuestCampaign', ['campaignSlug' => $item->campaign->slug, 'user_panel_fraction' => Request::segment(4)])}}">View</a></td>
                        <td><input type="number" name="payable_amount" class="form-control" style="min-width: 150px;" value="{{ old('payable_amount')? old('payable_amount') : $item->requested_amount }}" onkeyup="calcTotalPayable();"></td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_blocked" onclick="writeBlockMsg(this);">
                            </div>
                        </td>
                        <td><input type="text" name="block_msg" class="form-control" value="{{old('block_msg')}}"></td>
                        <td><input type="hidden" name="campaign_id" value="{{ $item->campaign->id }}"></td>
                    </tr>
                    @endforeach
                    <script>
                        function writeBlockMsg(thiss){
                            var $blockMsgElem = $(thiss).closest('tr').find('input[name=block_msg]');
                            var $payableElem = $(thiss).closest('tr').find('input[name=payable_amount]');
                            var $reqAmountElem = $(thiss).closest('tr').find('.req-amount');
                            
                            if( $(thiss).is(":checked") ){
                                $payableElem.val(0);
                                $blockMsgElem.focus();
                            }
                            else $($payableElem).val($reqAmountElem.text());
                            
                            calcTotalPayable();
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
                    <th>Total</th>
                    <th id="totalPayable" class="d-inline-block ps-4"></th>
                    <script>
                        $(calcTotalPayable);
                        function calcTotalPayable(){
                            var payables = $('#pending-req-table input[name=payable_amount]');
                            var total = 0;
                            payables.each(function(index, item){
                                total += Number($(item).val());
                            });
                            $('#totalPayable').text(total);
                        }
                    </script>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        
        <div class="pay mt-5">
            <!------ Bank Information ------------------------------------------------------------------------------------------------------------------------>
            <div class="row">
                <div class="col">
                    <div class="mb-5">
                        @if($wRequest->user->currentPayMethType() === 'Bank')
                        <h3 id="bank-info-title" class="d-inline border border-3 rounded-3 p-2 ml-3 text-info">Bank Info</h3>
                        @elseif($wRequest->user->currentPayMethType() === 'MobileBank')
                        <h3 id="bank-info-title" class="d-inline border border-3 rounded-3 p-2 ml-3 text-info">Mobile Bank Info</h3>
                        @endif
                        
                        <div class="dropdown float-right">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Add New Bank</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="dropdown-item" id="bank-btn">Bank</li>
                                <li class="dropdown-item disabled" id="mobile-bank-btn">Mobile Bank</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!----------------- new form ------------------------->
                    <div class="new-form">
                        <div class="new-bank d-none">
                            <h5 class="text-center pb-2">Enter New Bank Information</h5>
                            <div>
                                <div class="form-group form-row {{ $errors->has('bank_name')? 'has-error' : '' }}">
                                    <label for="bank_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Bank Name<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="bank_name" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->bank_name : '' }}" name="bank_name" placeholder="ex: 01xxx 567 890" maxlength="255">
                                        {!! $errors->has('bank_name')? '<p class="help-block">'.$errors->first('bank_name').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group form-row {{ $errors->has('bank_swift_code')? 'has-error' : '' }}">
                                    <label for="bank_swift_code" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Bank Routing Number<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="bank_swift_code" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->bank_swift_code : '' }}" name="bank_swift_code" placeholder="ex: 01xxx 567 890" maxlength="255">
                                        {!! $errors->has('bank_swift_code')? '<p class="help-block">'.$errors->first('bank_swift_code').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group form-row {{ $errors->has('branch_name')? 'has-error' : '' }}">
                                    <label for="branch_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Branch Name<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="branch_name" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->branch_name : '' }}" name="branch_name" placeholder="ex: 01xxx 567 890" maxlength="255">
                                        {!! $errors->has('branch_name')? '<p class="help-block">'.$errors->first('branch_name').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group form-row {{ $errors->has('branch_swift_code')? 'has-error' : '' }}">
                                    <label for="branch_swift_code" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Branch Routing Number<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="branch_swift_code" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->branch_swift_code : '' }}" name="branch_swift_code" placeholder="ex: 01xxx 567 890" maxlength="255">
                                        {!! $errors->has('branch_swift_code')? '<p class="help-block">'.$errors->first('branch_swift_code').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group form-row {{ $errors->has('acc_number')? 'has-error' : '' }}">
                                    <label for="acc_number" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Account number<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="acc_number" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->acc_number : '' }}" name="acc_number" placeholder="ex: 01xxx 567 890" maxlength="255">
                                        {!! $errors->has('acc_number')? '<p class="help-block">'.$errors->first('acc_number').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="new-mobile-bank d-none">
                            <h5 class="text-center pb-2">Enter New Mobile Bank Information</h5>
                            <div>
                                <div class="form-group form-row {{ $errors->has('brand_name')? 'has-error' : '' }}">
                                    <label for="brand_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Brand Name<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <select class="form-select form-control ps-5" name="brand_name">
                                            <option value="bkash" selected>Bkash</option>
                                            <option value="bkash">Bkash</option>
                                            <option value="nagad">Nagad</option>
                                            <option value="rocket">Rocket</option>
                                            <option value="upay">Upay</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group form-row {{ $errors->has('mobile_number')? 'has-error' : '' }}">
                                    <label for="mobile_number" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Mobile Number<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="mobile_number" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->mobile_number : '' }}" name="mobile_number" placeholder="ex: 01xxx 567 890" maxlength="255">
                                        {!! $errors->has('mobile_number')? '<p class="help-block">'.$errors->first('mobile_number').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bank-common-field d-none">
                            <div>
                                <div class="form-group form-row {{ $errors->has('owner_name')? 'has-error' : '' }}">
                                    <label for="owner_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Owner Name<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="owner_name" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->owner_name : '' }}" name="owner_name" placeholder="ex: Saif Khsn Faysal" maxlength="255">
                                        {!! $errors->has('owner_name')? '<p class="help-block">'.$errors->first('owner_name').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group form-row {{ $errors->has('owner_nid')? 'has-error' : '' }}">
                                    <label for="owner_nid" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Owner Nid<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="owner_nid" value="{{ $wRequest->user->currentPayMeth()? $wRequest->user->currentPayMeth()->owner_nid : '' }}" name="owner_nid" placeholder="ex: 1990751105700003" maxlength="255">
                                        {!! $errors->has('owner_nid')? '<p class="help-block">'.$errors->first('owner_nid').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="new_pay_meth" value="false">
                        <input type="hidden" name="pay_meth_type" value="">
                    </div>
                    <!----------------- new form ends ------------------------->
                    
                    <!----------------- bank info ------------------------->
                    <div class="bank-info">
                        @if($wRequest->user->currentPayMethType() === 'Bank')
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Bank Name<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->bank_name}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Bank Routing Number<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->bank_swift_code}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Branch Name<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->branch_name}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Branch Swift Code<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->branch_swift_code}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Owner Name<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->owner_name}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Owner NID<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->owner_nid}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Account Number<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->acc_number}}</div>
                            </div>
                        @elseif($wRequest->user->currentPayMethType() === 'MobileBank')
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Brand Name<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->brand_name}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Mobile Number<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->mobile_number}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Owner Name<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->owner_name}}</div>
                            </div>
                            <div class="row my-3">
                                <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Owner NID<span> : </span></div>
                                <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$wRequest->user->currentPayMeth()->owner_nid}}</div>
                            </div>
                        @endif
                    </div>
                    <!----------------- bank info ends------------------------->
                    <script>
                        $(function(){
                            adaptBankInfoTitle();
                            
                            function adaptBankInfoTitle(){
                                if( '{{$wRequest->user->currentPayMethType()}}' === 'Bank' )
                                    $('.pay #bank-info-title').text('Bank Info');
                                else if( '{{$wRequest->user->currentPayMethType()}}' === 'MobileBank' )
                                    $('.pay #bank-info-title').text('Mobile Bank Info');
                            }
                            function bootPay(){
                                $('.pay .new-bank').addClass('d-none');
                                $('.pay .new-mobile-bank').addClass('d-none');
                                $('.pay .bank-common-field').addClass('d-none');
                                $('.pay .bank-info').addClass('d-none');
                            }
                            function bootNewPayMeth(){
                                $('.pay .bank-common-field').removeClass('d-none');
                                $('.pay input[name=new_pay_meth]').val('true');
                                $('.pay #bank-info-title').text('See Current Bank Info');
                            }
                            
                            // Banking info title adaptation
                            $('.pay #bank-info-title').click(function(event){
                                bootPay();
                                $('.pay .bank-info').removeClass('d-none');
                                $('.pay input[name=new_pay_meth]').val('false');
                                $('.pay input[name=pay_meth_type]').val('');
                                adaptBankInfoTitle();
                            });
                            
                            // new banking info buttons
                            $('.pay #bank-btn').click(function(event){
                                bootPay();
                                $('.pay .new-bank').removeClass('d-none');
                                bootNewPayMeth();
                                $('.pay input[name=pay_meth_type]').val('bank');
                            });
                            $('.pay #mobile-bank-btn').click(function(event){
                                bootPay();
                                $('.pay .new-mobile-bank').removeClass('d-none');
                                bootNewPayMeth();
                                $('.pay input[name=pay_meth_type]').val('mobile-bank');
                            });
                        });
                    </script>
                </div>
            </div>
            <!------ Bank Information ends ------------------------------------------------------------------------------------------------------------------------>
            
            <!------ Transaction Information ------------------------------------------------------------------------------------------------------------------------>
            <div class="row" style="margin-top: 50px;">
                <div class="col">
                    <h3>Transaction Information</h3>
                    <div>
                        <div class="form-group form-row {{ $errors->has('trans_id')? 'has-error' : '' }}">
                            <label for="trans_id" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Transaction ID<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="trans_id" value="{{ old('trans_id') }}" name="trans_id" placeholder="ex: 1990751105700003" maxlength="255">
                                {!! $errors->has('trans_id')? '<p class="help-block">'.$errors->first('trans_id').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!------ Transaction Information ends ------------------------------------------------------------------------------------------------------------------------>
            
            <div class="text-right" style="margin-top: 20px;">
                <button type="button" class="btn btn-primary" onclick="submitData(this);">Pay</button>
                <script>
                    function submitData(thiss){
                        var tr = '#pending-req-table tr';
                        var rows = [];
                        $(tr).not(':first,:last').each(function(index, item, array){
                            var col = {};
                            col.campaign_id = $(this).find('input[name=campaign_id]').val();
                            col.payable_amount = $(this).find('input[name=payable_amount]').val().trim();
                            col.is_blocked = $(this).find('input[name=is_blocked]').is(':checked');
                            col.block_msg = $(this).find('input[name=block_msg]').val().trim();
                            rows.push(col);
                        });
                        var pay_meth_type = $('#pending-req-table').find('input[name=pay_meth_type]').val().trim();
                        var trans_id = $('#pending-req-table').find('input[name=trans_id]').val().trim();
                        
                        var new_pay_meth = $('#pending-req-table').find('input[name=new_pay_meth]').val().trim();
                        var bank_name = $('#pending-req-table').find('input[name=bank_name]').val().trim();
                        var bank_swift_code = $('#pending-req-table').find('input[name=bank_swift_code]').val().trim();
                        var branch_name = $('#pending-req-table').find('input[name=branch_name]').val().trim();
                        var branch_swift_code = $('#pending-req-table').find('input[name=branch_swift_code]').val().trim();
                        var acc_number = $('#pending-req-table').find('input[name=acc_number]').val().trim();
                        var brand_name = $('#pending-req-table').find('select[name=brand_name]').val().trim();
                        var mobile_number = $('#pending-req-table').find('input[name=mobile_number]').val().trim();
                        var owner_name = $('#pending-req-table').find('input[name=owner_name]').val().trim();
                        var owner_nid = $('#pending-req-table').find('input[name=owner_nid]').val().trim();

                        var form = new Form("{{ route('withdrawPayment.store', $wRequest->id) }}", 'post');
                        form.append('_token', $('meta[name=csrf-token]').attr('content'));
                        form.append('withdraw_request', JSON.stringify(rows));
                        form.append('withdraw_request_id', '{{ $wRequest->id }}');
                        form.append('pay_meth_type', pay_meth_type);
                        form.append('trans_id', trans_id);
                        
                        form.append('new_pay_meth', new_pay_meth);
                        form.append('bank_name', bank_name);
                        form.append('bank_swift_code', bank_swift_code);
                        form.append('branch_name', branch_name);
                        form.append('branch_swift_code', branch_swift_code);
                        form.append('acc_number', acc_number);
                        
                        form.append('brand_name', brand_name);
                        form.append('mobile_number', mobile_number);
                        
                        form.append('owner_name', owner_name);
                        form.append('owner_nid', owner_nid);
                        form.submit();
                    }
                </script>
            </div>
        </div>
    </form>
</div>