<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return 'Admin is here!';
// });

// Route::get('/post', 'PostsController@index');

// Route::get('/post/{id}', 'PostsController@show');

// Route::get('/post/{id}/{name}', function ($id, $name) {
//     // return view('welcome');
//     return 'This is a post number '. $id . " " . $name;
// });


// Route::get('/admin/posts/example',array('as' =>'admin.home' ,function () {
//     $url = route('admin.home');
//     return "this url is ". $url;
// }));

// Route::post('/post/create', array('as' => 'post.create'), 'PostsController@create');

Route::resource('posts', 'PostsController');

Route::get('/contact', 'PostsController@cc');

Route::get('post/{id}/{title}', 'PostsController@showPost');