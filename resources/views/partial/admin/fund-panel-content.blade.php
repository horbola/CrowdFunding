<div id="users-content">
    <div class="row">
        <div class="col">
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white">
                <div class="legend bg-white position-absolute">Campaign Status</div>
                <a href="{{ route('campaign.indexAdminCampaign', ['category' => 'pending']) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Cashed <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                14
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminCampaign', ['category' => 'completed']) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Withdrawn <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                1050
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('campaign.indexAdminCampaign', ['category' => 'blocked']) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Total Payment Gateway cost <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                50
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
