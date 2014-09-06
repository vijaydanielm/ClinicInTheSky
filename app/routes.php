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

Route::get('/', function () {
    return View::make('hello');
});
//

// Confide routes
Route::get('users/create', 'ClinicInTheSky\UserAccountController@create');
Route::post('users', 'ClinicInTheSky\UserAccountController@store');
Route::get('users/login', 'ClinicInTheSky\UserAccountController@login');
Route::post('users/login', 'ClinicInTheSky\UserAccountController@doLogin');
Route::get('users/confirm/{code}', 'ClinicInTheSky\UserAccountController@confirm');
Route::get('users/forgot_password', 'ClinicInTheSky\UserAccountController@forgotPassword');
Route::post('users/forgot_password', 'ClinicInTheSky\UserAccountController@doForgotPassword');
Route::get('users/reset_password/{token}', 'ClinicInTheSky\UserAccountController@resetPassword');
Route::post('users/reset_password', 'ClinicInTheSky\UserAccountController@doResetPassword');
Route::get('users/logout', 'ClinicInTheSky\UserAccountController@logout');
