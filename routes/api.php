<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ResellerController;

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

Route::post('/login', [LoginController::class,'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/logout', [LoginController::class,'logout']);

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
Route::get('/getShops', [ProductController::class, 'getShops']);
Route::get('/getProductById/{id}', [ProductController::class, 'getProductById']);
Route::get('/getProductByShopId/{id}', [ProductController::class, 'getProductByShopId']);

Route::post('/createProduct', [ProductController::class, 'createProduct']);
Route::post('/editProduct/{id}', [ProductController::class, 'editProduct']);
Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);

Route::get('/resellers', [ResellerController::class, 'index']);
Route::post('/reseller', [ResellerController::class, 'store']);
Route::get('/resellers/{reseller}', [ResellerController::class, 'show']);
Route::post('/reseller/upload-logo', [ResellerController::class, 'uploadLogo']);
Route::post('/reseller/{id}/upload-logo', [ResellerController::class, 'uploadLogo']);
Route::put('/reseller/edit/{id}', [ResellerController::class, 'edit']);
Route::delete('/resellers/{reseller}', [ResellerController::class, 'destroy']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);

Route::get('/admins', [AdminsController::class, 'getAdmin']);
Route::get('/admins/{id}', [AdminsController::class, 'getAdminById']);
Route::post('/admins', [AdminsController::class, 'createAdmin']);
Route::post('/admins/{id}', [AdminsController::class, 'editAdmin']);
Route::delete('/admins/{id}', [AdminsController::class, 'deleteAdmin']);
