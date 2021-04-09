<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Tulen | Photography HTML Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Tulen Photography HTML Template"
    ">
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

<!-- Gallery Section end -->
<section class="gallery-section">
    <div class="gallery-header">
        <h4>Галерея</h4>
        <ul class="gallery-filter">
            <li class="filter all active" data-filter="*">Все</li>
            @foreach($categories as $category)
                <li class="filter" data-filter=".{{$category}}">{{$category}}</li>
            @endforeach
        </ul>
    </div>

    <div class="nice-scroll">
        <div class="gallery-warp">
            <div class="grid-sizer" style="text-align: center"></div>
            @foreach($posts as $post)
                <div class="gallery-item gi-big {{$post->categories->pluck('name')->join(' ')}}">
                    <a class="fresco" href="{{$post->getImage()}}" data-fresco-group="projects">
                        <img src="{{$post->getImage()}}" alt="">
                    </a>
                    <div class="gi-hover">
                        <img src="{{$post->user->getImage()}}" alt="">
                        <h6>{{$post->user->name}}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
<!-- Gallery Section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{asset('front')}}/js/vendor/jquery-3.2.1.min.js"></script>
<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
<script src="{{asset('front')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('front')}}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('front')}}/js/isotope.pkgd.min.js"></script>
<script src="{{asset('front')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{asset('front')}}/js/circle-progress.min.js"></script>
<script src="{{asset('front')}}/js/pana-accordion.js"></script>
<script src="{{asset('front')}}/js/fresco.min.js"></script>
<script src="{{asset('front')}}/js/main.js"></script>

</body>
</html>
