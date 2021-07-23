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
    <form method="POST" action="/posts">
        @csrf

        <div class="mb-4">
            <label class="font-bold text-gray-800" for="title"> Title:</label>
            <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
    text-sm focus:outline-none focus focus:border-gray-400 focus:ring-0" id="title" name="title">
        </div>

        <div class="mb-4">
            <label class="font-bold text-gray-800" for="body"> Content:</label>
            <textarea class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600
    text-sm focus:outline-none focus focus:border-gray-400 focus:ring-0" id="body"
                      name="body"></textarea>
        </div>
        <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">
            Create
        </button>

    </form>
</div>


</body>
</html>
