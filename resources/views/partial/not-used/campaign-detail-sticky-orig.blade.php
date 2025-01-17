<div class="row ms-md-4 s-box-up-md">
    <div class="col-12">
        <div class="d-flex align-items-center">
            <a class="pe-3" href="#">
                <img src="{{$campaign->campaigner->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
            </a>
            <div class="flex-1 commentor-detail">
                <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$campaign->campaigner->name}}</a></h6>
                <!--<small class="text-muted">1500 viewed</small>-->
                <span class="text-bold small d-flex align-items-center"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i><span>{{$campaign->campaigner->location()}}</span></span>
            </div>
        </div>
        <!--
        <ul class="list-unstyled d-flex justify-content-between mt-3 pt-3 mb-0">
            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Avatar</li>
            <li class="text-muted small"><i data-feather="book" class="fea icon-sm text-info"></i> Mujahidul Islam</li>
            <li class="text-muted small"><i data-feather="clock" class="fea icon-sm text-warning"></i> 10,102 viewed</li>
        </ul>
        -->
    </div><!-- ends col -->
    <div class="col-12 mt-4">
        <div class="progress-box">
            @php
                $totalDonation = $campaign->totalSuccessfulDonation(true);
                $goal = $campaign->goal;
                $parcent = ((100/$goal) * $totalDonation);
            @endphp
            <div class="d-flex justify-content-between">
                <h6 class="title text-muted">{{$totalDonation}} raised of {{$goal}}</h6>
                <span class="d-block">{{$parcent}}%</span>
            </div>
            <div class="progress">
                <div class="progress-bar position-relative bg-primary" style="width:0%;">
                    <div class="progress-value d-block text-muted h6"></div>
                </div>
                <script>$('.progress-bar').css('width', '{{ $parcent }}%')</script>
            </div>
        </div> 
        <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
            <li class="text-bold small d-flex align-items-center"><i data-feather="book" class="fea icon-sm text-info me-1"></i> {{$campaign->daysLeft()}}</li>
            <li class="text-bold small d-flex align-items-center"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i>{{$campaign->donorsCount()}} Donors</li>
        </ul>
    </div><!-- ends col -->

    <div class="col-12">
        <!--this is quick amount component. the style and script for this component is below-->
        <div class="donation-amount">
            <form>
                @csrf
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="">
                            <input type="text" name="amount" class="form-control" placeholder="Enter Donation Amount"  value="">
                        </div>
                    </div><!-- ends col -->
                    <div class="col-12 my-2">
                        <div class="quick-amount">
                            <div class="wrapper">
                                <span class="outer" onclick="enterAmount(this)"><span class="inner">50</span></span>
                                <span class="outer" onclick="enterAmount(this)"><span class="inner">100</span></span>
                                <span class="outer" onclick="enterAmount(this)"><span class="inner">200</span></span>
                                <span class="outer" onclick="enterAmount(this)"><span class="inner">500</span></span>
                                <span class="outer" onclick="enterAmount(this)"><span class="inner">1000</span></span>
                            </div>
                        </div>
                    </div><!-- ends col -->
                    <div class="col-12">
                        <div class="d-grid">
                            <button id="donation-model-btn" type="button" class="btn btn-pills btn-primary" onclick="f(this);">Donate</button>
                        </div>
                    </div><!-- ends col -->
                </div>
            </form>
            <script>
                function f(thiss) {
                    $(thiss).attr('disabled', 'disabled');
                    var form_data = $(thiss).closest('form').serialize();
                    $.ajax({
                        url: "{{route('donation.createModel')}}",
                        type: "get",
                        data: form_data,
                        success: function (data) {
                            if (data.success === 1) {
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
            <li class="text-bold small d-flex align-items-center ms-3"><i data-feather="book" class="fea icon-sm text-info me-1"></i>{{$campaign->viewsCount()}}</li>
            <li class="text-bold small d-flex align-items-center me-3"><i data-feather="clock" class="fea icon-sm text-warning me-1"></i>{{$campaign->likesCount()}}</li>
        </ul>
    </div><!-- ends col -->
    <div class="col-12 mt-2">
        <div class="d-grid">
            <a href="javascript:void(0)" class="btn btn-pills btn-primary" onclick="">Share</a>
        </div>
    </div><!-- ends col -->
</div> <!-- sticky row ends -->


<!--this style is for quick amount component-->
@section('campaign-detail-sticky-style')
<style>
    .quick-amount {
        display: flex;
        justify-content: center;
        padding: 0 5px;
        margin-right: auto;
    }
    
    .quick-amount .outer {
        display: inline-block;
        width: 44px;
        height: 44px;
        position: relative;
        border: 1px solid #a1a1a1;
        border-radius: 100%;
        margin: 0 1px;
        cursor: pointer;
    }
    .quick-amount .outer:hover {
        background-color: #f3f3f3;
    }
    
    .quick-amount .inner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endsection


<!--this script is for quick amount component-->
@section('campaign-detail-sticky-script-bottom')
<script>
    function enterAmount(thiss){
        $(thiss).siblings().css('box-shadow', 'none');
        $(thiss).css('box-shadow', '1px 1px 2px 2px rgba(0, 0, 0, 0.15)');
        $(thiss).closest('form').find('input[name=amount]').val($(thiss).children().text()).focus();
    }
</script>
@endsection