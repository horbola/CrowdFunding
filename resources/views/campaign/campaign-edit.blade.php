@extends('layout.dashboard')


@section('dashboard-content')
<!-- campaign creation form area Start -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row">
            <div class="col">
                <div id="createCampaignForm">
                    <form action="{{ route('campaign.update', ['id' => $campaign->id]) }}" method="post" enctype="multipart/form-data">
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
                                {!! $errors->has('country_id')? '<p class="help-block text-bold text-danger">'.$errors->first('country_id').'</p>':'' !!}
                            </div>
                        </div>
                        -->
                        
                        <div class="form-group form-row {{ $errors->has('title')? 'has-error':'' }}">
                            <label for="title" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="type" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="title" value="{{$campaign->title}}" name="title" placeholder="@lang('app.title')" maxlength="255">
                                <p class="text-info">Provide this campaign with a title. Keep this within 255 characters.</p>
                                {!! $errors->has('title')? '<p class="help-block text-bold text-danger">'.$errors->first('title').'</p>':'' !!}
                            </div>
                        </div>
                        
                        <div class="form-group form-row {{ $errors->has('category')? 'has-error':'' }}">
                            <label for="category" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.category')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="arrow-down-circle" class="fea icon-sm icons"></i>
                                <select class="form-select form-control ps-5" name="category">
                                    <option value="{{isset($campaign->category) ? $campaign->category->id : 1}}" selected>{{isset($campaign->category) ? $campaign->category->category_name : 'Medical'}}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-info">Try to place select a relevant category, which will help reach more people.</p>
                                {!! $errors->has('category')? '<p class="help-block text-bold text-danger">'.$errors->first('category').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('short_description')? 'has-error':'' }}">
                            <label for="short_description" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.short_description')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="type" class="fea icon-sm icons"></i>
                                <textarea name="short_description" class="form-control ps-5" rows="3" cols="50" maxlength="300">{{$campaign->short_description}}</textarea>
                                <p class="text-info">Write a short description within 500 characters. This description will be used to give people a quick introduction about this campaign.</p>
                                {!! $errors->has('short_description')? '<p class="help-block text-bold text-danger">'.$errors->first('short_description').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('description')? 'has-error':'' }}">
                            <label for="summernote" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.description')<span> :</span></label>
                            <div class="col-sm-12 col-md-9">
                                <div class=" form-icon position-relative">
                                    <i data-feather="type" class="fea icon-sm icons"></i>
                                    <textarea id="summernote">{{$campaign->description}}</textarea>
                                    <input type="hidden" id="description" name="description"></input>
                                </div>
                                <p class="text-info">Write a detailed description for this campaign. Keep it within 5000 characters. Include all necessary information.</p>
                                {!! $errors->has('description')? '<p class="help-block text-bold text-danger">'.$errors->first('description').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('feature_image')? 'has-error':'' }}">
                            <label for="feature_image" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_image')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="image" class="fea icon-sm icons"></i>
                                <input type="file" class="form-control ps-5" id="feature_image" value="{{$campaign->feature_image}}" name="feature_image" placeholder="@lang('app.feature_image')">
                                <p class="text-info">Upload images of type jpg, png, gif. These images will be used at top of your campaign's detail page and used to share and also to characterize your campaign</p>
                                {!! $errors->has('feature_image')? '<p class="help-block text-bold text-danger">'.$errors->first('feature_image').'</p>':'' !!}
                            </div>
                        </div>
                        
                        <div class="form-group form-row {{ $errors->has('album')? 'has-error':'' }}">
                            <label for="album" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Album<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="image" class="fea icon-sm icons"></i>
                                <input type="file" class="form-control ps-5" id="album" value="" name="album[]" multiple placeholder="Album">
                                <p class="text-info">Upload images of type jpg, png, gif. These images will be used at top of your campaign's detail page along the feature image</p>
                                {!! $errors->has('album')? '<p class="help-block text-bold text-danger">'.$errors->first('album').'</p>':'' !!}
                            </div>
                        </div>
                        
                        <!--
                        <div class="form-group form-row {{ $errors->has('feature_video')? 'has-error':'' }}">
                            <label for="feature_video" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_video')</label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="feature_video" value="{{$campaign->feature_video}}" name="feature_video" placeholder="@lang('app.feature_video')">
                                {!! $errors->has('feature_video')? '<p class="help-block text-bold text-danger">'.$errors->first('feature_video').'</p>':'' !!}
                                <p class="text-info"> @lang('app.video_info_text')</p>
                            </div>
                        </div>
                        -->
                        
                        <div class="form-group form-row {{ $errors->has('documents')? 'has-error':'' }}">
                            <label for="documents" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Documents<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="image" class="fea icon-sm icons"></i>
                                <input type="file" class="form-control ps-5" id="documents" value="" name="documents[]" multiple placeholder="Documents">
                                <p class="text-info">Upload images of type jpg, png, gif. These images will be used at document tab of your campaign's detail page</p>
                                {!! $errors->has('documents')? '<p class="help-block text-bold text-danger">'.$errors->first('documents').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('goal')? 'has-error':'' }}">
                            <label for="goal" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.goal')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <div class=" form-icon position-relative">
                                    <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                                    <input type="number" class="form-control ps-5" id="goal" value="{{$campaign->goal}}" name="goal" placeholder="@lang('app.goal')">
                                </div>
                                <div class="alert alert-info mt-2">
                                    <i class="fa fa-money"></i> @lang('app.you_will_get') {{ 'put the amount' }}% @lang('app.of_total_raised')
                                </div>
                                <p class="text-info">Your campaign will raise fund to this amount</p>
                                {!! $errors->has('goal')? '<p class="help-block text-bold text-danger">'.$errors->first('goal').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('end_method')? 'has-error':'' }}">
                            <label for="end_method" class="col-sm-12 col-md-3 form-label text-left text-md-right">@lang('app.campaign_end_method')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <label>
                                    <input type="radio" name="end_method" value="0" {{$campaign->end_method === 0 ? 'checked' : ''}}> @lang('app.after_goal_achieve')
                                </label> <br />
                                <label>
                                    <input type="radio" name="end_method"  value="1" {{$campaign->end_method === 1 ? 'checked' : ''}}> @lang('app.after_end_date')
                                </label> <br />
                                {{--
                                <label>
                                    <input type="radio" name="end_method" value="both"  @if($campaign->end_method == 'both') checked="checked" @endif > @lang('app.both_nee                                                            d')
                                </label>
                                --}}
                                <p class="text-info">Specify how you want your campaign to stop raising fund</p>
                                {!! $errors->has('end_method')? '<p class="help-block text-bold text-danger">'.$errors->first('end_method').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('start_date')? 'has-error':'' }}">
                            <label for="start_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.start_date')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="calendar" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="start_date" value="{{$campaign->start_date}}" name="start_date" placeholder="@lang('app.start_date')">
                                <p class="text-info">This is the date from which your campaign will start raising fund</p>
                                {!! $errors->has('start_date')? '<p class="help-block text-bold text-danger">'.$errors->first('start_date').'</p>':'' !!}
                            </div>
                        </div>
                        <div class="form-group form-row {{ $errors->has('end_date')? 'has-error':'' }}">
                            <label for="end_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">End Date<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <i data-feather="calendar" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="end_date" value="{{$campaign->end_date}}" name="end_date" placeholder="@lang('app.end_date')">
                                <p class="text-info">This is the date by which your campaign will stop raising fund (if your end method is 'After end date')</p>
                                {!! $errors->has('end_date')? '<p class="help-block text-bold text-danger">'.$errors->first('end_date').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('min_amount')? 'has-error':'' }}">
                            <label for="min_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.min_amount')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                                <input type="text" class="form-control ps-5" id="min_amount" value="{{$campaign->min_amount}}" name="min_amount" placeholder="@lang('app.min_amount')">
                                <p class="text-info">This is the amount a donor can donate minimum. By default this amount is set to the BDT 10.00</p>
                                {!! $errors->has('min_amount')? '<p class="help-block text-bold text-danger">'.$errors->first('min_amount').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('max_amount')? 'has-error':'' }}">
                            <label for="max_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.max_amount')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                                <input type="text" class="form-control ps-5" id="max_amount" value="{{$campaign->max_amount}}" name="max_amount" placeholder="@lang('app.max_amount')">
                                {!! $errors->has('max_amount')? '<p class="help-block text-bold text-danger">'.$errors->first('max_amount').'</p>':'' !!}
                                <p class="text-info">This is the amount a donor can donate maximum. By default this amount is set to the goal amount</p>
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('recommended_amount')? 'has-error':'' }}">
                            <label for="recommended_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.recommended_amount')<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                                <input type="number" class="form-control ps-5" id="recommended_amount" value="{{$campaign->recommended_amount}}" name="recommended_amount" placeholder="@lang('app.recommended_amount')">
                                {!! $errors->has('recommended_amount')? '<p class="help-block text-bold text-danger">'.$errors->first('recommended_amount').'</p>':'' !!}
                                <p class="text-info">This amount will be used to recommend people to donate and used in other necessary case</p>
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('amount_prefilled')? 'has-error':'' }}">
                            <label for="amount_prefilled" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Quick Amount<span> :</span></label>
                            <div class="col-sm-12 col-md-9 form-icon position-relative">
                                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                                <input type="text" class="form-control ps-5" id="amount_prefilled" value="{{$campaign->amount_prefilled}}" name="amount_prefilled" placeholder="@lang('app.amount_prefilled')">
                                {!! $errors->has('amount_prefilled')? '<p class="help-block text-bold text-danger">'.$errors->first('amount_prefilled').'</p>':'' !!}
                                <p class="text-info">These amount will be used as quick amount, from which donor can input donation amount just by clicking on them instead of typing</p>
                            </div>
                        </div>

                        <input type="hidden" name="adminCampaignMenu" value="{{ request()->adminCampaignMenu }}">
                        <div class="form-group form-row">
                            <div class="col-sm-12 col-md-3 offset-md-3 d-grid d-md-block">
                                <button type="submit" class="btn btn-primary" onclick="appendDescripOnSubmit()">Complete Edition</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- campaign creation form area ends -->

<section>
    @include('partial.campaign-update-model')
</section><!--end section-->
@endsection


@section('page-style')
    <!--<link href="{{ asset('css/summernote-lite.min.css') }}" rel="stylesheet" type="text/css" />-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection


@section('page-script')
    <!--<script src="{{ asset('js/summernote-lite.min.js') }}"></script>  -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('page-script-bottom')
<script>
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onImageUpload: function(files) {
                sendFile(files[0]);
            },
            
            onMediaDelete : function(target) {
                deleteFile(target[0].id);
            }
        }
    });
    
    function sendFile(file) {
        data = new FormData();
        data.append("file", file);
        data.append("_token", "{{ csrf_token() }}");
        $.ajax({
            data: data,
            type: "post",
            url: "{{ route('desImg.store', $campaign->id) }}",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                appendDescrip(data);
                saveDes( $('#description').val() );
            }
        });
    }
    
    // if page got refreshed without calling 'Complete Edition' then the images uploaded can't be deleted
    // because of no reference to it. this method saves the the 'description' field immediately so that we
    // we can get a reference to it in summernote for later delete.
    function saveDes(des){
        data = new FormData();
        data.append("description", des);
        data.append("_token", "{{ csrf_token() }}");
        $.ajax({
            data: data,
            type: "post",
            url: "{{ route('campaign.updateDes', $campaign->id) }}",
            cache: false,
            contentType: false,
            processData: false
        });
    }
    
    function appendDescrip(data){
        $('.note-editable').append('<div><img id="'+ data.desImgId +'" src="' + data.url + '" alt="image"></img></div>');
        $('#description').val( $('.note-editable').html() );
    }
    
    function appendDescripOnSubmit(){
        $('#description').val( $('.note-editable').html() );
    }
    
    function deleteFile(desImgId){
        data = new FormData();
        data.append("desImgId", desImgId);
        data.append("_token", "{{ csrf_token() }}");
        $.ajax({
            data: data,
            type: "post",
            url: "/dashboard/campaigner/delete-des-img/" + desImgId,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                if(result === 'success')
                    alert('deleted');
            }
        });
    }
</script>
@endsection
