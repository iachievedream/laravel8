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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api',[App\Http\Controllers\Api\v1\ArticleController::class, 'index']);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/apicreate',[App\Http\Controllers\Api\v1\ArticleController::class, 'create']);
    Route::post('/apistore',[App\Http\Controllers\Api\v1\ArticleController::class, 'store']);
    Route::group(['middleware'=>'authority'],function(){
        Route::get('/apishow/edit/{id}/',[App\Http\Controllers\Api\v1\ArticleController::class, 'edit']);
        Route::post('/apishow/edit/update/{id}',[App\Http\Controllers\Api\v1\ArticleController::class, 'update']);
        Route::post('/apishow/delete/{id}/',[App\Http\Controllers\Api\v1\ArticleController::class, 'destroy']);
    });
});

// Route::get('/', function () {
//     return 'ABC';
// });