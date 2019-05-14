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
<<<<<<< HEAD
Route::get('/superadmin', 'trackingController@superadmin')->name('superadmin');
Route::get('/superadmin/create', 'trackingController@superadmin_create')->name('superadmin.create');
Route::get('/gm', 'trackingController@gm')->name('gm');
Route::get('/finance', 'trackingController@finance');
Route::resource('tracking','trackingController');
=======
Route::get('/superadmin', 'TrackingController@superadmin')->name('superadmin');
Route::get('/superadmin/create', 'TrackingController@superadmin_create')->name('superadmin.create');
Route::resource('tracking','TrackingController');
Route::get('/admin', 'trackingController@superadmin')->name('superadmin');
Route::get('/admin/create', 'trackingController@superadmin_create')->name('superadmin.create');
>>>>>>> 8aa4d01beadb21ccd5f5821f65042f8bb4e2a393

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

// Route untuk user : finance manager
Route::group(['prefix' => 'fm', 'middleware' => ['auth','role:finance_manager']], function(){
	Route::get('/', 'Manager\FinanceManager@dashboard')->name('finance_manager.dashboard');
});

// Route untuk user : general manager
Route::group(['prefix' => 'gm', 'middleware' => ['auth','role:general_manager']], function(){
	Route::get('/', 'Manager\GeneralManager@dashboard')->name('general_manager.dashboard');
});