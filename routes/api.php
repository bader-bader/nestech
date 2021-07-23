<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', 'Api\UserApiAuthController@login');
Route::post('/register', 'Api\UserApiAuthController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/logout', 'Api\UserApiAuthController@logout');

    Route::get('allPosts/', 'Api\ApiPostController@index');
    Route::post('createPost/', 'Api\ApiPostController@store');
    Route::post('updatePost/{id}', 'Api\ApiPostController@update');
    Route::delete('deletePost/{id}', 'Api\ApiPostController@destroy');
    Route::get('showMyPosts/', 'Api\ApiPostController@showMyPosts');

    Route::post('createComment/{post_id}', 'Api\ApiCommentController@store');
    Route::post('updateComment/{comment_id}', 'Api\ApiCommentController@update');
    Route::delete('deleteComment/{comment_id}', 'Api\ApiCommentController@destroy');
});
