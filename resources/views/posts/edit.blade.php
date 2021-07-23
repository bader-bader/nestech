<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>Hello, world!</title>
</head>
<body>
@include('layouts.app')
<div class="container max-w-full mx-auto pt-4" style="width: 900px;">
    <form method="POST" action="{{route('update_post',$post->id)}}">
        @method("PUT")
        @csrf
        <div class="mb-4">
            <label class="font-bold text-gray-800" for="title"> Title:</label>
            <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
    text-sm focus:outline-none focus focus:border-gray-400 focus:ring-0" id="title" name="title"
                   value="{{$post->title}}">
        </div>
        <div class="mb-4">
            <label class="font-bold text-gray-800" for="body"> Content:</label>
            <textarea class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
    text-sm focus:outline-none focus focus:border-gray-400 focus:ring-0" id="body"
                      name="body">{{$post->body}}</textarea>
        </div>
        <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">
            Update
        </button>
        <a href="{{route('posts')}}"
           class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Cancel</a>
        <form method="POST" action="{{route('delete_post',$post->id)}}">
            @method("DELETE")
            @csrf
            <button
                class="bg-red-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">
                Delete
            </button>
        </form>
    </form>
</div>


</body>
</html>
