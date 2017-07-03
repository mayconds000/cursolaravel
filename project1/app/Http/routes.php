<?php
use App\Post;

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

// Route::resource('posts', 'PostsController');

// Route::get('/contact', 'PostsController@cc');

// Route::get('post/{id}/{title}', 'PostsController@showPost');

/*
|Application Routes
*/

Route::get('/insert', function() {
  
  DB::insert('insert into posts(title, content) values(?,?)',
  ['PHP Super cool', 'Its nice']);

});

// function displayTitle($elm) {
//   echo $elm->title;
// }

// Route::get('/read', function() {
//   $results = DB::select('select * from posts where id = ?', [1]);
//   //Return a array

//   array_map("displayTitle", $results);
  
// });

// Route::get('/update', function() {
//   $updated = DB::update('update posts set title=? where id=?',['Updated title', 1]);

//   return $updated;
// });

// Route::get('/delete', function() {
//   $deleted = DB::delete('delete from posts where id=?',[1]);
//   return $deleted;
// });





/*
|-------------------------------------
| ELOQUENT | ORM
|-------------------------------------
*/

// Route::get('/read', function() {

//   $posts = Post::all();
//   //return Array

//   foreach($posts as $post) {
//     return $post->title;
//   }

// });

// Route::get('/find', function() {
//   $post = Post::find(2);
//   //return Object
//   return $post->title;
// });


// Route::get('/findwhere', function() {
//   $post = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();
//   return $post;
// });

// Route::get('/findmore', function() {
//   // $posts = Post::findOrFail(1);

//   // return $posts;

//   $posts = Post::where('id', '<', 50)->firstOrFail();
//   return $posts;
// });

Route::get('/basicinsert', function() {

  $post = Post::find(4);
  $post->title = 'Changed the title';
  $post->content = 'Wow eleoquent is really cool, look at this content';

  $post->save();

});

Route::get('/create', function() {
  Post::create(['title'=>'the create mehotd', 'content'=>'WOW I\'m learnig a lot with Edwin Diaz']);
});
