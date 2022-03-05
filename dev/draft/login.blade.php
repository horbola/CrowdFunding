<div class="form-group form-row {{ $errors->has('payment_method')? 'has-error':'' }}">
                <label for="payment_method" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">@lang('app.title') <span class="text-danger">*</span></label>
                <div class="col-sm-12 col-md-9 form-icon position-relative">
                    <i data-feather="user" class="fea icon-sm icons"></i>
                    <input type="text" class="form-control ps-5" id="title" value="{{ old('payment_method') }}" name="payment_method" placeholder="@lang('app.payment_method')" maxlength="255">
                    {!! $errors->has('payment_method')? '<p class="help-block">'.$errors->first('payment_method').'</p>':'' !!}
                    <p class="text-info"> @lang('app.great_title_info')</p>
                </div>
            </div>