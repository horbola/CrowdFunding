<div id="flash-msg" class="text-center">
    @if(session('success'))
    <div class="mb-5">
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    </div>
    @endif
    
    @if(session('info'))
    <div class="mb-5">
        <div class="alert alert-info">
            {!! session('info') !!}
        </div>
    </div>
    @endif
    
    @if(session('error'))
    <div class="mb-5">
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    </div>
    @endif
</div>