<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});

//Chart api calls pl: /api/cart/count
Route::get('/install', [InstallController::class, 'index']);
Route::controller(CartController::class)->group(function() {
  Route::prefix('cart')->group(function() {
    Route::get('/count', 'count')->name('cart.count');
    Route::post('/add', 'add')->name('cart.add');
    Route::put('/update', 'update')->name('cart.update');
    Route::delete('/remove/{id}/{quantity}', 'remove')->name('cart.remove');
  });

  Route::controller(WishController::class)->group(function() {
    Route::prefix('wishlist')->group(function() {
      Route::get('/count', 'count')->name('wishlist.count');
      Route::post('/add', 'add')->name('wishlist.add');
      Route::delete('/remove/{id}', 'remove')->name('wishlist.remove');
    });
  });
});