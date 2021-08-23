<?php

use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\KlassController;
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

Route::put('/class/{id}/status-change', [KlassController::class, 'activeInactive'])->name('class.ActiveInactive');
Route::resource('/class', KlassController::class);

Route::put('/group/{id}/status-change', [GroupController::class, 'activeInactive'])->name('group.ActiveInactive');
Route::resource('/group', GroupController::class);

Route::put('/section/{id}/status-change', [ClassSectionController::class, 'activeInactive'])->name('section.ActiveInactive');
Route::resource('/section', ClassSectionController::class);

Route::put('/fees/{id}/status-change', [FeesController::class, 'activeInactive'])->name('fees.ActiveInactive');
Route::resource('/fees', FeesController::class);
