@extends('layout.dashboard-fluid')


@section('dashboard-content-fluid')
<div id="users">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-7 text-center text-md-start">
            <div class="section-title">
                @if($users->count() && $users instanceof Illuminate\Contracts\Pagination\Paginator)
                <h5 class="mb-0 mt-4 mt-md-0">Showing {{$users->firstItem()}}–{{$users->lastItem()}} of {{$users->total()}} results</h5>
                @endif
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

    <div class="row">
        <!--this portion producers campaign tiles-->
        <div class="col-12 mt-4 pt-2">
            @include('partial.users-table')
        </div><!--end col-->

        <!-- PAGINATION START -->
        <div class="col-12 mt-4 pt-2 pagination justify-content-center">
            @if($users->count() && $users instanceof Illuminate\Contracts\Pagination\Paginator)
            {{$users->links()}}
            @endif
        </div><!--end col-->
        <!-- PAGINATION END -->
    </div>
</div>
@endsection