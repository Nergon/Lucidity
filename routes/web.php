<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\entries\CreationController;
use App\Http\Controllers\entries\EntryController;
use App\Http\Controllers\panel\LabelController;
use App\Http\Controllers\panel\StatsController;

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

/*Route::get('/{any}', function () {
    return view('panel.index');
})->where('any', '.*');*/


// Panel
Route::get('/', [DashboardController::class, 'index'])->name('index')->middleware('auth');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// Registration
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Create Entry
Route::get('/entries/create', [CreationController::class, 'index'])->name('entries/create')->middleware('auth');
Route::post('/entries/create', [CreationController::class, 'create'])->middleware('auth');

// View Entry
Route::get('/entries/{entry}', [EntryController::class, 'show'])->name('entry')->middleware('auth');

// Edit Entry
Route::get('/entries/{entry}/edit', [EntryController::class, 'editIndex'])->name('entries.edit')->middleware('auth');
Route::post('/entries/{entry}/edit', [EntryController::class, 'update'])->middleware('auth');

// Delete Entry
Route::post('/entries/{entry}/delete', [EntryController::class, 'delete'])->name('entries.delete')->middleware('auth');

// View Labels
Route::get('/labels', [LabelController::class, 'index'])->name('labels')->middleware('auth');

// Create Label
Route::post('/labels/create', [LabelController::class, 'create'])->name('labels.create')->middleware('auth');

// Delete Label
Route::get('/labels/{label}/delete', [LabelController::class, 'delete'])->name('labels.delete')->middleware('auth');

// View Statistics
Route::get('/stats', [StatsController::class, 'index'])->name('stats')->middleware('auth');

// Logout
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
