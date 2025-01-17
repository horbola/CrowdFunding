@extends('layouts.charity.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('content')

    <section class="campaign-details-wrap">

        @include('single_campaign_header')

        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="campaign-decription">

                        @if($campaign->updates->count() > 0)
                            @foreach($campaign->updates as $update)

                                <div class="update-wrap">
                                    <h2 class="update-title"> {{$update->title}} </h2>
                                    <p class="text-muted"> {{$update->created_at->format('j F Y')}} </p>

                                    {!! nl2br($update->description) !!}
                                </div>
                            @endforeach

                            @else

                            <div class="no-data">
                                <i class="fa fa-bell-o"></i><h1>@lang('app.no_update')</h1>
                            </div>
                        @endif

                    </div>

                </div>

                <div class="col-md-4">
                    @include('campaign_single_sidebar')
                </div>

            </div>
        </div>


    </section>

    @include('footer_get_start_section')



@endsection

@section('page-js')

    <script>
        $(function(){
            $(document).on('click', '.donate-amount-placeholder ul li', function(e){
                $(this).closest('form').find($('[name="amount"]')).val($(this).data('value'));
            });
        });
    </script>

@endsection