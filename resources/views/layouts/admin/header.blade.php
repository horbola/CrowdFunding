<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="/home">
            <img src="/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
            <img src="/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
        </a>
        @guest
            @if(Route::has('register'))
            <div class="buy-button">
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
            @endif
            @if(Route::has('login'))
            <div class="buy-button">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
            @endif
        @else
            <div class="buy-button dropdown">
                <a href="#" class="btn btn-icon btn-primary" data-toggle='dropdown'><i class="uil uil-user icons"></i></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('dashboard.indexAdminDashB')}}">Dashboard</a>
                    <button class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</button>
                </div>
                <form id="logout-form" class="d-none" action="{{ route('logout')}}" method="POST">@csrf</form>
            </div>
        @endguest
        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item mb-0">
                <div class="dropdown">
                    <button type="button" class="btn btn-link text-decoration-none dropdown-toggle p-0 pe-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-search text-muted"></i>
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-3 py-0" style="width: 300px;">
                        <form class="dropdown-item">
                            <input type="text" id="text" name="name" class="form-control border bg-white" placeholder="Search...">
                        </form>
                    </div>
                </div>
            </li>
                <li class="list-inline-item mb-0">
                <a href="#" class="btn btn-icon btn-primary"><i class="uil uil-twitter icons"></i></a>
            </li>
        </ul><!--end login button-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->   
            <ul class="navigation-menu">
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Campaigns</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="documentation.html" class="sub-menu-item">Medical</a></li>
                        <li><a href="changelog.html" class="sub-menu-item">Science</a></li>
                        <li><a href="components.html" class="sub-menu-item">Animals</a></li>
                        <li><a href="widget.html" class="sub-menu-item">Start up</a></li>
                    </ul>
                </li>
            </ul><!--end navigation menu-->
            <div class="buy-menu-btn d-none">
                <a href="#" target="_blank" class="btn btn-primary">Login</a>
            </div><!--end login button-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->