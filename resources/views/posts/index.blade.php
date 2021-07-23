<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
@include('layouts.app')

<div class="container">
    <a class="btn btn-danger" href="{{route('create_post')}}">+ Create A Post</a>
</div>

<div class="container max-w-full mx-auto pt-4" style="width: 900px;">
    @if(empty($posts))
        <div class="card text-center mt-4">
            <div class="card-header"><h2> No Posts published Yet</h2></div>
        </div>
    @endif
    @foreach($posts as $post)
        <div class="card text-center mt-4">
            <div class="card-header"><b>{{$post->title}}</b></div>
            <div class="card-body">
                <p class="card-text">{{$post->body}}</p>
                @can('update',$post)
                    <a href="{{route('edit_post',$post->id)}}" class="btn btn-danger text-white">Edit</a>
                @endcan
                <a href="{{route('view_post',$post->id)}}" class="btn btn-primary">View Post</a>
            </div>
            <div class="card-footer text-muted">
                {{\Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans()}}
            </div>
        </div>
    @endforeach
</div>

</body>
</html>
