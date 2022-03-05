@extends('layout.face.skel')


@section('content')
<section class="bg-profile d-table w-100 bg-primary" style="background: url('images/account/bg.png') center center;">
    <div id="donation-model" class="container">
        <form action="{{route('donation.createPaymentInfo')}}" method="get">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Details</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group form-row {{ $errors->has('amount')? 'has-error':'' }}">
                        <label for="amount" class="col-sm-12 col-md-5 form-label pt-md-2">Amount to donate</label>
                        <div class="col-sm-12 col-md-7 form-icon position-relative">
                            <i data-feather="user" class="fea icon-sm icons"></i>
                            <input type="text" class="form-control ps-5" id="amount" value="{{ $request->amount }}" name="amount">
                            {!! $errors->has('amount')? '<p class="help-block">'.$errors->first('amount').'</p>':'' !!}
                        </div>
                    </div>

                    <hr />

                    <div class="text-center text-bold mb-4">Fill these info or
                        <a href="{{route('donation.createPaymentInfoFromLogin', [
                            'campaign_id' => $request->campaign_id,
                            'amount' => $request->amount,
                        ])}}">login</a>
                    </div>

                    <div class="form-group form-row {{ $errors->has('name')? 'has-error':'' }}">
                        <label for="name" class="col-sm-12 col-md-5 form-label pt-md-2">Full Name</label>
                        <div class="col-sm-12 col-md-7 form-icon position-relative">
                            <i data-feather="user" class="fea icon-sm icons"></i>
                            <input type="text" class="form-control ps-5" id="name" value="" name="name">
                            {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                        </div>
                    </div>

                    <div class="form-group form-row {{ $errors->has('email')? 'has-error':'' }}">
                        <label for="email" class="col-sm-12 col-md-5 form-label pt-md-2">Email Address</label>
                        <div class="col-sm-12 col-md-7 form-icon position-relative">
                            <i data-feather="user" class="fea icon-sm icons"></i>
                            <input type="email" class="form-control ps-5" id="email" value="" name="email">
                            {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}
                        </div>
                    </div>

                    <div class="form-group form-row {{ $errors->has('phone')? 'has-error':'' }}">
                        <label for="phone" class="col-sm-12 col-md-5 form-label pt-md-2">Phone Number</label>
                        <div class="col-sm-12 col-md-7 form-icon position-relative">
                            <i data-feather="user" class="fea icon-sm icons"></i>
                            <input type="text" class="form-control ps-5" id="phone" value="" name="phone">
                            {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <label for="address" class="col-sm-12 col-md-5 form-label pt-md-2">Address</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="address" value="{{ 'holding/ road/ thana/ division/ country' }}" name="address">
                            {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                        </div>
                    </div>

                    <hr />
                    
                    
                    <div class="license-agrement">
                        <div class="row">
                            <div class="col-12 mb-3 mt-3 border border-0" style="max-height: 100px; overflow-y: auto;">
                                <p class="form-label">
                                    this is the lincense textthis is the lincense textthis is the lincense text's
                                    this is the lincense textthis is the lincense textthis is the lincense text
                                    this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                    this is the lincense textthis is the lincense textthis is the lincense text
                                    this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                    this is the lincense textthis is the lincense textthis is the lincense text
                                    this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                    this is the lincense textthis is the lincense textthis is the lincense text
                                    this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                    this is the lincense textthis is the lincense textthis is the lincense text
                                    this is the lincense textthis is the lincense textv
                                </p>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="agreed" id="licenseCheckBox" name="licenseCheckBox">
                                        <label class="form-check-label" for="licenseCheckBox">I Accept Terms And Condition</label>
                                        <!--<label class="form-check-label" for="flexCheckDefault">I Accept <a href="javasccript:void(0)" class="text-primary">Terms And Condition</a></label>-->
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-12 text-right">
                                @if(Auth::check())
                                <input name="user_id" type="hidden" value="{{$request->user_id}}">
                                @endif
                                <input name="campaign_id" type="hidden" value="{{$request->campaign_id}}">
                                <input name="amount" type="hidden" value="{{$request->amount}}">
                                <span class="">
                                    <button id="complete-donation-btn" type="submit" class="btn btn-primary" disabled>Complete Donation</button>
                                </span>
                            </div><!--end col-->
                            <script>
                                $(document).ready(function() {
                                    $("#licenseCheckBox").click(function() {
                                        if ($(this).is(":checked")) {
                                            $("#complete-donation-btn").prop('disabled', false);
                                        } else {
                                              $("#complete-donation-btn").prop('disabled', true);
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection