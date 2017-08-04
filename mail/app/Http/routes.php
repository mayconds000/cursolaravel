<?php

use Illuminate\Support\Facades\Mail;
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
    // return view('welcome');

    $data = [
      'title' => 'Hi people. I really like this course',
      'content' => 'This laravel course was created with a lot of love and dedication for you'
    ];

    Mail::send('mail.test', $data, function($message) {

        $message->to('mayconds000@gmail.com', 'Maycon')
                ->subject('Hello my dear');

    });


});
