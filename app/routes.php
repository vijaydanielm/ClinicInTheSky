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

Route::get('/', function()
{
	return View::make('hello');
});
//

// Confide routes
Route::get('users/create', 'UserController@create');
Route::post('users', 'UserController@store');
Route::get('users/login', 'UserController@login');
Route::post('users/login', 'UserController@doLogin');
Route::get('users/confirm/{code}', 'UserController@confirm');
Route::get('users/forgot_password', 'UserController@forgotPassword');
Route::post('users/forgot_password', 'UserController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UserController@resetPassword');
Route::post('users/reset_password', 'UserController@doResetPassword');
Route::get('users/logout', 'UserController@logout');
