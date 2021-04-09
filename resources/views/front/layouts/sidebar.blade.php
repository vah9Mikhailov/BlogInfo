<div class="menu-wrapper">
    <div class="menu-switch">
        <i class="ti-menu"></i>
    </div>
    <div class="menu-social-warp">
        <div class="menu-social">
            <h2>D</h2>
            <br>
            <h2>O</h2>
            <br>
            <h2>T</h2>
            <br>
            <h2>A</h2>
            <br>
            <h2>2</h2>
        </div>
    </div>
</div>
<div class="side-menu-wrapper">
    <div class="sm-header">
        <div class="menu-close" style="background: #010005">
            <i class="ti-arrow-left"></i>
        </div>
        <a href="{{route('home.front')}}" class="site-logo">
            <img class="imgborder" src="{{asset('front/img/DOTA2.jpg')}}" alt="">
        </a>
    </div>
    <nav class="main-menu">
        <ul>
            <li><a href="{{route('home.front')}}" class="@if (request()->is('/')) {{'active'}} @endif">Home</a></li>
            <li><a href="{{route('gallery')}}" class="@if (request()->routeIs('gallery')) {{'active'}} @endif">Галерея</a></li>
            <li><a href="{{route('blog')}}" class="@if (request()->is('/blog')) {{'active'}} @endif">Блог</a></li>
            {{--<li><a href="{{route('contact')}}" class="@if (request()->is('/contact')) {{'active'}} @endif">Контакты</a></li>--}}
            <li><a href="{{route('login')}}" >Вход</a></li>
            <li><a href="{{route('register')}}">Регистрация</a></li>
        </ul>
    </nav>
    <div class="sm-footer">

        <div class="copyright-text">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a
                    href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</div>

<style>
    img.imgborder {
        display: block;
        width: 100%;
        height: 90px;
        object-fit: cover;
    }
</style>
