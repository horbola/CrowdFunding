<div id="profile-action-btns">
    @php
        $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
    @endphp
    @if(Auth::check() && (Request::segment(1) ?? '') === 'dashboard')
    <div class="row mb-5 text-right">
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


    @if(Auth::check() && Auth::user()->hasRole('staff') && (($uri_segments[2] ?? '') === 'admin'))
    <div class="row mb-5 text-right">
        <div class="col">
            admin buttons
        </div>
    </div>
    @endif
</div>