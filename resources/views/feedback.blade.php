@extends('layouts.index')

@section('home_banner')

@show

@section('content')

    <!-- Main Content -->

    <div class="main-content">
        <div class="main-content-inner content-width">


            <!-- Page Title -->
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <h1>Наши контакты</h1>

            <!-- END Title -->



            <!-- Intro -->

            <p>Позиционирование на рынке, как следует из вышесказанного, индуцирует анализ зарубежного опыта. Можно предположить, что точечное воздействие нетривиально. По сути, структура рынка очевидна не для всех.</p>

            <!-- END Intro -->



            <!-- Spacer x 2 -->

            <div class="spacer"></div>
            <div class="spacer"></div>

            <!-- END Spacer x 2 -->



            <!-- Left Aligned Icons & Text (Vertically centered) -->

            <div class="column-container">


                <!-- One Third -->

                <div class="column-one-third">
                    <div class="icons-column vertical-center">
                        <!-- Icon Backing -->
                        <div class="icon-backing">
                            <!-- Icon -->
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="content-column vertical-center">
                        <!-- Title -->
                        <h3 class="no-margin">Телефоны</h3>
                        <!-- Text -->
                        <p>111-111-1111</p>
                    </div>
                </div>

                <!-- END One Third -->



                <!-- One Third -->

                <div class="column-one-third">
                    <div class="icons-column vertical-center">
                        <!-- Icon Backing -->
                        <div class="icon-backing">
                            <!-- Icon -->
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="content-column vertical-center">
                        <!-- Title -->
                        <h3 class="no-margin">Email</h3>
                        <!-- Text -->
                        <p><a href="#">mail@mail.com</a></p>
                    </div>
                </div>

                <!-- END One Third -->



                <!-- One Third -->

                <div class="column-one-third">
                    <div class="icons-column vertical-center">
                        <!-- Icon Backing -->
                        <div class="icon-backing">
                            <!-- Icon -->
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="content-column vertical-center">
                        <!-- Title -->
                        <h3 class="no-margin">Адрес</h3>
                        <!-- Text -->
                        <p>Москва, ул. Пушкина дом Колотушкина</p>
                    </div>
                </div>

                <!-- END One Third -->


            </div>

            <!-- END Left Aligned Icons & Text -->



            <!-- Spacer x 3 -->

            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>

            <!-- END Spacer x 3 -->



            <!-- Contact Form -->

            <div class="contact-form">
                {!! Form::open(['id'=>'comment-form','name'=>'contact-form','method'=>'POST','action' => ['FeedbackController@store']]) !!}
                {{--<form id="comment-form" name="contact-form" method="post" action="#">--}}
                    <!-- Textbox -->
                    {{csrf_field()}}
                    <input type="text" name="name" placeholder="Имя *">
                    <!-- Textbox -->
                    <input type="text" name="email" placeholder="Email *">
                    <!-- Textbox -->
                    <input type="text" name="phone" placeholder="Телефон">
                    <!-- Message Box -->
                    <textarea name="message" placeholder="Сообщение *"></textarea>
                    <!-- Submit Button -->
                    <input type="submit" class="accent" value="Готово">
                {{--</form>--}}
                    {!! Form::close() !!}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
            </div>

            <!-- END Contact Form -->

        </div>
    </div>

    <!-- END Main Content -->

@stop