<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum', 'permission:product']], function () {
    Route::prefix('product')->group(function () {
        Route::post('/', [ProductController::class, 'index']);
        Route::post('/store', [ProductController::class, 'store']);
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/store', [CategoryController::class, 'store']);
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
    });

    Route::prefix('attribute')->group(function () {
        Route::get('/', [AttributeController::class, 'index']);
        Route::post('/store', [AttributeController::class, 'store']);
        Route::post('/update/{id}', [AttributeController::class, 'update']);
        Route::delete('/delete/{id}', [AttributeController::class, 'destroy']);
    });
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::prefix('auth')->group(function () {
    Route::any('login', [AuthController::class, 'login'])->name('login');
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists'
    ], 404);
});
