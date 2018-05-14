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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home','HomeController@index')->name('home');


Route::get('/division/login', 'Auth\DivisionLoginController@showLoginForm')->name('division.login');
Route::post('/division/login', 'Auth\DivisionLoginController@login')->name('division.login.submit');
Route::get('/division/register', 'Auth\DivisionRegisterController@showRegistrationForm')->name('division.register');
Route::post('/division/register', 'Auth\DivisionRegisterController@create')->name('division.register.submit');
Route::get('/division', 'DivisionController@index')->name('division.dashboard');
