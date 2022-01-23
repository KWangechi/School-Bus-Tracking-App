<?php

use App\Events\SendLocation;
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
    return $request->user();
});

Route::post('/map', [App\Http\Controllers\Driver\DriverController::class, 'sendLocation']);

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
    // Route::get('/parent/{id}', [App\Http\Controllers\Parent\ParentController::class, 'show']);

    
    //one driver
    Route::get('/driver', [App\Http\Controllers\Driver\DriverController::class, 'index']);
    Route::post('/driver', [App\Http\Controllers\Driver\DriverController::class, 'store']);
    Route::get('/driver/{id}', [App\Http\Controllers\Driver\DriverController::class, 'show']);
    Route::put('/driver/{id}', [App\Http\Controllers\Driver\DriverController::class, 'update']);
    Route::delete('/driver/{id}', [App\Http\Controllers\Driver\DriverController::class, 'destroy']);

    
    //roles requests
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index']);

    Route::post('/logout', [App\Http\Controllers\AuthenticationController::class, 'logout']);

    //send a notification(driver module)
    Route::prefix('driver')->group(function (){
        Route::post('/send-notification', [App\Http\Controllers\Driver\DriverController::class, 'startTrip']);
        Route::get('/notifications/all', [App\Http\Controllers\Driver\DriverController::class, 'showAllNotifications']);
        Route::get('/notifications/inbox', [App\Http\Controllers\Driver\DriverController::class, 'showUnreadNotifications']);
        Route::post('/markNotification', [App\Http\Controllers\Driver\DriverController::class, 'markNotification']);
        Route::post('/markAllNotifications', [App\Http\Controllers\Driver\DriverController::class, 'markAllNotifications']);
        Route::delete('/deleteNotification/{id}', [App\Http\Controllers\Driver\DriverController::class, 'deleteNotification']);
        Route::post('/deleteAllNotifications', [App\Http\Controllers\Driver\DriverController::class, 'deleteAllNotification']);
        Route::post('/deleteInbox', [App\Http\Controllers\Driver\DriverController::class, 'deleteInbox']);

        //sending the  coordinates to the parents
        // Route::post('/map', [App\Http\Controllers\Driver\DriverController::class, 'sendLocation']);
        Route::post('/destinationReached', [App\Http\Controllers\Driver\DriverController::class, 'destinationReached']); 
    });

    Route::prefix('parent')->group(function (){
        Route::get('/notifications/all', [App\Http\Controllers\Parent\ParentController::class, 'showAllNotifications']);
        Route::get('/notifications/inbox', [App\Http\Controllers\Parent\ParentController::class, 'showUnreadNotifications']);
        Route::post('/markNotification', [App\Http\Controllers\Parent\ParentController::class, 'markNotification']);
        Route::delete('/deleteNotification/{id}', [App\Http\Controllers\Parent\ParentController::class, 'deleteNotification']);
        Route::post('/deleteAllNotifications', [App\Http\Controllers\Parent\ParentController::class, 'deleteAllNotification']);
        Route::post('/deleteInbox', [App\Http\Controllers\Parent\ParentController::class, 'deleteInbox']);
        Route::post('/markAllNotifications', [App\Http\Controllers\Parent\ParentController::class, 'markAllNotifications']);

        Route::get('/child', [App\Http\Controllers\Parent\ParentController::class, 'getChildren']);

    });

});

