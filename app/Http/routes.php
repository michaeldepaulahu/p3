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

// place holder route to under construction page
Route::get('/', function () {
	return Redirect::to('http://p1.dehashed.com/under_constr.php');
});

// routing to home page 
Route::get('/home', function () {
	return view('home');
});

//show profile
Route::get('/profile', 'ProfileController@showProfile');

// Loading xkcd within Laravel Framework
Route::any('/xkcd', function(){
	$custom = new Xkcd('words');
	$custom->session('nW', 'words'); 
	return View::make('p2', array(
         'status' => $custom->word_status,
         'display' => $custom->display()
    ));	
}); 
