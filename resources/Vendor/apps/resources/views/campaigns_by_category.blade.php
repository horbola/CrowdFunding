@extends('layouts.charity.app')

@section('content')

    <section class="home-campaign section-bg-white">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title"> @lang('app.campaigns_in') {{$category->category_name}} </h2>
                </div>
            </div>

            <div class="row">

                @php
                $campaigns = $category->campaigns()->orderBy('id', 'desc')->paginate(20);
                @endphp
                @if($campaigns->count() > 0)
                    {{-- <div class="box-campaign-lists">
                        @foreach($campaigns as $spc)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 box-campaign-item">
                                <div class="box-campaign">
                                    <div class="box-campaign-image">
                                        <img src="{{ $spc->feature_img_url()}}" />
                                        <div class="overlay">
                                            <a class="info" href="{{route('campaign_single', [$spc->id, $spc->slug])}}">View Details</a>
                                        </div>
                                    </div>
                                    <div class="box-campaign-content">
                                        <div class="box-campaign-description">
                                            <h4><a href="{{route('campaign_single', [$spc->id, $spc->slug])}}"> {{$spc->title}} </a> </h4>
                                            <p>{{$spc->short_description}}</p>
                                        </div>

                                        <div class="box-campaign-summery">
                                            <ul>
                                                <li><strong>{{$spc->days_left()}}</strong> @lang('app.days_left')</li>
                                                <li><strong>{{$spc->success_payments->count()}}</strong> @lang('app.backers')</li>
                                                <li><strong>{{get_amount($spc->success_payments->sum('amount'))}}</strong> @lang('app.funded')</li>
                                            </ul>
                                        </div>

                                        <div class="progress">
                                            @php
                                            $percent_raised = int($spc->percent_raised());
                                            @endphp
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$percent_raised}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent_raised >= 100 ? $percent_raised : 100}}%;">
                                                {{$percent_raised}}%
                                            </div>
                                        </div>

                                        <div class="box-campaign-footer">
                                            <!--<ul>
                                        <li><img src="{{ asset('assets/images/avatar.png') }}"> John Doe</li>
                                        <li> <strong>$12,000.00</strong> Goal </li>
                                    </ul>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>  <!-- #box-campaign-lists -->
                    <div class="section-content"> --}}
                    @php $count = 0; @endphp
                    @foreach($campaigns as $spc)
                    @if($count == 0):
                    <div class="row mtli-row-clearfix">
                        @endif
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="causes maxwidth500 mb-sm-50">
                                <div class="thumb">
                                    <img alt="" class="img-fullwidth trending-img" src="{{ $spc->feature_img_url()}}">
                                    </img>
                                </div>

                                <ul class="list-inline clearfix p-5 p-sm-10 pt-15 pb-5 ml-0">
                                
                                    <li class="pull-left flip pr-10 pr-sm-10 pt-10 pl-0">
                                        Raised:
                                        <span class="font-weight-300">
                                            {{get_amount($spc->success_payments->sum('amount'))}}
                                        </span>
                                    </li>
                                    <li class="text-theme-colored pull-right flip pr-0 pt-10">
                                        Goal:
                                        <span class="font-weight-300">
                                            {{get_amount($spc->goal)}}
                                        </span>
                                    </li>
                                </ul>
                                @php
                                    $percent_raised = $spc->percent_raised();
                                   
                                    
                                @endphp
                                <div class="donate-piechart piechart-absolute">
                                    <div class="piechart-block">
                                        <div class="piechart" data-barcolor="#0cbd97" data-linewidth="8" data-percent="{{$percent_raised}}" data-trackcolor="#fff">
                                            <span class="percent text-white font-weight-300">
                                                {{$percent_raised}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="causes-details clearfix">
                                    <div class="p-30 pt-15 p-sm-15">
                                        <h4 class="mt-0 text-center">
                                            <a href="{{route('campaign_single', [$spc->id, $spc->slug])}}">
                                                {!! str_limit(strip_tags($spc->title), 25) !!}
                                            </a>
                                        </h4>
                                        <p class="text-center">
                                            {!! str_limit(strip_tags($spc->short_description), 56) !!}
                                        </p>
                                        <center style="background: #42ccae; color: #ffffff;">আর মাত্র <strong style="color: #ffed10;">{{($spc->days_left() >0 )?$spc->days_left():0}}</strong> দিন বাকি আছে।</center>
                                        <div class="mt-10 clearfix">
                                            <a class="btn btn-dark btn-theme-colored btn-flat btn-sm pull-left mt-10" href="{{route('campaign_single', [$spc->id, $spc->slug])}}">
                                                Donate Now
                                            </a>
                                            <div class="pull-right mt-10">
                                                <i class="fa fa-heart text-theme-colored">
                                                </i>
                                                {{$spc->success_payments->count()}} Donors
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $count++; @endphp 
                    @if($count == 3)
                    </div>
                    @php $count = 0; @endphp
                    @endif

                    @endforeach
             
                </div>
                @else

                    <div class="payment-received">
                        <h1><i class="fa fa-exclamation-triangle"></i> @lang('app.no_campaigns_to_display')</h1>
                        <a href="{{route('browse_categories')}}" class="btn btn-lg-filled">@lang('app.browse_campaign')</a>
                    </div>

                @endif

                {{$campaigns->links()}}
            </div>

        </div><!-- /.container -->

    </section>

@endsection
