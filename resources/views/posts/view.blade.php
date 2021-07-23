<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<body>
@include('layouts.app')
<div class="container max-w-full mx-auto pt-4" style="width: 900px;">
    <div class="card text-center mt-4">
        <div class="card-header"><b>{{$post->title}}</b></div>
        <div class="card-body">
            <p class="card-text">{{$post->body}}</p>
        </div>
        <div class="card-footer text-muted">
            {{\Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans()}}
        </div>
    </div>
    <br>
    <div class="comments">
        @foreach($post->comments as $comment)
            <p style="border: 1px solid #713131;padding: 10px;display: inline-block ">
                <b>{{$comment->body}}</b>
            </p>
            @can('delete',$comment)
                <form style="display: inline-block" method="POST" action="{{route('delete_comment',$comment->id)}}">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger" style="display:inline-block;">Delete</button>
                </form>

            @endcan
            @can('update',$comment)
                <a class="btn btn-primary" href="{{route('edit_comment',$comment->id)}}">Update</a>
            @endcan
            <br>
        @endforeach
    </div>

    <form method="POST" action="{{route('store_comment',$post->id)}}">
        @csrf
        <div class="form-group">
            <label for="body">Write a Comment . . .</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>
    </form>
</div>


</body>
</html>
