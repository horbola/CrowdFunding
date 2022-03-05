<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <nav class="navbar fixed-top navbar-expand-xl nav-container">
            <div class="container main-nav">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="/images/logo-b.png" alt=""></a>
                
                <form class="d-flex search-fields">
                    <input id="search-campaign-main" name="q" type="text" class="form-control me-2 search-input" placeholder="Search...">
                    <!--<input type="image" class="search-icon" id="searchsubmit" src="/images/icons/search-icon-dark.png" alt="Submit Form"></input>-->
                    <div class="search-icon" id="searchsubmit"><img src="/images/icons/search-icon-dark.png" alt="Submit Form"/></div>
                </form>
                <style>
                    .search-input:focus {
                        color: #333 !important;
                    }
                    .search-input {
                        color: #333 !important;
                    }
                    #searchsubmit {
                        order: 0;
                        padding: 10px 20px;
                        position: absolute;
                        right: 10px;
                        top: 5px;
                    }
                </style>

                <button class="mobile-toggle navbar-dark primary-bar collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span style="color: #fff;"></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="collapse navbar-collapse nav-brd" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mb-2 mb-lg-0 nav-list-container offerus">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">How it Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                        <li class="nav-item mr-a button-a">
                            <a class="nav-link link-btn campaign-btn" href="{{ route('campaign.create') }}">Start a Campaign</a>
                        </li>
                        @guest
                            @if(Route::has('login'))
                            <li class="nav-item mx-3">
                                <a class="nav-link link-btn login-btn" href="{{ route('login') }}">Login</a>
                            </li>
                            @endif
                            @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link link-btn register-btn" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                        @else
                            <li class="nav-item d-none d-lg-block">
                                <div class="dropdown">
                                    <button class="btn btn-success" type="button" id="userIcon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="userIcon">
                                        <li><a class="dropdown-item" href="{{route('user.show')}}">Dashboard</a></li>
                                        <form id="logout-form" class="d-inline" action="{{ route('logout')}}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item d-block d-lg-none mt-2"><a href="{{route('user.showMenu')}}">Dashboard</a></li>
                            <li class="nav-item d-block d-lg-none mt-2">
                                <form id="logout-form" class="d-inline" action="{{ route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-white">Logout</button>
                                </form>
                            </li>
                        @endguest
                        
                        {{--
                        @php $myCampaign = (Request::segment(1) === 'dashboard'); @endphp
                        @if($myCampaign){}
                            
                        @else
                        --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div><!--end container-->
    <style>
        /* this style necessary to pad the 'start a campaign' button in a single line. This container max-size is overwrriten by landrick style.
        that's why here it's just redefined.*/
        @media (min-width: 1400px) {
            #topnav .container {
                max-width: 1220px !important;
            }
        }
    </style>
</header><!--end header-->