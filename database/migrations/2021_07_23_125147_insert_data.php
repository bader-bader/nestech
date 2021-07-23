<?php

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class InsertData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new User();
        $user->name = 'bader';
        $user->email = 'bader@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'youssef';
        $user->email = 'youssef@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $u_id = 1;
        for ($i = 0; $i < 10; $i++) {

            $post = new Post();
            $post->user_id = $u_id;
            $post->title = Str::random(25);
            $post->body = Str::random(250);
            $post->save();

            if ($i == 4)
                $u_id = 2;
        }

        $u_id = 1;
        for ($i = 0; $i < 100; $i++) {

            $comment = new Comment();
            $comment->user_id = $u_id;
            $comment->post_id = rand(1, 10);
            $comment->body = Str::random(25);
            $comment->save();

            if ($i % 2 == 0)
                $u_id = 2;
            else {
                $u_id = 1;
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
