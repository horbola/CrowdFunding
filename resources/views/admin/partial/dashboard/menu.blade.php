<div id="dashboard-menu-admin" class="widget">
    <ul class="list-unstyled sidebar-nav mb-0 p-0" id="navmenu-nav">
        <li class="navbar-item account-menu px-0" onclick="loadDashBCont('{{ route('user.showProfile', ['userID' => '1'])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Profile</h6>
            </a>
        </li>
        
        <li id="summary" class="navbar-item account-menu px-0" onclick="loadDashBCont('{{ route('dashboard.indexDashBSummary')}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Summary</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0" onclick="loadDashBCont('{{ route('user.indexUsers')}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                <h6 class="mb-0 ms-2">Users</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('campaign.indexAdminCampaignSummary')}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                <h6 class="mb-0 ms-2">Campaigns</h6>
            </a>
        </li>

        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('', ['' => ''])}}', '#ajax-content');updateMenuStatus(this);">
            <a href="javascript:void(0)" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                <h6 class="mb-0 ms-2">Wallets</h6>
            </a>
        </li>
        
        <li class="navbar-item account-menu px-0 mt-2" onclick="loadDashBCont('{{ route('', ['' => ''])}}', '#ajax-content');updateMenuStatus(this);">
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
            });
            $(thiss).addClass('active');
        }
    </script>
    <script type="text/javascript">
        $("#summary").click();
    </script>
</div>