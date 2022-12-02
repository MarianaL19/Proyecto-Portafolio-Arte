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
    return view('index');
});

//Rutas de los modelos
Route::resource('commission', CommissionController::class)->middleware('auth');
Route::resource('product', ProductController::class);

//Ruta del Index
Route::get('/index', function () {
    return view('index');
});

//Rutas utilizadas para la sección de favoritos (relación n:m)
Route::get('/favorite', [ProductController::class, 'showFavorites']);
Route::post('/favorite/{product_id}', [ProductController::class, 'favorite']);
Route::post('/favorite/delete/{product_id}', [ProductController::class, 'deleteFavorite']);

//Ruta para la sección de papelera (productos)
Route::get('/products/trash', [ProductController::class, 'trash']);
Route::post('/products/trash/{product_id}', [ProductController::class, 'forcedelete']);
Route::post('/products/{product_id}/restore', [ProductController::class, 'restore']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
});
