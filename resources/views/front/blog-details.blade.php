@extends('front.layouts.layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('front')}}/css/fresco.css"/>

@section('content')
    <section class="blog-details">
        <div class="container">
            <div class="single-blog-page">
                <div class="blog-metas">
                    <div class="blog-meta">{{$showPostResponse->getPost()->getUpdatedAt()}}</div>
                </div>
                <h2>{{$showPostResponse->getPost()->getName()}}</h2>
                <div class="blog-thumb">
                    <img src="{{$showPostResponse->getPost()->getImage()}}" alt="">
                </div>
                <p>{!! $showPostResponse->getPost()->getDescription()!!}</p>
                <div class="row pt-5">
                    <div class="col-lg-6 mb-4">
                        <div class="blog-metas">
                            <div class="blog-meta"><h6>Категории</h6></div>
                            <div class="blog-meta">
                                @foreach($showPostResponse->getCategory()->getNames() as $nameCategory)
                                    <a href="#" class="post-cata">{{$nameCategory}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-metas">
                            <div class="blog-meta"><h6>Теги</h6></div>
                            <div class="blog-meta">
                                @foreach($showPostResponse->getTag()->getNames() as $nameTag)
                                    <a href="#" class="post-cata">{{$nameTag}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recent-blog">
                    <h3 class="mb-4 pb-2">Рекомендуем</h3>
                    <div class="row">
                        @foreach($showPostResponse->getPost()->getRecommendPosts() as $recommendPost)
                            <div class="col-lg-4">
                                <div class="blog-item rp-item set-bg" data-setbg="{{$recommendPost['thumbnail']}}">
                                    @foreach($recommendPost['categoryIds'] as $nameCategory)
                                        <div class="pa-tag">{{$nameCategory}}</div>
                                    @endforeach
                                    <div class="bi-text">
                                        <div class="bi-date">{{$recommendPost['updated_at']}}</div>
                                        <h3><a href="">{{$recommendPost['name']}}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                @if(count($showPostResponse->getPost()->getThreadedComments()))
                     <div class="comment-option-main">
                         @include('front.comments_layouts.post-comments')
                     </div>
                 @endif
                 @if (auth()->check())
                     <h3>Оставьте свой комментарий</h3>
                     @include ('front.comments_layouts.form')
                 @else
                     <h3>Войдите, чтоб оставить свой комментарий</h3>
                 @endif
            </div>
        </div>
    </section>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script>
    function createNewComment(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/blog/comments/add',
            data: {
                '_token': '{{csrf_token()}}',
                'post_id': '{{$showPostResponse->getPost()->getId()}}',
                'slug': '{{$showPostResponse->getPost()->getSlug()}}',
                'parent_id': id,
                'body': $('#comment_body_' + id)[0].value,
            },
            success: function (data) {
                $('.comment-option-main').html(data);

            }
        });
    }

</script>
<style>
    .pa-tag {
        display: inline-block;
        padding: 4px 20px;
        margin: 8px;
        font-size: 12px;
        color: #2916e0;
        text-transform: uppercase;
        font-weight: 600;
        border-radius: 2px;
        background: #fff;
    }
</style>





