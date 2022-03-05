<section class="donation-model">
    <form action="{{route('donation.store', ['campaignId' => $campaign->id])}}" method="post">
        @csrf
        <div id="donation-model" class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Payment Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-row {{ $errors->has('amount')? 'has-error':'' }}">
                            <label for="amount" class="col-sm-12 col-md-5 form-label pt-md-2">Amount to donate</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="amount" value="" name="amount">
                                {!! $errors->has('amount')? '<p class="help-block">'.$errors->first('amount').'</p>':'' !!}
                            </div>
                        </div>

                        <hr />

                        <div class="text-center text-bold mb-4">Fill these info or <a href="javascript:void(0)">login</a></div>

                        <div class="form-group form-row {{ $errors->has('name')? 'has-error':'' }}">
                            <label for="name" class="col-sm-12 col-md-5 form-label pt-md-2">Full Name</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="name" value="" name="name">
                                {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('email')? 'has-error':'' }}">
                            <label for="email" class="col-sm-12 col-md-5 form-label pt-md-2">Email Address</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="email" value="" name="email">
                                {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('phone')? 'has-error':'' }}">
                            <label for="phone" class="col-sm-12 col-md-5 form-label pt-md-2">Phone Number</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="phone" value="" name="phone">
                                {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label for="address" class="col-sm-12 col-md-5 form-label pt-md-2">Address</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" id="address" value="{{ 'holding/ road/ thana/ division/ country' }}" name="address">
                                {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                            </div>
                        </div>

                        <hr />

                        <div class="">
                            <input type="checkbox" class="" onclick="isChecked(this);">
                            <p id="one" class="d-inline text-muted" style="font-size: 14px;">By checking this you are giving your consent to our terms and condition</p>
                        </div>
                        <script>
                            function isChecked(thiss) {
                                if ($(thiss).prop(":checked")) {
                                    $('#complete-donation-btn').prop("disabled", true);
                                } else {
                                    $('#complete-donation-btn').prop("disabled", false);
                                }
                            }
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <button id="complete-donation-btn" type="submit" class="btn btn-primary">Complete Donation</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>