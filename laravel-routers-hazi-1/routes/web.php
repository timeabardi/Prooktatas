<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function() {
    return "<h1>Hello világ</h1>";
});

Route::get('/username_show/{username}', [UserController::class, 'username_show'])->name('username_show');

// Route::get('/about', function() {
//     return '<h1>Halo</h1>';
// });

// Route::get('test', [TestController::class, 'index']);

// Route::match(['get', 'post'], '/users', function(Request $request) {
// return $request->input('ok');
// });

// Route::any('/any-example', function(Request $request) {
//     return $request->input('ok');
// });

//-------------------------------------------------

// public.home
// admin.users.list
// admin.users.datatable
// admin.users.edit.process

Route::prefix('users')->group(function() {

//http://localhost:8000/users/list
Route::get('/list', [UserController::class, 'list'])->name('users.list');

Route::get('/datatable/{limit?}', [UserController::class, 'datatable'])->name('users.datatable');

//http://localhost:8000/users/show/1
Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show');

//http://localhost:8000/users/add
Route::get('/add', [UserController::class, 'add'])->name('users.add');

//http://localhost:8000/users/edit/1
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

//http://localhost:8000/users/delete/1
Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

//http://localhost:8000/users/add/process
Route::post('/add/process', [UserController::class, 'addProcess'])->name('users.add-process');

//http://localhost:8000/users/edit/process
Route::post('/edit/process', [UserController::class, 'editProcess'])->name('users.edit-process');

});


Route::prefix('admin')->group(function() {

    Route::get('/cars', [UserController::class, 'cars'])->name('admin.cars');
    Route::get('/bmw', [UserController::class, 'bmw'])->name('admin.bmw');
    Route::get('/mercedes', [UserController::class, 'mercedes'])->name('admin.mercedes');
    Route::get('/honda', [UserController::class, 'honda'])->name('admin.honda');
    Route::get('/volvo', [UserController::class, 'volvo'])->name('admin.volvo');
    });

Route::post('/post_welcome', [UserController::class, 'test_post'])->name('test_post');

Route::get('/actions/{id}', [NewController::class, 'actions'])->name('actions');

Route::get('/test_user/{username}', [NewController::class, 'test_user'])->name('test_user');

Route::get('/test_redirect', function () {
    return redirect('/admin/cars');
});

Route::get('/welcome_link', function() {
    return "<a href=link><h1>This is a link</h1></a>";
});