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

                    @if($my_campaigns->count() > 0)
                        <table class="table table-striped table-bordered">

                            @foreach($my_campaigns as $campaign)

                                <tr>

                                    <td width="70"><img src="{{$campaign->feature_img_url()}}" class="img-responsive" /></td>
                                    <td>{{$campaign->title}}</td>

                                    <td>
                                        @if( ! $campaign->is_ended() && $campaign->status != 1)
                                        <a href="{{route('edit_campaign', $campaign->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> </a>
                                        @endif

                                        <a href="{{route('campaign_single', [$campaign->id, $campaign->slug])}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> </a>
                                    </td>

                                </tr>

                            @endforeach

                        </table>

                    @else
                        <div class="alert alert-info"><i class="fa fa-info-circle"></i> @lang('app.no_campaigns_to_display') </div>
                    @endif
        </div>
    </div>
@endsection