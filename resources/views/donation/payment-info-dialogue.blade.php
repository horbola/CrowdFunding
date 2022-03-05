@extends('layout.form.skel')


@section('content')
<section class="bg-home pb-0 bg-light d-table w-100 overflow-hidden d-flex align-items-center" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-title position-relative">
                    <div class="title-text">{{ $title?? '' }}</div>
                </div>
                <style>
                    .title-text {
                        position: absolute;
                        top: -30px;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        font-weight: 600;
                        font-size: 30px;
                    }
                </style>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                    <div class="form-group form-row {{ $errors->has('amount')? 'has-error':'' }}">
                        <label for="amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Donation Amount<span class="text-danger">*</span></label>
                        <div class="col-sm-12 col-md-9 form-icon position-relative">
                            <!--<i data-feather="dollar-sign" class="fea icon-sm icons"></i>-->
                            <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                            <input type="text" class="form-control ps-5" id="amount" value="{{ $request->amount }}" name="amount" placeholder="@lang('app.amount')" maxlength="255" readonly>
                            {!! $errors->has('amount')? '<p class="help-block text-bold text-danger">'.$errors->first('amount').'</p>':'' !!}
                            <!--<p class="text-info"> You can change your mind for donation amount </p>-->
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <label for="amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">As Anonymous</label>
                        <div class="col-sm-12 col-md-9 form-icon position-relative">
                            <i data-feather="{{ $request->anonymous === 'Yes'? 'eye-off' : 'eye' }}" class="fea icon-sm icons"></i>
                            <input type="text" class="form-control ps-5" value="{{ $request->anonymous === 'Yes'? 'Yes' : 'Open' }}" name="anonymous" maxlength="255" readonly>
                            <p class="text-info p-0"> {{ $request->anonymous === 'Yes'? 'No one can see your name' : 'Everyone can see your name' }} </p>
                        </div>
                    </div>
                    <hr class="mb-4">
                    
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    @if(Auth::check())
                    <input name="user_id" type="hidden" value="{{$request->user_id}}">
                    @endif
                    <input name="campaign_id" type="hidden" value="{{$request->campaign_id}}">
                    <input name="amount" type="hidden" value="{{$request->amount}}">
                    <input name="logout" type="hidden" value="{{$request->logout}}">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Proceed to Donate</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection