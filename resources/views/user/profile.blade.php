@extends('layout.dashboard')


@section('dashboard-content')
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg
     xmlns='http://www.w3.org/2000/svg' width='8'
     height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'
     fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.show') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.show') }}">Profile</a></li>
    </ol>
</nav>
@include('partial.profile-action-btns')
<div id="profile">
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Name<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->name}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Date Of Birth<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->userExtra->birth_date}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Gender<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->gender}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">NID<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->userExtra->nid}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Email<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->email}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Phone<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->userExtra->phone}}</div>
    </div>
    
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Facebook<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->userExtra->facebook}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Twitter<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->userExtra->twitter}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Current Address<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded address">
            <div class="row mt-3">
                <div class="col-6 position-relative">
                    <label class="labels">Holding</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->currentAddress()->holding}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">Road/Home</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->currentAddress()->road}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">Upazilla</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->currentAddress()->upazilla}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">District</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->currentAddress()->district}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">Country</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->currentAddress()->country->nicename}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Permanent Address<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded address">
            <div class="row mt-3">
                <div class="col-6 position-relative">
                    <label class="labels">Holding</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->permanentAddress()->holding}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">Road/Home</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->permanentAddress()->road}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">Upazilla</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->permanentAddress()->upazilla}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">District</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->permanentAddress()->district}}</p>
                </div>
                <div class="col-6 position-relative">
                    <label class="labels">Country</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$user->permanentAddress()->country->nicename}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Care-Of<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->userExtra->careof}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Care-Of Phone<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->userExtra->careof_phone}}</div>
    </div>
    
    
    <div class="text-center mt-5 ">
       <a href="{{ route('user.edit', ['id' => $user->id, 'user_panel_fraction' => $request->user_panel_fraction]) }}"
          class="btn btn-primary btn-md px-5"
          tabindex="-1"
          role="button"
          aria-disabled="true">Edit Profile</a>
    </div>
</div><!--end col-->
@endsection



@section('profile-style')
<style>
    #profile .address label {
        font-size: 12px;
        position: absolute;
        top: -10px;
        left: 20px;
        background-color: #f3f3f3;
    }
</style>
@endsection

@section('profile-script')
<script>
    
</script>
@endsection

