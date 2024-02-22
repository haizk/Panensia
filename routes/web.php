<?php

use App\Http\Controllers\HeadController;
use App\Http\Controllers\kontakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

Route::get('/{any}', function () {
    return view('user.index');
})->where('any', '.*');

Route::get('/{any}', function () {
    return view('user.404');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.about');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.become-partner');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.blog');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('checkout.checkout');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('contacts.contacts');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('faq.index');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.pricing-table');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.restaurants-card');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.restaurants');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.services');
})->where('any', '.*');
Route::get('/{any}', function () {
    return view('user.single-blog');
})->where('any', '.*');

// Route::get('/', [HeadController::class, 'index']);
// Route::get('/berita', [HeadController::class, 'berita']);
// Route::get('/detailBerita', function () { return view('index/page/detailBerita');});
// Route::get('/detailProduk', function () { return view('index/page/detailProduk');});
// Route::get('/katalogProduk', function () { return view('index/page/katalogProduk');});
// Route::get('/kontak', [HeadController::class, 'kontak']);
// Route::get('/produk', function () { return view('index/page/produk');});
// Route::get('/tentang', function () { return view('index/page/tentang');});