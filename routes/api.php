<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getNews', [NewsController::class, 'getNews']);
Route::get('/getNewsById/{id}', [NewsController::class, 'getNewsById']);
Route::get('/getNewsCategories', [NewsController::class, 'getNewsCategories']);
Route::get('/getNewsCategoryById/{id}', [NewsController::class, 'getNewsCategoryById']);

Route::post('/createNews', [NewsController::class, 'createNews']);
Route::post('/editNews/{id}', [NewsController::class, 'editNews']);
Route::delete('/deleteNews/{id}', [NewsController::class, 'deleteNews']);

Route::post('/createNewsCategory', [NewsController::class, 'createNewsCategory']);
Route::post('/editNewsCategory/{id}', [NewsController::class, 'editNewsCategory']);
Route::delete('/deleteNewsCategory/{id}', [NewsController::class, 'deleteNewsCategory']);

Route::get('/getProducts', [ProductController::class, 'getProducts']);
Route::get('/getProductById/{id}', [ProductController::class, 'getProductById']);
Route::get('/getProductByShopId/{id}', [ProductController::class, 'getProductByShopId']);

Route::post('/createProduct', [ProductController::class, 'createProduct']);
Route::post('/editProduct/{id}', [ProductController::class, 'editProduct']);
Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
