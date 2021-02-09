<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficersController;
use ConsoleTVs\Charts\ChartsController ;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		//Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		//Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		//Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		//Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		//Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		//Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
Route::get('/tables', [App\Http\Controllers\PageController::class, 'tables'])->name('tables');
Route::get('/registerOfficer',[OfficersController::class, 'index'] )->name('registerOfficer');
Route::get('/registerDonation',[App\Http\Controllers\DonationsController::class, 'index'] )->name('registerDonation');
Route::get('/registerHospital',[App\Http\Controllers\HospitalsController::class,'index'])->name('registerHospital');
Route::get('/charts', [App\Http\Controllers\DonationsController::class,'chart'])->name('charts');
Route::get('/charts_months',[App\Http\Controllers\DonationsController::class,'charts_months'])->name('charts_months');
Route::get('/hierarchy',[App\Http\Controllers\HospitalsController::class,'show_hierarchy'])->name('hierarchy');
Route::get('/hospitals',[App\Http\Controllers\HospitalsController::class,'show'])->name('hospitals');
Route::get('/officers',[OfficersController::class, 'show'] )->name('officers');
Route::get('/payments',[App\Http\Controllers\PaymentsController::class,'show'])->name('payments');
Route::get('/enrollment',[App\Http\Controllers\PatientsController::class,'variation'])->name('enrollment');

Route::post('/registerOfficer',[OfficersController::class, 'store'] );
Route::post('/registerDonation',[App\Http\Controllers\DonationsController::class, 'store']);
Route::post('/registerHospital',[App\Http\Controllers\HospitalsController::class,'store']);



