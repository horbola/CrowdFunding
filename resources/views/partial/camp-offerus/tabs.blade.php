<div class="desc-area">
    @php
        use App\Library\Helper;
    @endphp
    <div class="buttons-wrapper">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="description-tab" data-bs-toggle="pill"
                        data-bs-target="#description" type="button" role="tab" aria-controls="description"
                        aria-selected="true">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="document-tab" data-bs-toggle="pill"
                        data-bs-target="#document" type="button" role="tab"
                        aria-controls="document" aria-selected="false">Document</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="update-tab" data-bs-toggle="pill"
                        data-bs-target="#update" type="button" role="tab"
                        aria-controls="update" aria-selected="false">Update</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="donars-tab" data-bs-toggle="pill"
                        data-bs-target="#donars" type="button" role="tab"
                        aria-controls="donars" aria-selected="false">Donars</button>
            </li>
        </ul>

        <!-- singular -->
        <div class="tab-content" id="pills-tabContent">
            <!-- description -->
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="content update-image">
                    @if($campaign->description)
                        <textarea id="summernote">{{$campaign->description}}</textarea>
                    @else
                    <div class="invst-area mb-0">
                        There's no description yet.
                        @if(Auth::check() && Auth::user()->id === $campaign->campaigner->id)
                             You can easily edit this campaign to add a nice description with some pretty images.
                            <strong><a class="text-bold" href="{{ route('campaign.edit', $campaign->id).'#summernote' }}">Edit Campaign</a></strong>
                        @endif
                    </div>
                    @endif
                    <!--
                    <div id="descrip-raw" class="text-muted mb-0"></div>
                    <script>$('#descrip-raw').append('{!! $campaign->description !!}');</script>
                    <script>
                        $('#descrip-raw').append('{!! $campaign->description !!}');
                        function escapeRegExp(input) {
                            const source = typeof input === 'string' || input instanceof String ? input : '';
                            return source.replace(/[-[/\]{}()*+?.,\\^$|#\s]/g, '\\$&');
                        }
                    </script>
                    -->
                </div>
            </div>

            <!-- document -->
            <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                <div class="invst-area">
                    @if($campaign->documents->count())
                    @foreach($campaign->documents as $doc)
                    <div>
                        <div class="update-image">
                            <img class="upd-img" src="{{$doc->image_path}}" data-can-delete="{{ $doc->canBeDeleted()? 1 : 0 }}" data-route="{{ route('document.delete', $doc->id) }}" data-for="document" ondblclick="openImgDelModal(this)"/>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center">There no document have been attached to this campaign</p>
                    @endif
                </div>
            </div>

            <!-- update -->
            <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
                <div class="update-list">
                    @if($campaign->updates->count())
                    @foreach($campaign->updates as $anUpdate)
                    <div class="update-detail">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="profile-img">
                                <img src="{{$anUpdate->campaign->campaigner->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                            </div>
                            <div class="name-date-wrapper">
                                <p class="name">{{$anUpdate->campaign->campaigner->name}}</p>
                                <span class="date-block">{{App\Library\Helper::formattedTime($anUpdate->created_at)}}</span>
                            </div>
                        </div>
                        @if($anUpdate->descrip)
                        <div class="about-desc">
                            <p>{{$anUpdate->descrip}}</p>
                        </div>
                        @endif
                        @foreach($anUpdate->updateItems as $anImage)
                        <div class="doc-image update-image">
                            <img src="{{$anImage->image_path}}" alt="">
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    @else
                    <p class="text-muted fst-italic mt-3 p-3 bg-light rounded">There no update have been posted</p>
                    @endif
                </div>
            </div>

            <!-- donars -->
            <div class="tab-pane fade" id="donars" role="tabpanel" aria-labelledby="donars-tab">
                <div class="donor-list">
                    <div>
                        <div class="heading d-flex justify-content-between">
                            <div class="col">
                                <p>Name</p>
                            </div>
                            <div class="col list-amount-head text-center">
                                <p>Amount</p>
                            </div>
                        </div>
                        
                        @php $donationCount = $campaign->donationsLimitFilteredZero() ? $campaign->donationsLimitFilteredZero()->count(): 0 ;@endphp
                        @if($donationCount)
                        <div class="donor-scroll">
                            @foreach($campaign->donationsLimitFilteredZero() as $donation)
                            <div class="main-list">
                                <div class="d-flex justify-content-between">
                                    <div class="col flex-wrap d-flex justify-content-start align-items-center">
                                        <div class="user-img-margin">
                                            @if($donation->anonymous === 'Open')
                                                <img src="{{$donation->donor->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                            @else
                                                <img src="{{ $donation->donor->avatarCommon() }}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                            @endif
                                        </div>
                                        @if($donation->anonymous === 'Open')
                                            <p class="name-date">{{$donation->donor->name}}
                                        @else
                                            <p class="name-date">Anonymous
                                        @endif
                                            <span class="date-block">{{App\Library\Helper::formattedTime($donation->created_at)}}</span>
                                        </p>
                                        <div>
                                            @if($donation->donor->is_special === 'yes')
                                            <div>
                                                <img src="/images/verify.png" alt="Is Special">
                                            </div>
                                            @elseif($donation->donor->is_volunteer === 'yes')
                                            <div>
                                                <img src="/images/verify.png" alt="Is Volunteer">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col list-amount text-center">
                                        <p>{{ Helper::formatMoneyFigure($donation->totalPayedAmount()) }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-center">There no donation has been made for this campaign</p>
                        @endif
                    </div>
                    
                    @if($donationCount > 100)
                    <div class="text-center">
                        <a class="btn-dark-p loadMore" href="#"> Load More </a>
                        <span>
                            ({{ $donationCount }} of {{ $campaign->donations->count() }} Donations)
                        </span>
                    </div>
                    @endif
                    <style>
                        .donor-scroll {
                            max-height: 700px;
                            overflow-x: hidden;
                            overflow-y: auto;
                        }
                    </style>
                </div>
            </div>
            
            <!--document image delete model starts-->
            <div title="model-component-wrapper">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="">
                    <div class="modal fade" id="img-del-conf-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Iamge?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this image?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    $(document).ready(function(){
                        var imgDelModel = document.getElementById('img-del-conf-model');
                        imgDelModel.addEventListener('show.bs.modal', function (event) {
                            var csrfToken = $('meta[name=csrf-token]').attr('content');
                            var route = $(event.relatedTarget).attr('data-route');
                            var imageType = $(event.relatedTarget).attr('data-for');
                            var title = `Delete ${imageType} Image?`;
                            $(imgDelModel).closest('form').attr('action', route);
                            $(imgDelModel).siblings('input[name=_token]').val(csrfToken);
                            $(imgDelModel).find('.modal-title').text(title);
                        });
                    });
            
                    // called on double call
                    function openImgDelModal(thiss){
                        var canDelete = $(thiss).attr('data-can-delete');
                        if (canDelete === '0') return;
                        var imgDelModel = document.getElementById('img-del-conf-model');
                        var modal = new bootstrap.Modal( imgDelModel, {});
                        modal.show(thiss);
                    }
                </script>
            </div>
            <!--document image delete model ends-->

        </div>
    </div>
</div>


@section('campaign-detail-tabs-script-bottom')
<!--<script>
    function initOwlCarousel(){
        $(".documents-carousel").owlCarousel({
            items: 1,
            dots: false,
            margin: 20
        });
    }
</script>
<script onload="initOwlCarousel()" src="{{ asset('js/owl.carousel.min.js') }}"></script>-->

<script>
    // called and deletes image on single call
    function deleteImage(thiss, route){
        var form = new Form(route, 'post');
        form.append('_token', $('meta[name=csrf-token]').attr('content'));
        form.submit();
    }
</script>

@endsection