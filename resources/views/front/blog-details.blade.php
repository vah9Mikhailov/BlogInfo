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
                <div class="blog-meta">May 19, 2019</div>
                <div class="blog-meta">3 Comment</div>
            </div>
            <h2>The Female Body Shape Men Find</h2>
            <div class="blog-thumb">
                <div class="thumb-cata">people</div>
                <img src="{{$post->getImage()}}" alt="">
            </div>
            <p>{!! $post->description!!}</p>
            <div class="row blog-gallery">
                <div class="col-lg-3 p-0">
                    <div class="bg-item">
                        <img src="img/blog-details/1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-9 p-0">
                    <div class="row m-0">
                        <div class="col-lg-4 p-0">
                            <div class="bg-item">
                                <img src="img/blog-details/2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 p-0">
                            <div class="bg-item">
                                <img src="img/blog-details/3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 p-0">
                            <div class="bg-item">
                                <img src="img/blog-details/4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 p-0">
                            <div class="bg-item">
                                <img src="img/blog-details/5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-lg-6 mb-4">
                    <a href="#" class="post-cata">people</a>
                    <a href="#" class="post-cata">Photography</a>
                    <a href="#" class="post-cata">nature</a>
                </div>
                <div class="col-lg-6 mb-5 text-left text-md-right">
                    <div class="post-share">
                        <span>Share:</span>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
            <div class="blog-navigation">
                <div class="row m-0">
                    <div class="col-lg-6 p-0">
                        <a href="#" class="bn-item set-bg" data-setbg="img/blog-details/blog-prev.jpg">
                            <h4><i class="ti-arrow-left"></i> The Female Body Shape Men Find Most Attractive</h4>
                        </a>
                    </div>
                    <div class="col-lg-6 p-0">
                        <a href="#" class="bn-item bn-next set-bg" data-setbg="img/blog-details/blog-next.jpg">
                            <h4><i class="ti-arrow-right"></i>Vietnam's largest art community</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="recent-blog">
                <h3 class="mb-4 pb-2">Recommended For You</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="blog-item rp-item set-bg" data-setbg="img/blog/6.jpg">
                            <div class="bi-tag">nature</div>
                            <div class="bi-text">
                                <div class="bi-date">May 19, 2019 | 3 Comment</div>
                                <h3><a href="blog-details.html">The Biggest Cinema Event In 2019</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-item rp-item set-bg" data-setbg="img/blog/4.jpg">
                            <div class="bi-tag">nature</div>
                            <div class="bi-text">
                                <div class="bi-date">May 19, 2019 | 3 Comment</div>
                                <h3><a href="blog-details.html">The Biggest Cinema Event In 2019</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-item rp-item set-bg" data-setbg="img/blog/3.jpg">
                            <div class="bi-tag">nature</div>
                            <div class="bi-text">
                                <div class="bi-date">May 19, 2019 | 3 Comment</div>
                                <h3><a href="blog-details.html">The Biggest Cinema Event In 2019</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-option">
                <h3>2 Comments</h3>
                <div class="single-comment-item first-comment">
                    <div class="sc-author">
                        <img src="img/blog-details/user-1.jpg" alt="">
                    </div>
                    <div class="sc-text">
                        <span>27 Aug 2019</span>
                        <h5>Brandon Kelley</h5>
                        <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit, sed quia non numquam eius modi tempora.lit, sed quia non numquam eius modi tempora
                            numquam eius modi tempora..</p>
                        <a href="#" class="comment-btn like-btn">Like</a>
                        <a href="#" class="comment-btn">Reply</a>
                    </div>
                </div>
                <div class="single-comment-item reply-comment">
                    <div class="sc-author">
                        <img src="img/blog-details/user-2.jpg" alt="">
                    </div>
                    <div class="sc-text">
                        <span>27 Aug 2019</span>
                        <h5>Mia Maya</h5>
                        <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit, sed quia non numquam eius modi tempora.lit, sed quia non numquam eius modi tempora
                            numquam eius modi tempora.</p>
                        <a href="#" class="comment-btn like-btn">Like</a>
                        <a href="#" class="comment-btn">Reply</a>
                    </div>
                </div>
                <div class="single-comment-item second-comment ">
                    <div class="sc-author">
                        <img src="img/blog-details/user-3.jpg" alt="">
                    </div>
                    <div class="sc-text">
                        <span>27 Aug 2019</span>
                        <h5>Mike Phillips</h5>
                        <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            velit, sed quia non numquam eius modi tempora.lit, sed quia non numquam eius modi tempora
                            numquam eius modi tempora.</p>
                        <a href="#" class="comment-btn like-btn">Like</a>
                        <a href="#" class="comment-btn">Reply</a>
                    </div>
                </div>
            </div>
            <div class="comment-form">
                <h3>Leave A Comment</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="col-md-4">
                            <input type="text" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <textarea placeholder="Comment"></textarea>
                            <button type="submit">Post Comment</button>
                        </div>
                    </div>
                </form>
            </div>
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

</body>
</html>
