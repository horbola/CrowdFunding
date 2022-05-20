<div id="profile-action-btns">
    <!--buttons for non-admin actions-->
    @php
        $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
    @endphp
    <!--this portion is actually only for client, not for admin. conceptually a client can only delete or pause her account-->
    <!--it's temporarily blocked for admin. but when an admin watches his own profile he should be able to perform these operation. so write login for this.-->
    @php $switchOff = true @endphp
    @if(!Auth::user()->is_admin)
    @if(Auth::check() && (Request::segment(1) ?? '') === 'dashboard' && !$switchOff)
    <div class="row mb-3 text-right">
        <div class="col">
            <span>
                <form class="d-inline" action="{{ route('user.updateDeletion') }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary">Delete Account</button>
                </form>
            </span>
            <span>
                <form class="d-inline" action="{{ route('user.updatePausing') }}" method="post">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary">Pause Account</button>
                </form>
            </span>
        </div>
    </div>
    @endif
    @endif
    
    @php
        $actStat = $user->active_status;
        $panelFrac = request()->user_panel_fraction;
    @endphp
    
    
    <!--buttons for admin actions-->
    @if(Auth::check() && Auth::user()->is_admin && (($uri_segments[2] ?? '') === 'admin'))
    <div class="row mb-5 text-right">
        <div class="col">
            <div>
                <!--
                if route condition is not set then volunteer and volunteer requests are shown every type of
                user pages where there are any volunteer or volunteer requests
                -->
                @if( ($panelFrac === 'volunteer-request') && ( (int)$user->is_volunteer === 1 ) )
                <span>
                    <form class="d-inline" action="{{ route('user.updateVolunteer') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="update_volunteer" value="2">
                        <button type="submit" class="btn btn-primary">Approve Volunteer Reqeust</button>
                    </form>
                </span>
                <span>
                    <form class="d-inline" action="{{ route('user.updateVolunteer') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="update_volunteer" value="0">
                        <button type="submit" class="btn btn-primary">Cancel Volunteer Reqeust</button>
                    </form>
                </span>
                @elseif( ($panelFrac === 'volunteer') && ( (int)$user->is_volunteer === 2 ) )
                <span>
                    <form class="d-inline" action="{{ route('user.updateVolunteer') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="update_volunteer" value="3">
                        <button type="submit" class="btn btn-primary">Revoke Volunteering Ability</button>
                    </form>
                </span>
                @endif
            </div>
            
            <!--buttons for active status-->
            <div class="mt-1">
                @if( (int)$actStat === 3 && ($panelFrac === 'blocked' && (!($panelFrac === 'volunteer-request'))) )
                <span>
                    <form class="d-inline" action="{{ route('user.updateActiveStatus') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="update_active_status" value="1">
                        <button type="submit" class="btn btn-primary">Unblock User</button>
                    </form>
                </span>
                @else
                <span>
                    <form class="d-inline" action="{{ route('user.updateActiveStatus') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="update_active_status" value="3">
                        <button type="submit" class="btn btn-primary">Block User</button>
                    </form>
                </span>
                @endif
                
                
                @if( (int)$actStat === 2 && ($panelFrac === 'malicous') )
                <span>
                    <form class="d-inline" action="{{ route('user.updateActiveStatus') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="update_active_status" value="1">
                        <button type="submit" class="btn btn-primary">Unmark User as Malicious</button>
                    </form>
                </span>
                @else
                <span>
                    <form class="d-inline" action="{{ route('user.updateActiveStatus') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="update_active_status" value="2">
                        <button type="submit" class="btn btn-primary">Mark User as Malicious</button>
                    </form>
                </span>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>