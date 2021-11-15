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
//authentication


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    
});

//Bus requests
Route::get('/buses', [App\Http\Controllers\BusController::class, 'index']);
Route::post('/buses', [App\Http\Controllers\BusController::class, 'store']);
Route::put('/buses/{id}', [App\Http\Controllers\BusController::class, 'update']);
Route::delete('/buses/{id}', [App\Http\Controllers\BusController::class, 'destroy']);

//Driver requests
Route::get('/drivers', [App\Http\Controllers\DriverController::class, 'index']);
Route::post('/drivers', [App\Http\Controllers\DriverController::class, 'store']);
Route::put('/drivers/{id}', [App\Http\Controllers\DriverController::class, 'update']);
Route::delete('/drivers/{id}', [App\Http\Controllers\DriverController::class, 'destroy']);

//parents requests
Route::get('/parents', [App\Http\Controllers\ParentController::class, 'index']);
Route::post('/parents', [App\Http\Controllers\ParentController::class, 'store']);
Route::put('/parents/{id}', [App\Http\Controllers\ParentController::class, 'update']);
Route::delete('/parents/{id}', [App\Http\Controllers\ParentController::class, 'destroy']);

//roles requests
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index']);
Route::post('/roles', [App\Http\Controllers\RoleController::class, 'create']);
