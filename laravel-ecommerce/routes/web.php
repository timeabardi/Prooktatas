<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\ExampleController;

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

Route::get('/checkout', function() {
    return 'checkout';
})->name('checkout');

Route::get('/wishlist', [WishController::class, 'index'])->name('wishlist');

Route::get('/contact', function() {
    return 'contact';
})->name('contact');

/*Route::get('/axios', function () {
    return view('axios');
});*/

Route::get('/axios', [ExampleController::class, 'axios'])->name('axios');