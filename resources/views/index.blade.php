@extends('layouts.index')

@section('content')

    <div class="main-content">
        <div class="main-content-inner content-width">

            <div class="column-container">

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #916C6C;">
                            <!-- Icon -->
                            <i class="fa fa-heart"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Дизайн</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #7089AD;">
                            <!-- Icon -->
                            <i class="fa fa-font"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Верстка</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

                <div class="column-one-third">
                    <div class="icons-column">
                        <!-- Icon Backing -->
                        <div class="icon-backing" style="background-color: #63885F;">
                            <!-- Icon -->
                            <i class="fa fa-fullscreen"></i>
                        </div>
                    </div>
                    <div class="content-column">
                        <!-- Title -->
                        <h3>Разработка</h3>
                        <!-- Text -->
                        <p>Интересно отметить, что каждая сфера рынка притягивает план размещения. </p>
                    </div>
                </div>

            </div>

            <div class="column-container">
                <div class="column-three-qtr">
                    <div class="divider"></div>
                    <h3 class="section-title">Последние новости</h3>
                    <div id="blog-nav" class="carousel-nav">
                        <div class="back"></div>
                        <div class="next"></div>
                    </div>
                    <div class="carousel">
                        <ul id="blog-carousel" class="slider-container">

                            @foreach($news as $newsy)

                                <li class="column-one-fourth">
                                    <!-- Image -->

                                    <a href="{{action('NewsController@showNews', [$newsy->category->short_name,$newsy ['short_name']])}}"
                                       class="image-link"><img alt="" src="/images/uploaded/{{$newsy['img_path']}}" class="fullwidth">
                                    </a>
                                    <!-- Title -->
                                    <h3><a href="{{action('NewsController@showNews', [$newsy->category->short_name,$newsy ['short_name']])}}">{{$newsy['title']}}</a></h3>
                                    <!-- Date -->
                                    <div class="date">{{$newsy['created_at']}}</div>
                                    <!-- Excerpt -->
                                    <p>{{$newsy['short_description']}} </p>
                                    <!-- Read More Link -->
                                    <a href="{{action('NewsController@showNews', [$newsy->category->short_name,$newsy ['short_name']])}}">Подробнее</a>
                                </li>
                        @endforeach

                            <!-- END One Fourth -->

                        </ul>
                    </div>

                </div>

                <div class="column-one-fourth">

                    <div class="divider"></div>

                    <h3 class="section-title">Комментарии</h3>

                    <div id="testimonials-nav" class="carousel-nav">
                        <div class="back"></div>
                        <div class="next"></div>
                    </div>

                    <div class="carousel">
                        <ul id="testimonials-carousel" class="slider-container">

                        @foreach($comment as $comments)
                            <!-- Testimonial 1 -->

                            <li class="column-one-fourth">
                                <!-- Text -->
                                <div class="testimonial-text">
                                    <p>{{$comments['message']}}</p>
                                </div>
                                <!-- Name -->
                                <div class="testimonial-name">
                                    <p>{{$comments['name']}}</p>
                                </div>
                                <!-- E-mail -->
                                <div class="testimonial-name">
                                    <p>{{$comments['email']}}</p>
                                </div>
                                <!-- Date -->
                                <div class="testimonial-name">
                                    <p>{{$comments['created_at']}}</p>
                                </div>

                                {{--<!-- Company URL -->--}}
                                {{--<div class="testimonial-link">--}}
                                    {{--<a href="#">Посетитель</a>--}}
                                {{--</div>--}}
                            </li>

                            <!-- END Testimonial 1 -->


                            <!-- Testimonial 2 -->

                            <!-- END Testimonial 2 -->

                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="spacer"></div>

    <div class="content-width">
        <div class="client-logos-container">

            <div class="client-logos-title">
                <span>Наши партнеры</span>
            </div>

            <div id="clients-back"></div>
            <div id="clients-next"></div>

            <div class="carousel">
                <ul id="clients-carousel" class="column-container">
                    @foreach( $partners as $partner )
                    <li class="">
                        <div class="logo-outer">
                            <div class="logo-inner">
                                <!-- Actual Logo -->
                                <img alt="" src="{{$partner['img_path']}}">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop


