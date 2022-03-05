@extends('layout.dashboard')


@section('dashboard-content')
@php
    use App\Models\User;
    use App\Models\Donation;
    use App\Models\Campaign;
@endphp
<div id="users-panel">
    <div class="row">
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexAllUsers', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">All Users</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::all()->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexActiveUsers', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Active Users</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereActiveStatus(1)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexMalicousUsers', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Malicious Users</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereActiveStatus(2)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexBlockedUsers', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Blocked Users</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereActiveStatus(3)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexLeftUsers', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Left Users</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereActiveStatus(4)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexPausedUsers', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Paused Users</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereActiveStatus(5)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <hr />

    <div class="row">
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexGuests', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Guests</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">
                            @php
                                $users = User::all()->filter(function($user, $key){
                                    return $user->hasRole('guest');
                                });
                                echo $users->count();
                            @endphp
                        </h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexDonors', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Donors</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">
                            @php
                                echo Donation::all()->unique('user_id')->count();
                            @endphp
                        </h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexCampaigners', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Campaigners</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ Campaign::all()->unique('user_id')->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexVolunteerRequests', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Volunteer Requests</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereIsVolunteer(1)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexVolunteers', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Volunteers</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereIsVolunteer(2)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexStaffs', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Staffs</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereIsAdmin(1)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('user.indexSuper', ['menuName'=>$request->menuName]) }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Super Admin</h4>
                    </div>
                    <div class="">
                        <h4 class="title mb-0">{{ User::whereIsSuper(1)->count() }}</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <!--
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
                <div class="legend bg-white position-absolute">Donor Value</div>
                <a href="{{ route('user.indexTopDonors', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                who donated most that others are top donors
                                Top Donors <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexTopActives', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                who comments much are active donors
                                Top Active <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexTopSupporters', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                who likes most that others are top supporters
                                Top Supporters <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexTopVisiters', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                who are viewing most are top visiting
                                Top Visiting <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            -->
        </div>
    </div>
</div>
@endsection
