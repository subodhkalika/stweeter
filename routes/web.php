<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
* Show Tweets Dashboard
*/
Route::get('/', function () {
	return view('landing');
});

Route::get('/tweets', 'TweetController@index');
Route::post('/tweet', 'TweetController@store');
Route::delete('/tweet/{tweet}', 'TweetController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
