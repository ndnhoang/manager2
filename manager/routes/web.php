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
})->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::match(['get', 'post'],'/admin/login', 'AdminController@login')->name('admin.login');

Route::middleware(['auth'])->group(function() {
	// Admin
	Route::get('/admin', 'AdminController@index');

	Route::get('/admin/logout', 'AdminController@logout');

	Route::get('/admin/profile', 'AdminController@showProfile');
	
});



