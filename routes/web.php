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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/superadmin', 'trackingController@superadmin')->name('superadmin');
Route::get('/superadmin/create', 'trackingController@superadmin_create')->name('superadmin.create');
Route::get('/admin', 'trackingController@superadmin')->name('superadmin');
Route::get('/admin/create', 'trackingController@superadmin_create')->name('superadmin.create');
Route::resource('tracking','trackingController');
