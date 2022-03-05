@extends('layout.face.skel')


@section('content')
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div id="payment-info-dialogue">
            <form method="post" novalidate>
                @csrf
                <div class="form-group form-row {{ $errors->has('amount')? 'has-error':'' }}">
                    <label for="amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Donation Amount<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                        <i data-feather="dollar-sign" class="fea icon-sm icons"></i>
                        <input type="text" class="form-control ps-5" id="amount" value="{{ $request->amount }}" name="amount" placeholder="@lang('app.amount')" maxlength="255" readonly>
                        {!! $errors->has('amount')? '<p class="help-block text-bold text-danger">'.$errors->first('amount').'</p>':'' !!}
                        <!--<p class="text-info"> You can change your mind for donation amount </p>-->
                    </div>
                </div>
                <div class="form-group form-row">
                    <label for="amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">As Anonymous</label>
                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                        <i data-feather="eye-off" class="fea icon-sm icons"></i>
                        <input type="text" class="form-control ps-5" id="amount" value="{{ $request->anonymous === 'Yes'? 'Yes' : 'Open' }}" name="amount" maxlength="255" readonly>
                        <p class="text-info p-0"> {{ $request->anonymous === 'Yes'? 'No one can see your name' : 'Everyone can see your name' }} </p>
                    </div>
                </div>
                
                @if(Auth::check())
                <input name="user_id" type="hidden" value="{{$request->user_id}}">
                @endif
                <input name="campaign_id" type="hidden" value="{{$request->campaign_id}}">
                <input name="amount" type="hidden" value="{{$request->amount}}">
                <div class="form-row">
                    <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                            token="if you have any token validation"
                            postdata="your javascript arrays or objects which requires in backend"
                            order="If you already have the transaction generated for current order"
                            endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.user_id = $('input[name=user_id]').val();
        obj.campaign_id = '{{$request->campaign_id}}';
        obj.amount = '{{$request->amount}}';
        obj.anonymous = '{{$request->anonymous}}';

        $('#sslczPayBtn').prop('postdata', obj);

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>
</section>
@endsection