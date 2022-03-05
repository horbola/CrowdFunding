@extends('layout.face.skel')


@section('content')
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div id="payment-info-dialogue">
            <form action="{{ route('donation.store') }}" method="post">
                @csrf
                <div class="form-group form-row {{ $errors->has('amount')? 'has-error':'' }}">
                    <label for="amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                        <i data-feather="user" class="fea icon-sm icons"></i>
                        <input type="text" class="form-control ps-5" id="title" value="{{ $request->amount }}" name="amount" placeholder="@lang('app.amount')" maxlength="255">
                        {!! $errors->has('amount')? '<p class="help-block">'.$errors->first('amount').'</p>':'' !!}
                        <p class="text-info"> @lang('app.great_title_info')</p>
                    </div>
                </div>
                
                <div class="form-group form-row {{ $errors->has('payment_method')? 'has-error':'' }}">
                    <label for="payment_method" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                        <i data-feather="user" class="fea icon-sm icons"></i>
                        <input type="text" class="form-control ps-5" id="title" value="{{ old('payment_method') }}" name="payment_method" placeholder="@lang('app.payment_method')" maxlength="255">
                        {!! $errors->has('payment_method')? '<p class="help-block">'.$errors->first('payment_method').'</p>':'' !!}
                        <p class="text-info"> @lang('app.great_title_info')</p>
                    </div>
                </div>
                
                <div class="form-group form-row {{ $errors->has('card_no')? 'has-error':'' }}">
                    <label for="card_no" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                        <i data-feather="user" class="fea icon-sm icons"></i>
                        <input type="text" class="form-control ps-5" id="title" value="{{ old('card_no') }}" name="card_no" placeholder="@lang('app.card_no')" maxlength="255">
                        {!! $errors->has('card_no')? '<p class="help-block">'.$errors->first('card_no').'</p>':'' !!}
                        <p class="text-info"> @lang('app.great_title_info')</p>
                    </div>
                </div>
                @if(Auth::check())
                <input name="user_id" type="hidden" value="{{$request->user_id}}">
                @endif
                <input name="campaign_id" type="hidden" value="{{$request->campaign_id}}">
                <input name="amount" type="hidden" value="{{$request->amount}}">
                <div class="form-row">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection