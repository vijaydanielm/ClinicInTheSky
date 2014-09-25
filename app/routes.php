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

    if(is_null(Confide::user())) {

        return View::make('defaulthome');
    }

    return View::make('userhome');
});
//

// Confide routes
Route::get('signup', 'ClinicInTheSky\UserAccountController@create');
Route::post('signup', 'ClinicInTheSky\UserAccountController@store');
Route::get('login', 'ClinicInTheSky\UserAccountController@login');
Route::post('login', 'ClinicInTheSky\UserAccountController@doLogin');
Route::get('users/confirm/{code}', 'ClinicInTheSky\UserAccountController@confirm');
Route::get('users/forgot_password', 'ClinicInTheSky\UserAccountController@forgotPassword');
Route::post('users/forgot_password', 'ClinicInTheSky\UserAccountController@doForgotPassword');
Route::get('users/reset_password/{token}', 'ClinicInTheSky\UserAccountController@resetPassword');
Route::post('users/reset_password', 'ClinicInTheSky\UserAccountController@doResetPassword');
Route::get('logout', 'ClinicInTheSky\UserAccountController@logout');

//Settings
Route::get('settings', 'ClinicInTheSky\SettingsController@display');
Route::post('settings/doctor/person', 'ClinicInTheSky\SettingsController@saveDoctorPersonDetails');

//CSRF protection
Route::post('*', ['before' => 'csrf', function () {
    
}]);
