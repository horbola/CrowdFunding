@extends('layout.dashboard-fluid')


@section('dashboard-content-fluid')
<div id="campaigns">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-7 text-center text-md-start">
            <div class="section-title">
                @if(!is_null($campaigns) && $campaigns->count() && $campaigns instanceof Illuminate\Contracts\Pagination\Paginator)
                <h5 class="mb-0 mt-4 mt-md-0">Showing {{$campaigns->firstItem()}}–{{$campaigns->lastItem()}} of {{$campaigns->total()}} results</h5>
                @elseif( !is_null($campaigns) && $campaigns->count() && $campaigns instanceof Illuminate\Contracts\Pagination\Paginator && $campaigns->total() !== $campaigns->count() )
                <h5 class="mb-0 mt-4 mt-md-0">Showing {{$campaigns->firstItem()}}–{{$campaigns->lastItem()}} of {{$campaigns->count()}} results</h5>
                @endif
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <!-- SEARCH -->
            <div class="widget">
                <form action="{{-- Illuminate\Support\Facades\Route::current() --}}" method="get">
                    <div class="input-group mb-3 border rounded border-primary">
                        <input type="hidden" name="searching" value="1">
                        <input type="text" id="search-campaign" name="q" class="form-control border-0" value="{{request()->q}}" placeholder="Search Keywords...">
                        <button type="submit" class="input-group-text bg-white border-0" id="searchsubmit"><i class="uil uil-search"></i></button>
                    </div>
                </form>
                <script>
                    $(function(){
                        var searching = "{{ request('searching') }}";
                        if(searching){
                            $('#search-campaign').focus();
                            var val = $('#search-campaign').val();
                            $('#search-campaign').val('');
                            $('#search-campaign').val(val);
                        }
                    });
                            
                    // this function doesn't work for global keyupp proroperty.
                    function delay(fn, ms) {
                        let timer = 0;
                        return function (...args) {
                            clearTimeout(timer);
                            timer = setTimeout(fn.bind(this, ...args), ms || 0);
                        };
                    }
                    ;

                    $('#search-campaign').keyup(delay(function (e) {
                        $('#searchsubmit').click();
                    }, 1000));
                </script>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="">
        <!--this portion producers campaign tiles-->
        <div class="col-12 mt-4 pt-2">
            @include('partial.campaigns-table')
        </div><!--end col-->
        
        
        <!-- PAGINATION START -->
        <div class="col-12 mt-4 mb-0 pt-2 pagination justify-content-center">
            @if(!is_null($campaigns) && $campaigns instanceof Illuminate\Contracts\Pagination\Paginator)
            {{$campaigns->links()}}
            @endif
        </div>
        <!-- PAGINATION END -->
    </div>
</div>
@endsection