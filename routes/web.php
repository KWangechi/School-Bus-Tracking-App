<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentController;

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

Route::get('{any}', function(){
    return view('app');
})->where('any', '*');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/parents', function () {
//     return view('parents.index'); 
//  });

// Route::get('/parents/create', function () {
//     return view('parents.create'); 
//  });

// Route::post('/parents/new', [ParentController::class, 'newParent']);

// Route::get('/new', function () {
//    return view('parents.new'); 
// });

