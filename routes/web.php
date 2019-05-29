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
Auth::routes();

Route::get('/', function () {
	if (Auth::check()) {
		return redirect()->route('home');
	}
    return view('welcome');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

// Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function(){
	Route::namespace('Admin')->group(function () {
		Route::get('/', 'AdminController@index')->name('admin.index');
		Route::get('/konsumen/status/ditolak', 'AdminController@indexKonsumenDitolak')->name('admin.index.ditolak');
		Route::get('create/konsumen', 'AdminController@create')->name('admin.create');
		Route::post('store/konsumen', 'AdminController@store')->name('admin.store');
		Route::get('show/{id}', 'AdminController@show')->name('admin.show');
		Route::get('create/vendor/{id}', 'AdminController@createVendor')->name('admin.create.vendor');
		Route::post('store/vendor/{id}', 'AdminController@storeVendor')->name('admin.store.vendor');
		Route::get('show/konsumen/{id}', 'AdminController@showKonsumen')->name('admin.show.konsumen');
		Route::get('show/konsumen/ditolak/{id}', 'AdminController@showKonsumenDitolak')->name('admin.show.konsumen.ditolak');
		Route::get('edit/konsumen/{id}', 'AdminController@edit')->name('admin.edit.konsumen');
		Route::post('update/konsumen/{id}', 'AdminController@update')->name('admin.update.konsumen');
	});
});

// Route Finance Manager
Route::group(['prefix' => 'finance', 'middleware' => ['auth','role:finance_manager']], function(){
	Route::namespace('Manager')->group(function () {
		Route::get('/', 'FinanceManagerController@index')->name('finance_manager.index');
		Route::get('create', 'FinanceManagerController@create')->name('finance_manager.create');
		Route::post('store', 'FinanceManagerController@store')->name('finance_manager.store');
		Route::get('show/{id}', 'FinanceManagerController@show')->name('finance_manager.show');
		Route::get('show/konsumen/{id}', 'FinanceManagerController@showKonsumen')->name('finance_manager.show.konsumen');
		Route::get('accept/{id}', 'FinanceManagerController@accept')->name('finance_manager.accept');
		Route::get('decline/{id}', 'FinanceManagerController@decline')->name('finance_manager.decline');
		Route::get('edit/{id}', 'FinanceManagerController@edit')->name('finance_manager.edit');
		Route::post('update/{id}', 'FinanceManagerController@update')->name('finance_manager.update');
		Route::get('create/vendor/{id}', 'FinanceManagerController@createVendor')->name('finance_manager.create.vendor');
		Route::post('store/vendor/{id}', 'FinanceManagerController@storeVendor')->name('finance_manager.store.vendor');

	});
});

// Route Operator Trucking
Route::group(['prefix' => 'operator', 'middleware' => ['auth','role:operator_trucking']], function(){
		Route::get('/', 'TruckingController@index')->name('operator_trucking.index');
		Route::get('create', 'TruckingController@create')->name('operator_trucking.create');
		Route::post('store', 'TruckingController@store')->name('operator_trucking.store');
		Route::get('show/konsumen/{id}', 'TruckingController@showKonsumen')->name('operator_trucking.show.konsumen');
});

// Route General Manager
Route::group(['prefix' => 'gm', 'middleware' => ['auth','role:general_manager']], function(){
	Route::get('/', 'Manager\GeneralManagerController@index')->name('general_manager.index');
});

Route::resource('trucking','TruckingController');
Route::group(['prefix' => 'superadmin', 'middleware' => ['auth','role:superadmin']], function(){
	Route::get('/', 'Admin\SuperadminController@dashboard')->name('superadmin.dashboard');
	Route::get('create', 'Admin\SuperadminController@create')->name('superadmin.create');
});

Route::get('/json-regencies','AlamatController@regencies');
Route::get('/json-districts', 'AlamatController@districts');
Route::get('/json-village', 'AlamatController@villages');