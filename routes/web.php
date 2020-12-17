<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
Route::get('/',[App\Http\Controllers\ArticleController::class, 'index']);
// Route::group(['middleware'=>'auth'],Articlenction(){
    Route::get('/create',[App\Http\Controllers\ArticleController::class, 'create']);
    Route::post('/store',[App\Http\Controllers\ArticleController::class, 'store']);
    // Route::group(['middleware'=>'authority'],Articlenction(){
        Route::get('/show/edit/{id}/',[App\Http\Controllers\ArticleController::class, 'edit']);
        Route::post('/show/edit/update/{id}',[App\Http\Controllers\ArticleController::class, 'update']);
        Route::post('/show/delete/{id}/',[App\Http\Controllers\ArticleController::class, 'destroy']);
    // });
// });