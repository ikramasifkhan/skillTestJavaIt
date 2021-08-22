<?php

use App\Http\Controllers\FeesController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [StudentController::class, 'index'])->name('student.index');

Route::put('/fees/{id}/inactive', [FeesController::class, 'activeInactive'])->name('fees.ActiveInactive');
Route::resource('/fees', FeesController::class);
