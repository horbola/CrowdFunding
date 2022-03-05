<div id="users-content">
    <div class="row align-items-center">
        <div class="col-6 text-center text-md-start">
            <div class="section-title">
                <h5 class="mb-0 mt-4 mt-md-0">Showing 1–15 of 47 results</h5>
            </div>
        </div><!--end col-->

        <div class="col-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form custom-form">
                        <div class="mb-0">
                            <select class="form-select form-control" aria-label="Default select example" id="Sortbylist-job">
                                <option selected>Sort by latest</option>
                                <option>Sort by popularity</option>
                                <option>Sort by rating</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <!-- SEARCH -->
                    <div class="widget">
                        <form role="search" method="get">
                            <div class="input-group mb-3 border rounded">
                                <input type="text" id="s" name="s" class="form-control border-0" placeholder="Search Keywords...">
                                <button type="submit" class="input-group-text bg-white border-0" id="searchsubmit"><i class="uil uil-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <!--table for all users information-->
        @include('partial.admin.component.users-table')
        <!-- PAGINATION START -->
        <div class="col-12 mt-4 pt-2">
            <ul class="pagination justify-content-center mb-0">
                <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous"><i class="mdi mdi-arrow-left"></i> Prev</a></li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next <i class="mdi mdi-arrow-right"></i></a></li>
            </ul>
        </div><!--end col-->
        <!-- PAGINATION END -->
    </div>
</div>