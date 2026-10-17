<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::controller(ShopController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/langganan', 'subscriptions')->name('subscriptions');
    Route::get('/produk/{product}', 'show')->name('product');
    Route::get('/checkout/{product}', 'checkout')->name('checkout');
    Route::post('/checkout/{product}', 'store')->name('checkout.store');
    Route::get('/bayar/{order}', 'pay')->name('pay');
    Route::post('/bayar/{order}', 'simulate')->name('pay.simulate');
    Route::get('/order/{order}', 'order')->name('order');
});

Route::view('/kontak', 'pages.contact')->name('contact');
Route::view('/syarat-ketentuan', 'pages.terms')->name('terms');
Route::view('/kebijakan-pengembalian', 'pages.refund')->name('refund');
Route::view('/kebijakan-privasi', 'pages.privacy')->name('privacy');
