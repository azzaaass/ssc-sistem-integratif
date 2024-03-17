<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratController;
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


Route::get('/', [DashboardController::class, 'index'])->middleware('auth:user');
Route::get('/ruangan', [SuratController::class, 'ruangan'])->middleware('auth:admin', 'role:2');
Route::post('/prosesRuangan', [SuratController::class, 'prosesRuangan']);

// Auth admin
Route::get('/loginAdmin', [AuthController::class, 'loginAdminForm']);
Route::post('/loginAdmin', [AuthController::class, 'loginAdmin'])->name('loginAdmin');

// Auth user
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

