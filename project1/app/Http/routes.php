<?php
use App\Post;
use App\User;
use App\Country;
use App\Photo;

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

// Route::get('/insert', function() {
  
//   DB::insert('insert into posts(title, content) values(?,?)',
//   ['PHP Super cool', 'Its nice']);

// });

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
|---------------------------------------------------------------
| ELOQUENT | ORM
|---------------------------------------------------------------
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

// Route::get('/basicinsert', function() {

//   $post = new Post;
//   $post->title = 'Changed the title';
//   $post->content = 'Wow eleoquent is really cool, look at this content';

//   $post->save();

// });

// Route::get('/create', function() {
//   Post::create(['title'=>'the create mehotd', 'content'=>'WOW I\'m learnig a lot with Edwin Diaz']);
// });


// Route::get('/update', function() {
//   Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'New PHP title', 'content'=>'I love web development']);
// });


// Route::get('/delete', function() {
//   $post = Post::find(2);
//   $post->delete();
// });

// Route::get('/delete', function() {
//   Post::destroy([4,5]);
// });

// Route::get('/softdelete', function() {
//   Post::find(1)->delete();
// });

// Route::get('/readsoftdelete', function() {
//   // $post = Post::find(1);
//   // return $post;

//   // $post = Post::withTrashed()->where('id', 1)->get();

//   // return $post;
//   $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//   return $post;

// });

// Route::get('/restore', function() {
//   Post::withTrashed()->where('is_admin', 0)->restore();
// });

// Route::get('/forcedelete', function() {

//   Post::onlyTrashed()->where('is_admin', '0')->forceDelete();
// });

/*
|---------------------------------------------------------------
| ELOQUENT | Relationship
|---------------------------------------------------------------
*/
//One to One relationship
// Route::get('/user/{id}/post', function($id) {
//   return User::find($id)->post->content;
// });

// Route::get('/post/{id}/user', function($id) {
//   return Post::find($id)->user->name;
// });

// One to Many
// Route::get('/posts', function() {
//   $user = User::find(1);

//   foreach($user->posts as $post) {
//     echo $post->title . '<br>';
//   }

// });

//Many to Many
// Route::get('/user/{id}/role', function($id) {
//   $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

//   return $user;

//   // foreach($user->roles as $role) {
//   //   echo $role->name;
//   // }
// });

// Accessing the intermediate table / pivot
// Route::get('/user/pivot', function() {
//   $user = User::find(1);
  
//   foreach($user->roles as $role) {
//     echo $role->pivot->created_at;
//   }

// });

// Route::get('/user/country', function() {

//   $country = Country::find(4);

//   foreach($country->posts as $post) {
//     return $post->title;
//   }

// });

// Polymorphic Relations
// Route::get('post/photo', function() {

//   $posts = Post::find(1);

//   foreach($posts->photos as $photo) {
//     return $photo->path;
//   }

// });

// Polymorphic Relations inverse
// Route::get('photo/{id}/post', function($id) {

//   $photo = Photo::findOrFail($id);

//   return $photo->imageable;


// });

// Many to Many Polymorphic
// Route::get('photo/{id}/post', function($id) {
  
// });

/*
|---------------------------------------------------------------
| Crud Application
|---------------------------------------------------------------
*/

Route::resource('/posts', 'PostsController');