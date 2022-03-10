@extends('layout.dashboard')


@section('dashboard-content')
<div id="add-pay-meth">
    <!------ Bank Information ------------------------------------------------------------------------------------------------------------------------>
    <div class="row">
        <div class="col">
            <div class="mb-5">
                <h3 id="bank-info-title" class="d-inline">Bank Information</h3>
                <div class="dropdown float-right">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Payment Method Type</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="dropdown-item" id="bank-btn">Bank</li>
                        <li class="dropdown-item disabled" id="mobile-bank-btn">Mobile Bank</li>
                    </ul>
                </div>
            </div>

            <!----------------- new form ------------------------->
            <form action="{{ route('paymentMethod.store') }}" method="post">
            @csrf
            <div class="new-form">
                <div class="new-bank">
                    <div>
                        <div class="form-group form-row {{ $errors->has('bank_name')? 'has-error' : '' }}">
                            <label for="bank_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Bank Name<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="bank_name" value="{{ old('bank_name')}}" name="bank_name" placeholder="ex: 01xxx 567 890" maxlength="255">
                                {!! $errors->has('bank_name')? '<p class="help-block">'.$errors->first('bank_name').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                    <!--
                    <div>
                        <div class="form-group form-row {{ $errors->has('bank_swift_code')? 'has-error' : '' }}">
                            <label for="bank_swift_code" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Bank Routing Number<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="bank_swift_code" value="{{ old('bank_swift_code') }}" name="bank_swift_code" placeholder="ex: 01xxx 567 890" maxlength="255">
                                {!! $errors->has('bank_swift_code')? '<p class="help-block">'.$errors->first('bank_swift_code').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                    -->
                    <div>
                        <div class="form-group form-row {{ $errors->has('branch_name')? 'has-error' : '' }}">
                            <label for="branch_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Branch Name<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="branch_name" value="{{ old('branch_name') }}" name="branch_name" placeholder="ex: 01xxx 567 890" maxlength="255">
                                {!! $errors->has('branch_name')? '<p class="help-block">'.$errors->first('branch_name').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                    <!--
                    <div>
                        <div class="form-group form-row {{ $errors->has('branch_swift_code')? 'has-error' : '' }}">
                            <label for="branch_swift_code" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Branch Routing Number<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="branch_swift_code" value="{{ old('branch_swift_code') }}" name="branch_swift_code" placeholder="ex: 01xxx 567 890" maxlength="255">
                                {!! $errors->has('branch_swift_code')? '<p class="help-block">'.$errors->first('branch_swift_code').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                    -->
                    <div>
                        <div class="form-group form-row {{ $errors->has('acc_number')? 'has-error' : '' }}">
                            <label for="acc_number" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Account number<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="acc_number" value="{{ old('acc_number') }}" name="acc_number" placeholder="ex: 01xxx 567 890" maxlength="255">
                                {!! $errors->has('acc_number')? '<p class="help-block">'.$errors->first('acc_number').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-mobile-bank d-none">
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
                                <input type="text" class="form-control ps-5" id="mobile_number" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="ex: 01xxx 567 890" maxlength="255">
                                {!! $errors->has('mobile_number')? '<p class="help-block">'.$errors->first('mobile_number').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bank-common-field">
                    <div>
                        <div class="form-group form-row {{ $errors->has('owner_name')? 'has-error' : '' }}">
                            <label for="owner_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Owner Name<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="owner_name" value="{{ old('owner_name') }}" name="owner_name" placeholder="ex: Saif Khsn Faysal" maxlength="255">
                                {!! $errors->has('owner_name')? '<p class="help-block">'.$errors->first('owner_name').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group form-row {{ $errors->has('owner_nid')? 'has-error' : '' }}">
                            <label for="owner_nid" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Owner Nid<span class="text-danger">* </span> <span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="owner_nid" value="{{ old('owner_nid') }}" name="owner_nid" placeholder="ex: 1990751105700003" maxlength="255">
                                {!! $errors->has('owner_nid')? '<p class="help-block">'.$errors->first('owner_nid').'</p>' : '' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="pay_meth_type" value="bank">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
            <script>
                /*
                $(function(){
                    function bootPayMeth(){
                        $('#add-pay-meth .new-bank').addClass('d-none');
                        $('#add-pay-meth .new-mobile-bank').addClass('d-none');
                    }

                    $('#add-pay-meth #bank-btn').click(function (event) {
                        bootPayMeth();
                        $('#add-pay-meth .new-bank').removeClass('d-none');
                        $('#add-pay-meth input[name=pay_meth_type]').val('bank');
                        $('#add-pay-meth #bank-info-title').text('Bank Information');
                    });
                    $('#add-pay-meth #mobile-bank-btn').click(function (event) {
                        bootPayMeth();
                        $('#add-pay-meth .new-mobile-bank').removeClass('d-none');
                        $('#add-pay-meth input[name=pay_meth_type]').val('mobile-bank');
                        $('#add-pay-meth #bank-info-title').text('Mobile Bank Information');
                    });
                });
                */
            </script>
        </div>
    </div>
</div>
@endsection
