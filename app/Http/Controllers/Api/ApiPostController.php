<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class ApiPostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc('id');
        return response()->json([
            'posts' => $posts
        ]);
    }

    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        $post->user_id = Auth::id();
        $post->save();
        return response()->json([
            'post' => $post
        ]);
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::getPostById($id);
        $user = Auth::user();
        if ($user->can('update', $post)) {
            $post->title = $request['title'];
            $post->body = $request['body'];
            $post->save();
            return response()->json([
                'post' => $post
            ]);
        }

        return response()->json([
            'result' => 'You can not update this post'
        ]);
    }

    public function destroy($id)
    {
        $post = Post::getPostById($id);
        $user = Auth::user();
        if ($user->can('delete', $post)) {
            $post->delete();
            return response()->json([
                'delete' => 'successfully deleted'

            ]);
        }
        return response()->json([
            'delete' => 'You can not delete this post'
        ]);
    }

    public function showMyPosts()
    {
        $myPosts = Post::getPostsByUserId(Auth::id());
        return response()->json([
            'posts' => $myPosts
        ]);
    }

}
