<section class="container-fluid hero-banner px-0">
    @php
        use App\Models\Donation;
        use App\Models\Campaign;
    @endphp
    <div class="container">
        <div class="row">
            <!-- hero content -->
            <div class="col-md-4">
                <div class="hero-text">
                    <h1 class="heading"><span>You can make</span> the difference</h1>
                    <p class="cnt">
                        Crowdfunding Website and <br>
                        Fundraising Platform
                    </p>

                    <a class="btn-white-p" href="{{ route('campaign.indexGuestCampaign', ['categoryId' => 1]) }}">Donate <img src="images/icons/arrow-right-sm.png" alt="->"> </a>
                    <div class="clearfix hide-xl"></div>
                    <a class="btn-white-p mx-3" href="{{ route('campaign.create') }}">Raise Money <img src="images/icons/arrow-right-sm.png" alt="->"> </a>
                </div>
            </div>

            <!-- hero images -->
            <div class="col-md-8">
                <div class="hero-imageCnt">


                    <!-- Hero banner slider start  -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="hero-image" src="images/human-1.png" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="hero-image" src="images/banner2.png" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="hero-image" src="images/banner3.png" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <!-- Hero SLider banner End -->


                    <!-- hero cnt -->
                    <div class="cnt-tab cnt-tab-1 d-flex">
                        <img src="images/icons/icon-hr-1.png" alt="">
                        <div>
                            <h3 class="cnt-tab-title">Donors</h3>
                            <p class="p-0"> @php echo Donation::all()->unique('user_id')->count(); @endphp </p>
                        </div>
                    </div>
                    <!-- hero cnt -->
                    <div class="cnt-tab  cnt-tab-2 d-flex">
                        <img src="images/icons/icond.png" alt="">
                        <div>
                            <h3 class="cnt-tab-title">Fundraisers</h3>
                            <p class="p-0">{{ Campaign::all()->unique('user_id')->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>