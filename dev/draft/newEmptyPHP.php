<div>
                                <div class="form-group form-row {{ $errors->has('acc_number')? 'has-error' : '' }}">
                                    <label for="acc_number" class="col-sm-12 col-md-3 form-label text-left text-md-right pt-md-2">Mobile Number<span class="text-danger">* </span> <span> :</span></label>
                                    <div class="col-sm-12 col-md-9 form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5" id="acc_number" value="{{ $wRequest->user->currentPayMeth()->acc_number }}" name="acc_number" placeholder="ex: 01xxx 567 890" maxlength="255">
                                        {!! $errors->has('acc_number')? '<p class="help-block">'.$errors->first('acc_number').'</p>' : '' !!}
                                    </div>
                                </div>
                            </div>