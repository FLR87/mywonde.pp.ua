@extends('layouts.index')

@section('banner')

@stop

@section('content')
    <div class="main-content">
        <div class="main-content-inner content-width">


            <!-- Main Column / Sidebar -->

            <div class="column-container">


                <!-- Main Column -->

                <div class="column-three-qtr">


                    <!-- Blog Post -->

                    <div class="blog-post actual-post">
                        <!-- Title -->
                        <h1>{{$news->title}}</h1>
                        <!-- Meta -->
                        <div class="blog-meta">
                            <div class="meta-item">
                                <div class="meta-title published">Дата:</div>
                                <a href="#">{{$news->created_at}}</a></div>
                            <div class="meta-item">
                                <div class="meta-title views">Просмотры:</div>
                                <a href="#">9</a></div>
                            <div class="meta-item">
                                <div class="meta-title comments">Комментарии:</div>
                                <a href="#">{{$comments->count()}}</a></div>
                            {{--<div class="meta-item"><div class="meta-title tags">Теги:</div><a href="#">новости</a>, <a href="#">шаблоны</a></div>--}}
                        </div>


                        <!-- Content -->

                        <div class="blog-content">
                            <!-- Paragraph -->
                            <p>{{$news->short_description}}</p>

                            <div class="media">
                                <div id="portfolio-blog-slider-container">

                                    <div id="portfolio-blog-slider">

                                        <!-- Actual Images -->

                                        <img alt="Opps!" src="/images/uploaded/{{($news->img_path)}}" class="fullwidth"></br>
                                    {{--<img alt="" src="..\images\placeholders\preview12.jpg" class="fullwidth">--}}

                                    <!-- END Actual Images -->

                                    </div>


                                    <!-- Slide Controls -->

                                    <div class="portfolio-blog-slider-controls">
                                        <div id="portfolio-blog-slider-prev"></div>
                                        <div id="portfolio-blog-slider-next"></div>
                                    </div>

                                    <!-- END Slide Controls -->


                                </div>
                            </div>

                            <!-- END Image -->


                            <!-- H3 Title -->
                            <h3>{{$news->title}}</h3>
                            <!-- Paragraph -->
                            <p>{{$news->content}}</p>

                        </div>

                        <!-- END Content -->


                    </div>

                    <!-- END Blog Post -->


                    <!-- Share Links -->

                    <ul class="post-sharing">
                        <li><a href="#"><i class="fa fa-facebook"></i>
                                <div class="tooltip">Поделиться в Facebook</div>
                            </a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i>
                                <div class="tooltip">Поделиться в Twitter</div>
                            </a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i>
                                <div class="tooltip">Поделиться в LinkedIn</div>
                            </a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i>
                                <div class="tooltip">Поделиться в Pinterest</div>
                            </a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i>
                                <div class="tooltip">Поделиться в Google+</div>
                            </a></li>
                    </ul>

                    <!-- END Share Links -->


                    <!-- Divider -->

                    <div class="divider"></div>

                    <!-- END Divider -->

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/>
                    @endif
                    @if (\Session::has('ban_error'))
                        <div class="alert alert-danger">
                            <p>{{ \Session::get('ban_error') }}</p>
                        </div><br/>
                    @endif

                <!-- Reader Comments -->
                    {{--{{dd($comments)}}--}}
                    <div class="comments">
                        <h2>Комментарии к статьи</h2>
                        @foreach($comments as $comment)
                            <div class="comment">
                                <!-- Username -->
                                <div class="username">
                                    <a href="#">{{$comment['name']}}</a> пишет:<br>

                                </div>
                                <!-- Date -->
                                <div class="date">
                                    {{$comment['created_at']}}<br>

                                </div>
                                <!-- Message -->
                                <div class="message">

                                    <p>{{$comment['message']}}</p>


                                </div>

                                @foreach($comment->fileentries as $item)
                                    <div class="message">
                                        <br>
                                        @if(!$item->banned)
                                            <p><img src="{{$item->storage_path}}" style="width: 500px; height: 150px">
                                            </p>
                                        @endif
                                    </div>
                            @endforeach
                            <!-- Reply Link -->
                                <div class="link">
                                    <a href="#">Ответить</a>
                                </div>
                            </div>
                    @endforeach

                    <!-- END Comment -->


                    </div>

                    <!-- END Reader Comments -->


                    <!-- Divider -->

                    <div class="divider"></div>

                    <!-- END Divider -->

                @if (Auth::check())
                    <!-- Post Comment Form -->
                        <div class="comment-form">
                            <h2>Оставить комментарий</h2>
                        {{--<form  method="post" action="{{route('news.store')}}" >--}}
                        {{--{!! Form::open( ['method'=>'POST', 'route' => ['comments.store']]) !!}--}}
                        {{--                        {!! Form::open(['method'=>'POST', 'route' => ['comment.store']]) !!}--}}
                        {!! Form::open(array('action' => ['CommentController@store'],'method'=>'POST', 'files' => 'true')) !!}

                        {{--                    {!! Form::open(['method'=>'POST', 'action' => ['CommentController@store']]) !!}--}}
                        <!-- Textbox -->
                            {{csrf_field()}}
                            <input type="hidden" name="news_id" value="{{$news->id}}">

                            {{--<input type="text" name="name" placeholder="Имя *">--}}
                        <!-- Textbox -->
                            {{--<input type="text" name="email" placeholder="Email *">--}}
                        <!-- Textbox -->
                            <input type="text" name="subject" placeholder="Тема *">
                            <!-- Comment box -->
                            <textarea name="message" placeholder="Сообщение *"></textarea>
                            <!-- Image -->
                            <input type="file" name="filefield">
                            <!-- Submit Button -->
                            <input type="submit" class="accent" value="Готово">


                            {!! Form::close() !!}

                        </div>

                @else

                @endif


                <!-- END Post Comment Form -->


                </div>

                <!-- END Main Column -->


                <!-- Sidebar -->

                <div class="column-one-fourth sidebar">


                    <!-- Categories -->

                    <div class="sidebar-widget categories">
                        <!-- Title -->
                        <h3>Категории новостей</h3>
                        <!-- Category Links -->
                        @foreach($categories as $category)
                            <a href="/news/{{$category['short_name']}}">{{$category['title']}}</a>
                        @endforeach
                    </div>


                    <!-- END Categories -->


                    <!-- Search -->

                    <div class="sidebar-widget search">
                        <!-- Title -->
                        <h3>Поиск по сайту</h3>
                        <!-- Search Form -->
                        <form id="search-news" name="news-search" method="get"
                              action="{{action('NewsController@index')}}">
                            <div class="container">
                                <!-- Textbox -->
                                <input type="text" id="blog-search" name="news-search" placeholder="Искать">
                                <!-- Search Button -->
                                <input type="submit" id="go" class="go" value="&#xf002;">
                            </div>
                        </form>
                    </div>

                    <!-- END Search -->

                    <!-- Popular Posts -->

                    <div class="sidebar-widget posts">
                        <!-- Title -->
                        <h3>Последнее</h3>


                        <!-- Post -->
                        @foreach( $latest_news as $item )
                            <div class="post">
                                <!-- Image Column -->
                                <div class="img-column">
                                    <a href="{{action('NewsController@showNews', [$item->category->short_name,$item ['short_name']])}}"
                                       class="image-link mini"><img alt=""
                                                                    src="/images/uploaded/{{$item['img_path']}}"
                                                                    class="fullwidth"></a>
                                </div>
                                <!-- Content Column -->
                                <div class="content-column">
                                    <!-- Post Title -->
                                    <h3 class="sub-title"><a
                                                href="{{action('NewsController@showNews', [$item->category->short_name,$item ['short_name']])}}">{{$item['short_description']}}</a>
                                    </h3>
                                    <!-- Date -->
                                    <div class="date">31 августа 2016</div>
                                </div>
                            </div>
                    @endforeach
                    <!-- END Post -->

                    </div>

                    <!-- END Popular Posts -->

                </div>

                <!-- END Sidebar -->

            </div>


            <!-- END Main Column / Sidebar -->


        </div>
    </div>
    <script>
        $('#search-news').on('submit', function (e) {
            e.preventDefault();
            var form = $(this);
            var data = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: 'GET',
                data: data,
                success: function (response) {
                    var new_blog = $(response).find('.column-three-qtr').html();
                    $('.column-three-qtr').html(new_blog);
                }
            })
        })
    </script>
@stop