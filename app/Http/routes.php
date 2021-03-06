<?php

use Illuminate\Support\Facades\Redis;

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

Route::resource('articles', 'ArticleController');

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/redis', function () {
    $data = [
        'event' => 'UserJoined',
        'data' => [
            'username' => 'John Doe'
        ]
    ];

    Redis::publish('test-channel', json_encode($data));

    return 'Done';
});