@extends('layouts.app')
@section('content')
    <h2><p>Add new image to inappropriate content:</p></h2>
    <form action="{{route('addImg2Ban', [])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="filefield">
        <input type="submit">
    </form>

    {{--errors_check--}}
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

    <h3>All acceptable uploaded images list:</h3>
    <div class="row">
        <ul class="thumbnails">
            @foreach($entries as $entry)
                <div class="col-md-2">
                    <div class="thumbnail">
                        {{--{{ dd($entry) }}--}}
                        <img src="{{$entry['storage_path']}}" alt="{{$entry['original_filename']}}"
                             class="img-responsive"/>
                        <div class="caption">
                        </div>
                    </div>
                </div>
            @endforeach
            <ul class="pagination">
                {{ $entries->links() }}
            </ul>
        </ul>
    </div>

@endsection
{{--@show--}}
 