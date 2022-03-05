<!-- comments -->
<div>
    @foreach($comments as $comment)
    <div class="comments">
        <div class="single d-flex justify-content-start">
            <div class="cimage">
                <img src="{{$comment->commentor->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
            </div>
            <div class="cdata">
                <p class="pname">{{$comment->commentor->name}}<span> <i class="fas fa-clock"></i> {{App\Library\Helper::formattedTime($comment->created_at)}} </span></p>
                <div class="ppost">
                    <p id="comment-body">{{$comment->body}}</p>
                </div>
                <div class="react">
                    <p onclick="createLikeForComment(this, {{$comment->id}} )">
                        <span class="like"><i class="fas {{$comment->hasLiked() ? 'fa-heart' : 'fa-thumbs-up'}}"></i></span>
                        <span class="likeNumber">{{ $comment->likesCount() }}</span>
                    </p>
                    
                    <div class="reply-btn" {{ !$campaign->isActive() || !Auth::check() ? '' : 'onclick=replyFunc(this)' }} >Reply</div>
                </div>
                <div class="reply-form">
                    <form action="{{route('comment.store')}}" method="post">
                        @csrf
                        <div class="form-item">
                            <textarea name="body" rows="1" cols="50"></textarea>
                            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                            <input type="hidden" name="parent_id" value="{{$comment->id}}">
                            <button type="button" onclick="canReplyFunc(this)">Cancel</button>
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                @include('partial.camp-offerus.comment-reply', ['replies' => $comment->replies])
            </div>
        </div>
    </div>
    @endforeach
</div>

@section('comments-style')
<link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
<style>
    #comment-body {
        font-family: 'SolaimanLipi', sans-serif;
    }
</style>
@endsection

@section('comments-script-bottom')
<script>
    function replyFunc(thiss){
        $elem = $(thiss).closest('.comments').find('.reply-form');
        $elem.toggle();
        $elem.find('textarea').focus();
    }

    function canReplyFunc(thiss){
        $(thiss).closest('.comments').find('.reply-form').toggle();
    }
</script>
@endsection