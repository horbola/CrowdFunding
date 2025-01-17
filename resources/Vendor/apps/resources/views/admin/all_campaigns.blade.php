@extends('layouts.admin.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('content')
    <div id="page-wrapper">
        <div class="col-md-12">

                    @if( ! empty($title))
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"> {{ $title }}  </h1>
                            </div> <!-- /.col-lg-12 -->
                        </div> <!-- /.row -->
                    @endif

                    @include('admin.flash_msg')


                       <div class="admin-campaign-lists">

                           <div class="row">
                               <div class="col-md-5">
                                   @lang('app.total') : {{$campaigns->count()}}
                               </div>

                               <div class="col-md-7">

                                   <form class="form-inline" method="get" action="{{route('campaign_admin_search')}}">
                                       <div class="form-group">
                                           <input type="text" name="q" value="{{request('q')}}" class="form-control" placeholder="@lang('app.campaign_title_keyword')">
                                       </div>
                                       <button type="submit" class="btn btn-default">@lang('app.search')</button>
                                   </form>

                               </div>
                           </div>

                       </div>

                    @if($campaigns->count() > 0)
                        <table class="table table-striped table-bordered">

                            <tr>
                                <th>@lang('app.image')</th>
                                <th>@lang('app.title')</th>
                                <th>@lang('app.campaign_info')</th>
                                <th>@lang('app.owner_info')</th>
                                <th>@lang('app.status')</th>
                                <th>@lang('app.actions')</th>
                            </tr>

                            @foreach($campaigns as $campaign)

                                <tr>

                                    <td width="70"><img src="{{$campaign->feature_img_url()}}" class="img-responsive" /></td>
                                    <td>{{$campaign->title}}

                                        @if($campaign->is_funded == 1)
                                            <p class="bg-success">@lang('app.added_to_funded')</p>
                                        @endif
                                    </td>
                                    <td>
                                        @lang('app.goal') : {{get_amount($campaign->goal)}} <br />
                                        @lang('app.raised') :  {{get_amount($campaign->success_payments->sum('amount'))}} <br />
                                        @lang('app.raised_percent') : {{$campaign->percent_raised()}}%<br />
                                        @lang('app.days_left') : {{$campaign->days_left()}}<br />
                                        @lang('app.backers') : {{$campaign->success_payments->count()}}<br />
                                    </td>


                                    <td>
                                        <strong>{{$campaign->user->name}}</strong> <br />
                                        @lang('app.address') : {{$campaign->address}}<br />
                                        Mobile No: {{$campaign->user->phone}}<br />
                                        Email: {{$campaign->user->email}}<br />
                                        NID: {{$campaign->user->nid}}<br />
                                    </td>
                                    <td>
                                        <?php 
                                            if($campaign->status == 1)echo "Active";
                                            else echo"Inactive";
                                                    
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{route('campaign_single', [$campaign->id, $campaign->slug])}}" class="btn btn-default btn-sm" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i> </a>
                                    <a href="{{route('edit', $campaign->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> </a>
                                    @if($campaign->status == 0)
                                            <a href="{{route('campaign_status', [$campaign->id, 'approve'])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="@lang('app.approve')"><i class="fa fa-check-circle-o"></i> </a>
                                            <a href="{{route('campaign_status', [$campaign->id, 'block'])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="@lang('app.block')"><i class="fa fa-ban"></i> </a>


                                        @elseif($campaign->status == 1)

                                            <a href="{{route('campaign_status', [$campaign->id, 'block'])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="@lang('app.block')"><i class="fa fa-ban"></i> </a>

                                        @elseif($campaign->status == 2)
                                            <a href="{{route('campaign_status', [$campaign->id, 'approve'])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="@lang('app.approve')"><i class="fa fa-check-circle-o"></i> </a>
                                        @endif

                                        @if(request()->segment(3) == 'expired_campaigns')
                                            @if($campaign->is_funded != 1)
                                                <a href="{{route('campaign_status', [$campaign->id, 'funded'])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="@lang('app.mark_as_funded')"><i class="fa fa-check-circle-o"></i>  @lang('app.mark_as_funded')</a>
                                            @endif
                                        @endif

                                        @if($campaign->is_staff_picks != 1)
                                            <a href="{{route('campaign_status', [$campaign->id, 'add_staff_picks'])}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="@lang('app.add_staff_picks')"><i class="fa fa-plus-square-o"></i>  @lang('app.add_staff_picks')</a>

                                        @else
                                            <a href="{{route('campaign_status', [$campaign->id, 'remove_staff_picks'])}}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="@lang('app.remove_staff_picks')"><i class="fa fa-minus-square-o"></i>  @lang('app.remove_staff_picks')</a>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </table>

                        {!! $campaigns->links() !!}

                    @else

                        @lang('app.no_campaigns_to_display')

                    @endif
        </div>
    </div>
@endsection