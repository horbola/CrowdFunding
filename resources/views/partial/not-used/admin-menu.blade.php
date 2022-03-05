<div id="admin-menu" class="widget">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        <li class="navbar-item account-menu px-0 @if(is_numeric(Request::segment(2))) active @endif">
            <a href="{{ route('user.showAdmin', ['userID' => '1'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Profile</h6>
            </a>
        </li>
        
        <!--<li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('user.indexUsersPanel')) active @endif">-->
        <li class="navbar-item account-menu px-0 mt-2 @if(Request::segment(2) === 'users-panel') active @endif">
            <a href="{{ route('user.indexUsersPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
            <!--<a href="users-panel" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">-->
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Users</h6>
            </a>
        </li>

        <li id="campaigns" class="navbar-item account-menu px-0 mt-2 @if(Request::segment(2) === 'admin-campaign-panel') active @endif">
            <a href="{{ route('campaign.indexAdminCampaignPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                <h6 class="mb-0 ms-2">Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(Request::segment(2) === 'platform') active @endif">
            <a href="{{ route('platform.index')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Platform</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(Request::segment(2) === 'app-settings') active @endif">
            <a href="{{ route('settings.indexAppSettings')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Settings</h6>
            </a>
        </li>
    </ul>
</div>
