<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\OrderController;

// USER
Route::get('/', [ConcertController::class, 'index'])->name('concerts.index');
Route::get('/concert/{id}', [ConcertController::class, 'show'])->name('concerts.show');

// CHECKOUT
Route::get('/orders/checkout', [OrderController::class, 'checkoutForm'])->name('orders.checkout-form');
Route::post('/orders/checkout', [OrderController::class, 'completeOrder'])->name('orders.complete');

// DETAIL ORDER
Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');

// Ini Untuk ADMIN
Route::get('/admin/orders', [OrderController::class, 'adminList'])->name('admin.orders');
Route::get('/admin/orders/{id}', [OrderController::class, 'detail'])->name('admin.order.detail');
Route::put('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');
Route::put('/admin/orders/{id}/payment', [OrderController::class, 'updatePayment'])->name('admin.orders.updatePayment');

// KONSER ADMIN
Route::get('/admin/concerts', [ConcertController::class, 'adminList'])->name('admin.concerts');

Route::get('/admin/concerts/create', [ConcertController::class, 'create'])->name('admin.concerts.create');
Route::post('/admin/concerts', [ConcertController::class, 'store'])->name('admin.concerts.store');

Route::get('/admin/concerts/{id}/edit', [ConcertController::class, 'edit'])->name('admin.concerts.edit');
Route::put('/admin/concerts/{id}', [ConcertController::class, 'update'])->name('admin.concerts.update');
Route::delete('/admin/concerts/{id}', [ConcertController::class, 'destroy'])->name('admin.concerts.destroy');

// KATEGORI TIKET DI ADMIN
Route::get('/admin/concert/{id}/categories', [ConcertController::class, 'categories'])->name('admin.categories');
Route::post('/admin/concerts/{id}/categories', [ConcertController::class, 'storeCategory'])->name('admin.categories.store');
