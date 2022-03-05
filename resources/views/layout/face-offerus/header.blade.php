<!-- top navigation area -->
<div class="header-bottombar overflow - hidden">
    <nav class="navbar arif navbar-expand-xl nav-container">
        <div class="container main-nav">
            <a class="navbar-brand logoA" href="#"><img src="/images/logo-a.png" alt=""></a>
            <a class="navbar-brand logoB" href="#"><img src="/images/logo-b.png" alt=""></a>

            <form class="d-flex search-fields">
                <input class="form-control me-2" type="text" placeholder="Search..." aria-label="Search">
                <input class="search-icon logoA" type="image" src="/images/icons/search-icon.png" alt="Submit Form" />
                <input class="search-icon logoB" type="image" src="/images/icons/search-icon-dark.png" alt="Submit Form" />
            </form>

            <button class="mobile-toggle navbar-dark collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="collapse navbar-collapse nav-brd" id="navbarTogglerDemo02">
                <ul class="navbar-nav mb-2 mb-lg-0 nav-list-container">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">How it Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Contact Us</a>
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
                                        <li><a class="dropdown-item dashboard-item" href="{{route('user.show')}}">Dashboard</a></li>
                                        <style>
                                            .dashboard-item {
                                                color: black !important;
                                            }
                                        </style>
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
                    
                    
                </ul>
            </div>
        </div>
    </nav>
</div>
