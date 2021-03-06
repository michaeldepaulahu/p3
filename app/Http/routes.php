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

// routing to home page 
Route::get('/', function () {
	return view('home');
});

// Route for Ipsum Text Generator
Route::any('/loremipsum', 'GeneratorController@showGenerator');

// Routes for Profile Generator
Route::get('/profile', 'ProfileController@showProfile');
Route::post('/profile', 'ProfileController@postProfile');

// Routes for CHMOD
Route::get('/chmod', 'ChmodController@showChmod');
Route::post('/chmod', 'ChmodController@postChmod');

// Route for Loading XKCD integrated
Route::any('/xkcd', 'XkcdApiController@showXkcd');

Route::get('/{start?}/{end?}', function () {
	return view('home');
});