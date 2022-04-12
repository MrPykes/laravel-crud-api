<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [ProductController::class, 'index']);

// Route::prefix('product')->group(function () {
//     Route::get('/create', [ProductController::class, 'create']);
// });

// Route::prefix('category')->group(function () {
//     Route::get('/', [CategoryController::class, 'index']);
//     Route::get('/create', [CategoryController::class, 'create']);
// });

// Route::prefix('attribute')->group(function () {
//     Route::get('/', [AttributeController::class, 'index']);
//     Route::get('/create', [AttributeController::class, 'create']);
// });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
