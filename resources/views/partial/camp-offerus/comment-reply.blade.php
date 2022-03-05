<div id="peoples-review">
    @foreach($replies as $reply)
    <div class="reply d-flex justify-content-start mt-2">
        <div class="rimage">
            <img src="{{$reply->commentor->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
        </div>
        <div class="ippdata">
            <div class="d-flex flex-wrap justify-content-between">
                <p>
                    {{$reply->commentor->name}}
                    
                    @if($campaign->campaigner->is_volunteer)
                    <img src="/images/verify.png" alt="">
                    @endif
                    
                    @if($reply->commentor->id === $campaign->campaigner->id)
                        <span class="pl-2">Founding Owner</span>
                    @endif
                </p>
                <p class="time">
                    <i class="fas fa-clock"></i>
                    {{App\Library\Helper::formattedTime($reply->created_at)}}
                </p>
            </div>
            <p class="rcom">
                {{$reply->body}}
            </p>
        </div>
    </div>
    @endforeach
    
    @if($replies->count() > 3)
    <div class="l-moreBtn text-center">
        <a class="btn-dark-p" href="javascript:void(0)">Load More</a>
        <span>
            ({{ $replies->count() }} of {{ $comment->repliesTotal() }} replies)
        </span>
    </div>
    @endif
</div>
