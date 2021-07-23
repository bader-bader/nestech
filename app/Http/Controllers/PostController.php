<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc('id');
        return view('posts.index', ['posts' => $posts]);
    }

    public function edit(Post $post)
    {

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        //Normal Request Validation
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $post->update([
            'title' => request('title'),
            'body' => request('body')
        ]);
        return redirect('posts');
    }

    public function create()
    {
        return view('posts.create');
    }

    //Validation Using Form Request
    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::id();
        $post->save();

        return redirect('posts');
    }

    public function showMyPosts()
    {
        $posts = Post::getPostsByUserId(Auth::id());
        return view('posts.index', ['posts' => $posts]);
    }

    public function viewPost(Post $post)
    {
        return view('posts.view', ['post' => $post]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts');
    }
}
