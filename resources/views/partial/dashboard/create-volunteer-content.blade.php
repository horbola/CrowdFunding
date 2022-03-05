<div id="create-volunteer-content">
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
                            <h4 class="card-title text-center">Request to be a volunteer</h4>  
                            <form class="mt-4" action="{{ route('volunteer.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <p class="form-label">
                                                here will be put some information about the activity of volunteering
                                            </p>
                                        </div>
                                    </div><!--end col-->
                                    
                                    

                                    <div class="col-12">
                                        <div class="license-agrement">
                                            <div class="row">
                                                <div class="col-12 mb-3 mt-3 border border-0" style="max-height: 100px; overflow-y: auto;">
                                                    <p class="form-label">
                                                        this is the lincense textthis is the lincense textthis is the lincense text's
                                                        this is the lincense textthis is the lincense textthis is the lincense text
                                                        this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                                        this is the lincense textthis is the lincense textthis is the lincense text
                                                        this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                                        this is the lincense textthis is the lincense textthis is the lincense text
                                                        this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                                        this is the lincense textthis is the lincense textthis is the lincense text
                                                        this is the lincense textthis is the lincense textvthis is the lincense textthis is the lincense textthis is the lincense text's
                                                        this is the lincense textthis is the lincense textthis is the lincense text
                                                        this is the lincense textthis is the lincense textv
                                                    </p>
                                                </div><!--end col-->
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
