<div class="content">
    <div class="heading">
        <h2>{{$campaign->title}}</h2>
    </div>
    <div class="extra-info d-flex justify-content-between align-items-center">
        <div class="cnt-left">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-start align-items-center">
                    <div>
                        <img src="{{$campaign->campaigner->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                        <!--<img class="img-fluid" src="{{$campaign->campaigner->avatar()}}" alt="Avatar">-->
                    </div>
                    <p class="name mx-2">{{$campaign->campaigner->name}}</p>
                    <!--if anyone is both special and volunteer, only the special role will be prevailed of that man by this block-->
                    @if($campaign->campaigner->is_special === 'yes')
                    <div>
                        <img src="/images/verify.png" alt="Is Special">
                    </div>
                    @elseif($campaign->campaigner->is_volunteer === 'yes')
                    <div>
                        <img src="/images/verify.png" alt="Is Volunteer">
                    </div>
                    @endif
                </div>
                <div>
                    <div class="date d-flex justify-content-between align-items-center">
                        <img src="/images/icons/calender.png" alt="">
                        <p>{{$campaign->getCampHeadingDateFormat()}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cnt-right">
            <div class="link d-flex justify-content-between align-items-center">
                <div class="position-relative" id="copy-text">
                    <div class="link d-flex justify-content-between align-items-center">
                        <p class="text-to-copy pe-2" onclick="copyText(this);">{{ route('campaign.shortLink', $campaign->slug) }}</p>
                        <span><img src="/images/icons/copy.png" alt=""></span>
                    </div>
                    <span class="invisible copied">Link copied to clipboard</span>
                    <script>
                        function copyText(textElem) {
                            navigator.clipboard.writeText($(textElem).text());
                            $('#copy-text .copied').removeClass('hide-copy-text invisible');
                            setTimeout( function() {
                                $('#copy-text .copied').addClass('hide-copy-text');
                            }, 2000);
                          }
                    </script>
                    <style>
                        #copy-text .text-to-copy {
                            width: 100px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                        }
                        
                        #copy-text .copied {
                            position: absolute;
                            top: -35px;
                            right: 15px;
                            background-color: white;
                            color: red;
                            z-index: 100;
                            border-radius: 5px;
                            border: 1px solid green;
                            padding: 3px;
                        }

                        .hide-copy-text {
                            opacity: 0;
                            transition: opacity 1s linear;
                            -webkit-transition: opacity 1s linear;
                            -moz-transition: opacity 1s linear;
                            -o-transition: opacity 1s linear;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</div>