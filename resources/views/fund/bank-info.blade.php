@extends('layout.dashboard')


@section('dashboard-content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg
     xmlns='http://www.w3.org/2000/svg' width='8'
     height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'
     fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.show') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('campaign.create') }}">Create Campaign</a></li>
    </ol>
</nav>
<div id="bank-info">
    <form action="{{ route('campaign.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group form-row {{ $errors->has('bank_name')? 'has-error' : '' }}">
            <label for="bank_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Bank Name<span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="bank_name" value="{{ old('bank_name') }}" name="bank_name" placeholder="Bank Name" maxlength="255">
                <p class="text-info"></p>
                {!! $errors->has('bank_name')? '<p class="help-block">'.$errors->first('bank_name').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('bank_swift_code')? 'has-error' : '' }}">
            <label for="bank_swift_code" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Band Swift Code<span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="bank_swift_code" value="{{ old('bank_swift_code') }}" name="bank_swift_code" placeholder="Bank Routing Number" maxlength="255">
                <p class="text-info"></p>
                {!! $errors->has('bank_swift_code')? '<p class="help-block">'.$errors->first('bank_swift_code').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('branch_name')? 'has-error' : '' }}">
            <label for="branch_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Branch Name<span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="branch_name" value="{{ old('branch_name') }}" name="branch_name" placeholder="Branch Name" maxlength="255">
                <p class="text-info"></p>
                {!! $errors->has('branch_name')? '<p class="help-block">'.$errors->first('branch_name').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('branch_swift_code')? 'has-error' : '' }}">
            <label for="branch_swift_code" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Branch Swift Code<span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="branch_swift_code" value="{{ old('branch_swift_code') }}" name="branch_swift_code" placeholder="Branch Swift Code" maxlength="255">
                <p class="text-info"></p>
                {!! $errors->has('branch_swift_code')? '<p class="help-block">'.$errors->first('branch_swift_code').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('owner_name')? 'has-error' : '' }}">
            <label for="owner_name" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Owner Name<span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="owner_name" value="{{ old('owner_name') }}" name="owner_name" placeholder="Owner Name" maxlength="255">
                <p class="text-info"></p>
                {!! $errors->has('owner_name')? '<p class="help-block">'.$errors->first('owner_name').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('acc_number')? 'has-error' : '' }}">
            <label for="acc_number" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Account Number<span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="acc_number" value="{{ old('acc_number') }}" name="acc_number" placeholder="Account Number" maxlength="255">
                <p class="text-info"></p>
                {!! $errors->has('acc_number')? '<p class="help-block">'.$errors->first('acc_number').'</p>' : '' !!}
            </div>
        </div>

        <div class="offset-md-3">
            <!--<button type="submit" class="btn btn-primary">Preview</button>-->
            <button type="submit" class="btn btn-primary">@lang('app.submit_new_campaign')</button>
        </div>
    </form>
</div>
@endsection



@section('page-style')
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
@endsection

@section('page-script-bottom')
<script>
    function initCkeditor(){
        ClassicEditor.create( document.querySelector( '#description' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
                window.editor = editor;
        } )
        .catch( err => {
                console.error( err.stack );
        } ); 
    }
</script>
<script src="{{ asset('js/ckeditor-5-classic.js') }}" onload="initCkeditor();"></script>

<script>
    function initDatePicker(){
        $('.dateselect').datepicker({
            // format: 'mm/dd/yyyy',
            format: 'yyyy-mm-dd',
            todayHighlidht: true,
            autoclose: true,
            startDate: '0d'
        });
        
        // $('.dateselect2').datepicker({
        //     format: 'mm/dd/yyyy',
        //     autoclose:true,
        //     todayHighlidht: true,
        // }).on("hide", function(){
        //   if ($)
        // }

    }
</script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}" onload="initDatePicker();"></script>
@endsection