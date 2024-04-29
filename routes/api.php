<?php

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PicApiController;
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
Route::get('/pics/{id}', [PicApiController::class, 'show']); // GET specific
Route::post('/pics', [PicApiController::class, 'store']); // POST
Route::put('/pics/{id}', [PicApiController::class, 'update']); // PUT
Route::delete('/pics/{id}', [PicApiController::class, 'destroy']); // DELETE


Route::get('/ruangans', [RuanganApiController::class, 'index']);

Route::get('/surats', [SuratApiController::class, 'index']);