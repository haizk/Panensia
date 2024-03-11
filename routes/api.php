<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetTokenController;

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
Route::post('/sendResetPasswordEmail', [PasswordResetTokenController::class,'sendResetPasswordEmail']);
Route::get('/resetPasswordForm/{token}', [PasswordResetTokenController::class,'resetForm']);
Route::post('/resetPassword/{token}', [PasswordResetTokenController::class,'reset']);

// Protected routes, require user login
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json(['user' => $request->user()]);
    });

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/loggedUser', [LoginController::class, 'loggedUser']);

    Route::get('/admins', [UserController::class, 'getAdmins'])->name('admin.admins');
    Route::post('/admins', [UserController::class, 'createAdmin'])->name('admin.admins.create');
    Route::get('/admins/{id}', [UserController::class, 'getAdminById']);
    Route::post('/admins/{id}', [UserController::class, 'editAdmin']);
    Route::delete('/admins/{id}', [UserController::class, 'deleteAdmin']);

    Route::post('/profile', [UserController::class, 'profileAdmin'])->name('admin.admins.profile');
    Route::post('/changePassword/{id}', [UserController::class, 'changePassword'])->name('auth.change_password');
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
Route::get('/getShops', [ProductController::class, 'getShops']);
Route::get('/getProductById/{id}', [ProductController::class, 'getProductById']);
Route::get('/getProductByShopId/{id}', [ProductController::class, 'getProductByShopId']);

Route::post('/createProduct', [ProductController::class, 'createProduct']);
Route::post('/editProduct/{id}', [ProductController::class, 'editProduct']);
Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);

Route::get('/shops', [ShopController::class, 'index']);
Route::post('/shops', [ShopController::class, 'store']);
Route::get('/shops/{shop}', [ShopController::class, 'show']);
Route::put('/shops/{shop}', [ShopController::class, 'update']);
Route::post('/shops/{shop}/upload-logo', [ShopController::class, 'uploadLogo']);
Route::post('/shops/upload-logo', [ShopController::class, 'uploadLogo']);
Route::delete('/shops/{shop}', [ShopController::class, 'destroy']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);


