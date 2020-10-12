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

Route::get('/', 'Auth\AdminLoginController@showLoginForm');

Route::group(['prefix' => 'admin', 'middleware' => 'admin:admin', 'as' => 'admin.'], function () {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
});

Route::group(['prefix' => 'customer', 'middleware' => 'customer:customer', 'as' => 'customer.'], function () {
	Route::get('/login', 'Auth\CustomerLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\CustomerLoginController@login')->name('login.submit');
    Route::post('/logout', 'Auth\CustomerLoginController@logout')->name('logout');
    Route::get('/logout', 'Auth\CustomerLoginController@logout')->name('logout');
    Route::get('/dashboard', 'CustomerController@index')->name('dashboard');
});

Route::resource('comments', CommentsController::class);
// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
