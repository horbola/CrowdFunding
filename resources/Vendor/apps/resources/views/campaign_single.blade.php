@extends('layouts.charity.app')

@section('description', $campaign->short_description)

@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent
@endsection

@section('content')

    <section class="campaign-details-wrap">

        @include('single_campaign_header')

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                        @include('admin.flash_msg')
                        <div class="campaign-decription">
                            <div class="single-campaign-embeded">
                                @if( ! empty($campaign->video))
                                    <?php
                                    $video_url = $campaign->video;
                                    if (strpos($video_url, 'youtube') > 0) {
                                        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_url, $matches);
                                        if ( ! empty($matches[1])){
                                            echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowfullscreen></iframe></div>';
                                        }

                                    } elseif (strpos($video_url, 'vimeo') > 0) {
                                        if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $video_url, $regs)) {
                                            if (!empty($regs[3])){
                                                echo '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$regs[3].'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
                                            }
                                        }
                                    }
                                    ?>
                                @else
                                    <div class="campaign-feature-img">
                                        <img src="{{$campaign->feature_img_url(true)}}" class="img-responsive" />
                                    </div>
                                @endif
                            </div>

                            {!! $campaign->description !!}
                            @if($enable_discuss)
                            <div class="post-footer">
                                <strong>Comments</strong>
                                <hr>
                            <div class="row">
                            <div class="col-md-10 col-md-offset-1 pt-20 pb-20 comment-main rounded">
                                <ul class="p-0">
                                    @if(count($campaign->comments))
                                    @foreach($campaign->comments as $comment)
                                    @if($comment->approved == 1 )
                                    <li>
                                        <div class="row comment-box p-20">
                                          <div class="col-lg-2 col-3 user-img text-center">
                                            <img src="{{ $comment->user->get_gravatar(200) }}" class="main-cmt-img">
                                          </div>
                                          <div class="col-lg-10 col-9 user-comment bg-light rounded pb-1">
                                               <div class="row">
                                                     <div class="col-lg-8 col-6 border-bottom pr-0">
                                                        <p class="w-100 pt-15 pb-15 m-0">{{ $comment->comment }}</p>
                                                     </div>
                                                     <div class="col-lg-4 col-6 border-bottom">
                                                        <p class="w-100 p-2 m-0"><span class="float-right"><i class="fa fa-clock-o mr-1" aria-hidden="true"></i>{{ date('d-m-Y', strtotime($comment->created_at)) }}</span></p>
                                                     </div>
                                               </div> 
                                          </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                    <hr>
                                    @endif
                                    @if(Auth::check())
                                    <div class="row">
                                      <div class="col-lg-10 col-10">
                                        <input type="text" class="form-control p-20 mt-5" id="commentmain" name="commentmain" placeholder="write comments ..." required="required">
                                      </div>
                                      <div class="col-lg-2 col-2 send-icon">
                                        <a href="javascript:void(0)" id="commentSubmit" onclick="commentSubmit('{{$campaign->id}}')" class="btn btn-success btn-sm"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                      </div>
                                    </div>
                                    @else
                                    <p class="warning"><a href="{{ route('login') }}">Login</a>/<a href="{{ route('register') }}">Register</a> for Give Comments</p>
                                    @endif
                                  </ul>
                            </div>
                            </div>    
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
@endsection

@section('page-js')
    <script src="{{asset('assets/plugins/SocialShare/SocialShare.min.js')}}"></script>
    <script>
        $('.share').ShareLink({
            title: '{{$campaign->title}}', // title for share message
            text: '{{$campaign->short_description ? $campaign->short_description : $campaign->description}}', // text for share message
            width: 640, // optional popup initial width
            height: 480 // optional popup initial height
        })
    </script>

    <script>
        $(function(){
            $(document).on('click', '.donate-amount-placeholder ul li', function(e){
                $(this).closest('form').find($('[name="amount"]')).val($(this).data('value'));
            });
        });

        function commentSubmit(id){
            var comment = $('#commentmain').val();
            $.ajax({
                type: 'POST',
                url: "{{route('comments.store')}}",
                data: {'id': id, "_token": "{{ csrf_token() }}", 'comment':comment},
                success:function(response){
                    var data = $.parseJSON(response);
                    toastr.options = {
                      "debug": false,
                      "positionClass": "toast-top-full-width",
                      "onclick": null,
                      "fadeIn": 300,
                      "fadeOut": 1000,
                      "timeOut": 5000,
                      "extendedTimeOut": 1000
                    }
                    if(data.alert == 'success'){
                    toastr.success(data.message)}
                    if (data.alert == 'warning') {toastr.warning(data.message)}
                    $('#commentmain').val('')
                }

            });
        };
    </script>

@endsection