<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;

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


Route::group(['middleware' => ['auth:user']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/ruangan', [SuratController::class, 'ruangan']);
    Route::post('/createSurat', [SuratController::class, 'createSurat']);

    Route::get('/history', [SuratController::class, 'history'])->name('history');
    Route::get('/detailSurat/{surat:id}', [SuratController::class, 'detailSurat']);
    Route::post('/requestUpdateSurat', [SuratController::class, 'requestUpdateSurat']);
    Route::get('/deleteSurat/{surat:id}', [SuratController::class, 'deleteSurat']);
});

Route::group(['middleware' => ['auth:admin']], function () {
});

Route::group(['middleware' => ['auth:admin', 'role:1']], function () {
    // Route::get('/', [DashboardController::class, 'index']);
    Route::get('/suratAdmin', [SuratController::class, 'suratAdmin']);
    Route::get('/detailSuratAdmin/{surat:id}', [SuratController::class, 'detailSuratAdmin']);
    Route::post('/updateSuratRequest', [SuratController::class, 'updateSuratRequest']);
});

Route::group(['middleware' => ['auth:admin', 'role:2']], function () {
    // Route::get('/', [DashboardController::class, 'index']);
    Route::get('/suratPic', [SuratController::class, 'suratPic']);
    Route::get('/detailSuratPic/{surat:id}', [SuratController::class, 'detailSuratPic']);
    Route::post('/updateSuratPic', [SuratController::class, 'updateSuratPic']);
    
    // Route::get('/detailSuratAdmin/{surat:id}', [SuratController::class, 'detailSuratAdmin']);
    // Route::post('/updateSuratRequest', [SuratController::class, 'updateSuratRequest']);
});


// Auth admin
Route::get('/loginAdmin', [AuthController::class, 'loginAdminForm']);
Route::post('/loginAdmin', [AuthController::class, 'loginAdmin'])->name('loginAdmin');

// Auth user
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);


