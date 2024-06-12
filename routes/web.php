<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailKontakController;
use App\Http\Controllers\KontakController;

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

    // all surats
    Route::get('/surats', [SuratController::class, 'history']);
    Route::post('/surats', [SuratController::class, 'create_surat']);
    Route::get('/surats/{surat:id}', [SuratController::class, 'detail_surat']);
    Route::put('/surats', [SuratController::class, 'request_update_surat']);
    Route::delete('/surats/{surat:id}', [SuratController::class, 'delete_surat']);
    
    // create surat
    Route::get('/surats/create/ruangan', [SuratController::class, 'ruangan_index']);
    Route::get('/surats/create/alat', [SuratController::class, 'alat_index']);

    // news
    Route::get('/berita', [BeritaController::class, 'index']);

    // kontak admin
    Route::get('/kontak', [KontakController::class, 'index']);
    Route::post('/kontak', [KontakController::class, 'store']);
    
    // detail kontak admin
    Route::get('/detailKontak/{id}', [DetailKontakController::class, 'index']);
    Route::post('/detailKontak', [DetailKontakController::class, 'store']);

});

Route::group(['middleware' => ['auth:admin', 'role:1']], function () {
    Route::get('/admin/surats', [SuratController::class, 'admin_surat']);
    Route::get('/admin/surats/{surat:id}', [SuratController::class, 'admin_detail_surat']);
    Route::put('/admin/surats', [SuratController::class, 'update_surat_request']);
    Route::delete('/admin/surats/{surat:id}', [SuratController::class, 'admin_delete_surat']);
});

Route::group(['middleware' => ['auth:admin', 'role:2']], function () {
    Route::get('/pic/surats', [SuratController::class, 'pic_surat']);
    Route::get('/pic/surats/{surat:id}', [SuratController::class, 'pic_detail_surat']);
    Route::put('/pic/surats', [SuratController::class, 'update_surat_final']);
});

// Auth admin
Route::get('/admin/login', [AuthController::class, 'login_admin']);
Route::post('/admin/login', [AuthController::class, 'login_admin_check']);

// Auth user
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_check']);

Route::get('/logout', [AuthController::class, 'logout']);


