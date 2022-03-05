<div id="comments-display" class="">
    @foreach($comments as $comment)
    <li class="mt-4 @if ($comment->parent_id) ml-5 @endif">
        <div class="d-flex align-items-center">
            <a class="pe-3" href="#">
                <img src="{{$comment->commentor->avatar()}}" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
            </a>
            <div class="flex-1 commentor-detail">
                <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">{{$comment->commentor->name}}</a></h6>
                <small class="text-muted">{{Helper::formattedTime($comment->created_at)}}</small>
            </div>
            @if(!$comment->parent_id)
            <div>
                <input type="button" value="Reply" class="btn btn-primary btn-sm" onclick="replyFunc(this)">
            </div>
            @endif
        </div>
        @if(!$comment->parent_id)
        <div class="reply-form mt-3" style="display: none;">
            <form action="{{route('comment.store')}}" method="post">
                @csrf
                <div class="input-group">
                    <textarea name="body" rows="1" class="form-control" placeholder="Write your reply here" required></textarea>
                    <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="canReplyFunc(this)">Cancel</button>
                        <button class="btn btn-outline-secondary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        @endif
        <div class="mt-3">
            <p class="text-muted fst-italic pb-3 rounded">{{$comment->body}}</p>
        </div>
    </li>
    @include('partial.comments-display', ['comments' => $comment->replies])
    @endforeach
    <script>
        function replyFunc(thiss){
            $('.reply-form').css('display', 'none');
            $elem = $(thiss).closest('li').find('.reply-form');
            $elem.css('display', 'block');
            $elem.find('textarea').focus();
        }
        
        function canReplyFunc(thiss){
            $(thiss).closest('li').find('.reply-form').css('display', 'none');
        }
    </script>
</div>
