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
Route::post('/register', [App\Http\Controllers\AuthenticationController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthenticationController::class, 'login']);
Route::get('/users', [App\Http\Controllers\AuthenticationController::class, 'users']);

//child requests
Route::get('/child', [App\Http\Controllers\Parent\ChildController::class, 'index']);
Route::post('/child', [App\Http\Controllers\Parent\ChildController::class, 'store']);
Route::get('/child/{id}', [App\Http\Controllers\Parent\ChildController::class, 'show']);
Route::put('/child/{id}', [App\Http\Controllers\Parent\ChildController::class, 'update']);
Route::delete('/child/{id}', [App\Http\Controllers\Parent\ChildController::class, 'destroy']);

Route::group(['middleware' =>['auth:sanctum']], function () {

    //Admin permissions
    //Bus requests
    Route::get('/buses', [App\Http\Controllers\Admin\BusController::class, 'index']);
    Route::post('/buses', [App\Http\Controllers\Admin\BusController::class, 'store']);
    Route::get('/buses/{id}', [App\Http\Controllers\Admin\BusController::class, 'show']);
    Route::put('/buses/{id}', [App\Http\Controllers\Admin\BusController::class, 'update']);
    Route::delete('/buses/{id}', [App\Http\Controllers\Admin\BusController::class, 'destroy']);
    
    //Driver requests
    Route::get('/drivers', [App\Http\Controllers\Admin\DriverController::class, 'index']);
    Route::post('/drivers', [App\Http\Controllers\Admin\DriverController::class, 'store']);
    Route::get('/drivers/{id}', [App\Http\Controllers\Admin\DriverController::class, 'show']);
    Route::put('/drivers/{id}', [App\Http\Controllers\Admin\DriverController::class, 'update']);
    Route::delete('/drivers/{id}', [App\Http\Controllers\Admin\DriverController::class, 'destroy']);
    
    //parents requests admin
    Route::get('/parents', [App\Http\Controllers\Admin\ParentController::class, 'index']);
    Route::post('/parents', [App\Http\Controllers\Admin\ParentController::class, 'store']);
    Route::get('/parents/{id}', [App\Http\Controllers\Admin\ParentController::class, 'show']);
    Route::put('/parents/{id}', [App\Http\Controllers\Admin\ParentController::class, 'update']);
    Route::delete('/parents/{id}', [App\Http\Controllers\Admin\ParentController::class, 'destroy']);

    //one parent
    Route::get('/parent', [App\Http\Controllers\Parent\ParentController::class, 'index']);
    Route::post('/parent', [App\Http\Controllers\Parent\ParentController::class, 'store']);
    Route::get('/parent/{id}', [App\Http\Controllers\Parent\ParentController::class, 'show']);



    
    //roles requests
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index']);

    Route::get('/driver', [App\Http\Controllers\Driver\DriverController::class, 'index']);
    Route::post('/driver', [App\Http\Controllers\Driver\DriverController::class, 'store']);
    Route::put('/driver/{id}', [App\Http\Controllers\Driver\DriverController::class, 'update']);
    Route::delete('/driver/{id}', [App\Http\Controllers\Driver\DriverController::class, 'destroy']);


    
});

