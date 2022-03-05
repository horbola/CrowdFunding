@extends('layout.dashboard')


@section('dashboard-content')
@php
    $uExtra = $user->userExtra;
    $cAddr = $user->currentAddress();
    $pAddr = $user->permanentAddress();
@endphp
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg
     xmlns='http://www.w3.org/2000/svg' width='8'
     height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'
     fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.show') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.show') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.edit') }}">Edit</a></li>
    </ol>
</nav>
<div id="profile">
    @php 
        $fromAdmin = $user->id && request()->user_panel_fraction;
        $uId = null;
        if($fromAdmin)
            $uId = $user->id;
    @endphp
    <form action="{{ route('user.update', ['id' => $uId, 'user_panel_fraction' => request()->user_panel_fraction, 'origUrl' => request()->origUrl]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <!--
        before shwoing this menu it's checked that whether this user has created any campaign.
        if not created means that she is not checked for completeness her profile. so she should
        be able to edit all the fields. but she has any campaign created means she has completed
        her profile before. now she should not be able to edit any profile information for security
        purpose. but after all this she can edit any profile as an admin.
        -->
        @php
            $isAdmin = Auth::user()->is_admin === 1;
            $isSuper = Auth::user()->is_super === 1;
            $hasCampaign = DB::table('campaigns')->where('user_id', Auth::user()->id )->get()->count();
            $show = !$hasCampaign || $isAdmin || $isSuper;
        @endphp
        
        @if($show)
        <div class="form-group form-row {{ $errors->has('name')? 'has-error' : '' }}">
            <label for="name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Name <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('name')? 'error-border' : '' }}" id="name" value="{{$user->name}}" name="name" placeholder="Name" maxlength="255">
                {!! $errors->has('name')? '<p class="help-block text-bold text-danger">'.$errors->first('name').'</p>' : '' !!}
            </div>
        </div>
        @endif
        
        @if($show)
        <div class="form-group form-row {{ $errors->has('birth_date')? 'has-error' : '' }}">
            <label for="birth_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Date Of Birth<span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="calendar" class="fea icon-sm icons"></i>
                <input type="date" class="form-control ps-5 {{ $errors->has('birth_date')? 'error-border' : '' }}" id="birth_date" value="{{$uExtra? ($uExtra->birth_date? $uExtra->birth_date : '') : ''}}" name="birth_date"  maxlength="255">
                {!! $errors->has('birth_date')? '<p class="help-block text-bold text-danger">'.$errors->first('birth_date').'</p>' : '' !!}
            </div>
        </div>
        @endif
        
        @if($show)
        <div class="form-group form-row {{ $errors->has('gender')? 'has-error' : '' }}">
            <label for="nid" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Gender <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <div class="custom-control custom-radio custom-control-inline">
                    <div class="form-check mb-0">
                        <input class="form-check-input" {{ ($user->gender == 'male')? "checked" : ""}} type="radio" name="gender" value="male" id="gender1">
                        <label class="form-check-label" for="gender1">Male</label>
                    </div>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <div class="form-check mb-0">
                        <input class="form-check-input" {{ ($user->gender == 'female')? "checked" : ""}} type="radio" name="gender" value="female" id="gender2">
                        <label class="form-check-label" for="gender2">Female</label>
                    </div>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <div class="form-check mb-0">
                        <input class="form-check-input" {{ ($user->gender == 'others')? "checked" : ""}} type="radio" name="gender"  value="others" id="gender3">
                        <label class="form-check-label" for="gender3">Others</label>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @php $nid = ($user->userExtra && $user->userExtra->nid) ? $user->userExtra->nid : ''; @endphp
        @if($show && !$nid)
        <div class="form-group form-row {{ $errors->has('nid')? 'has-error' : '' }}">
            <label for="nid" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">NID <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="key" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('nid')? 'error-border' : '' }}" id="nid" value="{{$nid}}" name="nid" placeholder="National ID" maxlength="255">
                {!! $errors->has('nid')? '<p class="help-block text-bold text-danger">'.$errors->first('nid').'</p>' : '' !!}
            </div>
        </div>
        @endif
         
        <!--
        no one can change the email address where which is the basis of identity to this platform
        <div class="form-group form-row {{ $errors->has('email')? 'has-error' : '' }}">
            <label for="email" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Email <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('email')? 'error-border' : '' }}" id="email" value="{{$user->email}}" name="email" placeholder="Email Address" maxlength="255">
                {!! $errors->has('email')? '<p class="help-block text-bold text-danger">'.$errors->first('email').'</p>' : '' !!}
            </div>
        </div>
        -->
        
        <div class="form-group form-row {{ $errors->has('phone')? 'has-error' : '' }}">
            <label for="phone" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Phone <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="smartphone" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('phone')? 'error-border' : '' }}" id="phone" value="{{$uExtra? ($uExtra->phone? $uExtra->phone : '') : ''}}" name="phone" placeholder="Phone Number" maxlength="255">
                {!! $errors->has('phone')? '<p class="help-block text-bold text-danger">'.$errors->first('phone').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('facebook')? 'has-error' : '' }}">
            <label for="facebook" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Facebook <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="facebook" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('facebook')? 'error-border' : '' }}" id="facebook" value="{{$uExtra? ($uExtra->facebook? $uExtra->facebook : '') : ''}}" name="facebook" placeholder="FaceBook" maxlength="255">
                {!! $errors->has('facebook')? '<p class="help-block text-bold text-danger">'.$errors->first('facebook').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('twitter')? 'has-error' : '' }}">
            <label for="twitter" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Twitter <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="twitter" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('twitter')? 'error-border' : '' }}" id="twitter" value="{{$uExtra? ($uExtra->twitter? $uExtra->twitter : '') : ''}}" name="twitter" placeholder="Twitter" maxlength="255">
                {!! $errors->has('twitter')? '<p class="help-block text-bold text-danger">'.$errors->first('twitter').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('about')? 'has-error' :  '' }}">
            <label for="about" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">About Yourself<span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="type" class="fea icon-sm icons"></i>
                <textarea name="about" class="form-control ps-5" rows="2" maxlength="300">{{$user->about}}</textarea>
                <p class="text-info"></p>
                {!! $errors->has('about')? '<p class="help-block text-bold text-danger">'.$errors->first('about').'</p>' : '' !!}
            </div>
        </div>
        
        <!--current address-->
        @if($show)
        <div class="form-group form-row">
            <label class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Current Address <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-8  border border-1 rounded-3 ms-1 address">
                <div class="row mt-3">
                    <div class="col-6 form-group {{ $errors->has('current_holding')? 'has-error' : '' }}">
                        <label for="current_holding" class="labels">Holding <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_holding')? 'error-border' : '' }}" id="current_holding" value="{{$cAddr? ($cAddr->holding? $cAddr->holding : '') : ''}}" name="current_holding" placeholder="Holding" maxlength="255">
                        {!! $errors->has('current_holding')? '<p class="help-block text-bold text-danger">'.$errors->first('current_holding').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('current_road')? 'has-error' : '' }}">
                        <label for="current_road" class="labels">Road <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_road')? 'error-border' : '' }}" id="current_road" value="{{$cAddr? ($cAddr->road? $cAddr->road : '') : ''}}" name="current_road" placeholder="Road" maxlength="255" >
                        {!! $errors->has('current_road')? '<p class="help-block text-bold text-danger">'.$errors->first('current_road').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('current_post_code')? 'has-error' : '' }}">
                        <label for="current_post_code" class="labels">Post Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_post_code')? 'error-border' : '' }}" id="current_post_code" value="{{$cAddr? ($cAddr->post_code? $cAddr->post_code : '') : ''}}" name="current_post_code" placeholder="Post Code" maxlength="255" >
                        {!! $errors->has('current_post_code')? '<p class="help-block text-bold text-danger">'.$errors->first('current_post_code').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('current_upazilla')? 'has-error' : '' }}">
                        <label for="current_upazilla" class="labels">Upazilla <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_upazilla')? 'error-border' : '' }}" id="current_upazilla" value="{{$cAddr? ($cAddr->upazilla? $cAddr->upazilla : '') : ''}}" name="current_upazilla" placeholder="Upazilla" maxlength="255">
                        {!! $errors->has('current_upazilla')? '<p class="help-block text-bold text-danger">'.$errors->first('current_upazilla').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('current_district')? 'has-error' : '' }}">
                        <label for="current_district" class="labels">District <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_district')? 'error-border' : '' }}" id="current_district" value="{{$cAddr? ($cAddr->district? $cAddr->district : '') : ''}}" name="current_district" placeholder="District" maxlength="255">
                        {!! $errors->has('current_district')? '<p class="help-block text-bold text-danger">'.$errors->first('current_district').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('current_country')? 'has-error' : '' }}">
                        <label for="current_country" class="labels">Country <span class="text-danger">*</span></label>
                        <select class="form-select form-control" id="current_country" name="current_country">
                            <option value="{{$cAddr? ($cAddr->country? $cAddr->country->id : '18') : '18'}}">{{$cAddr? ($cAddr->country? $cAddr->country->nicename : 'Bangladesh') : 'Bangladesh'}}</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                            @endforeach
                        </select>
                        {!! $errors->has('current_country')? '<p class="help-block text-bold text-danger">'.$errors->first('current_country').'</p>' : '' !!}
                    </div>
                </div>
            </div>
        </div>
        
        <!--permanent address-->
        <div class="form-group form-row">
            <label for="facebook" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Permanent Address <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-8  border border-1 rounded-3 ms-1 address">
                <div class="row mt-3">
                    <div class="col-6 form-group {{ $errors->has('permanent_holding')? 'has-error' : '' }}">
                        <label for="permanent_holding" class="labels">Holding <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('permanent_holding')? 'error-border' : '' }}" id="permanent_holding" value="{{$pAddr? ($pAddr->holding? $pAddr->holding : '') : ''}}" name="permanent_holding" placeholder="Holding" maxlength="255">
                        {!! $errors->has('permanent_holding')? '<p class="help-block text-bold text-danger">'.$errors->first('permanent_holding').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('permanent_road')? 'has-error' : '' }}">
                        <label for="permanent_road" class="labels">Road <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('permanent_road')? 'error-border' : '' }}" id="permanent_road" value="{{$pAddr? ($pAddr->road? $pAddr->road : '') : ''}}" name="permanent_road" placeholder="Road" maxlength="255">
                        {!! $errors->has('permanent_road')? '<p class="help-block text-bold text-danger">'.$errors->first('permanent_road').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('current_post_code')? 'has-error' : '' }}">
                        <label for="permanent_post_code" class="labels">Post Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('current_post_code')? 'error-border' : '' }}" id="current_post_code" value="{{$pAddr? ($pAddr->post_code? $pAddr->post_code : '') : ''}}" name="permanent_post_code" placeholder="Post Code" maxlength="255" >
                        {!! $errors->has('current_post_code')? '<p class="help-block text-bold text-danger">'.$errors->first('current_post_code').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('permanent_upazilla')? 'has-error' : '' }}">
                        <label for="permanent_upazilla" class="labels">Upazilla <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('permanent_upazilla')? 'error-border' : '' }}" id="permanent_upazilla" value="{{$pAddr? ($pAddr->upazilla? $pAddr->upazilla : '') : ''}}" name="permanent_upazilla" placeholder="Upazilla" maxlength="255">
                        {!! $errors->has('permanent_upazilla')? '<p class="help-block text-bold text-danger">'.$errors->first('permanent_upazilla').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('permanent_district')? 'has-error' : '' }}">
                        <label for="permanent_district" class="labels">District <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2 {{ $errors->has('permanent_district')? 'error-border' : '' }}" id="permanent_district" value="{{$pAddr? ($pAddr->upazilla? $pAddr->upazilla : '') : ''}}" name="permanent_district" placeholder="District" maxlength="255">
                        {!! $errors->has('permanent_district')? '<p class="help-block text-bold text-danger">'.$errors->first('permanent_district').'</p>' : '' !!}
                    </div>
                    <div class="col-6 form-group {{ $errors->has('permanent_country')? 'has-error' : '' }}">
                        <label for="permanent_country" class="labels">Country <span class="text-danger">*</span></label>
                        <select class="form-select form-control" id="permanent_country" name="permanent_country">
                            <option value="{{$pAddr? ($pAddr->country? $pAddr->country->id : '18') : '18'}}">{{$pAddr? ($pAddr->country? $pAddr->country->nicename : 'Bangladesh') : 'Bangladesh'}}</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                            @endforeach
                        </select>
                        {!! $errors->has('permanent_country')? '<p class="help-block text-bold text-danger">'.$errors->first('permanent_country').'</p>' : '' !!}
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @if($show)
        <div class="form-group form-row {{ $errors->has('careof')? 'has-error' : '' }}">
            <label for="facebook" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Care-Of <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('careof')? 'error-border' : '' }}" id="facebook" value="{{$uExtra? ($uExtra->careof? $uExtra->careof : '') : ''}}" name="careof" placeholder="Care-Of" maxlength="255">
                {!! $errors->has('careof')? '<p class="help-block text-bold text-danger">'.$errors->first('careof').'</p>' : '' !!}
            </div>
        </div>
        @endif
        
        @if($show)
        <div class="form-group form-row {{ $errors->has('careof_phone')? 'has-error' : '' }}">
            <label for="careof_phone" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Care-Of Phone <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="smartphone" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5 {{ $errors->has('careof_phone')? 'error-border' : '' }}" id="careof_phone" value="{{$uExtra? ($uExtra->careof_phone? $uExtra->careof_phone : '') : ''}}" name="careof_phone" placeholder="Care-Of Phonne" maxlength="255">
                {!! $errors->has('careof_phone')? '<p class="help-block text-bold text-danger">'.$errors->first('careof_phone').'</p>' : '' !!}
            </div>
        </div>
        @endif
        
        <div class="text-center mt-5 ">
            <button type="submit" class="btn btn-primary btn-md px-5" tabindex="-1" aria-disabled="true">Save Changes</a>
        </div>
    </form>
</div><!--end col-->
@endsection



@section('profile-edit-style')
<style>
    #profile .address label {
        font-size: 12px;
        position: absolute;
        top: -10px;
        left: 20px;
        background-color: #f3f3f3;
    }
    
    .error-border {
        border-color: red !important;
    }
</style>
@endsection