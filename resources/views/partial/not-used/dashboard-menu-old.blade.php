<div id="dashboard-menu" class="widget">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        <li id="profile" class="navbar-item account-menu px-0 @if(request()->routeIs('user.show')) active @endif">
            <a href="{{ route('user.show')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Profile</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('campaign.indexClientCampaign') && $type === 'donated') active @endif">
            <a href="{{ route('campaign.indexClientCampaign', ['type' => 'donated'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Donated Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('campaign.indexClientCampaign') && $type === 'supported') active @endif">
            <a href="{{ route('campaign.indexClientCampaign', ['type' => 'supported'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                <h6 class="mb-0 ms-2">Supported Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('campaign.indexClientCampaign') && $type === 'shared') active @endif">
            <a href="{{ route('campaign.indexClientCampaign', ['type' => 'shared'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Shared Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('campaign.indexClientCampaign') && $type === 'commented') active @endif">
            <a href="{{ route('campaign.indexClientCampaign', ['type' => 'commented'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Commented Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('campaign.indexClientCampaign') && $type === 'viewed') active @endif">
            <a href="{{ route('campaign.indexClientCampaign', ['type' => 'viewed'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Viewed  Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('campaign.create')) active @endif">
            <a href="{{ route('campaign.create')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Create Campaign</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('campaign.indexClientCampaign') && $type === 'by-you') active @endif">
            <a href="{{ route('campaign.indexClientCampaign', ['type' => 'by-you'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Campaigns by You</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('wallet.showCampaignerWallet')) active @endif">
            <a href="{{ route('wallet.showCampaignerWallet', ['userID' => '2'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Wallet for Campaigning</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('settings.showClientSettings')) active @endif">
            <a href="{{ route('settings.showClientSettings', ['userID' => '3'])}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-setting"></i></span>
                <h6 class="mb-0 ms-2">Settings</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2 @if(request()->routeIs('category.index')) active @endif">
            <a href="{{ route('category.index') }}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-setting"></i></span>
                <h6 class="mb-0 ms-2">Settings</h6>
            </a>
        </li>
    </ul>
</div>
