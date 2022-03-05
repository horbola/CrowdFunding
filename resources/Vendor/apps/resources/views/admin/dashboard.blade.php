@extends('layouts.admin.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@php
$auth_user = \Illuminate\Support\Facades\Auth::user();
@endphp

@section('content')
<div id="page-wrapper">
     @if(!empty($title))
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> {{ $title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
        <!-- /.row -->
    @endif
    @if($auth_user->is_admin())
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$pending_campaign_count}}</div>
                                        <div>Pending Campaigns</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('pending_campaigns') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$active_campaign_count}}</div>
                                        <div>Active campaigns</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('all_campaigns') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$blocked_campaign_count}}</div>
                                        <div>Block Campaigns</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('blocked_campaigns') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$payment_created}}</div>
                                        <div>Payment Created</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('payments')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$comment_all}}</div>
                                        <div>All Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('comment') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$user_count}}</div>
                                        <div>All Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('all-users') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">@php
                                                    $campaign_owner_comission = get_option('campaign_owner_commission');
                                                    @endphp
                                                    {{get_option('campaign_owner_commission')}}%</div>
                                        <div>Owner Recevied</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
        </div>
        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{100 - $campaign_owner_comission}}%</div>
                                        <div>Platform Recevied</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <div class="huge">{{get_amount($payment_amount)}}</div>
                                        <div>Total Amount</div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <div class="huge">@php
                                                    $platform_owner_commission = ( (100 - $campaign_owner_comission) * $payment_amount ) / 100;
                                                    @endphp

                                                    {{ get_amount($platform_owner_commission) }}</div>
                                        <div>Platform Commission</div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <div class="huge">{{ get_amount($payment_amount - $platform_owner_commission) }}</div>
                                        <div>Owner Commission</div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
    @endif
    <!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('app.last_pending_campaigns')
            </div>
            <div class="panel-body">
                <div class="row col-md-lg-12">
                    @if($pending_campaigns->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>@lang('app.title')</th>
                                <th>@lang('app.by')</th>
                            </tr>

                            @foreach($pending_campaigns as $pc)
                            <tr>
                                <td>{{$pc->title}}</td>
                                <td>{{$pc->user->name}} <br /> {{$pc->user->email}} </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.panel -->
    </div>
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               @lang('app.last_ten_payment')
            </div>
            <div class="panel-body">
                <div class="row col-md-lg-12">
                    <div class="table-responsive">
                        @if($last_payments->count() > 0)
                                        <table class="table table-striped table-bordered">

                                            <tr>
                                                <th>@lang('app.campaign_title')</th>
                                                <th>@lang('app.payer_email')</th>
                                                <th>@lang('app.amount')</th>
                                                <th>@lang('app.time')</th>
                                                <th>Reward</th>
                                                <th>View</th>
                                            </tr>

                                            @foreach($last_payments as $payment)

                                                <tr>
                                                    <td><a href="{{route('payment_view', $payment->id)}}">{{$payment->campaign['title']}}</a></td>
                                                    <td><a href="{{route('payment_view', $payment->id)}}"> {{$payment->email}} </a></td>
                                                    <td>{{get_amount($payment->amount)}}</td>
                                                    <td><span data-toggle="tooltip" title="{{$payment->created_at->format('F d, Y h:i a')}}">{{$payment->created_at->format('F d, Y')}}</span></td>

                                                    <td>
                                                        @if($payment->reward)
                                                            <a href="{{route('payment_view', $payment->id)}}" data-toggle="tooltip" title="@lang('app.selected_reward')">
                                                                <i class="fa fa-gift"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td><a href="{{route('payment_view', $payment->id)}}"><i class="fa fa-eye"></i> </a></td>

                                                </tr>
                                            @endforeach

                                        </table>

                                    @else
                                        @lang('app.no_campaigns_to_display')
                                    @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel -->
    </div>
    </div>
    <!-- /.row -->
</div>
@endsection