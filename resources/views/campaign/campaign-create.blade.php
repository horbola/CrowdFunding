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
<div id="campaign-create">
    <form action="{{ route('campaign.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <!--
        <div class="form-group form-row {{ $errors->has('country_id')? 'has-error':'' }}">
            <label for="country_id" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.country')<span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <select class="form-select form-control ps-5" name="country_id">
                    <option value="">@lang('app.select_a_country')</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                    @endforeach

                </select>
                {!! $errors->has('country_id')? '<p class="help-block text-bold text-danger">'.$errors->first('country_id').'</p>':'' !!}
            </div>
        </div>
        -->
        
        <div class="form-group form-row {{ $errors->has('title')? 'has-error' : '' }}">
            <label for="title" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="type" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="title" value="{{ old('title') }}" name="title" placeholder="@lang('app.title')" maxlength="255">
                <p class="text-info">Provide this campaign with a title. Keep this within 255 characters.</p>
                {!! $errors->has('title')? '<p class="help-block text-bold text-danger">'.$errors->first('title').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('category')? 'has-error' : '' }}">
            <label for="category" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.category') <span class="text-danger">* </span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="arrow-down-circle" class="fea icon-sm icons"></i>
                <select class="form-select form-control ps-5" name="category">
                    @php
                        $catName;
                        if( old('category') ){
                            $catName = \app\Models\Category::find( old('category') )->category_name;
                        }
                    @endphp
                    <option value="{{ old('category') }}" selected>{{ $catName ?? 'Select a category' }}</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <p class="text-info">Try to place select a relevant category, which will help reach more people.</p>
                {!! $errors->has('category')? '<p class="help-block text-bold text-danger">'.$errors->first('category').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('short_description')? 'has-error' :  '' }}">
            <label for="short_description" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.short_description') <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="type" class="fea icon-sm icons"></i>
                <textarea name="short_description" class="form-control ps-5" rows="2" maxlength="300">{{ old('short_description') }}</textarea>
                <p class="text-info">Write a short description within 500 characters. This description will be used to give people a quick introduction about this campaign.</p>
                {!! $errors->has('short_description')? '<p class="help-block text-bold text-danger">'.$errors->first('short_description').'</p>' : '' !!}
            </div>
        </div>

        <!--
        <div class="form-group form-row {{ $errors->has('description')? 'has-error' : '' }}">
            <label for="description" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.description') <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9">
                <!--<div class="alert alert-info"> @lang('app.image_insert_limitation') </div>
                <div class=" form-icon position-relative">
                    <i data-feather="type" class="fea icon-sm icons"></i>
                    <textarea id="description" name="description" class="form-control description ps-5"></textarea>
                    <!--<div id="description"></div> this is for ckeditor
                </div>
                <p class="text-info">Write a detailed description for this campaign. Keep it within 5000 characters. Include all necessary information.</p>
                {!! $errors->has('description')? '<p class="help-block text-bold text-danger">'.$errors->first('description').'</p>' : '' !!}
            </div>
        </div>
        -->

        <div class="form-group form-row {{ $errors->has('feature_image')? 'has-error':'' }}">
            <label for="feature_image" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_image') <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="image" class="fea icon-sm icons"></i>
                <input type="file" class="form-control ps-5" id="feature_image" value="{{ old('file') }}" name="feature_image" placeholder="@lang('app.feature_image')" accept="image/*">
                <p class="text-info">Upload images of type jpg, png, gif. These images will be used at top of your campaign's detail page and used to share and also to characterize your campaign</p>
                {!! $errors->has('feature_image')? '<p class="help-block text-bold text-danger">'.$errors->first('feature_image').'</p>' : '' !!}
            </div>
        </div>
        
        <div class="form-group form-row {{ $errors->has('album')? 'has-error':'' }}">
            <label for="album" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Album <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="image" class="fea icon-sm icons"></i>
                <input type="file" class="form-control ps-5" id="album" value="" name="album[]" multiple placeholder="Album"  accept="image/*">
                <p class="text-info">Upload images of type jpg, png, gif. These images will be used at top of your campaign's detail page along the feature image</p>
                {!! $errors->has('album')? '<p class="help-block text-bold text-danger">'.$errors->first('album').'</p>':'' !!}
            </div>
        </div>
        
        <!--
        <div class="form-group form-row {{ $errors->has('feature_video')? 'has-error':'' }}">
            <label for="feature_video" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.feature_video') <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="user" class="fea icon-sm icons"></i>
                <input type="text" class="form-control ps-5" id="feature_video" value="{{ old('feature_video') }}" name="feature_video" placeholder="@lang('app.feature_video')">
                {!! $errors->has('feature_video')? '<p class="help-block text-bold text-danger">'.$errors->first('feature_video').'</p>':'' !!}
                <p class="text-info"></p>
            </div>
        </div>
        -->
        
        <div class="form-group form-row {{ $errors->has('documents')? 'has-error' : '' }}">
            <label for="documents" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Documents <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="image" class="fea icon-sm icons"></i>
                <input type="file" class="form-control ps-5" id="documents" value="" name="documents[]" multiple placeholder="Documents"  accept="image/*">
                <p class="text-info">Upload images of type jpg, png, gif. These images will be used at document tab of your campaign's detail page</p>
                {!! $errors->has('documents')? '<p class="help-block text-bold text-danger">'.$errors->first('documents').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('goal')? 'has-error' : '' }}">
            <label for="goal" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.goal') <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <div class=" form-icon position-relative">
                    <!--<i data-feather="dollar-sign" class="fea icon-sm icons"></i>-->
                    <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                    <input type="number" class="form-control ps-5" id="goal" value="{{ old('goal') }}" name="goal" placeholder="@lang('app.goal')">
                </div>
                <div class="alert alert-info mt-2">
                    <i class="fa fa-money"></i> @lang('app.you_will_get') {{ 'put the amount' }}% @lang('app.of_total_raised')
                </div>
                <p class="text-info">Your campaign will raise fund to this amount</p>
                {!! $errors->has('goal')? '<p class="help-block text-bold text-danger">'.$errors->first('goal').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('end_method')? 'has-error' : '' }}">
            <label for="end_method" class="col-sm-12 col-md-3 form-label text-left text-md-right">@lang('app.campaign_end_method') <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <label>
                    <input type="radio" name="end_method" value="0"> @lang('app.after_goal_achieve')
                 <span> :</span></label> <br />
                
                <label>
                    <input type="radio" name="end_method" value="1"> @lang('app.after_end_date')
                 <span> :</span></label> <br />

                {{--
                <label>
                    <input type="radio" name="end_method" value="both"  @if(old('end_method') == 'both') checked="checked" @endif > @lang('app.both_need')
                 <span> :</span></label>
                --}}
                <p class="text-info">Specify how you want your campaign to stop raising fund</p>
                {!! $errors->has('end_method')? '<p class="help-block text-bold text-danger">'.$errors->first('end_method').'</p>' : '' !!}
            </div>
            <script>if ( !$('[name=end_method]').is(':checked') ) { $('[value=1]').prop('checked', 'checked'); }</script>
        </div>

        <div class="form-group form-row {{ $errors->has('start_date')? 'has-error' : '' }}">
            <label for="start_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.start_date') <span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="calendar" class="fea icon-sm icons"></i>
                <input type="date" class="form-control ps-5 dateselect" id="start_date" value="{{ old('start_date') }}" name="start_date" placeholder="dd-mm-yyyy" min="1950-01-01" max="2030-12-31">
                <p class="text-info">This is the date from which your campaign will start raising fund</p>
                {!! $errors->has('start_date')? '<p class="help-block text-bold text-danger">'.$errors->first('start_date').'</p>' : '' !!}
            </div>
            <script>
                var today = new Date();
                var dateString = today.getFullYear() + '-' + (today.getMonth()+1) + '-' + today.getDate();
                if( !$('#start_date').val() ){ $('#start_date').val(dateString); }
            </script>
        </div>
        
        <div class="form-group form-row {{ $errors->has('end_date')? 'has-error' : '' }}">
            <label for="end_date" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">End Date<span class="text-danger">*</span> <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <i data-feather="calendar" class="fea icon-sm icons"></i>
                <input type="date" class="form-control ps-5 dateselect" id="end_date" value="{{ old('end_date') }}" name="end_date" placeholder="dd-mm-yyyy" min="1950-01-01" max="2030-12-31">
                <p class="text-info">This is the date by which your campaign will stop raising fund (if your end method is 'After end date')</p>
                {!! $errors->has('end_date')? '<p class="help-block text-bold text-danger">'.$errors->first('end_date').'</p>' : '' !!}
            </div>
        </div>

        <div class="form-group form-row {{ $errors->has('min_amount')? 'has-error' : '' }}">
            <label for="min_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.min_amount') <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <!--<i data-feather="dollar-sign" class="fea icon-sm icons"></i>-->
                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                <input type="text" class="form-control ps-5" id="min_amount" value="{{ old('min_amount') }}" name="min_amount">
                <p class="text-info">This is the amount a donor can donate minimum. By default this amount is set to the BDT 10.00</p>
                {!! $errors->has('min_amount')? '<p class="help-block text-bold text-danger">'.$errors->first('min_amount').'</p>' : '' !!}
            </div>
            <script> if( !$('#min_amount').val() ){ $('#min_amount').val('10'); } </script>
        </div>

        <div class="form-group form-row {{ $errors->has('max_amount')? 'has-error' : '' }}">
            <label for="max_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.max_amount') <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <!--<i data-feather="dollar-sign" class="fea icon-sm icons"></i>-->
                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                <input type="text" class="form-control ps-5" id="max_amount" value="{{ old('max_amount') }}" name="max_amount">
                <p class="text-info">This is the amount a donor can donate maximum. By default this amount is set to the goal amount</p>
                {!! $errors->has('max_amount')? '<p class="help-block text-bold text-danger">'.$errors->first('max_amount').'</p>' : '' !!}
            </div>
            <script>
                $(document).ready(function () {
                    $("#goal").focusout(function () {
                        if( !$('#max_amount').val() ){
                            $('#max_amount').val( $('#goal').val() );
                        }
                    });
                });
            </script>
        </div>

        <div class="form-group form-row {{ $errors->has('recommended_amount')? 'has-error' : '' }}">
            <label for="recommended_amount" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.recommended_amount') <span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <!--<i data-feather="dollar-sign" class="fea icon-sm icons"></i>-->
                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                <input type="number" class="form-control ps-5" id="recommended_amount" value="{{ old('recommended_amount') }}" name="recommended_amount">
                <p class="text-info">This amount will be used to recommend people to donate and used in other necessary case</p>
                {!! $errors->has('recommended_amount')? '<p class="help-block text-bold text-danger">'.$errors->first('recommended_amount').'</p>' : '' !!}
            </div>
            <script> if( !$('#recommended_amount').val() ){ $('#recommended_amount').val('500'); } </script>
        </div>

        <div class="form-group form-row {{ $errors->has('amount_prefilled')? 'has-error' : '' }}">
            <label for="amount_prefilled" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Quick Amount<span> :</span></label>
            <div class="col-sm-12 col-md-9 form-icon position-relative">
                <!--<i data-feather="dollar-sign" class="fea icon-sm icons"></i>-->
                <span class="icon-sm icons" style="top:7px;"><strong>Tk</strong></span>
                <input type="text" class="form-control ps-5" id="amount_prefilled" value="{{ old('amount_prefilled') }}" name="amount_prefilled">
                <p class="text-info">These amount will be used as quick amount, from which donor can input donation amount just by clicking on them instead of typing</p>
                {!! $errors->has('amount_prefilled')? '<p class="help-block text-bold text-danger">'.$errors->first('amount_prefilled').'</p>' : '' !!}
            </div>
            <script> if( !$('#amount_prefilled').val() ){ $('#amount_prefilled').val('10, 50, 100, 500, 1000'); } </script>
        </div>

        <div class="offset-md-3">
            <!--<button type="submit" class="btn btn-primary">Preview</button>-->
            <button type="submit" class="btn btn-primary">@lang('app.submit_new_campaign')</button>
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