<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use \Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('signup', [
		 'as' => 'signup', 
	     'uses' => 'UserController@postSignup'
	     ]);
//this format generally use for   redirect to a named route.'as' portion of the second parameter defines the route's name. The first string parameter defines it's route.
Route::post('signin', [
		 'as' => 'signin',
		 'uses' => 'UserController@postSignin'
		 ]);

Route::get('/dashboard', [
		 'as' => 'dashboard',
		 'uses' => 'PostController@getDashboard',
		 'middleware' => 'auth'
		 ]);
Route::post('/createpost', [
		 'as' => 'createpost',
		 'uses' => 'PostController@postCreate',
		 ]);
Route::get('/deletepost/{post_id}', [
		 'as' => 'post.delete',
		 'uses' => 'PostController@getDeletepost',
		 ]);
Route::get('/logout', [
		 'as' => 'get.logout',
		 'uses' => 'UserController@logout',
		 ]);
Route::get('/account', [
		 'as' => 'account',
		 'uses' => 'UserController@getAccount',
		 ]);
Route::post('/updateaccount', [
		 'as' => 'account.save',
		 'uses' => 'UserController@postSaveaccount',
		 ]);
Route::post('/edit', [
		 'as' => 'edit',
		 'uses' => 'PostController@postedit',
		 ]);
Route::get('/userimage/{filename}', [
		 'as' => 'account.image',
		 'uses' => 'UserController@getuserimage',
		 ]);
Route::post('/like', [
		 'as' => 'like',
		 'uses' => 'PostController@postLikePost',
		 ]);