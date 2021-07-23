<?php

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
