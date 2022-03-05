@extends('layout.dashboard')


@section('dashboard-content')
@php
    use App\Models\User;
    use App\Models\Donation;
    use App\Models\Campaign;
@endphp
<div id="users-panel">
    <div class="row">
        <div class="col">
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white">
                <div class="legend bg-white position-absolute">User Type</div>
                <a href="{{ route('user.indexAllUsers', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                All Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::all()->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexActiveUsers', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Active Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereActiveStatus(1)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexMalicousUsers', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Malicious Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereActiveStatus(2)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexBlockedUsers', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Blocked Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereActiveStatus(3)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexLeftUsers', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Left Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereActiveStatus(4)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexPausedUsers', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Paused Users <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereActiveStatus(5)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            
            <div class="two-column-table position-relative mx-auto border border-1 shadow bg-white mt-5">
                <div class="legend bg-white position-absolute">User Weight</div>
                <a href="{{ route('user.indexGuests', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Guests <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                @php
                                $users = User::all()->filter(function($user, $key){
                                    return $user->hasRole('guest');
                                });
                                echo $users->count();
                                @endphp
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexDonors', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Donors <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                @php
                                echo Donation::all()->unique('user_id')->count();
                                @endphp
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexCampaigners', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Campaigners <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ Campaign::all()->unique('user_id')->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexVolunteerRequests', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Volunteer Requests <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereIsVolunteer(1)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexVolunteers', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Volunteers <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereIsVolunteer(2)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexStaffs', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Staffs <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereIsAdmin(1)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('user.indexSuper', ['menuName'=>$request->menuName]) }}">
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="one h5 text-right text-muted">
                                Super Admin <span class="ps-4">:</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="two h3 ps-2  text-muted">
                                {{ User::whereIsSuper(1)->count() }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
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
