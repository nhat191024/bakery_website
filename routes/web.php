<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\client\HomePageController;
use App\Http\Controllers\client\ProductListControler;
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

Route::prefix('admin')->group(function () {
    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/add', [CategoryController::class, 'showAddCategory'])->name('admin.category.show_add');
        Route::post('/add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
    });
});

Route::prefix('shop')->group(function () {
    Route::get('/{categoryId?}', [ProductListControler::class, 'index'])->name('client.shop.productList');
});

Route::get('/homePage', [HomePageController::class, 'index']);
