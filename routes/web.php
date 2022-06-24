<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

// Route::view('/', 'welcome');
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group([
    'middleware' => ['auth', 'verified']
], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('clients', ClientController::class)->except(['show']);
    Route::post('clients/{id}/restore', [ClientController::class, 'restore'])->name('clients.restore');
    Route::delete('clients/{id}/force-delete', [ClientController::class, 'forceDelete'])->name('clients.forceDelete');
    Route::resource('clients.projects', ProjectController::class)->except(['show']);
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
