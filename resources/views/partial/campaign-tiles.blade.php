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
                                return function(...args) {
                                    clearTimeout(timer);
                                    timer = setTimeout(fn.bind(this, ...args), ms || 0);
                                };
                            };
                            
                            $('#search-campaign').keyup(delay(function (e) {
                                  $('#searchsubmit').click();
                            }, 1000));
                        </script>
                    </div>
                    
                    <!--
                    script is in campaign-master.blade.php file
                    <select id="filter-campaign" class="form-select form-control" name="f" aria-label="Default select example" onchange="filterCampaign(this)">
                        @if(request()->f)
                        <option value="{{request()->f}}" class="selected" selected>Sort by latest</option>
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
                    -->
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        <!--this portion producers campaign tiles-->
        @if( !$campaigns->count() )
            <div class="col-12 col-lg-6 mt-4 pt-2 text-center">
                No Campaigns Available
            </div><!--end col-->
        @else
            @foreach($campaigns as $campaign)
                @if($campaign)
                    <div class="col-12 col-lg-6 mt-4 pt-2">
                        @include('partial.campaign-tile', $campaign)
                    </div><!--end col-->
                @endif
            @endforeach
            <style>
                .btn-soft-danger {
                    background-color: #e43f52 !important;
                    border-color: #e43f52 !important;
                    color: #ffffff !important;
                    -webkit-box-shadow: 0 3px 5px 0 rgba(228, 63, 82, 0.3);
                    box-shadow: 0 3px 5px 0 rgba(228, 63, 82, 0.3);
                }
                .btn.btn-icon {
                    height: 36px;
                    width: 36px;
                    line-height: 34px;
                    padding: 0;
                }
            </style>
            <script>
                function createLike(thiss, campaignId){
                    $.ajax({
                        url: `/update-like/${campaignId}`,
                        type: "post",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data){
                            if(data.created){
                                $(thiss).find('.far').removeClass('fa-thumbs-up');
                                $(thiss).find('.far').addClass('fa-heart');
                            }
                            else {
                                $(thiss).find('.far').removeClass('fa-heart');
                                $(thiss).find('.far').addClass('fa-thumbs-up');
                            }
                        }
                    });
                }
            </script>
        @endif

        <!-- PAGINATION START -->
        <div class="col-12 mt-4 pt-2 pagination justify-content-center">
            @if($campaigns->count() && $campaigns instanceof Illuminate\Contracts\Pagination\Paginator)
            {{$campaigns->links()}}
            @endif
        </div><!--end col-->
        <!-- PAGINATION END -->
    </div>
</div>