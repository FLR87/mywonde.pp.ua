@section('head')
        <!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <title>Wonde - универсальный бизнес шаблон сайта</title>

    <link href="{{ URL::to('css\styles.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css\font-awesome.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ URL::to('js\jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\main.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\common.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\flickr.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\jquery.carousel-main.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\jquery.carousel-content.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\home-slider-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-portfolio-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-blog-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-testimonials-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\carousel-clients-settings.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('js\portfolio-blog-slider-settings.js')}}"></script>
</head>
@show

@section('top_menu')
    <body class="light-bg home">
    <div class="main-container">
        <div class="topbar-outer dark">
            <div class="topbar content-width">
                <div class="table fullheight">
                    <div class="table-cell fullheight middle">
                        <div class="logo">
                            <a href="{{action('IndexController@index')}}"><img alt=""
                                                                               src="..\images\topbar\logo_white.png"
                                                                               height="17">
                            </a>
                        </div>
                    </div>
                </div>


                <ul class="topsocial">
                    <li><a href="#"><i class="fa fa-linkedin-square"></i>
                            <div class="tooltip">LinkedIn</div>
                        </a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i>
                            <div class="tooltip">Facebook</div>
                        </a>
                    </li>
                    <li><a href="#"><i class="fa fa-twitter"></i>
                            <div class="tooltip">Twitter</div>
                        </a>
                    </li>
                    <li><a href="#"><i class="fa fa-google-plus"></i>
                            <div class="tooltip">Google+</div>
                        </a>
                    </li>
                    <div class="flex-center position-ref full-height">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    {{--<li><a href="{{ url('/home') }}">home</a></li>--}}
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><br>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        @endauth
                            </div>
                    </div>
                    @endif
                </ul>

                <ul class="topnav">
                    <li><a href="{{action('IndexController@index')}}" class="current">Главная</a>
                    </li>
                    {{--<li><a href="about.html">О компании</a>--}}
                    </li>
                    {{--<li><a href="{{action('FileEntryController@index')}}">Проекты</a>--}}
                        {{--<ul>--}}
                        {{--<li><a href="#">Название проекта №1</a></li>--}}
                        {{--<li><a href="#">Название проекта №2</a></li>--}}
                        {{--<li><a href="#">Название проекта №3</a></li>--}}
                        {{--<li><a href="#">Название проекта №4</a></li>--}}
                        {{--<li><a href="#">Название проекта №5</a></li>--}}
                        {{--</ul>--}}
                    </li>
                    <li><a href="{{action('NewsController@index')}}">Новости</a>
                        {{--<ul>--}}
                        {{--<li><a href="{{action('Admin\NewsController@index')}}">Категории</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="blog-post.html">Описание новости</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                    </li>
                    <li><a href="{{action('FeedbackController@index')}}">Контакты</a>
                    </li>
                </ul>

                <a href="#" class="mobilenav-click">
                    <div class="mobilenav-button-container">
                        <div class="mobilenav-button-inner">
                            <div class="mobilenav-button"></div>
                        </div>
                    </div>
                </a>

                <div class="mobilenav-container">
                    <ul class="mobilenav">
                    </ul>
                </div>
            </div>
        </div>
        @show

        @section('home_banner')
            <div class="home-banner dark">

                <ul class="slider-container" id="home-slider">
                    <li class="slide-outer">
                        <div class="slide-inner">
                            <div class="content-width">
                                <div class="slide-style-1">
                                    <!-- Title -->
                                    <div class="icon-container">
                                        <img src="/images/placeholders/logo_possible.png" alt="Oops..."/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{--<li class="slide-outer">--}}
                    {{--<div class="slide-inner">--}}
                    {{--<div class="content-width">--}}
                    {{--<div class="slide-style-2">--}}
                    {{--<div class="icon-container">--}}
                    {{--<!-- Icon Backing -->--}}
                    {{--<div class="icon-backing">--}}
                    {{--<!-- Icon -->--}}
                    {{--<i class="fa fa-css3"></i>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Title -->--}}
                    {{--<h1>Современный шбалон сайта<span>.</span></h1>--}}
                    {{--<!-- Text -->--}}
                    {{--<p>Системный анализ, отбрасывая подробности, подсознательно концентрирует--}}
                    {{--конкурент.</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</li>--}}

                    <li class="slide-outer">
                        <div class="slide-inner">
                            <div class="content-width">
                                <div class="slide-style-1">
                                    <!-- Title -->
                                    <h1>На основе бесплатного шаблона <span>HTML5</span> с адаптивным
                                        дизайном<span></span>
                                    </h1>
                                    <!-- Text -->
                                    {{--<p>Системный анализ, отбрасывая подробности, подсознательно концентрирует--}}
                                    {{--конкурент.</p>--}}
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>

                <div class="slider-nav-container">
                    <div class="slider-nav-inner">
                        <div class="slider-nav content-width">

                            <ul id="bx-pager">
                                <li><a data-slide-index="0" href="">Вступление</a>
                                </li>
                                <li><a data-slide-index="1" href="">Описание</a>
                                </li>
                                {{--<li><a data-slide-index="2" href="">Предложения</a>--}}
                                {{--</li>--}}
                            </ul>

                            <div class="slider-controls">
                                <div id="slider-pause"></div>
                                <div id="slider-prev"></div>
                                <div id="slider-next"></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        @show


        @yield('content')


        <div class="footer-container">

            @section('footer')
                <div class="footer">
                    <div class="content-width">


                        <!-- Four Columns -->

                        <div class="column-container">

                            <div class="column-one-fourth">
                                <img alt="" src="images\topbar\logo_white.png" height="17" width="57"
                                     class="logo">
                                <p>Маркетингово-ориентированное издание, как следует из вышесказанного, редко
                                    соответствует рыночным ожиданиям.</p>
                                <p>Психологическая среда, безусловно, порождает продуктовый ассортимент.</p>
                                {{--<p><a href="about.html">Читать далее</a>--}}
                                </p>
                            </div>

                            <div class="column-one-fourth">
                                <img alt="" src="images\topbar\logo_white.png" height="17" width="57"
                                     class="logo">
                                <p>Маркетингово-ориентированное издание, как следует из вышесказанного, редко
                                    соответствует рыночным ожиданиям.</p>
                                <p>Психологическая среда, безусловно, порождает продуктовый ассортимент.</p>
                                {{--<p><a href="about.html">Читать далее</a>--}}
                                </p>
                            </div>

                            <div class="column-one-fourth">
                                <h3>Галерея</h3>
                                <div class="footer-flickr-container">
                                    <script type="text/javascript" src="js\flickr.js"></script>
                                </div>
                            </div>
                            <div class="column-one-fourth">

                                {{--<h3>Подписаться</h3>--}}
                                {{--<div class="footer-newsletter">--}}
                                    {{--<form id="newsletter" name="newsletter" method="post" action="#">--}}
                                        {{--<div class="container">--}}
                                            {{--<input type="text" name="name" class="textbox"--}}
                                                   {{--placeholder="Email Address">--}}
                                            {{--<input type="submit" name="submit" id="submit" value="Готово"--}}
                                                   {{--class="button">--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}

                                <h3>Ждем Вас</h3>

                                <ul class="footer-social">
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin-square"></i>
                                            <div class="tooltip">LinkedIn</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i>
                                            <div class="tooltip">Facebook</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i>
                                            <div class="tooltip">Twitter</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i>
                                            <div class="tooltip">Google+</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube"></i>
                                            <div class="tooltip">YouTube</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest"></i>
                                            <div class="tooltip">Pinterest</div>
                                        </a>
                                    </li>
                                </ul>

                            </div>

                        </div>

                        <div class="footer-lower-container">

                            <ul class="footer-lower">
                                <li><a href="{{action('IndexController@index')}}">Главная</a>
                                </li>
                                {{--<li><a href="about.html">О нас</a>--}}
                                </li>
                                <li><a href="{{action('FileEntryController@index')}}">Проекты</a>
                                </li>
                                <li><a href="{{action('NewsController@index')}}">Новости</a>
                                </li>
                                <li><a href="{{action('FeedbackController@index')}}">Контакты</a>
                                </li>
                            </ul>

                            <div class="footer-copyright">
                                &copy; 2016 | Wonde - универсальный бизнес шаблон сайта
                            </div>
                        </div>
                        <a class="top-of-page-link" href="#"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>
        </div>
    </div>
    </body>
</html>
@show