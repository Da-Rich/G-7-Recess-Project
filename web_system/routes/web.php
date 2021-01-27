<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterHealthOfficer;
use App\Http\Controllers\Auth\RegisterDonorMoneyController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\MoneyDistributedController;
use App\Http\Controllers\GraphsController;
use App\Http\Controllers\GraphicalController;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/registerofficer', [RegisterHealthOfficer::class,'index'])->name('registerofficer');
Route::post('/registerofficer', [RegisterHealthOfficer::class,'store']);
Route::get('/registerdonormoney', [RegisterDonorMoneyController::class, 'index'])->name('registerdonormoney');
Route::post('/registerdonormoney', [RegisterDonorMoneyController::class, 'store']);
Route::get('/patientlist', [PatientsController::class ,'index'])->name('patientlist');
Route::get('/money', [MoneyDistributedController::class, 'index'])->name('money');
Route::post('/money', [MoneyDistributedController::class, 'store']);
Route::get('/graphs', [GraphsController::class, 'index'])->name('graphs');
Route::get('/graphical',[GraphicalController::class, 'index'])->name('graphical');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

