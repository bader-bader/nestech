<?php


namespace App\Http\Controllers\Api;


use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;


class ApiCommentController extends Controller
{
    public function store(CommentRequest $request, $post_id)
    {
        $post = Post::getPostById($post_id);
        $comment = Comment::create([
            'body' => request('body'),
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);
        return response()->json([
            'comment' => $comment,
            'post' => $post
        ], '200');
    }

    public function update(CommentRequest $request, $comment_id)
    {
        $comment = Comment::find($comment_id);
        $user = Auth::user();
        if ($user->can('update', $comment)) {
            $comment->body = $request['body'];
            $comment->save();
            return response()->json([
                'comment' => $comment
            ]);
        }
        return response()->json([
            'comment' => 'user can not make update on this comment'
        ]);
    }

    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
        $user = Auth::user();
        if ($user->can('delete', $comment)) {
            $comment->delete();
            return response()->json([
                'comment' => 'comment deleted'
            ]);
        }
        return response()->json([
            'comment' => 'user can not delete this comment'
        ]);
    }
}
