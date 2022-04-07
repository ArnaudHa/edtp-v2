<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('edt')->name('edt.')->group(function() {

    Route::get('/', [ \App\Http\Controllers\EdtController::class, 'get' ])
        ->name('index');

    Route::get('today', [ \App\Http\Controllers\EdtController::class, 'getToday' ])
        ->name('today');

    Route::get('sync', [ \App\Http\Controllers\EdtController::class, 'sync' ])
        ->name('sync');

    Route::get('last-sync', [ \App\Http\Controllers\EdtController::class, 'getLastSyncDate' ])
        ->name('last-sync');

    Route::get('test', [ \App\Http\Controllers\EdtController::class, 'test' ])
        ->name('test');

});

Route::prefix('notes')->name('notes.')->group(function() {

    Route::get('/', [])
        ->name('index');

    Route::get('/private', [])
        ->can('admin')
        ->name('private');

});
