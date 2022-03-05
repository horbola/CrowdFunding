<div id="users-content">
    <div class="row">
        <div class="col">
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white">
                <div class="legend bg-white position-absolute">User Type</div>
                <a href="{{ route('user.indexAllUsers') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                All Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                1050
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexActiveUsers') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Active Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                50
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexBlockedUsers') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Blocked Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                50
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexMalicousUsers') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Malicious Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                14
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexLeftUsers') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Left Users <span class="ps-4">:</span>
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
            
            
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
                <div class="legend bg-white position-absolute">User Weight</div>
                <a href="{{ route('user.indexGuests') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Guests <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                1050
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexDonors') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Donors <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                1050
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexCampaigners') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Campaigners <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                50
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexVolunteerRequests') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Volunteer Requests <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                1050
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexVolunteers') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Volunteers <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                1050
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexStaffs') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Staffs <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                14
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexSuper') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Super Admin <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                14
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
                <div class="legend bg-white position-absolute">Donor Value</div>
                <a href="{{ route('user.indexTopDonors') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                <!--who donated most that others are top donors-->
                                Top Donors <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                1050
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexTopActives') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                <!--who comments much are active donors-->
                                Top Active <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                14
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexTopSupporters') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                <!--who likes most that others are top supporters-->
                                Top Supporters <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                14
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexTopVisiters') }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                <!--who are viewing most are top visiting-->
                                Top Visiting <span class="ps-4">:</span>
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
