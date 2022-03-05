<div id="dashboard-menu" class="widget">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        <li id="profile" class="navbar-item account-menu px-0" onclick="loadDashBCont('{{ route('user.showProfile', ['userID' => '1'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Profile</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('campaign.indexClientCampaign', ['type' => 'donated'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Donated Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('campaign.indexClientCampaign', ['type' => 'supported'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                <h6 class="mb-0 ms-2">Supported Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('campaign.indexClientCampaign', ['type' => 'shared'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                <h6 class="mb-0 ms-2">Shared Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('campaign.indexClientCampaign', ['type' => 'commented'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Commented Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('campaign.indexClientCampaign', ['type' => 'viewed'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Viewed  Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('campaign.indexClientCampaign', ['type' => 'by-you'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Campaigns by You</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('wallet.showCampaignerWallet', ['userID' => '1'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Wallet for Campaigning</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('settings.showClientSettings', ['userID' => '1'])}}', '#ajax-content');updateMenuStatus(this)">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-setting"></i></span>
                <h6 class="mb-0 ms-2">Settings</h6>
            </a>
        </li>
    </ul>
    <script>
        function loadDashBCont(url, hostElemID){
            $.ajax({
                url: url,
                success: function(result){
                    $(hostElemID).html(result);
                }
            });
        };
        function updateMenuStatus(thiss){
            $('#navmenu-nav li').each(function(index, elem){
                $(this).removeClass('active');
            })
            $(thiss).addClass('active');
        }
    </script>
    <script type="text/javascript">
        $("#profile").click();
    </script>
</div>
