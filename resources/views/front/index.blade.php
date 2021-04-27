@extends('front.layouts.layout')

@section('content')
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
@endsection
