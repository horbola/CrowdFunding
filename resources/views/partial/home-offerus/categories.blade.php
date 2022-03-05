<!-- grid col section -->
<section class="container-fluid">
    <div class="container grid-col-sec">
        <div class="row">
            <div class="col-md-4">
                <div class="cnt-left">
                    <img class="img-fluid" src="images/logo-b.png" alt="">
                    <h2 class="my-2">Cases you can <br>
                        raise funds for</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna
                    </p>
                    <a class="btn-dark-p my-3 hide-sm" href="{{ route('campaign.create') }}">Raise Money <img
                            src="images/icons/arrow-right-sm-w.png" alt="->"> </a>
                </div>
            </div>

            <div class="col-md-8">
                <div class="grid-container p-reltive">
                    <div class="row featured_category">
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 1]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon1.png" alt="">
                                        <h4>Medical</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 2]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon2.png" alt="">
                                        <h4>Education</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 3]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon3.png" alt="">
                                        <h4>Animals</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 4]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon4.png" alt="">
                                        <h4>Creative</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 5]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon5.png" alt="">
                                        <h4>Food & Hunger</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 6]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon6.png" alt="">
                                        <h4>Environment</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 7]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon7.png" alt="">
                                        <h4>Children</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="xm-b-2 col-sm-4 col-md-4 col-xl-3 gy-4">
                            <a href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 8]) }}">
                                <div class="singular text-center d-flex align-items-center">
                                    <div class="m-auto">
                                        <img class="img-fluid" src="images/icons/g-icon8.png" alt="">
                                        <h4>Memorial</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <style>
                            .featured_category a:link, .featured_category a:visited,  .featured_category a:hover, .featured_category a:active
                            {
                                color: #000000;
                                text-decoration: none;
                            }
                        </style>
                    </div>
                </div>
                <div class="text-center hide-md">
                    <a class="btn-dark-p" href="#">Raise Money <img src="images/icons/arrow-right-sm-w.png" alt="->"> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->