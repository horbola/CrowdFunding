<div id="menu-dashboard" class="widget" style="overflow-y: auto; height: 100vh;">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        <!---------- donor activity menus ---------------------------------------------------------------------------------->
        @php
            $profile = (Route::currentRouteName() === 'user.show'
            || Route::currentRouteName() === 'user.edit'
            || Route::currentRouteName() === 'user.update'
            || Route::currentRouteName() === 'user.updatePhoto' ? true : false);
            $profile = ($profile && !$request->user_panel_fraction);
        @endphp
        <li class="navbar-item account-menu px-0 {{ $profile ? 'active' : '' }}">
            <a href="{{ route('user.show')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Profile</h6>
            </a>
        </li>
        <hr />
        
        <li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexDonatedCampaign' ? 'active' : '' }}">
            <a href="{{ route('campaign.indexDonatedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Donated Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexSupportedCampaign' ? 'active' : '' }}">
            <a href="{{ route('campaign.indexSupportedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                <h6 class="mb-0 ms-2">Supported Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexSharedCampaign' ? 'active' : '' }}">
            <a href="{{ route('campaign.indexSharedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Shared Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexCommentedCampaign' ? 'active' : '' }}">
            <a href="{{ route('campaign.indexCommentedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Commented Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexViewedCampaign' ? 'active' : '' }}">
            <a href="{{ route('campaign.indexViewedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Viewed  Campaigns</h6>
            </a>
        </li>
        <hr />
        <!---------- donor activity menus end ---------------------------------------------------------------------------------->
        
        
        
        
        <!---------- campaigner menus ---------------------------------------------------------------------------------->
        @php $myCampaign = (Request::segment(3) === 'my-campaigns-panel'); @endphp
        <li class="navbar-item account-menu px-0 mt-2 {{ $myCampaign ? 'active' : '' }}">
            <a href="{{ route('campaign.indexMyCampaignsPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">My Campaigns</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.create' ? 'active' : '' }}">
            <a href="{{ route('campaign.create')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Create Campaign</h6>
            </a>
        </li>

        @php $campaignerFundPanel = (Request::segment(3) === 'campaigner-fund-panel'); @endphp
        <li class="navbar-item account-menu px-0 mt-2 {{ $campaignerFundPanel ? 'active' : '' }}">
            <a href="{{ route('fund.indexCampaignerFundPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Withdraw Fund</h6>
            </a>
        </li>
        <hr />
        <!---------- campaigner menus end ---------------------------------------------------------------------------------->
        
        
        
        
        <!---------- volunteer menus ---------------------------------------------------------------------------------->
        @php
            $volunteer = (Route::currentRouteName() === 'volunteer.create'
            || Route::currentRouteName() === 'volunteer.store'
            || Route::currentRouteName() === 'volunteer.destroy' ? true : false);
        @endphp
        @if(Auth::user()->is_volunteer === 0 || Auth::user()->is_volunteer === 3 || Auth::user()->is_volunteer === 4)
        <li class="navbar-item account-menu px-0 mt-2 {{ $volunteer ? 'active' : '' }}">
            <a href="{{ route('volunteer.create')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Be a Volunteer</h6>
            </a>
        </li>
        @endif
        
        @if(Auth::user()->is_volunteer === 1 || Auth::user()->is_volunteer === 2)
        <li class="navbar-item account-menu px-0 mt-2 {{ $volunteer ? 'active' : '' }}">
            <a href="{{ route('volunteer.destroy')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Resign Volunteer</h6>
            </a>
        </li>
        @endif
        
        <li class="navbar-item account-menu px-0 mt-2 {{ (Route::currentRouteName() === 'investigation.index') ? 'active' : '' }}">
            <a href="{{ route('investigation.index')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">My Investigations</h6>
            </a>
        </li>
        
        @php
            $investigate = (Route::currentRouteName() === 'investigation.create'
            || Route::currentRouteName() === 'investigation.store'
            || Route::currentRouteName() === 'investigation.create-form' ? true : false);
        @endphp
        <li class="navbar-item account-menu px-0 mt-2 {{ $investigate ? 'active' : '' }}">
            <a href="{{ route('investigation.create')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Investigate</h6>
            </a>
        </li>
        <hr />
        <!---------- volunteer menus end ---------------------------------------------------------------------------------->
        
        
        
        
        
        
        <!---------- admin menus ---------------------------------------------------------------------------------->
        @if( (Auth::user()->is_admin === 1) || (Auth::user()->is_super === 1) )
        @php $adminUsersPanel = (Request::segment(3) === 'users-panel' ||
                                (isset($request)? $request->user_panel_fraction : false));
        @endphp
        <li class="navbar-item account-menu px-0 mt-2 {{ $adminUsersPanel ? 'active' : '' }}">
            <a href="{{ route('user.indexUsersPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <!--<a href="users-panel" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">-->
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Users</h6>
            </a>
        </li>

        @php $adminCampaignsPanel = (Request::segment(3) === 'admin-campaign-panel'); @endphp
        <li id="campaigns" class="navbar-item account-menu px-0 mt-2 {{ $adminCampaignsPanel || ($request->adminCampaignMenu?? 0) ? 'active' : '' }}">
            <a href="{{ route('campaign.indexAdminCampaignPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                <h6 class="mb-0 ms-2">Campaigns</h6>
            </a>
        </li>

        @php $adminFundPanel = (Request::segment(3) === 'admin-fund-panel'); @endphp
        <li class="navbar-item account-menu px-0 mt-2 {{ $adminFundPanel ? 'active' : '' }}">
            <a href="{{ route('fund.indexAdminFundPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Fund</h6>
            </a>
        </li>
        
        @php $platformPanel = (Request::segment(3) === 'platform-panel'); @endphp
        <li class="navbar-item account-menu px-0 mt-2 {{ $platformPanel ? 'active' : '' }}">
            <a href="{{ route('platform.indexPlatformPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Platform</h6>
            </a>
        </li>
        <hr />
        @endif
        
        <li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'preference.index' ? 'active' : '' }}">
            <a href="{{ route('preference.index')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-setting"></i></span>
                <h6 class="mb-0 ms-2">Preferences</h6>
            </a>
        </li>
        <!---------- admin menus end ---------------------------------------------------------------------------------->
    </ul>
</div>
