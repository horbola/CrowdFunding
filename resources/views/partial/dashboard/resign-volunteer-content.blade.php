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
                            <h4 class="card-title text-center">Are you sure you will resign volunteer?</h4>  
                            <form class="mt-4" action="{{ route('volunteer.destroy-confirm') }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <p class="form-label">
                                                If you resign volunteer you will loose some power. Such as: <br />
                                                    1. You can not justify any campaign that this is not true.
                                                       But still you can comment on any campaign.
                                            </p>
                                        </div>
                                        
                                        <div class="col-12 text-right">
                                            <span class="">
                                                <button id="licenseCheckBtn" type="submit" class="btn btn-primary">Resign</button>
                                            </span>
                                        </div><!--end col-->
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
