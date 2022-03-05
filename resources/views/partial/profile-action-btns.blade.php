<div id="profile-action-btns">
    <!--buttons for non-admin actions-->
    @php
        $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
    @endphp
    @if(Auth::check() && (Request::segment(1) ?? '') === 'dashboard')
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


    <!--buttons for admin actions-->
    @if(Auth::check() && Auth::user()->is_admin && (($uri_segments[2] ?? '') === 'admin'))
    <div class="row mb-5 text-right">
        <div class="col">
            <div>
                <!--
                if route condition is not set then volunteer and volunteer requests are shown every type of
                user pages where there are any volunteer or volunteer requests
                -->
                @if( ($request->user_panel_fraction === 'volunteer-request') && ($user->is_volunteer === 1) )
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
                @elseif( ($request->user_panel_fraction === 'volunteer') && ($user->is_volunteer === 2) )
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
                @if( $user->active_status === 3 && ($request->user_panel_fraction === 'blocked') )
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
                
                
                @if( $user->active_status === 2 && ($request->user_panel_fraction === 'malicous') )
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