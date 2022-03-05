@extends('layout.dashboard')


@section('dashboard-content')
<div id="profile">
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Name :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info">
                <a href="javascript:void(0)" class="text-muted">{{ $user->name }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Email :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info">
                <a href="javascript:void(0)" class="text-muted">{{ $user->email }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Gender :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info">
                <a href="javascript:void(0)" class="text-muted">{{ $user->gender }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Password :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info">
                <a href="javascript:void(0)" class="text-muted">Edit Password</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Phone :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info">
                <a href="javascript:void(0)" class="text-muted">{{ $user->phone }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Website :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info">
                <a href="javascript:void(0)" class="text-muted">{{ $user->website }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-3 tag">
            <div class="py-2">
                <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                <h6 class="text-primary mb-0 d-inline-block">Country :</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 field">
            <div class="p-2 info">
                <a href="javascript:void(0)" class="text-muted">{{ $user->countryNiceName }}</a>
                <div class="iconn d-inline float-right">
                    <i data-feather="edit" class="fea icon-ex-md text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-5 ">
       <a href="{{ route('user.edit', ['id' => $user->id, 'user_panel_fraction' => $request->user_panel_fraction]) }}" class="btn btn-primary btn-md px-5" tabindex="-1" role="button" aria-disabled="true">Edit Profile</a>
    </div>
</div><!--end col-->
@endsection

