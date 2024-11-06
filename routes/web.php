<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
})->name('home');;
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');;

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('units', UnitController::class);
Route::resource('user', UserController::class);
Route::put('user/{user}/updatePassword', [UserController::class, 'updatePassword'])->name('user.updatePassword');
Route::resource('suppliers', SupplierController::class);
