<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index')->name('posts');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/posts', 'PostController@store')->name('posts');
    Route::get('/posts/create', 'PostController@create')->name('create_post');
    Route::put('/posts/{post}', 'PostController@update')->name('update_post');
    Route::delete('/posts/{post}/delete', 'PostController@destroy')->name('delete_post');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit_post');
    Route::get('/MyPosts', 'PostController@showMyPosts')->name('my_posts');
    Route::get('/posts/{post}/view', 'PostController@viewPost')->name('view_post');

});

/* Test */
Route::get('/sss', function () {
    return view('posts.index');
});
