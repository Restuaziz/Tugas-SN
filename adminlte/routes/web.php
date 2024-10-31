<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JoinController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('siswa/', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswas');
Route::get('kelas/', [KelasController::class, 'index'])->name('kelases');
Route::resource('users',\App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('users', UserController::class);
Route::resource('siswas', SiswaController::class);
Route::resource('kelases', KelasController::class);
Route::get('/join/innerjoin', [JoinController::class, 'innerJoin'])->name('join.innerjoin');
Route::get('/join/leftjoin', [JoinController::class, 'leftJoin'])->name('join.leftjoin');
