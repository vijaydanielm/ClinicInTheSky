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
Route::get('users/create', 'UserAccountController@create');
Route::post('users', 'UserAccountController@store');
Route::get('users/login', 'UserAccountController@login');
Route::post('users/login', 'UserAccountController@doLogin');
Route::get('users/confirm/{code}', 'UserAccountController@confirm');
Route::get('users/forgot_password', 'UserAccountController@forgotPassword');
Route::post('users/forgot_password', 'UserAccountController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UserAccountController@resetPassword');
Route::post('users/reset_password', 'UserAccountController@doResetPassword');
Route::get('users/logout', 'UserAccountController@logout');
