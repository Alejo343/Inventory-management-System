<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'home')->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('units', UnitController::class);
    Route::resource('user', UserController::class);
    Route::put('user/{user}/updatePassword', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::resource('suppliers', SupplierController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
});
