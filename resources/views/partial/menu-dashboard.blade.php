<div id="menu-dashboard" class="widget" style="overflow-y: auto; height: 100vh;">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        <!---------- donor activity menus ---------------------------------------------------------------------------------->
        @php
            $profile = (Route::currentRouteName() === 'user.show'
            || Route::currentRouteName() === 'user.edit'
            || Route::currentRouteName() === 'user.update'
            || Route::currentRouteName() === 'user.updatePhoto' ? true : false);
            $profile = ($profile && !request()->user_panel_fraction);
        @endphp
        <!--<li class="navbar-item account-menu px-0 {{ $profile ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 {{ $menuName === 'profile'? 'active' : '' }}" data-menu-name="profile">
            <a href="{{ route('user.show')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-user-circle"></i></span>
                <h6 class="mb-0 ms-2">Profile</h6>
            </a>
        </li>
        <hr />
        
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexDonatedCampaign' ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'donated-camp'? 'active' : '' }}" data-menu-name="donated-camp">
            <a href="{{ route('campaign.indexDonatedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-money-insert"></i></span>
                <h6 class="mb-0 ms-2">Donated Campaigns</h6>
            </a>
        </li>

        <!--<li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexSupportedCampaign' ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'supported-camp'? 'active' : '' }}" data-menu-name="supported-camp">
            <a href="{{ route('campaign.indexSupportedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-heart-alt"></i></span>
                <h6 class="mb-0 ms-2">Supported Campaigns</h6>
            </a>
        </li>

        <!--<li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexSharedCampaign' ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'shared-camp'? 'active' : '' }}" data-menu-name="shared-camp">
            <a href="{{ route('campaign.indexSharedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-share-alt"></i></span>
                <h6 class="mb-0 ms-2">Shared Campaigns</h6>
            </a>
        </li>

        <!--<li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexCommentedCampaign' ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'commented-camp'? 'active' : '' }}" data-menu-name="commented-camp">
            <a href="{{ route('campaign.indexCommentedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-comments-alt"></i></span>
                <h6 class="mb-0 ms-2">Commented Campaigns</h6>
            </a>
        </li>

        <!--<li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.indexViewedCampaign' ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'viewed-camp'? 'active' : '' }}" data-menu-name="viewed-camp">
            <a href="{{ route('campaign.indexViewedCampaign')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-focus-add"></i></span>
                <h6 class="mb-0 ms-2">Viewed  Campaigns</h6>
            </a>
        </li>
        <hr />
        <!---------- donor activity menus end ---------------------------------------------------------------------------------->
        
        
        
        
        <!---------- campaigner menus ---------------------------------------------------------------------------------->
        @php $myCampaign = (Request::segment(3) === 'my-campaigns-panel'); @endphp
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $myCampaign ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'my-camp'? 'active' : '' }}" data-menu-name="my-camp">
            <a href="{{ route('campaign.indexMyCampaignsPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                <h6 class="mb-0 ms-2">My Campaigns</h6>
            </a>
        </li>
        
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'campaign.create' ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'create-camp'? 'active' : '' }}" data-menu-name="create-camp">
            <a href="{{ route('campaign.create')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-edit-alt"></i></span>
                <h6 class="mb-0 ms-2">Create Campaign</h6>
            </a>
        </li>

        @php $campaignerFundPanel = (Request::segment(3) === 'campaigner-fund-panel'); @endphp
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $campaignerFundPanel ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'withdraw-fund'? 'active' : '' }}" data-menu-name="withdraw-fund">
            <a href="{{ route('fund.indexCampaignerFundPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-money-withdrawal"></i></span>
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
        @if((int)Auth::user()->is_volunteer === 0 || (int)Auth::user()->is_volunteer === 3 || (int)Auth::user()->is_volunteer === 4)
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $volunteer ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'be-volunteer'? 'active' : '' }}" data-menu-name="be-volunteer">
            <a href="{{ route('volunteer.create')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-user-arrows"></i></span>
                <h6 class="mb-0 ms-2">Be a Volunteer</h6>
            </a>
        </li>
        @endif
        
        @if((int)Auth::user()->is_volunteer === 1 || (int)Auth::user()->is_volunteer === 2)
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $volunteer ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'resign-volunteer'? 'active' : '' }}" data-menu-name="resign-volunteer">
            <a href="{{ route('volunteer.destroy')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-comment-search"></i></span>
                <h6 class="mb-0 ms-2">Resign Volunteer</h6>
            </a>
        </li>
        @endif
        
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ (Route::currentRouteName() === 'investigation.index') ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'investigation'? 'active' : '' }}" data-menu-name="investigation">
            <a href="{{ route('investigation.index')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-search-alt"></i></span>
                <h6 class="mb-0 ms-2">My Investigations</h6>
            </a>
        </li>
        
        @php
            $investigate = (Route::currentRouteName() === 'investigation.create'
            || Route::currentRouteName() === 'investigation.store'
            || Route::currentRouteName() === 'investigation.create-form' ? true : false);
        @endphp
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $investigate ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'investigate'? 'active' : '' }}" data-menu-name="investigate">
            <a href="{{ route('investigation.create')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-cog"></i></span>
                <h6 class="mb-0 ms-2">Investigate</h6>
            </a>
        </li>
        <hr />
        <!---------- volunteer menus end ---------------------------------------------------------------------------------->
        
        
        
        
        
        
        <!---------- admin menus ---------------------------------------------------------------------------------->
        @if( ((int)Auth::user()->is_admin === 1) || ((int)Auth::user()->is_super === 1) )
        @php $adminUsersPanel = (Request::segment(3) === 'users-panel' ||
                                (isset($request)? $request->user_panel_fraction : false));
        @endphp
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $adminUsersPanel ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'users'? 'active' : '' }}" data-menu-name="users">
            <a href="{{ route('user.indexUsersPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <!--<a href="users-panel" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">-->
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Users</h6>
            </a>
        </li>

        @php $adminCampaignsPanel = (Request::segment(3) === 'admin-campaign-panel'); @endphp
        <!--<li id="campaigns" class="navbar-item account-menu px-0 mt-2 {{ $adminCampaignsPanel || ($request->adminCampaignMenu?? 0) ? 'active' : '' }}">-->
        <li id="campaigns" class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'campaign'? 'active' : '' }}" data-menu-name="campaign">
            <a href="{{ route('campaign.indexAdminCampaignPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                <h6 class="mb-0 ms-2">Campaigns</h6>
            </a>
        </li>

        @php $adminFundPanel = (Request::segment(3) === 'admin-fund-panel'); @endphp
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $adminFundPanel ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'fund'? 'active' : '' }}" data-menu-name="fund">
            <a href="{{ route('fund.indexAdminFundPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Fund</h6>
            </a>
        </li>
        
        @php $platformPanel = (Request::segment(3) === 'platform-panel'); @endphp
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ $platformPanel ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'platform'? 'active' : '' }}" data-menu-name="platform">
            <a href="{{ route('platform.indexPlatformPanel')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Platform</h6>
            </a>
        </li>
        <hr />
        @endif
        
        <!--<li class="navbar-item account-menu px-0 mt-2 {{ Route::currentRouteName() === 'preference.index' ? 'active' : '' }}">-->
        <li class="navbar-item account-menu px-0 mt-2 {{ $menuName === 'preferences'? 'active' : '' }}" data-menu-name="preferences">
            <a href="{{ route('preference.index')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-setting"></i></span>
                <h6 class="mb-0 ms-2">Preferences</h6>
            </a>
        </li>
        <!---------- admin menus end ---------------------------------------------------------------------------------->
    </ul>
    <script>
        var menuName = '{{$menuName}}';
        $('#menu-dashboard .navbar-item').each(function(ind, elem){
//            console.log( ind + ": " + $(this).data('menu-name') );
            $(this).removeClass( "active" );
            if( menuName === $(this).data('menu-name') )
                $(this).addClass('active');
        });
    </script>
</div>
