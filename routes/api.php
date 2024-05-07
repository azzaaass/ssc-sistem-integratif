<?php

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PicApiController;
use App\Http\Controllers\API\AlatApiController;
use App\Http\Controllers\API\SuratApiController;
use App\Http\Controllers\API\RuanganApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pics', [PicApiController::class, 'index']); // GET all

Route::get('/ruangans', [RuanganApiController::class, 'index']);
Route::get('/alats', [AlatApiController::class, 'index']);

Route::get('/surats', [SuratApiController::class, 'index']);