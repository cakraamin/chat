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

Route::get('/', 'ChatController@index');
Route::post('/message', 'ChatController@postMessage');
Route::get('/admin/home', 'ChatController@getAdmin');
/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test_channel',
                      'my_event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});

Route::get('/broadcast', function() {
    event(new App\Events\TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});*/