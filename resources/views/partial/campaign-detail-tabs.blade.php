<div id="campaign-tabs">
    <ul class="nav nav-pills shadow flex-column flex-sm-row d-md-inline-flex mb-0 p-1 bg-white rounded position-relative overflow-hidden" id="pills-tab" role="tablist">
        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 active rounded border border-1" id="description-data" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">
                <div class="text-center">
                    <h6 id="cus-font" class="mb-0">Description</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->

        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 rounded border border-1" id="document-info" data-bs-toggle="pill" href="#document" role="tab" aria-controls="additional" aria-selected="false">
                <div class="text-center">
                    <!--<h6 class="mb-0">Documents</h6>-->
                    <h6 id="cus-font2" class="mb-0">Documents</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->

        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 rounded border border-1" id="update-number" data-bs-toggle="pill" href="#update" role="tab" aria-controls="review" aria-selected="false">
                <div class="text-center">
                    <!--<h6 class="mb-0">Updates</h6>-->
                    <h6 class="mb-0">Updates</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->

        <li class="nav-item m-1">
            <a class="nav-link py-2 px-5 rounded border border-1" id="donor-comments" data-bs-toggle="pill" href="#donor" role="tab" aria-controls="review" aria-selected="false">
                <div class="text-center">
                    <h6 class="mb-0">Donors</h6>
                </div>
            </a><!--end nav link-->
        </li><!--end nav item-->
    </ul>
    <!-- info tabs starts -->
    <div class="tab-content mt-5" id="pills-tabContent">
<!------------------------------------------------------------------------------------------------------------------------------------------------->        
        <!--description tab starts-->
        <div class="card border-0 tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-data">
            <div class="descrip border border-fuchsia bg-light p-2">
                <div id="descrip-raw" class="text-muted mb-0"></div>
                <script>$('#descrip-raw').append('{!! $campaign->description !!}');</script>
            </div>
            
            <div class="investigation border border-fuchsia bg-light mt-2 p-2">
                <h4 class="text-center">Investigation Report</h4>
                @if($campaign->investigation)
                <!-- avatar ----------------------------------------->
                <div class="d-flex align-items-center mt-3">
                    <a class="pe-3" href="#">
                        <img src="{{$campaign->investigation->investigator->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                    </a>
                    <div class="flex-1 commentor-detail">
                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$campaign->investigation->investigator->name}}</a></h6>
                        <small class="text-muted">{{Helper::formattedTime($campaign->investigation->created_at)}}</small>
                    </div>
                </div>
                <!-- avatar ends ----------------------------------------->
                <p class="text-muted fst-italic mt-3 rounded">{{$campaign->investigation->text_report}}</p>
                @else
                <p class="text-muted fst-italic mt-3 rounded">There's no investigation report. This campaign is not verified yet</p>
                @endif
            </div>
            <!-- comment ------------------------------------------->
            <div class="reviw investigation border border-fuchsia bg-light my-2 p-2">
                <div class="row">
                    <div class="col text-center">
                        <div class="btn-group mt-2" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="peoples-review-btn" autocomplete="off" checked>
                            <label class="btn btn-outline-primary btn-primary-color" for="peoples-review-btn" onclick="changeTextColor(this);">People's Review</label>

                            <input type="radio" class="btn-check" name="btnradio" id="your-review-btn" autocomplete="off">
                            <label class="btn btn-outline-primary" for="your-review-btn" onclick="changeTextColor(this);">Add Your Review</label>
                        </div>
                        <style>
                            .btn-group .btn-outline-primary:first-of-type {
                                border-top-left-radius: .3rem ;
                                border-bottom-left-radius: .3rem ;
                            }
                            
                            .btn-primary-color {
                                color: #fff !important;
                            }
                        </style>
                        <script>
                             function changeTextColor(thiss){
                                 $(thiss).closest('.btn-group').children('label').removeClass('btn-primary-color');
                                 $(thiss).addClass('btn-primary-color');
                                 if($(thiss).attr('for') === 'peoples-review-btn'){
                                     window.scrollTo(0, $('#peoples-review').offset().top - 200);
                                 }
                                 else window.scrollTo(0, $('#your-review').offset().top - 100);
                             }
                        </script>
                    </div>
                </div>
                <div class="row mt-5">
                    <div id="peoples-review" class="col-12">
                        <ul class="media-list list-unstyled mb-0">
                            @include('partial.comments-display', ['comments' => $campaign->comments])
                        </ul>
                    </div><!--end col-->
                    
                    <div id="your-review" class="col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                        <form class="ms-lg-4" action="{{route('comment.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <hr />
                                    <h5>Add your review:</h5>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Review:</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                            <textarea id="message" placeholder="Your Comment" rows="5" name="body" class="form-control ps-5" required></textarea>
                                            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="send d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!-- comment ends ------------------------------------------->
        </div>
        <!--description tab ends-->
<!------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--document tab starts-->
        <!--
        if any script of this portion is placed inside the template file
        and vue js file is invluded in the same file then the script does not parsed
        to resolve this problem the functionality is disabled from 'resources/js/app.js' file
        --> 
        <div class="border border-0 tab-pane fade" id="document" role="tabpanel" aria-labelledby="additional-info">
            <div class="documents-carousel owl-carousel owl-theme">
                @if($campaign->documents->count())
                    @foreach($campaign->documents as $doc)
                    <div class="" style="width: 100%; height: 400px">
                        <!--<img src="{{$doc->image_path}}" onclick="deleteImage(this, '{{ route('document.delete', $doc->id) }}');"/>-->
                        <!--<img src="{{$doc->image_path}}" data-route="{{ route('document.delete', $doc->id) }}" data-for="document" data-bs-toggle="modal" data-bs-target="#img-del-conf-model"/>-->
                        <img src="{{$doc->image_path}}" data-route="{{ route('document.delete', $doc->id) }}" data-for="document" ondblclick="openImgDelModal(this)"/>
                    </div>
                    @endforeach
                @else
                <p class="text-center">There no document have been attached to this campaign</p>
                @endif
            </div>
        </div>
        <!--document tab endss-->
<!------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--update tab starts-->
        <div class="border border-0 tab-pane fade" id="update" role="tabpanel" aria-labelledby="additional-info">
            @if($campaign->updates->count())
                @foreach($campaign->updates as $anUpdate)
                <div class="d-flex align-items-center mt-3">
                    <a class="pe-3" href="#">
                        <img src="{{$anUpdate->campaign->campaigner->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                    </a>
                    <div class="flex-1 commentor-detail">
                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$anUpdate->campaign->campaigner->name}}</a></h6>
                        <small class="text-muted">{{Helper::formattedTime($anUpdate->created_at)}}</small>
                    </div>
                </div>
                @if($anUpdate->descrip)
                <p class="text-muted fst-italic mt-3 p-3 bg-light rounded">{{$anUpdate->descrip}}</p>
                @endif
                @foreach($anUpdate->updateItems as $anImage)
                <div class="mx-auto" style="width: 70%; height: 300px;">
                    <img style="height: 100%; width: 100%" src="{{$anImage->image_path}}" class="" alt="img">
                </div>
                @endforeach
                @endforeach
            @else
            <p class="text-muted fst-italic mt-3 p-3 bg-light rounded">There no update have been posted</p>
            @endif
        </div>
        <!--update tab ends-->
<!------------------------------------------------------------------------------------------------------------------------------------------------->
        <!-- donor tab starts -->
        <div class="border-0 tab-pane fade" id="donor" role="tabpanel" aria-labelledby="review-comments">
            <ul class="list-unstyled">
                @if($campaign->donations->count())
                    @foreach($campaign->donations as $donation)
                    <li class="mt-4 ml-3">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <div class="d-flex align-items-center">
                                    <a class="pe-3" href="#">
                                        <img src="{{$donation->donor->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                    </a>
                                    <div class="flex-1 commentor-detail">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$donation->donor->name}}</a></h6>
                                        <!--<small class="text-muted">15th August, 2019 at 01:25 pm</small>-->
                                        <small class="text-muted">{{Helper::formattedTime($donation->created_at)}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                {{$donation->totalPayedAmount()}}
                            </div>
                        </div>
                    </li>
                    @endforeach
                @else
                <p class="text-center">There no donation have been made for this campaign</p>
                @endif
            </ul>
        </div>
        <!-- donor tab ends -->
<!------------------------------------------------------------------------------------------------------------------------------------------------->        
    </div><!-- info tabs content ends -->
    
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
                var imgDelModel = document.getElementById('img-del-conf-model');
                var modal = new bootstrap.Modal( imgDelModel, {});
                modal.show(thiss);
            }
        </script>
    </div>
</div>


@section('campaign-detail-tabs-style')
<link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    #campaign-image .item {
        background: #0c83e7;
        /*padding: 80px 0px;*/
        /*margin: 5px;*/
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }

    #campaign-image-thumb .item {
        /*background: #C9C9C9;*/
        margin: 5px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
        cursor: pointer;
        border: 1px solid transparent;
    }
    
    #campaign-image-thumb .item:first-child {
        margin-left: 0;
    }
    
    #campaign-image-thumb .current .item {
        border: 1px solid red;
    }

    #campaign-image.owl-theme {
        position: relative;
    }
</style>
<style>
    #campaign-tabs li.nav-item:hover {}
</style>
@endsection


@section('campaign-detail-tabs-script-bottom')
<script>
    function initTinySlider(){
        if(document.getElementsByClassName('tiny-single-item').length > 0) {
            var slider = tns({
                container: '.tiny-single-item',
                items: 1,
                controls: false,
                mouseDrag: true,
                loop: true,
                rewind: true,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 3000,
                navPosition: "bottom",
                speed: 400,
                gutter: 16,
            });
        };

        if(document.getElementsByClassName('tiny-two-item').length > 0) {
            var slider = tns({
                container: '.tiny-two-item',
                controls: false,
                mouseDrag: true,
                loop: true,
                rewind: true,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 3000,
                navPosition: "bottom",
                speed: 400,
                gutter: 12,
                responsive: {
                    992: {
                        items: 2
                    },

                    767: {
                        items: 2
                    },

                    320: {
                        items: 1
                    },
                },
            });
        };

        if(document.getElementsByClassName('tiny-three-item').length > 0) {
            var slider = tns({
                container: '.tiny-three-item',
                controls: false,
                mouseDrag: true,
                loop: true,
                rewind: true,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 3000,
                navPosition: "bottom",
                speed: 400,
                gutter: 12,
                responsive: {
                    992: {
                        items: 3
                    },

                    767: {
                        items: 2
                    },

                    320: {
                        items: 1
                    },
                },
            });
        };

        if(document.getElementsByClassName('tiny-four-item').length > 0) {
            var slider = tns({
                container: '.tiny-four-item',
                controls: false,
                mouseDrag: true,
                loop: true,
                rewind: true,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 3000,
                navPosition: "bottom",
                speed: 400,
                gutter: 12,
                responsive: {
                    992: {
                        items: 4
                    },

                    767: {
                        items: 2
                    },

                    320: {
                        items: 1
                    },
                },
            });
        };

        if(document.getElementsByClassName('tiny-six-item').length > 0) {
            var slider = tns({
                container: '.tiny-six-item',
                controls: false,
                mouseDrag: true,
                loop: true,
                rewind: true,
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayTimeout: 3000,
                navPosition: "bottom",
                speed: 400,
                gutter: 12,
                responsive: {
                    992: {
                        items: 6
                    },

                    767: {
                        items: 3
                    },

                    320: {
                        items: 1
                    },
                },
            });
        };
    }
</script>
<script onload="initTinySlider()" src="{{ asset('js/tiny-slider.js') }}"></script>
<script>
    function initOwlCarousel(){
        $(".documents-carousel").owlCarousel({
            items: 1,
            dots: false,
            margin: 20
        });
    }
</script>
<script onload="initOwlCarousel()" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- not used -->
<script>
    // called and deletes image on single call
    function deleteImage(thiss, route){
        var form = new Form(route, 'post');
        form.append('_token', $('meta[name=csrf-token]').attr('content'));
        form.submit();
    }
</script>
@endsection