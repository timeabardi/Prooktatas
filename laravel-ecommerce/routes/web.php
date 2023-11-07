<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [ProductController::class, 'list']);

Route::get('/product/list/{category}', [ProductController::class, 'list'])
->name('product.list');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');

Route::get('/order/end', [OrderController::class, 'end'])->name('order.end');

Route::get('/wishlist', function () {
    //return view('wishlist');
    return 'wishlist';
})->name('wishlist');

Route::get('/contact', function () {
    //return view('contact');
    return 'contact';
})->name('contact');