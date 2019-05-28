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
		Route::get('create/konsumen', 'AdminController@create')->name('admin.create');
		Route::post('store/konsumen', 'AdminController@store')->name('admin.store');
		Route::get('show/{id}', 'AdminController@show')->name('admin.show');
		Route::get('create/vendor/{id}', 'AdminController@createVendor')->name('admin.create.vendor');
		Route::post('store/vendor/{id}', 'AdminController@storeVendor')->name('admin.store.vendor');
	});
});

// Route Finance Manager
Route::group(['prefix' => 'finance', 'middleware' => ['auth','role:finance_manager']], function(){
	Route::namespace('Manager')->group(function () {
		Route::get('/', 'FinanceManagerController@index')->name('finance_manager.index');
		Route::get('create', 'FinanceManagerController@create')->name('finance_manager.create');
		Route::post('store', 'FinanceManagerController@store')->name('finance_manager.store');
		Route::get('accept/{id}', 'FinanceManagerController@accept')->name('finance_manager.accept');
		Route::get('reject/{id}', 'FinanceManagerController@reject')->name('finance_manager.reject');
		Route::get('edit/{id}', 'FinanceManagerController@edit')->name('finance_manager.edit');
		Route::post('update/{id}', 'FinanceManagerController@update')->name('finance_manager.update');

	});
});

// Route Operator Trucking
Route::group(['prefix' => 'operator', 'middleware' => ['auth','role:operator_trucking']], function(){
		Route::get('/', 'TruckingController@index')->name('operator_trucking.index');
		Route::get('create', 'TruckingController@create')->name('operator_trucking.create');
		Route::post('store', 'TruckingController@store')->name('operator_trucking.store');
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