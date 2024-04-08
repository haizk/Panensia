<?php

use App\Http\Controllers\HeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResellerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => ['visitor']], function () {
    Route::get('/admin', function () { return view('admin');
    })->where('any', '.*');
    Route::get('/admin/{any}', function () { return view('admin');
    })->where('any', '.*');
    Route::get('/{any}', function () { return view('app');
    })->where('any', '.*');
});
