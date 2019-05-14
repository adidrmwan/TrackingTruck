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
	if (Auth::check()) {
		return redirect()->route('home');
	}

    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tracking','trackingController');

// Route untuk user : superadmin
Route::group(['prefix' => 'superadmin', 'middleware' => ['auth','role:superadmin']], function(){
	Route::get('/', function(){
		return redirect()->route('tracking.index');
	})->name('superadmin.dashboard');
});

// Route untuk user : admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function(){
	Route::get('/', function(){
		return redirect()->route('tracking.index');
	})->name('admin.dashboard');
});

