<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/install', [InstallController::class, 'index']);

// Chart api calls pl: /api/cart/count
Route::controller(CartController::class)->group(function(){
    Route::prefix('cart')->group(function () {
        Route::get('/count', 'count')->name('cart.count');
        Route::post('/add', 'add')->name('cart.add');
        Route::patch('/change-quantity', 'changeQuantity')->name('cart.change-quantity');
        Route::delete('/remove/{id}', 'remove')->name('cart.remove');
    });
});

Route::controller(OrderController::class)->group(function(){
    Route::prefix('order')->group(function () {
        Route::post('/billing-address', 'billingAddressStore')->name('order.billing.address.store');
        Route::post('/shipping-address', 'shippingAddressStore')->name('order.shipping.address.store');
        Route::post('/shipment-method', 'shipmentMethodStore')->name('order.shipment.method.store');
        Route::post('/payment-method', 'paymentMethodStore')->name('order.payment.method.store');
        Route::get('/summary', 'summary')->name('order.summary');
        Route::get('/products', 'products')->name('order.products');
        Route::post('/store', 'store')->name('order.store');
    });
});