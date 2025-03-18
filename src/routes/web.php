<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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

Route::get('/', [ProductsController::class, 'index']);
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/search', [ProductsController::class, 'search']);
Route::get('/products/search', [ProductsController::class, 'search']);
Route::get('/pruduct/{productId}', [ProductsController::class, 'detail'])->name('products.detail');
Route::delete('/products/{productId}/', [ProductsController::class, 'destroy'])->name('products.destroy');
Route::patch('/products/{productId}/update', [ProductsController::class, 'update'])->name('products.update');
Route::get('/products/register', [ProductsController::class, 'register']);
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');