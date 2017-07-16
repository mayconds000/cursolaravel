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

use App\Staff;
use App\Photo;
use App\Product;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function() {
  $staff = Staff::find(1);

  $staff->photos()->create(['path'=>'example.jpg']);
});


Route::get('/read', function() {
  
  $staff = Staff::find(1);

  foreach($staff->photos as $photo) {
    return $photo->path;
  }

});


Route::get('/update', function() {
  
  $staff = Staff::find(1);

  $photo = $staff->photos()->whereId(2)->first();

  $photo->path = 'Update example.jpg';

  $photo->save();

});



Route::get('/delete', function() {
  
  $staff = Staff::findOrFail(1);

  $staff->photos()->whereId(2)->delete();

});


Route::get('/assign', function() {

  $staff = Staff::findOrFail(1);

  $photo = Photo::findOrFail(4);

  $staff->photos()->save($photo);

});


Route::get('/unassign', function() {
  
  $staff = Staff::findOrFail(1);

  $staff->photos()->whereId(4)->update(['imageable_id'=>'', 'imageable_type'=>'']);


});

