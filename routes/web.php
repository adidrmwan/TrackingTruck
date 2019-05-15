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

Route::get('/admin', 'TruckingController@superadmin')->name('superadmin');
Route::get('/admin/create', 'TruckingController@superadmin_create')->name('superadmin.create');

// Route untuk user : superadmin
Route::group(['prefix' => 'superadmin', 'middleware' => ['auth','role:superadmin']], function(){
	Route::get('/', 'Admin\SuperadminController@dashboard')->name('superadmin.dashboard');
	Route::get('create', 'Admin\SuperadminController@create')->name('superadmin.create');
});

// Route untuk user : admin
Route::resource('trucking','TruckingController');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function(){
	Route::get('/', function(){
		return redirect()->route('trucking.index');
	})->name('admin.dashboard');
});

// Route untuk user : finance manager
Route::group(['prefix' => 'fm', 'middleware' => ['auth','role:finance_manager']], function(){
	Route::get('/', 'Manager\FinanceManager@dashboard')->name('finance_manager.dashboard');
});

// Route untuk user : general manager
Route::group(['prefix' => 'gm', 'middleware' => ['auth','role:general_manager']], function(){
	Route::get('/', 'Manager\GeneralManager@dashboard')->name('general_manager.dashboard');
});
