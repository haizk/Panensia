<?php

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

Route::get('/tes', function () { return view('index/dashboard');});