<div class="modal fade" id="campaignUpdateModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('campaign.updates.store', $campaign->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title">Upload Update Files</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-row {{ $errors->has('update_descrip')? 'has-error':'' }}">
                        <label for="update_descrip" class="col-12 form-label pt-md-2">Description<span class="text-danger">*</span></label>
                        <div class="col-12">
                            <!--<div class="alert alert-info"> @lang('app.image_insert_limitation') </div>-->
                            <div class=" form-icon position-relative">
                                <i data-feather="type" class="fea icon-sm icons"></i>
                                <textarea name="update_descrip" class="form-control description ps-5" rows="8"></textarea>
                            </div>
                            {!! $errors->has('update_descrip')? '<p class="help-block">'.$errors->first('update_descrip').'</p>':'' !!}
                            <p class="text-info"> @lang('app.description_info_text')</p>
                        </div>
                    </div>
                    <div class="form-group form-row {{ $errors->has('updates')? 'has-error':'' }}">
                        <label for="updates" class="col-12 col-md-3 form-label pt-md-2">Images</label>
                        <div class="col-12 form-icon position-relative">
                            <i data-feather="file" class="fea icon-sm icons"></i>
                            <input type="file" class="form-control ps-5" id="updates" value="" name="updates[]" multiple placeholder="Updates" accept="jpeg,jpg,png">
                            {!! $errors->has('updates')? '<p class="help-block">'.$errors->first('updates').'</p>':'' !!}
                            <p class="text-info pt-2 mb-0 pb-0" style="font-size: 0.8em;">You can select more than one file of type jpg, png, gif and pdf</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>            
        </div>
    </div>
</div>