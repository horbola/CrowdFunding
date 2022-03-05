@extends('layout.form.skel')


@section('form-content')
<div id="payment-info-dialogue">
    <div class="container">
        <form action="{{ route('donation.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group form-row {{ $errors->has('method')? 'has-error':'' }}">
                <label for="method" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">*</span></label>
                <div class="col-sm-12 col-md-9 form-icon position-relative">
                    <i data-feather="user" class="fea icon-sm icons"></i>
                    <input type="text" class="form-control ps-5" id="title" value="{{ old('method') }}" name="method" placeholder="@lang('app.method')" maxlength="255">
                    {!! $errors->has('method')? '<p class="help-block">'.$errors->first('method').'</p>':'' !!}
                    <p class="text-info"> @lang('app.great_title_info')</p>
                </div>
            </div>
            <div class="form-group form-row {{ $errors->has('card__no')? 'has-error':'' }}">
                <label for="card__no" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">*</span></label>
                <div class="col-sm-12 col-md-9 form-icon position-relative">
                    <i data-feather="user" class="fea icon-sm icons"></i>
                    <input type="text" class="form-control ps-5" id="title" value="{{ old('card__no') }}" name="card__no" placeholder="@lang('app.card__no')" maxlength="255">
                    {!! $errors->has('card__no')? '<p class="help-block">'.$errors->first('method').'</p>':'' !!}
                    <p class="text-info"> @lang('app.great_title_info')</p>
                </div>
            </div>
            @if(Auth::check())
            <input name="user_id" type="hidden" value="{{$request->user_id}}">
            @endif
            <input name="campaign_id" type="hidden" value="{{$request->campaign_id}}">
            <input name="amount" type="hidden" value="{{$request->amount}}">
        </form>
    </div>
</div>
@endsection