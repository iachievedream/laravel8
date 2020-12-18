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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/',[App\Http\Controllers\ArticleController::class, 'index']);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/create',[App\Http\Controllers\ArticleController::class, 'create']);
    Route::post('/store',[App\Http\Controllers\ArticleController::class, 'store']);
    Route::group(['middleware'=>'authority'],function(){
        Route::get('/show/edit/{id}/',[App\Http\Controllers\ArticleController::class, 'edit']);
        Route::post('/show/edit/update/{id}',[App\Http\Controllers\ArticleController::class, 'update']);
        Route::post('/show/delete/{id}/',[App\Http\Controllers\ArticleController::class, 'destroy']);
    });
});

Route::get('/a',[App\Http\Controllers\AdminController::class, 'index']);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/acreate',[App\Http\Controllers\AdminController::class, 'create']);
    Route::post('/astore',[App\Http\Controllers\AdminController::class, 'store']);
    Route::group(['middleware'=>'authority'],function(){
        Route::get('/ashow/edit/{id}/',[App\Http\Controllers\AdminController::class, 'edit']);
        Route::post('/ashow/edit/update/{id}',[App\Http\Controllers\AdminController::class, 'update']);
        Route::post('/ashow/delete/{id}/',[App\Http\Controllers\AdminController::class, 'destroy']);
    });
});