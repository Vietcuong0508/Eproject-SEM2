<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
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

Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::get('/', function () {
    return view('client/home');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/create-products', [ProductController::class, 'create'])->name('create-products');
Route::post('/create-products', [ProductController::class, 'store']);
Route::get('/list-products', [ProductController::class, 'list'])->name('list-product');
Route::put('/update-products/{id}', [ProductController::class, 'update']);
Route::get('/edit-products/{id}', [ProductController::class, 'edit']);
Route::delete('/destroy-products/{id}', [ProductController::class, 'destroy']);

Route::get('/user', [AdminController::class, 'index']);
Route::get('/create-user', [AdminController::class, 'create'])->name('create-user');
Route::post('/create-user', [AdminController::class, 'storeAdmin']);
Route::put('/update-user/{id}', [AdminController::class, 'update']);
Route::get('/edit-user/{id}', [AdminController::class, 'edit']);
Route::delete('/destroy-user/{id}', [AdminController::class, 'destroy']);


Route::get('/details', [DetailController::class, 'index']);

Route::get('/shopping-cart', [AddToCartController::class, 'index']);

Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);
