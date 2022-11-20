<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('commission', CommissionController::class);
Route::resource('product', ProductController::class);
Route::get('/index', function () {
    return view('index');
});
Route::post('/favorito/{product_id}', [ProductController::class, 'favorite']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
