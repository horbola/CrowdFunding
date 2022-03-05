<div id="campaigns-related">
    <div class="container mt-100 mt-60">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">Related Campaigns</h5>
            </div><!--end col-->

            <div class="col-12 mt-4">
                <div class="tiny-three-item pb-3">
<!-------------------------------a slide ---------------------------------------------------------------------------------------------------->
                    @if($campaign->related()->count())
                        @foreach($campaign->related() as $campaign)
                            @include('partial.campaign-tile')
                        @endforeach
                    @endif
<!-------------------------------a slide ---------------------------------------------------------------------------------------------------->                    
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- related products ends -->
</div>