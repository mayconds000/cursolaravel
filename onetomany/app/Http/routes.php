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
use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {

  $user = User::findOrFail(1);

  $post = new Post(['title'=>'title of first post with Edwin Diaz', 'body'=>'Body of post first post']);

  $user->posts()->save($post);

  // $post->title = 'title of my first post with edwin diaz';
  // $post->body = 'body of my first post with edwin diaz';

});


Route::get('/read', function() {
  
  $user = User::findOrFail(1);

  // dd($user->posts);

  foreach($user->posts as $post) {

    echo "$post->title \n";

  }
  
});


Route::get('/update', function() {
  $user = User::find(1);
  $user->posts()->whereId(1)->update(['title'=>'this is awesome', 'body'=>'Yeah that is it']);
  //$user->posts()->save();
});


Route::get('/delete', function() {
  
  $user = User::find(1);

  $user->posts()->whereId(1)->delete();

});
