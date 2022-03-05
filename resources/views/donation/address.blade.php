@extends('layout.form.skel')


@section('content')
<section class="bg-home pb-0 bg-light d-table w-100 overflow-hidden d-flex align-items-center" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div style="max-width: 500px;" class="mx-auto">
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-title position-relative text-center w-100">
                    <div class="h2 mb-3 text-bold">{{ $title?? '' }}</div>
                </div>
            </div>
        </div>
        
        <div id="donation-address">
            <form action="{{route('donation.createPaymentInfoFromAddress')}}" method="get">
                @method('get')
                @csrf
                @php
                    $currAddr = null;
                    if(Auth::check()){
                        $currAddr = Auth::user()->currentAddress();
                    }
                @endphp
                <div class="form-group form-row form-icon position-relative">
                    <div class="col-12 form-group {{ $errors->has('current_holding')? 'has-error' : '' }}">
                        <label for="current_holding" class="labels">Holding / House <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_holding')? 'error-border' : '' }}" id="current_holding" value="{{ $currAddr? $currAddr->holding : '' }}" name="current_holding" placeholder="Holding" maxlength="255">
                        {!! $errors->has('current_holding')? '<p class="help-block text-bold text-danger">'.$errors->first('current_holding').'</p>' : '' !!}
                    </div>
                    <div class="col-12 form-group {{ $errors->has('current_road')? 'has-error' : '' }}">
                        <label for="current_road" class="labels">Road <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_road')? 'error-border' : '' }}" id="current_road" value="{{ $currAddr? $currAddr->road : '' }}" name="current_road" placeholder="Road" maxlength="255" >
                        {!! $errors->has('current_road')? '<p class="help-block text-bold text-danger">'.$errors->first('current_road').'</p>' : '' !!}
                    </div>
                    <div class="col-12 form-group {{ $errors->has('current_post_code')? 'has-error' : '' }}">
                        <label for="current_post_code" class="labels">Post Code <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_post_code')? 'error-border' : '' }}" id="current_post_code" value="{{ $currAddr? $currAddr->post_code : '' }}" name="current_post_code" placeholder="Post Code" maxlength="255" >
                        {!! $errors->has('current_post_code')? '<p class="help-block text-bold text-danger">'.$errors->first('current_post_code').'</p>' : '' !!}
                    </div>
                    <div class="col-12 form-group {{ $errors->has('current_upazilla')? 'has-error' : '' }}">
                        <label for="current_upazilla" class="labels">Upazilla / City <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_upazilla')? 'error-border' : '' }}" id="current_upazilla" value="{{ $currAddr? $currAddr->upazilla : '' }}" name="current_upazilla" placeholder="Upazilla" maxlength="255">
                        {!! $errors->has('current_upazilla')? '<p class="help-block text-bold text-danger">'.$errors->first('current_upazilla').'</p>' : '' !!}
                    </div>
                    <div class="col-12 form-group {{ $errors->has('current_district')? 'has-error' : '' }}">
                        <label for="current_district" class="labels">District <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_district')? 'error-border' : '' }}" id="current_district" value="{{ $currAddr? $currAddr->district : '' }}" name="current_district" placeholder="District" maxlength="255">
                        {!! $errors->has('current_district')? '<p class="help-block text-bold text-danger">'.$errors->first('current_district').'</p>' : '' !!}
                    </div>
                    <div class="col-12 form-group {{ $errors->has('current_country')? 'has-error' : '' }}">
                        <label for="current_country" class="labels">Country <span class="text-danger"> *</span></label>
                        <select class="form-select form-control" id="current_country" name="current_country">
                            <option value="{{ $currAddr? $currAddr->country->id : '18' }}">{{ $currAddr? $currAddr->country->nicename : 'Bangladesh' }}</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                            @endforeach
                        </select>
                        {!! $errors->has('current_country')? '<p class="help-block text-bold text-danger">'.$errors->first('current_country').'</p>' : '' !!}
                    </div>
                </div>
                
                @if(Auth::check())
                <input name="user_id" type="hidden" value="{{$request->user_id}}">
                @endif
                <input name="campaign_id" type="hidden" value="{{$request->campaign_id}}">
                <input name="amount" type="hidden" value="{{$request->amount}}">
                <input name="anonymous" type="hidden" value="{{$request->anonymous}}">
                <div class="form-row">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
@endsection