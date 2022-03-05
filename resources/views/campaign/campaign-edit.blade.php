@extends('layout.dashboard')


@section('dashboard-content')
<!-- campaign creation form area Start -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col">
                <div id="createCampaignForm">
                    <form action="{{ route('campaign.update', $campaign->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <legend class="text-center mb-5">@lang('app.campaign_info')</legend>

                        <!--
                        <div class="form-group form-row {{ $errors->has('country_id')? 'has-error':'' }}">
                            <label for="country_id" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.country')<span class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <select class="form-select form-control ps-5" name="country_id">
                                    <option value="{{ isset($campaign->country) ? $campaign->country ->country_id : 1 }}">{{ isset($campaign->country) ? $campaign->country ->nicename : 'Bangladesh'}}</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                                    @endforeach

                                </select>
                                {!! $errors->has('country_id')? '<p class="help-block">'.$errors->first('country_id').'</p>':'' !!}
                            </div>
                        </div>
                        -->
                        
                        <div class="form-group form-row {{ $errors->has('title')? 'has-error':'' }}">
                            <label for="title" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="title" value="{{$campaign->title}}" name="title" placeholder="@lang('app.title')" maxlength="255">
                                {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                                <p class="text-info"> @lang('app.great_title_info')</p>
                            </div>
                        </div>
                        
                        <div class="form-group form-row {{ $errors->has('category')? 'has-error':'' }}">
                            <label for="category" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.category')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <select class="form-select form-control ps-5" name="category">
                                    <option value="{{isset($campaign->category) ? $campaign->category->id : 1}}" selected>{{isset($campaign->category) ? $campaign->category->category_name : 'Medical'}}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->has('category')? '<p class="help-block">'.$errors->first('category').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('short_description')? 'has-error':'' }}">
                            <label for="short_description" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.short_description')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <textarea name="short_description" class="form-control ps-5" rows="3" cols="50" maxlength="300">{{$campaign->short_description}}</textarea>
                                {!! $errors->has('short_description')? '<p class="help-block">'.$errors->first('short_description').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('description')? 'has-error':'' }}">
                            <label for="description" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.description')<span> :</span></label>
                            <div class="col-sm-12 col-md-9">
                                <!--<div class="alert alert-info"> @lang('app.image_insert_limitation') </div>-->
                                <div class=" form-icon position-relative">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                    <textarea id="description" name="description" class="form-control description ps-5">{{$campaign->description}}</textarea>
                                    <!--<div id="description"></div> this is for ckeditor-->
                                </div>
                                {!! $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':'' !!}
                                <p class="text-info"> @lang('app.description_info_text')</p>
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('feature_image')? 'has-error':'' }}">
                            <label for="feature_image" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_image')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="file" class="form-control ps-5" id="feature_image" value="{{$campaign->feature_image}}" name="feature_image" placeholder="@lang('app.feature_image')">
                                {!! $errors->has('feature_image')? '<p class="help-block">'.$errors->first('feature_image').'</p>':'' !!}
                                <p class="text-info"> @lang('app.video_info_text')</p>
                            </div>
                        </div>
                        
                        <div class="form-group form-row {{ $errors->has('album')? 'has-error':'' }}">
                            <label for="album" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Album<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="file" class="form-control ps-5" id="album" value="" name="album[]" multiple placeholder="Album">
                                {!! $errors->has('album')? '<p class="help-block">'.$errors->first('album').'</p>':'' !!}
                                <p class="text-info">Upload image in jpg, png, gif format. These images supplement the feature image</p>
                            </div>
                        </div>
                        
                        <!--
                        <div class="form-group form-row {{ $errors->has('feature_video')? 'has-error':'' }}">
                            <label for="feature_video" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_video')</label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="feature_video" value="{{$campaign->feature_video}}" name="feature_video" placeholder="@lang('app.feature_video')">
                                {!! $errors->has('feature_video')? '<p class="help-block">'.$errors->first('feature_video').'</p>':'' !!}
                                <p class="text-info"> @lang('app.video_info_text')</p>
                            </div>
                        </div>
                        -->
                        
                        <div class="form-group form-row {{ $errors->has('documents')? 'has-error':'' }}">
                            <label for="documents" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Documents<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="file" class="form-control ps-5" id="documents" value="" name="documents[]" multiple placeholder="Documents">
                                {!! $errors->has('documents')? '<p class="help-block">'.$errors->first('documents').'</p>':'' !!}
                                <p class="text-info">You can select more than one file of type jpg, png, gif, pdf</p>
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('goal')? 'has-error':'' }}">
                            <label for="goal" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.goal')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <div class=" form-icon position-relative">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                    <input type="number" class="form-control ps-5" id="goal" value="{{$campaign->goal}}" name="goal" placeholder="@lang('app.goal')">
                                </div>
                                <div class="alert alert-info mt-2">
                                    <i class="fa fa-money"></i> @lang('app.you_will_get') {{ 'put the amount' }}% @lang('app.of_total_raised')
                                </div>
                                {!! $errors->has('goal')? '<p class="help-block">'.$errors->first('goal').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('end_method')? 'has-error':'' }}">
                            <label for="end_method" class="col-sm-12 col-md-3 form-label text-left text-md-right">@lang('app.campaign_end_method')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <label>
                                    <input type="radio" name="end_method" value="0"  @if(old('end_method') == 0) checked="checked" @endif > @lang('app.after_end_date')
                                </label> <br />

                                <label>
                                    <input type="radio" name="end_method"  value="1" @if(old('end_method') == 1) checked="checked" @endif > @lang('app.after_goal_achieve')
                                </label> <br />

                                {{--
                                <label>
                                    <input type="radio" name="end_method" value="both"  @if($campaign->end_method == 'both') checked="checked" @endif > @lang('app.both_nee                                                            d')
                                </label>
                                --}}

                                {!! $errors->has('end_method')? '<p class="help-block">'.$errors->first('end_method').'</p>':'' !!}
                                <p class="text-info"> @lang('app.end_method_info_text')</p>
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('start_date')? 'has-error':'' }}">
                            <label for="start_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.start_date')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="start_date" value="{{$campaign->start_date}}" name="start_date" placeholder="@lang('app.start_date')">
                                {!! $errors->has('start_date')? '<p class="help-block">'.$errors->first('start_date').'</p>':'' !!}
                            </div>
                        </div>
                        <div class="form-group form-row {{ $errors->has('end_date')? 'has-error':'' }}">
                            <label for="end_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.end_date')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="end_date" value="{{$campaign->end_date}}" name="end_date" placeholder="@lang('app.end_date')">
                                {!! $errors->has('end_date')? '<p class="help-block">'.$errors->first('end_date').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('min_amount')? 'has-error':'' }}">
                            <label for="min_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.min_amount')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="min_amount" value="{{$campaign->min_amount}}" name="min_amount" placeholder="@lang('app.min_amount')">
                                {!! $errors->has('min_amount')? '<p class="help-block">'.$errors->first('min_amount').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('max_amount')? 'has-error':'' }}">
                            <label for="max_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.max_amount')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="max_amount" value="{{$campaign->max_amount}}" name="max_amount" placeholder="@lang('app.max_amount')">
                                {!! $errors->has('max_amount')? '<p class="help-block">'.$errors->first('max_amount').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('recommended_amount')? 'has-error':'' }}">
                            <label for="recommended_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.recommended_amount')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="number" class="form-control ps-5" id="recommended_amount" value="{{$campaign->recommended_amount}}" name="recommended_amount" placeholder="@lang('app.recommended_amount')">
                                {!! $errors->has('recommended_amount')? '<p class="help-block">'.$errors->first('recommended_amount').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('amount_prefilled')? 'has-error':'' }}">
                            <label for="amount_prefilled" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.amount_prefilled')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="amount_prefilled" value="{{$campaign->amount_prefilled}}" name="amount_prefilled" placeholder="@lang('app.amount_prefilled')">
                                {!! $errors->has('amount_prefilled')? '<p class="help-block">'.$errors->first('amount_prefilled').'</p>':'' !!}
                                <p class="text-info"> @lang('app.amount_prefilled_info_text')</p>

                            </div>
                        </div>

                        <input type="hidden" name="adminCampaignMenu" value="{{ $request->adminCampaignMenu }}">
                        <div class="form-group form-row">
                            <div class="col-sm-12 col-md-3 offset-md-3 d-grid d-md-block">
                                <button type="submit" class="btn btn-primary">Complete Edition</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- campaign creation form area ends -->
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
