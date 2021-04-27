@extends('front.layouts.layout')
<link rel="stylesheet" href="{{asset('front')}}/css/fresco.css"/>

@section('content')
    <section class="blog-section">
        <div class="nice-scroll">
            <div class="blog-grid-warp">
                <div class="blog-grid-sizer"></div>
                @foreach($posts as $post)
                    <div class="blog-grid">
                        <div class="blog-item">
                            <img src="{{$post->getImage()}}" alt="">
                            <div class="bi-text">
                                <div class="bi-date">{{$post->updated_at->format('d F, Y')}}</div>
                                <h3><a href="{{route('blog.single',['slug' => $post->slug])}}">{{$post->name}}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection



