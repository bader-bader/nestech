<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post)
    {

        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id,
            'user_id' => Auth::id()
        ]);
        return back();
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Comment $comment)
    {
        //Normal Request Validation
        request()->validate([
            'body' => 'required'
        ]);
        $comment->update([
            'body' => request('body')
        ]);
        return redirect()->route('view_post', $comment->post_id);
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
