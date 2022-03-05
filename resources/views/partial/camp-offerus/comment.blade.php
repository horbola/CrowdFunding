<!-- comment area -->
<div class="comment-area">
    <div class="cmnt-holder">
        <div class="heading">
            <h3><i class="fas fa-comment-dots"></i> Comments ({{ $campaign->commentsTotal() }})</h3>
        </div>
        <div class="cmntBox" id="your-review">
            <div class="input">
                <form class="your-comment" action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <textarea name="body" id="" cols="30" rows="1" placeholder="Write somethin to..." required></textarea>
                    <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                    <input type="hidden" name="parent_id" value="0">
                    @if(!$campaign->isActive())
                    <div class="notice text-center">
                        <p><i class="fas fa-exclamation-triangle"></i> This campaign isn't taking any comment, because either it's completed raising money or it's not active anyway</p>
                    </div>
                    @elseif(!Auth::check())
                    <div class="notice text-center">
                        <p><i class="fas fa-exclamation-triangle"></i> You must have an account to comment. Already have an account? <a href="{{ route('login') }}"><span>Log in</span></a></p>
                    </div>
                    @else
                    <div class="text-right overflow-hidden mt-2">
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
        @include('partial.camp-offerus.comments', ['comments' => $campaign->comments])
    </div>
    
    @if($campaign->comments->count() > 5)
    <div class="l-moreBtn text-center">
        <a class="btn-dark-p" href="javascript:void(0)">Load More</a>
        <span>
            ({{ $campaign->comments->count() }} of {{ $campaign->commentsTotal() }} comments)
        </span>
    </div>
    @endif
    
    <script>
        function createLikeForComment(thiss, commentId){
            $.ajax({
                url: `/update-like-for-comment/${commentId}`,
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(data){
                    if(data.created){
                        $(thiss).find('.fas').removeClass('fa-thumbs-up');
                        $(thiss).find('.fas').addClass('fa-heart');
                    }
                    else {
                        $(thiss).find('.fas').removeClass('fa-heart');
                        $(thiss).find('.fas').addClass('fa-thumbs-up');
                    }
                    
                    $(thiss).find('.likeNumber').text(data.likesCount);
                }
            });
        }
    </script>
</div>