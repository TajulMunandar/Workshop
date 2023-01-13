<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardProdiController;
use App\Http\Controllers\DashboardMateriController;
use App\Http\Controllers\DashboardMatakuliahController;
use App\Http\Controllers\MateriController;

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

Route::get('/beranda', [BerandaController::class, 'index']);
Route::get('/materi/{id}', [MateriController::class, 'materi']);


Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware('dashboard');
    Route::resource('/user',DashboardUserController::class)->middleware('dashboard');
    Route::post('/user/reset-password', [DashboardUserController::class, 'resetPasswordAdmin'])->middleware('dashboard');
    Route::resource('/prodi', DashboardProdiController::class)->middleware('dashboard');
    Route::resource('/materi', DashboardMateriController::class)->middleware('dashboard');
    Route::resource('/matakuliah', DashboardMatakuliahController::class)->middleware('dashboard');
})->middleware('dashboard');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});
