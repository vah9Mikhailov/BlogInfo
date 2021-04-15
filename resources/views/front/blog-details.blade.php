<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Tulen | Photography HTML Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Tulen Photography HTML Template">
    <meta name="keywords" content="photo, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('front')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{asset('front')}}/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('front')}}/css/themify-icons.css"/>
    <link rel="stylesheet" href="{{asset('front')}}/css/accordion.css"/>
    <link rel="stylesheet" href="{{asset('front')}}/css/fresco.css"/>
    <link rel="stylesheet" href="{{asset('front')}}/css/owl.carousel.min.css"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{asset('front')}}/css/style.css"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section -->
@include('front.layouts.sidebar')
<!-- Offcanvas Menu Section end -->

<!-- Blog Section end -->
<section class="blog-details">
    <div class="container">
        <div class="single-blog-page">
            <div class="blog-metas">
                <div class="blog-meta">{{$post->updated_at->format('F d, Y')}}</div>
            </div>
            <h2>{{$post->name}}</h2>
            <div class="blog-thumb">
                <img src="{{$post->getImage()}}" alt="">
            </div>
            <p>{!! $post->description!!}</p>
            <div class="row pt-5">
                <div class="col-lg-6 mb-4">
                    <div class="blog-metas">
                        <div class="blog-meta"><h6>Категории</h6></div>
                        <div class="blog-meta">
                            @foreach($post->categories as $category)
                                <a href="#" class="post-cata">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="blog-metas">
                        <div class="blog-meta"><h6>Теги</h6></div>
                        <div class="blog-meta">
                            @foreach($post->tags as $tag)
                                <a href="#" class="post-cata">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent-blog">
                <h3 class="mb-4 pb-2">Рекомендуем</h3>
                <div class="row">
                    @foreach($posts as $p)
                        <div class="col-lg-4">
                            <div class="blog-item rp-item set-bg" data-setbg="{{$p->getImage()}}">
                                @foreach($post->categories as $category)
                                    <div class="pa-tag">{{$category->name}}</div>
                                @endforeach
                                <div class="bi-text">
                                    <div class="bi-date">{{$p->updated_at->format('F d, Y')}}</div>
                                    <h3><a href="">{{$p->name}}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            @if(count($post->comments))
            <div class="comment-option">
                <h3>Комментарии</h3>
                <hr>
                @include ('front.comments_layouts.list', ['collection' => $comments['root']])
            </div>
            @endif
            @if (auth()->check())
                <h3>Оставьте свой комментарий</h3>
                @include ('front.comments_layouts.form')
            @endif
        </div>
    </div>
</section>
<!-- Blog Section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{asset('front')}}/js/vendor/jquery-3.2.1.min.js"></script>
<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
<script src="{{asset('front')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('front')}}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('front')}}/js/isotope.pkgd.min.js"></script>
<script src="{{asset('front')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{asset('front')}}/js/circle-progress.min.js"></script>
<script src="{{asset('front')}}/js/pana-accordion.js"></script>
<script src="{{asset('front')}}/js/main.js"></script>
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
</body>
</html>
