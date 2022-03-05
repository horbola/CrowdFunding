@extends('layouts.charity.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('content')
    <section class="campaign-details-wrap">
        @include('single_campaign_header')
        <div class="container">

            {{ Form::open(['class' => 'form-horizontal', 'files' => true]) }}
            <div class="row">
                <div class="col-md-8">

                    <div class="checkout-wrap">

                        <div class="contributing-to">
                            <p class="contributing-to-name"><strong> @lang('app.you_are_contributing_to') {{$campaign->user->name}}</strong></p>
                            <h3>{{$campaign->title}}</h3>

                            @if( ! Auth::check())
                                <p class="guest_checkout_text"><strong> @lang('app.guest_checkout') <span class="text-muted">@lang('app.or')</span> <a href="{{route('login')}}">@lang('app.log_in')</a> </strong></p>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('full_name')? 'has-error':'' }}">
                            <div class="col-sm-6 pt-5">
                                <input type="text" class="form-control" id="full_name" value="@if(Auth::check()){{auth()->user()->name}}@else{{ old('full_name') }}@endif" name="full_name" placeholder="@lang('app.full_name')" required="required">
                                {!! $errors->has('full_name')? '<p class="help-block">'.$errors->first('full_name').'</p>':'' !!}
                            </div>
                            <div class="col-sm-6 pt-5">
                                <input type="email" class="form-control" id="email" value="@if(Auth::check()){{auth()->user()->email}}@else{{ old('email') }}@endif" name="email" placeholder="@lang('app.email')" required="required">
                                {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}
                            </div>
                            <div class="col-sm-6 pt-5">
                                <input type="phone" class="form-control" id="phone" value="@if(Auth::check()){{auth()->user()->phone}}@else{{ old('phone') }}@endif" name="phone" placeholder="@lang('app.phone')" required="required">
                                {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                            </div>
                            <div class="col-sm-6 pt-5">
                                <input type="text" class="form-control" id="address" value="@if(Auth::check()){{auth()->user()->address}}@else{{ old('address') }}@endif" name="address" placeholder="address" required="required">
                                {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                            </div>
                        </div>
    <!--                    <p style="font-size: 14px; text-align: justify;"><input type="checkbox" value="check" id="agreepayment">-->
    <!--By click check box enable <strong>Submit Payment</strong> button and you agree to our <a href="/terms-of-use" target="_blank">Terms of Use</a> and confirm that you have read our <a href="/privacy-policy" target="_blank">Policy</a>. You may receive email notifications from Oporajoy and SSL COMMERZ.</p>-->
    <!--                    <p>-->
                            <strong>@lang('app.contribution_appearance')</strong> <br />
                            @lang('app.name_displayed_publicly')
                        </p>

                        <div class="form-group {{ $errors->has('contributor_name_display')? 'has-error':'' }}">
                            <div class="col-sm-12">
                                <div class="name_display_wrap">
                                    <input type="hidden" name="contributor_name_display" value="full_name">
                                    {{-- <label>
                                        <input type="radio" name="contributor_name_display" value="full_name" checked="checked" > @lang('app.full_name')
                                    </label>

                                    <label>
                                        <input type="radio" name="contributor_name_display" value="anonymous"> @lang('app.anonymous')
                                    </label> --}}

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="donation-summery">

                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h4>Summery</h4>
                            </div>

                            <div class="panel-body">

                                @php
                                    if(session('cart.cart_type') == 'reward'){
                                    $donation_amount = $reward->amount;
                                    }else{
                                    $donation_amount = session('cart.amount');
                                    }
                                @endphp

                                <table class="table border-none">
                                    <tr>
                                        <td class="border-none">@lang('app.donation') : {{$campaign->title}}</td>
                                        <td class="border-none">{{get_amount($donation_amount)}}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('app.total')</th>
                                        <th>{{get_amount($donation_amount)}}</th>
                                    </tr>
                                </table>


                                @if(session('cart.cart_type') == 'reward')
                                    <div class="reward-box">
                                        <h4>@lang('app.selected_reward')</h4>

                                        <a href="javascript:;">
                                            <span class="reward-amount">@lang('app.pledge') <strong>{{get_amount($reward->amount)}}</strong></span>
                                            <span class="reward-text">{{$reward->description}}</span>
                                            <span class="reward-estimated-delivery"> @lang('app.estimated_delivery'): {{date('F Y', strtotime($reward->estimated_delivery))}}</span>
                                        </a>
                                    </div>
                                @endif

                                <p class="text-muted"><input type="checkbox" value="check" id="agreepayment" class="agreepayment"> By clicking <strong>Submit Payment</strong>, you agree to our <a href="/terms-of-use" target="_blank">Terms of Use</a> and confirm that you have read our <a href="/privacy-policy" target="_blank">Policy</a>. You may receive email notifications from Oporajoy and SSL COMMERZ.
                                </p>

                                <button disabled="disabled" id="submitBtn" type="submit" class="btn-block btn btn-primary btn-lg">@lang('app.submit_payment')</button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{ Form::close() }}

        </div>

    </section>

@endsection

@section('page-js')

    <script>
        $(function(){
            $(document).on('click', '.donate-amount-placeholder ul li', function(e){
                $(this).closest('form').find($('[name="amount"]')).val($(this).data('value'));
            });
            $("#agreepayment").on('click', function(){
                var valuec = $("#agreepayment").val();
                if(valuec == 'check'){
                    $("#submitBtn").removeAttr("disabled");
                    $("#agreepayment").val('uncheck');
                }
                else{
                    $("#submitBtn").attr('disabled', 'disabled');
                    $("#agreepayment").val('check');
                }
              
            });

        });
    </script>

@endsection