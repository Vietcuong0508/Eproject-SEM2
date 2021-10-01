<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('admin/products/create-products');
})->name('admin');


Route::get('create-products', [ProductController::class, 'create'])->name('create-products');
Route::post('create-products', [ProductController::class, 'store'])->name('create-products');
Route::get('list-products', [ProductController::class, 'list'])->name('list-product');
Route::get('admin/new-products', [ProductController::class, 'newProduct'])->name('newProduct');
Route::put('update-products/{id}', [ProductController::class, 'update'])->name('update-product');
Route::get('edit-products/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::delete('destroy-products/{id}', [ProductController::class, 'destroy'])->name('destroy-product');


Route::get('user', [AdminController::class, 'index'])->name('user');
Route::get('create-user', [AdminController::class, 'create'])->name('create-user');
Route::post('create-user', [AdminController::class, 'storeAdmin'])->name('create-user');
Route::put('update-user/{id}', [AdminController::class, 'update'])->name('update-user');
Route::get('edit-user/{id}', [AdminController::class, 'edit'])->name('edit-user');
Route::delete('destroy-user/{id}', [AdminController::class, 'destroy'])->name('destroy-user');

Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/admin/contact_status', [ContactController::class, 'update_status'])->name('contact_status');

Route::get('/admin/list-order', [OrderController::class, 'index'])->name('list-order');
Route::post('/admin/update_status', [OrderController::class, 'update_status'])->name('update_status');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('show');
