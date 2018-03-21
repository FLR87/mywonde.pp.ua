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

                @foreach($news as $newsy)
                    <!-- Blog Post -->
                        <div class="blog-post">
                            <!-- Title -->
                            <h1>
                                <a href="{{action('NewsController@showNews', [$newsy->category->short_name,$newsy ['short_name']])}}">{{$newsy['title']}}</a>
                            </h1>
                            <!-- Meta -->
                            <div class="blog-meta">
                                <div class="meta-item">
                                    <div class="meta-title published">Дата:</div>
                                    <a href="#">{{$newsy['created_at']}}</a></div>
                                <div class="meta-item">
                                    <div class="meta-title views">Просмотры:</div>
                                    <a href="#">9</a></div>
                                <div class="meta-item">
                                    <div class="meta-title comments">Комментарии:</div>
                                    <a href="#">#</a></div>
                                {{--<div class="meta-item"><div class="meta-title tags">Теги</div><a href="#">новости</a>, <a href="#">шаблоны</a></div>--}}
                            </div>
                            <!-- Image -->
                            <a href="{{action('NewsController@showNews', [$newsy->category->short_name,$newsy ['short_name']])}}"
                               class="media image-link"><img alt="Oops!" src="/images/uploaded/{{$newsy['img_path']}}" class="fullwidth"></a>
                            <!-- Excerpt -->
                            <div class="blog-content">
                                <p>{{$newsy['short_description']}}</p>
                                <!-- Read More Button -->
                                <a href="{{action('NewsController@showNews', [$newsy->category->short_name,$newsy ['short_name']])}}"
                                   class="button accent">Читать далее</a>
                            </div>
                        </div>

                        <!-- END Blog Post -->

                @endforeach

                <!-- Navigation -->


                    <div class="blog-nav">
                        {{--{{ $news->links() }}--}}
                        <a href="{{ $news->previousPageUrl() }}" class="back">Назад</a>
                        <a href="{{ $news->nextPageUrl() }}" class="next">Вперед</a>
                    </div>


                    <!-- END Navigation -->


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
                                        <div class="date">{{$item['created_at']}}</div>
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