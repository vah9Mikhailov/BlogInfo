<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Tulen | Photography HTML Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="Tulen Photography HTML Template">
    <meta name="keywords" content="photo, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/accordion.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}"/>


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

<!-- Hero Section end -->
<section class="hero-section">
    <div class="pana-accordion" id="accordion">
        <div class="pana-accordion-wrap">
            @foreach($posts as $post)
                <div class="pana-accordion-item set-bg" data-setbg="{{asset("{$post->getImage()}")}}">
                    <div class="pa-text">
                        @foreach($post->categories as $category)
                            <div class="pa-tag">{{$category->name}}</div>
                        @endforeach
                        <h2>{{$post->name}}</h2>
                        <div class="pa-author">
                            <img src="{{$post->user->getImage()}}" alt="">
                            <h4>{{$post->user->name}}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
   {{-- <div class="hero-slider-warp">
        <div class="hero-slider owl-carousel">
            @foreach($posts as $post)
                <div class="pana-accordion-item set-bg" data-setbg="{{$post->getImage()}}">
                    <div class="pa-text">
                        @foreach($post->categories as $category)
                            <div class="pa-tag">{{$category->name}}</div>
                        @endforeach
                        <h2>{{$post->name}}</h2>
                        <div class="pa-author">
                            <img src="{{$post->user->getImage()}}" alt="">
                            <h4>{{$post->user->name}}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>--}}
</section>
<!-- Hero Section end -->

<!--====== Javascripts & Jquery ======-->
<script src="{{asset('front/js/vendor/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('front/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('front/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('front/js/circle-progress.min.js')}}"></script>
<script src="{{asset('front/js/pana-accordion.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>

</body>
</html>
