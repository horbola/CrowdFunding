@extends('layouts.app.skel')

@section('content')
<section class="bg-half-170 pb-0 bg-light d-table w-100 overflow-hidden" style="background: url('/images/shapes/shape2.png') top; z-index: 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div></div>
            </div>
        </div>
    </div>
</section>


<!-- main content -->
<section class="position-relative">
    <div class="container">
        @php
            $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
        @endphp
        @if(Auth::user()->hasRole('campaigner') && (($uri_segments[3] ?? '') === 'my-campaigns-panel'))
        <div class="row mb-5 text-right">
            <div class="col">
                <span><a class="btn btn-primary {{$campaign->status !== 0 ? 'disabled' : ''}}" href="{{route('campaign.edit', [$campaign->id])}}">Edit Campaign</a></span>
                
                <span>
                    <form class="d-inline" action="{{route('campaign.updateStatusToCancel', [$campaign->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary" {{$campaign->status !== 0 ? 'disabled' : ''}}>Cancel</button>
                    </form>
                </span>
                
                <span>
                    <form class="d-inline" action="{{route('campaign.updateStatusToDeclined', [$campaign->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary" {{!$campaign->isActive() ? 'disabled' : ''}}>Decline</button>
                    </form>
                </span>
            </div>
        </div>
        @endif
        
        @if(request()->indexInvestigation)
        <div class="row mb-5 text-right">
            <div class="col">
                @php
                    $isInvestigated = DB::table('investigations')->where('user_id', Auth::user()->id)->where('campaign_id', $campaign->id)->get()->count();
                @endphp
                <span><a class="btn btn-primary {{$isInvestigated ? 'disabled' : ''}}" href="{{route('investigation.create-form', ['campaignId' => $campaign->id])}}">Upload Investigation info</a></span>
            </div>
        </div>
        @endif
        
        
        @if(Auth::user()->hasRole('staff') && (($uri_segments[3] ?? '') === 'admin-campaign-panel'))
        <div class="row mb-5 text-right">
            <div class="col">
                <span>
                    <form class="d-inline" action="{{route('campaign.updateStatusToApproved', [$campaign->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary" {{$campaign->status !== 0 ? 'disabled' : ''}}>Approve</button>
                    </form>
                </span>
                
                <span>
                    <form class="d-inline" action="{{route('campaign.updateStatusToCancel', [$campaign->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary" {{$campaign->status !== 0 ? 'disabled' : ''}}>Cancel</button>
                    </form>
                </span>
                
                <span>
                    <form class="d-inline" action="{{route('campaign.updateStatusToBlock', [$campaign->id])}}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary" {{!$campaign->isActive() ? 'disabled' : ''}}>Block</button>
                    </form>
                </span>
            </div>
        </div>
        @endif
        
        <div class="row">
            <div class="col-12 col-md-8 border border-0">
                <div class="row">
                    <div class="col-12">
                        <div class=""><img src="{{ $campaign->feature_image }}" class="rounded" alt="" width="100%" height="400"></div>
                        <!--<div class=""><img src="/images/shop/product/single-2.jpg" class="rounded" alt="" width="100%" height="400"></div>-->
                    </div>
                    
                    <!-- mobile status -->
                    <div class="col-12 d-md-none">
                        <div class="row mt-2">
                            <div class="col-12">
                                <h4 class="">{{$campaign->short_description}}</h4>
                            </div><!-- ends col -->
                            <div class="col-12 mt-3">
                                <div class="progress-box">
                                    <h6 class="title text-muted"> 10,000 raised of 10,00,000</h6>
                                    <div class="progress">
                                        <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                            <div class="progress-value d-block text-muted h6"></div>
                                        </div>
                                    </div>
                                </div> 
                                <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                    <li class="text-bold small"><i data-feather="book" class="fea icon-sm text-info"></i> {{$campaign->daysLeft()}} days left</li>
                                    <li class="text-bold small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                                </ul>
                            </div><!-- ends col -->
                            <div class="col-12 mt-3">
                                <div class="d-grid">
                                    <a href="#" class="btn btn-pills btn-primary">Donate</a>
                                </div>
                            </div><!-- ends col -->
                            <div class="col-12 mt-1">
                                <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
                                    <li class="text-bold small ps-2"><i data-feather="book" class="fea icon-sm text-info"></i> 1523</li>
                                    <li class="text-bold small pe-2"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102</li>
                                </ul>
                            </div><!-- ends col -->
                            <div class="col-12 mt-2">
                                <div class="d-grid">
                                    <a href="#" class="btn btn-pills btn-primary">Share</a>
                                </div>
                            </div><!-- ends col -->
                            <div class="col-12 mt-3">
                                <div class="d-flex align-items-center">
                                    <a class="pe-3" href="#">
                                        <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                    </a>
                                    <div class="flex-1 commentor-detail">
                                        <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$campaign->campaigner->name}}</a></h6>
                                        <!--<small class="text-muted">1500 viewed</small>-->
                                        <small class="text-bold small"><i data-feather="clock" class="fea icon-sm text-warning"></i> Noakhali, BD</small>
                                    </div>
                                </div>
                            </div><!-- ends col -->
                        </div>
                    </div> <!-- mobile status col ends -->
                    
                    
                    
                    <!--tabs starts-->
                    <div class="col-12 mt-5">
                        @include('partial.campaign-tabs')
                    </div> <!-- info col ends -->
                    <!--tabs ends-->
                    
                </div> <!-- main content row ends -->
            </div>
            <div class="col-4 d-none d-md-block">
                <!-- sticky starts -->
                <div class="row ms-md-4 sticki s-box-up-md">
                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <a class="pe-3" href="#">
                                <img src="/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                            </a>
                            <div class="flex-1 commentor-detail">
                                <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$campaign->campaigner->name}}</a></h6>
                                <!--<small class="text-muted">1500 viewed</small>-->
                                <small class="text-bold small"><i data-feather="clock" class="fea icon-sm text-warning"></i> Noakhali, BD</small>
                            </div>
                        </div>
<!--                        <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
                            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Avatar</li>
                            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Mujahidul Islam</li>
                            <li class="text-muted small"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102 viewed</li>
                        </ul>-->
                    </div><!-- ends col -->
                    <div class="col-12 mt-3">
                        <div class="progress-box">
                            <h6 class="title text-muted"> 10,000 raised of 10,00,000</h6>
                            <div class="progress">
                                <div class="progress-bar position-relative bg-primary" style="width:84%;">
                                    <div class="progress-value d-block text-muted h6"></div>
                                </div>
                            </div>
                        </div> 
                        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                            <li class="text-bold small"><i data-feather="book" class="fea icon-sm text-info"></i> {{$campaign->daysLeft()}} days left</li>
                            <li class="text-bold small ms-3"><i data-feather="clock" class="fea icon-sm text-warning"></i> 1000 donors</li>
                        </ul>
                    </div><!-- ends col -->

                    <div class="col-12">
                        <div class="quick-input">
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <div class="">
                                            <input type="text" name="amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                                        </div>
                                    </div><!-- ends col -->
                                    <div class="col-12 mt-5">
                                        <div class="quick-amount">
                                            <input type="text" name="quick-amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                                        </div>
                                    </div><!-- ends col -->
                                    <div class="col-12 mt-3">
                                        <div class="d-grid">
                                            <button id="donation-model-btn" type="button" class="btn btn-pills btn-primary" onclick="f(this);">Donate</button>
                                        </div>
                                    </div><!-- ends col -->
                                </div>
                            </form>
                            <script>
                                function f(thiss){
                                    $(thiss).attr('disabled', 'disabled');
                                    var form_data = $(thiss).closest('form').serialize();
                                    $.ajax({
                                        url : "{{route('donation.createModel')}}",
                                        type: "get",
                                        data: form_data,
                                        success : function (data) {
                                            if (data.success === 1){
                                                $(thiss).removeAttr('disabled');
                                                $('#amount').val(data.amount);
                                                $("#donation-model").modal('show');
                                            }
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                    
                    <div class="col-12 mt-3">
                        <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
                            <li class="text-bold small ps-2"><i data-feather="book" class="fea icon-sm text-info"></i> 1523</li>
                            <li class="text-bold small pe-2"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102</li>
                        </ul>
                    </div><!-- ends col -->
                    <div class="col-12 mt-2">
                        <div class="d-grid">
                            <a href="javascript:void(0)" class="btn btn-pills btn-primary" onclick="">Share</a>
                        </div>
                        <script>
                            function ff(){
                                window.alert('alert');
                                $('#donation-model').hide();
                            }
                        </script>
                    </div><!-- ends col -->
                </div> <!-- sticky row ends -->
            </div>
        </div>
    </div><!--end container-->
    
    
    @if(!request()->indexInvestigation)
        <!-- related products starts -->
        @include('partial.related-products')
    @endif
    

    
    
    
    
    <div class="container-fluid mt-100 mt-60 px-0">
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="shop-product-detail.html" class="text-dark align-items-center">
                                <span class="pro-icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left fea icon-sm"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></span>
                                <span class="text-muted d-none d-md-inline-block">Web Development</span>
                                <img src="/images/work/6.jpg" class="avatar avatar-small rounded shadow ms-2" style="height:auto;" alt="">
                            </a>

                            <a href="index.html" class="btn btn-lg btn-pills btn-icon btn-soft-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home icons"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a>

                            <a href="shop-product-detail.html" class="text-dark align-items-center">
                                <img src="/images/work/7.jpg" class="avatar avatar-small rounded shadow me-2" style="height:auto;" alt="">
                                <span class="text-muted d-none d-md-inline-block">Web Designer</span>
                                <span class="pro-icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right fea icon-sm"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
                            </a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div><!--end div-->
    </div>
</section><!--end section-->

<section class="donation-model">
    <form action="{{route('donation.store', ['campaignId' => $campaign->id])}}" method="post">
        @csrf
        <div id="donation-model" class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Payment Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group form-row {{ $errors->has('amount')? 'has-error':'' }}">
                            <label for="amount" class="col-sm-12 col-md-5 form-label pt-md-2">Amount to donate</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="amount" value="" name="amount">
                                {!! $errors->has('amount')? '<p class="help-block">'.$errors->first('amount').'</p>':'' !!}
                            </div>
                        </div>

                        <hr />

                        <div class="text-center text-bold mb-4">Fill these info or <a href="javascript:void(0)">login</a></div>

                        <div class="form-group form-row {{ $errors->has('name')? 'has-error':'' }}">
                            <label for="name" class="col-sm-12 col-md-5 form-label pt-md-2">Full Name</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="name" value="" name="name">
                                {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('email')? 'has-error':'' }}">
                            <label for="email" class="col-sm-12 col-md-5 form-label pt-md-2">Email Address</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="email" value="" name="email">
                                {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row {{ $errors->has('phone')? 'has-error':'' }}">
                            <label for="phone" class="col-sm-12 col-md-5 form-label pt-md-2">Phone Number</label>
                            <div class="col-sm-12 col-md-7 form-icon position-relative">
                                <i data-feather="user" class="fea icon-sm icons"></i>
                                <input type="text" class="form-control ps-5" id="phone" value="" name="phone">
                                {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label for="address" class="col-sm-12 col-md-5 form-label pt-md-2">Address</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" id="address" value="{{ 'holding/ road/ thana/ division/ country' }}" name="address">
                                {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                            </div>
                        </div>

                        <hr />

                        <div class="">
                            <input type="checkbox" class="" onclick="isChecked(this);">
                            <p id="one" class="d-inline text-muted" style="font-size: 14px;">By checking this you are giving your consent to our terms and condition</p>
                        </div>
                        <script>
                            function isChecked(thiss){
                                if ($(thiss).prop(":checked")){
                                    $('#complete-donation-btn').prop("disabled", true);
                                } else {
                                    $('#complete-donation-btn').prop("disabled", false);
                                }
                            }
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <button id="complete-donation-btn" type="submit" class="btn btn-primary">Complete Donation</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection


