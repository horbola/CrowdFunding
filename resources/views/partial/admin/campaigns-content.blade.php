@extends('admin.campaigns')


@section('dashboard-content')
<div id="client-camp-content">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-7 text-center text-md-start">
            <div class="section-title">
                <h5 class="mb-0 mt-4 mt-md-0">Showing {{$campaigns->firstItem()}}–{{$campaigns->lastItem()}} of {{$campaigns->total()}} results</h5>
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
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
        </div><!--end col-->
    </div><!--end row-->

    <div class="">
        <!--this portion producers campaign tiles-->
        <div class="col-12 mt-4 pt-2">
            @include('partial.admin.component.campaigns-table')
        </div><!--end col-->
        
        
        <!-- PAGINATION START -->
        <div class="col-12 mt-4 mb-0 pt-2 pagination justify-content-center">
            {{$campaigns->links()}}
        </div>
        <!-- PAGINATION END -->
    </div>
</div>
@endsection