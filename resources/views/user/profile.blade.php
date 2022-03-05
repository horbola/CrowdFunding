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
@php
    $uExtra = $user->userExtra;
    $cAddr = $user->currentAddress();
    $pAddr = $user->permanentAddress();
@endphp
<div id="profile">
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Name<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->name}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Date Of Birth<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$uExtra? ($uExtra->birth_date? $uExtra->birth_date : 'No Birth Date Is Setup') : 'No Birth Date Is Setup'}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Gender<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->gender? $user->gender: ''}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">NID<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$uExtra? ($uExtra->nid? $uExtra->nid : 'No National ID Is Setup') : 'No National ID Is Setup'}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Email<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->email? $user->email : 'No Email is Setup'}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Phone<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$uExtra? ($uExtra->phone? $uExtra->phone : 'No Phone Number Setup') : 'No Phone Number Setup'}}</div>
    </div>
    
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Facebook<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$uExtra? ($uExtra->facebook? $uExtra->facebook : 'No Facebook Is Setup') : 'No Facebook Is Setup'}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Twitter<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$uExtra? ($uExtra->twitter? $uExtra->twitter : 'No Twitter Is Setup') : 'No Twitter Is Setup'}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">About<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$user->about? $user->about: 'No about info is provided'}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Current Address<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded address">
            <div class="row mt-3">
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Holding</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$cAddr? ($cAddr->holding? $cAddr->holding : 'No Current Holding Is Setup') : 'No Current Holding Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Road/Home</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$cAddr? ($cAddr->road? $cAddr->road : 'No Current Road Is Setup') : 'No Current Road Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Post Code</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$cAddr? ($cAddr->post_code? $cAddr->post_code : 'No Current Post Code Is Setup') : 'No Current Post Code Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Upazilla</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$cAddr? ($cAddr->upazilla? $cAddr->upazilla : 'No Current Upazilla Is Setup') : 'No Current Upazilla Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">District</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$cAddr? ($cAddr->district? $cAddr->district : 'No Current District Is Setup') : 'No Current District Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Country</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$cAddr? ($cAddr->country? $cAddr->country->nicename : 'No Current Country Is Setup') : 'No Current Country Is Setup'}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Permanent Address<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded address">
            <div class="row mt-3">
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Holding</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$pAddr? ($pAddr->holding? $pAddr->holding : 'No Permanent Holding Is Setup') : 'No Permanent Holding Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Road/Home</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$pAddr? ($pAddr->road? $pAddr->road : 'No Permanent Road Is Setup') : 'No Permanent Road Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Post Code</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$pAddr? ($pAddr->post_code? $pAddr->post_code : 'No Permanent Post Code Is Setup') : 'No Permanent Post Code Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Upazilla</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$pAddr? ($pAddr->upazilla? $pAddr->upazilla : 'No Permanent Upazilla Is Setup') : 'No Permanent Upazilla Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">District</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$pAddr? ($pAddr->district? $pAddr->district : 'No Permanent District Is Setup') : 'No Permanent District Is Setup'}}</p>
                </div>
                <div class="col-6 position-relative mb-3">
                    <label class="labels">Country</label>
                    <p class="border border-1 rounded py-2 ps-2">{{$pAddr? ($pAddr->country? $pAddr->country->nicename : 'No Permanent Country Is Setup') : 'No Permanent Country Is Setup'}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Care-Of<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$uExtra? ($uExtra->careof? $uExtra->careof : 'No Careof Person Setup') : 'No Careof Person Setup'}}</div>
    </div>
    <div class="row my-3">
        <div  class="col-sm-12 col-md-3 text-left text-md-right py-1">Care-Of Phone<span> : </span></div>
        <div class="col-sm-12 col-md-9 border border-1 rounded py-1">{{$uExtra? ($uExtra->careof_phone? $uExtra->careof_phone : 'No Care-fo Person Phone Is Setup') : 'No Care-fo Person Phone Is Setup'}}</div>
    </div>
    
    
    <div class="text-center mt-5 ">
       <a href="{{ route('user.edit', ['id' => $user->id, 'user_panel_fraction' => request()->user_panel_fraction]) }}"
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

