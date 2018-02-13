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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/webhook', function (Request $request) {
//     logger("message request : ", $request->all());
// });

// Route::get('/webhook', ['as' => 'line.bot.message', 'uses' => 'ApiController@getMessage']);
Route::post('/webhook', ['as' => 'line.bot.message', 'uses' => 'ApiController@getMessage']);
// Route::get('/webhook', ['as' => 'line.bot.message', 'uses' => 'ApiController@getMessage']);
