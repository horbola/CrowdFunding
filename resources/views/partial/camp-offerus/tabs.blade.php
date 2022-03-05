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
                <div class="content">
                    <div id="descrip-raw" class="text-muted mb-0"></div>
                    <script>$('#descrip-raw').append('{!! $campaign->description !!}');</script>
                </div>
            </div>

            <!-- document -->
            <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                <div class="documents-carousel owl-carousel owl-theme">
                    @if($campaign->documents->count())
                    @foreach($campaign->documents as $doc)
                    <div class="" style="width: 100%; height: 400px; margin-bottom: 80px;">
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
                        <div class="update-image">
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

                        @if($campaign->donations->count())
                            @foreach($campaign->donations as $donation)
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
                        @else
                        <p class="text-center">There no donation have been made for this campaign</p>
                        @endif
                    </div>
                    <div class="text-center">
                        <a class="btn-dark-p loadMore" href="#"> Load More </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>