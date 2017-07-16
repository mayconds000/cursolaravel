<?php

use App\Post;
use App\Video;
use App\Tag;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function() {

  $post = Post::create(['name'=>'My first post']);

  $tag1 = Tag::find(1);

  $post->tags()->save($tag1);

  $video = Video::create(['name'=>'video.mov']);

  $tag2 = Tag::find(2);

  $video->tags()->save($tag2);

});


Route::get('/read', function() {

  $post = Post::findOrFail(2);

  foreach($post->tags as $tag) {
    echo $tag;
  }
  
});



Route::get('/update', function() {

  // $post = Post::findOrFail(2);

  // foreach($post->tags as $tag) {
  //   $tag->whereName('PHP')->update(['name'=>'PHP update']);
  // }

  $post = Post::findOrFail(2);

  $tag = Tag::find(2);

  // $post->tags()->save($tag);

  // $post->tags()->attach($tag);

  $post->tags()->sync([1,2,3]);

});


Route::get('/delete', function() {

  $post = Post::find(2);

  foreach($post->tags as $tag) {
    $tag->whereId(2)->delete();
  }

});