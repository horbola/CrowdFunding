<div id="campaign-tiles">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-7 text-center text-md-start">
            <div class="section-title">
                @if($campaigns->count() && $campaigns instanceof Illuminate\Contracts\Pagination\Paginator)
                <h5 class="mb-0 mt-4 mt-md-0">Showing {{$campaigns->firstItem()}}–{{$campaigns->lastItem()}} of {{$campaigns->total()}} results</h5>
                @endif
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="form custom-form">
                <div class="mb-0">
                    <!-- script is in campaign-master.blade.php file -->
                    <select id="filter-campaign" class="form-select form-control" name="f" aria-label="Default select example" onchange="filterCampaign(this)">
                        @if($request->f)
                        <option value="{{$request->f}}" class="selected" selected>Sort by latest</option>
                        @else
                        <option value="latest" selected>Sort by latest</option>
                        @endif
                        <option value="high-donation">Sort by high donation</option>
                        <option value="high-shared">Sort by high shared</option>
                        <option value="high-support">Sort by high support</option>
                        <option value="most-viewed">Sort by most viewed</option>
                    </select>
                    <script>
                        function filterCampaign(thiss){
                            var newForm = $('<form>', {
                                    'action': "{{ route('campaign.indexFilteredCampaign') }}",
                                    'method': 'get',
                                    'target': '_top'
                                }).append($('<input>', {
                                    'name': 'f',
                                    'value': $(thiss).value(),
                                    'type': 'hidden'
                                })).append($('<input>', {
                                    'name': 'category_id',
                                    'value': '{{ $active?? -1 }}',
                                    'type': 'hidden'
                                }));
                            newForm.submit();
                        }
                    </script>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <!--this portion producers campaign tiles-->
        @foreach($campaigns as $campaign)
        <div class="col-12 col-lg-6 mt-4 pt-2">
            @include('partial.campaign-tile', $campaign)
        </div><!--end col-->
        @endforeach

        <!-- PAGINATION START -->
        <div class="col-12 mt-4 pt-2 pagination justify-content-center">
            @if($campaigns->count() && $campaigns instanceof Illuminate\Contracts\Pagination\Paginator)
            {{$campaigns->links()}}
            @endif
        </div><!--end col-->
        <!-- PAGINATION END -->
    </div>
</div>