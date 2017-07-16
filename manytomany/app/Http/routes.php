<?php
use App\User;
use App\Role;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function() {
  $user = User::find(1);

  $role = new Role(['name'=>'subscriber']);

  $user->roles()->save($role);
});


Route::get('/read', function() {
  $user = User::findOrFail(1);

  foreach ($user->roles as $role) {
    echo $role;
  }
    
});

Route::get('/update', function() {
  $user = User::findOrFail(1);

  if($user->has('roles')) {
    foreach($user->roles as $role)
    if($role->name == 'Administrator') {
      $role->name = "administrator";
      $role->save();
    }
  }
});

Route::get('/delete', function() {
  $user = User::findOrFail(1);

  foreach($user->roles as $role) {
    $role->whereId(1)->delete();
  }
});


Route::get('/attach', function() {
  $user = User::findOrFail(1);
  
  //Adiciona na tabela role_users um novo relacionamento
  $user->roles()->attach(3);
});


Route::get('/detach', function() {
  $user = User::findOrFail(1);
  
  //Remove da tabela role_users o relacionamento se nao passar valor nenhum então remove todos os relacionamentos para este usuario
  $user->roles()->detach(3);
});


Route::get('/sync', function() {
  $user = User::findOrFail(1);
  // So vai manter as relacionamentos que tiver os role_id 1 e 2 os outros vão ser deletados da table role_user
  $user->roles()->sync([1,2]);
});