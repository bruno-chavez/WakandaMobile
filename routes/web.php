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

// Ruta de Landing Page.
Route::get('/', function () {
    return view('welcome');
});

// Rutas de Login de usuario.
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Rutas de registro de usuario, bloqueadas por el guard de division.
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@create'
]);

Route::get('/user','UserController@index')->name('user.dashboard');

// Rutas de division.
Route::get('/division/login', 'Auth\DivisionLoginController@showLoginForm')->name('division.login');
Route::post('/division/login', 'Auth\DivisionLoginController@login')->name('division.login.submit');
Route::get('/division/register', 'Auth\DivisionRegisterController@showRegistrationForm')->name('division.register');
Route::post('/division/register', 'Auth\DivisionRegisterController@create')->name('division.register.submit');
Route::get('/division', 'DivisionController@index')->name('division.dashboard');
