@extends('layout.dashboard')


@section('dashboard-content')
<div id="campaign-create">
    <form action="{{ route('campaign.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <legend class="text-center mb-5">@lang('app.campaign_info')</legend>
        
        <!--
        <div class="form-group form-row {{ $errors->has('country_id')? 'has-error':'' }}">
            <label for="country_id" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.country')<span class="text-danger">*</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <select class="form-select form-control ps-5" name="country_id">
                    <option value="">@lang('app.select_a_country')</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                    @endforeach

                </select>
                {!! $errors->has('country_id')? '<p class="help-block">'.$errors->first('country_id').'</p>':'' !!}
            </div>
        </div>
        -->
        
        <div class="form-group form-row {{ $errors->has('address')? 'has-error' : '' }}">
            <label for="address" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.address')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="address" value="{{ old('address') }}" name="address" placeholder="@lang('app.address')" maxlength="255">
                <p class="text-info"> @lang('app.address_info_text')</p>
                {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('category')? 'has-error' : '' }}">
            <label for="category" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.category') <span class="text-danger">*</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <select class="form-select form-control ps-5" name="category">
                    <option selected>@lang('app.select_a_category')</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <p class="text-info"> @lang('app.category_info_text')</p>
                {!! $errors->has('category')? '<p class="help-block">'.$errors->first('category').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('title')? 'has-error' : '' }}">
            <label for="title" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">*</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="title" value="{{ old('title') }}" name="title" placeholder="@lang('app.title')" maxlength="255">
                <p class="text-info"> @lang('app.great_title_info')</p>
                {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('short_description')? 'has-error' :  '' }}">
            <label for="short_description" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.short_description')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <textarea name="short_description" class="form-control ps-5" rows="2" maxlength="300">{{ old('short_description') }}</textarea>
                <p class="text-info"> @lang('app.short-description_info')</p>
                {!! $errors->has('short_description')? '<p class="help-block">'.$errors->first('short_description').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('description')? 'has-error' : '' }}">
            <label for="description" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.description') <span class="text-danger">*</span></label>
            <div class="col-sm-12 col-md-9">
                <!--<div class="alert alert-info"> @lang('app.image_insert_limitation') </div>-->
                <div class=" form-icon position-relative">
                    <i data-feather="user" class="fea icon-sm icons"></i>
                    <textarea id="description" name="description" class="form-control description ps-5"></textarea>
                    <!--<div id="description"></div> this is for ckeditor-->
                </div>
                <p class="text-info"> @lang('app.description_info_text')</p>
                {!! $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('feature_image')? 'has-error':'' }}">
            <label for="feature_image" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_image')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="file" class="form-control ps-5" id="feature_image" value="" name="feature_image" placeholder="@lang('app.feature_image')">
                <p class="text-info"> @lang('app.video_info_text')</p>
                {!! $errors->has('feature_image')? '<p class="help-block">'.$errors->first('feature_image').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('album')? 'has-error':'' }}">
            <label for="album" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Album</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="file" class="form-control ps-5" id="album" value="" name="album[]" multiple placeholder="Album">
                <p class="text-info">@lang('app.album_info')</p>
                {!! $errors->has('album')? '<p class="help-block">'.$errors->first('album').'</p>':'' !!}
            </div>
        </div>
        
        <!--
        <div class="form-group form-row {{ $errors->has('feature_video')? 'has-error':'' }}">
            <label for="feature_video" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_video')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="feature_video" value="{{ old('feature_video') }}" name="feature_video" placeholder="@lang('app.feature_video')">
                {!! $errors->has('feature_video')? '<p class="help-block">'.$errors->first('feature_video').'</p>':'' !!}
                <p class="text-info"> @lang('app.video_info_text')</p>
            </div>
        </div>
        -->
        
        <div class="form-group form-row {{ $errors->has('documents')? 'has-error' : '' }}">
            <label for="documents" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Documents</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="file" class="form-control ps-5" id="documents" value="" name="documents[]" multiple placeholder="Documents">
                <p class="text-info">@lang('app.documents_info')</p>
                {!! $errors->has('documents')? '<p class="help-block">'.$errors->first('documents').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('goal')? 'has-error' : '' }}">
            <label for="goal" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.goal') <span class="text-danger">*</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <div class=" form-icon position-relative">
                    <i data-feather="user" class="fea icon-sm icons"></i>
                    <input type="number" class="form-control ps-5" id="goal" value="{{ old('goal') }}" name="goal" placeholder="@lang('app.goal')">
                </div>
                <div class="alert alert-info mt-2">
                    <i class="fa fa-money"></i> @lang('app.you_will_get') {{ 'put the amount' }}% @lang('app.of_total_raised')
                </div>
                <p class="text-info">@lang('app.goal_info')</p>
                {!! $errors->has('goal')? '<p class="help-block">'.$errors->first('goal').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('end_method')? 'has-error' : '' }}">
            <label for="end_method" class="col-sm-12 col-md-3 form-label text-left text-md-right">@lang('app.campaign_end_method')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <label>
                    <input type="radio" name="end_method"  value="1" @if(old('end_method') == 1) checked="checked" @endif > @lang('app.after_goal_achieve')
                </label> <br />
                
                <label>
                    <input type="radio" name="end_method" value="0"  @if(old('end_method') == 0) checked="checked" @endif > @lang('app.after_end_date')
                </label> <br />

                {{--
                <label>
                    <input type="radio" name="end_method" value="both"  @if(old('end_method') == 'both') checked="checked" @endif > @lang('app.both_need')
                </label>
                --}}
                <p class="text-info"> @lang('app.end_method_info')</p>
                {!! $errors->has('end_method')? '<p class="help-block">'.$errors->first('end_method').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('start_date')? 'has-error' : '' }}">
            <label for="start_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.start_date')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="start_date" value="{{ old('start_date') }}" name="start_date" placeholder="@lang('app.start_date')">
                <p class="text-info">@lang('app.start_date_info')</p>
                {!! $errors->has('start_date')? '<p class="help-block">'.$errors->first('start_date').'</p>' : '' !!}
            </div>
        </div>
        <div class="form-group form-row {{ $errors->has('end_date')? 'has-error' : '' }}">
            <label for="end_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.end_date')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="end_date" value="{{ old('end_date') }}" name="end_date" placeholder="@lang('app.end_date')">
                <p class="text-info">@lang('app.end_date_info')</p>
                {!! $errors->has('end_date')? '<p class="help-block">'.$errors->first('end_date').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('min_amount')? 'has-error' : '' }}">
            <label for="min_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.min_amount')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="min_amount" value="{{ old('min_amount') }}" name="min_amount" placeholder="@lang('app.min_amount')">
                <p class="text-info">@lang('app.min_amount_info')</p>
                {!! $errors->has('min_amount')? '<p class="help-block">'.$errors->first('min_amount').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('max_amount')? 'has-error' : '' }}">
            <label for="max_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.max_amount')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="max_amount" value="{{ old('max_amount') }}" name="max_amount" placeholder="@lang('app.max_amount')">
                <p class="text-info">@lang('app.max_amount_info')</p>
                {!! $errors->has('max_amount')? '<p class="help-block">'.$errors->first('max_amount').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('recommended_amount')? 'has-error' : '' }}">
            <label for="recommended_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.recommended_amount')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="number" class="form-control ps-5" id="recommended_amount" value="{{ old('recommended_amount') }}" name="recommended_amount" placeholder="@lang('app.recommended_amount')">
                <p class="text-info">@lang('app.recommended_amount_info')</p>
                {!! $errors->has('recommended_amount')? '<p class="help-block">'.$errors->first('recommended_amount').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('amount_prefilled')? 'has-error' : '' }}">
            <label for="amount_prefilled" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.amount_prefilled')</label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="amount_prefilled" value="@lang('app.amount_prefilled')" name="amount_prefilled" placeholder="@lang('app.amount_prefilled')">
                <p class="text-info"> @lang('app.amount_prefilled_info')</p>
                {!! $errors->has('amount_prefilled')? '<p class="help-block">'.$errors->first('amount_prefilled').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-12 col-md-4 offset-md-3 d-grid d-md-block">
                <button type="submit" class="btn btn-primary">@lang('app.submit_new_campaign')</button>
            </div>
        </div>
    </form>
</div>
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
@endsection