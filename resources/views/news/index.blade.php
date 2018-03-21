<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('js\readmore.js')}}"></script>
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

    </script>
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-3">
                    <h2>News <b>Management</b></h2>
                </div>

                <div class="form-group col-md-3">
                    {{--<label for="category">Category filter:</label>--}}
                    <select size="1" id="category_filter" class="form-control" name="category_id" required>
                        <option value="">Choose news category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-2">
                    <a href="{{action('Admin\NewsController@create')}}" class="btn btn-primary"><i
                                class="material-icons">&#xE147;</i> <span>Add News</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Short name (URI)</th>
                <th>News content</th>
                <th>Short description</th>
                <th>Image path</th>
                <th>Category</th>
                {{--<th>Date Created</th>--}}
                <th>Action</th>
            </tr>
            </thead>
            @foreach($news as $newsy)
                <tbody>
                <tr>
                    <td>{{$newsy['id']}}</td>
                    <td>{{$newsy['title']}}</td>
                    <td>{{$newsy['short_name']}}</td>
                    <td>
                        <section>{{$newsy['content']}}</section>
                    </td>
                    <td>{{$newsy['short_description']}}</td>
                    <td>{{$newsy['img_path']}}</td>
                    <td>{{$newsy['title']}}</td>
                    {{--<td>{{$news['updated_at']}}</td>--}}
                    <td>

                        {{--@can('update',$news)--}}
                        <a href="{{action('Admin\NewsController@edit', $newsy['id'])}}" class="settings"
                           title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        {{--@endcan--}}
                        {{--<a href="{{action('NewsController@destroy', $news['id'])}}" class="delete" title="Delete"
                        data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>--}}
                        <form action="{{action('Admin\NewsController@destroy', $newsy['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            {{--<a href="{{action('Admin\NewsController@destroy', $newsy['id'])}}" class="delete" title=""--}}
                            {{--data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"></i></a>--}}
                            <button type="submit" class="delete" title="Delete" data-toggle="tooltip">
                                <i class="material-icons">&#xE5C9;</i></button>
                        </form>
                    </td>
                </tr>

                </tbody>
            @endforeach
        </table>
        <div class="clearfix">
            {{--<div class="hint-text">Showing <b>X</b> out of <b>XX</b> entries</div>--}}
            <ul class="pagination">
                {{ $news->links() }}
            </ul>
        </div>
    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function () {
        $('section').readmore({
            maxHeight: 70,
            moreLink: '<a href="#">Подробнее</a>',
            lessLink: '<a href="#">Скрыть</a>'
        });

        $('#category_filter').on('change', function () {

            $.ajax({
                url: '/admin/news',
                method: 'GET',
                data: {category_id: this.value},
                success: function (response) {
                    var newTable = $(response).find('.table.table-striped.table-hover').html();
                    console.log(response);
                    $('.table.table-striped.table-hover').html(newTable);

                    $('section').readmore({
                        maxHeight: 70,
                        moreLink: '<a href="#">Подробнее</a>',
                        lessLink: '<a href="#">Скрыть</a>'
                    });

                    $('[data-toggle="tooltip"]').tooltip();
                }
            })

        });


    });

</script>