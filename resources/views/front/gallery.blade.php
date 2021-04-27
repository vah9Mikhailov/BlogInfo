@extends('front.layouts.layout')
<link rel="stylesheet" href="{{asset('front')}}/css/fresco.css"/>


@section('content')
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
@endsection
<script src="{{asset('front')}}/js/fresco.min.js"></script>




