@extends('layout.dashboard')


@section('dashboard-content')
<div id="investigation-create">
    <!-- Loader -->
    <!-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
    <!-- Loader -->


    <!-- Hero Start -->
    <section class="bg-auth-home bg-circle-gradiant d-table w-100">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col"> 
                    <div class="card shadow rounded border-0 mt-4">
                        <div class="card-body">
                            <h4 class="card-title text-center">Investigation Report</h4>
                            <!--
                            campaignId is set from 'Upload Investigation info' button of 'campaign-single' page
                            there it's set a query parameter.
                            -->
                            <form class="mt-4" action="{{ route('investigation.store', ['campaignId' => request()->campaignId]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <p class="form-label">
                                                Write here all of your investigation report about this campaign
                                            </p>
                                        </div>
                                    </div><!--end col-->
                                    
                                    

                                    <div class="col-12">
                                        <div class="license-agrement">
                                            <div class="row">
                                                <div class="form-group form-row {{ $errors->has('investigation-report')? 'has-error':'' }}">
                                                    <label for="description" class="col-12 form-label pt-md-2">Investigation Report<span class="text-danger">*</span></label>
                                                    <div class="col-12">
                                                        <div class=" form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <textarea name="text_report" class="form-control description ps-5" rows="8" required>{{ old('investigation-report') }}</textarea>
                                                        </div>
                                                        {!! $errors->has('investigation-report')? '<p class="help-block">'.$errors->first('investigation-report').'</p>':'' !!}
                                                        <!--<p class="text-info"> @lang('app.description_info_text')</p>-->
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="agreed" id="licenseCheckBox" name="licenseCheckBox">
                                                            <label class="form-check-label" for="licenseCheckBox">I Accept Terms And Condition</label>
                                                            <!--<label class="form-check-label" for="flexCheckDefault">I Accept <a href="javasccript:void(0)" class="text-primary">Terms And Condition</a></label>-->
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-12 text-right">
                                                    <span class="">
                                                        <button id="licenseCheckBtn" type="submit" class="btn btn-primary" disabled>Request</button>
                                                    </span>
                                                </div><!--end col-->
                                                <script>
                                                    $(document).ready(function() {
                                                        $("#licenseCheckBox").click(function() {
                                                            if ($(this).is(":checked")) {
                                                                $("#licenseCheckBtn").prop('disabled', false);
                                                            } else {
                                                                  $("#licenseCheckBtn").prop('disabled', true);
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
</div>
@endsection
