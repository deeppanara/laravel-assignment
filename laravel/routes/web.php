<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\ScreeningController;

Route::get('/screenings', [ScreeningController::class, 'index'])->name('screening.index');
Route::get('/screening/form', [ScreeningController::class, 'showForm'])->name('screening.form');
Route::post('/screening/process', [ScreeningController::class, 'processForm'])->name('screening.process');
