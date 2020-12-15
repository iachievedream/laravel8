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

// Route::get('/hello', function () {
//     return 'hello fu';
// });

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

// php artisan make:migration create_articles_table


// // php artisan make:model Article
// // php artisan make:middleware CheckAge
// // php artisan make:controller ArticleController
// php artisan make:controller ArticleController --resource --model=User



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/product', 'ProductController@list');
   Route::get('product', [ProductController::class, 'list']);

// Route::get('product', [ProductController::class, 'list'])->name('product');

// // 取得 URLs
// $url = route('product');

// // 導向
// return redirect()->route('product');

Route::get('user/{id}', [UserController::class, 'show']);
Route::get('profile', [UserController::class, 'show'])->middleware('auth');


