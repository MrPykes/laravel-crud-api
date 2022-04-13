<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

// Route::get('/', [ProductController::class, 'index']);


Route::group(['middleware' => ['permission:product']], function () {
});


Route::prefix('product')->group(function () {
    Route::get('/create', [ProductController::class, 'create']);
});

Route::group(['prefix' => 'product', 'middleware' => ['auth:sanctum', 'role:admin']], function () {
    // Route::middleware(['auth'])->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/create', [CategoryController::class, 'create']);
    });
    // });
});



Route::prefix('auth')->group(function () {
    Route::any('login', [AuthController::class, 'login'])->name('login');
});


// Route::prefix('attribute')->group(function () {
//     Route::get('/', [AttributeController::class, 'index']);
//     Route::get('/create', [AttributeController::class, 'create']);
// });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
