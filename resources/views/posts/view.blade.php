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

<div class="container max-w-full mx-auto pt-4" style="width: 900px;">
    <div class="card text-center mt-4">
        <div class="card-header"><b>{{$post->title}}</b></div>
        <div class="card-body">
            <p class="card-text">{{$post->body}}</p>
            @can('delete',$post)
                <a class="btn btn-danger">sss</a>
            @endcan

        </div>
        <div class="card-footer text-muted">
            {{\Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans()}}
        </div>
    </div>
</div>


</body>
</html>
