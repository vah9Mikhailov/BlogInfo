
<div class="comment-option">
    <div class="single-comment-item">
        <div class="sc-text">
            <span>{{ $comment->created_at->format('H:i:s F d, Y') }}</span>
            <h5>{{ $comment->owner->name }}</h5>
            <p>{{ $comment->body }}</p>
            @if (auth()->check())

                <a href="#commentForm{{$comment->id}}" data-toggle="collapse" class="comment-btn">Комментировать</a>
                <div class="collapse" id="commentForm{{$comment->id}}">
                    @include ('front.comments_layouts.form', ['parentId' => $comment->id])
                </div>
            @endif
        </div>
    </div>
    <hr>
    <div class="single-comment-item reply-comment">
        <div class="sc-text">
            @if (isset($comments[$comment->id]))
                @include ('front.comments_layouts.list', ['collection' => $comments[$comment->id]])
            @endif
        </div>
    </div>
</div>

