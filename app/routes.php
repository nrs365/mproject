<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// default laravel new project home page i keep it for testing views
Route::get('/', function()
{
	return View::make('hello');
});

// MProject specific
Route::get('/', 'HomeController@showHome');
Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@logout');
Route::get('registration', 'HomeController@showRegistration');
Route::post('registration', 'HomeController@doRegistration');
Route::get('thankyou', 'HomeController@showThankYou');

Route::resource('users', 'UsersController');
Route::resource('clients', 'ClientsController');
