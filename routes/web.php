<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');

    Route::get('/admin/vehicles', 'App\Http\Controllers\admin\VehicleController@index')->name('admin-vehicles');
    Route::post('/admin/vehicle-response', 'App\Http\Controllers\admin\VehicleController@reply')->name('admin-respond-vehicles');

    Route::get('/admin/licenses', 'App\Http\Controllers\admin\LicenseController@index')->name('admin-licenses');
    Route::post('/admin/add-license', 'App\Http\Controllers\admin\LicenseController@add')->name('admin-add-license');

    Route::get('/admin/payments', 'App\Http\Controllers\admin\PaymentController@index')->name('admin-payments');

});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/home', 'App\Http\Controllers\user\HomeController@index')->name('home');
    Route::post('/apply', 'App\Http\Controllers\user\HomeController@apply')->name('apply');

    Route::get('/user/licenses', 'App\Http\Controllers\user\LicenseController@index')->name('user-licences');
    Route::get('/user/request/{license_id}', 'App\Http\Controllers\user\LicenseController@request')->name('user-licence-request');
    Route::get('/user/collections', 'App\Http\Controllers\user\LicenseController@collection')->name('user-collections');

    Route::get('/user/vehicles', 'App\Http\Controllers\user\VehicleController@index')->name('user-vehicles');
    Route::get('/download/plate/{vehicle_id}', 'App\Http\Controllers\user\VehicleController@download')->name('user-download-plate');
});

require __DIR__.'/auth.php';
