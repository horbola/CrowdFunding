@extends('layout.dashboard')


@section('dashboard-content')
<div id="platform-panel">
    <div class="row">
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('platform.indexPlatformSettings')}}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Settings</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('category.index') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Category</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('comment.index') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Comment</h4>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-6 col-md-12 mt-4 pt-2">
            <a href="{{ route('preference.index') }}">
                <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle me-3">
                        <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="title mb-0">Blog</h4>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
