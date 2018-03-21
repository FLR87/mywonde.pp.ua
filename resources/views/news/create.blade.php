<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News creation form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #299be4;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn {
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn:hover, .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.settings {
            color: #2196F3;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        .text-success {
            color: #10c469;
        }

        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<div class="container">
    <h2 align="center">Make a news</h2><br/>
    {{--===error check===--}}
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
    {{--===error check===--}}

    {{--    {!! Form::open(['route' => ['news.store'],'file'=> true]) !!}--}}
    {{--    {!! Form::open(array('route' => 'news.store','enctype' => 'multipart/form-data')) !!}--}}
    {!! Form::open(array('route' => 'news.store','files' => 'true')) !!}
    {{--<div class="row cancel">--}}
    {{--<div class="col-md-4">--}}
    {{--{!! Form::file('img_path', array('class' => 'image')) !!}--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<button type="submit" class="btn btn-success">Create</button>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<form  method="post" action="{{route('news.store')}}" >--}}
    {{csrf_field()}}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" placeholder="News title">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="short_name">Short name:</label>
            <input type="text" class="form-control" name="short_name" placeholder="URL short name">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="category">Category:</label>
            <select size="1" id="role" class="form-control" name="category_id" required>
                <option value="">Choose news category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" placeholder="News content"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <label for="short_description">Short description:</label>
            <input type="text" class="form-control" name="short_description" placeholder="Type short description">
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-md-4"></div>--}}
        {{--<div class="form-group col-md-4">--}}
            {{--<label for="day_news">Day_news:</label>--}}
            {{--<input type="number" class="form-control" name="day_news" placeholder=" 1 = news of the day, 0 = not">--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            {!! Form::file('img_path', array('class' => 'form-control')) !!}
        </div>
    </div>


    {{--<div class="row">--}}
    {{--<select size="1" id="day_news" size="1" class="form-control" name="day_news" required>--}}
    {{--@foreach($day_news as $day_new);--}}
    {{--<option value="{{$day_new->id}}">{{$day_new->name}}</option>--}}
    {{--@endforeach;--}}
    {{--</select>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
            <button type="submit" class="btn btn" style="margin-left:0px">Add News</button>
            {!! Form::close() !!}
            <a href="{{action('Admin\NewsController@index')}}" class="btn btn-default">View all news</a></td>
        </div>
    </div>
    </form>
</div>
</body>
</html>