<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\client\AboutController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\HomePageController;
use App\Http\Controllers\client\ProductDetailController;
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

Route::get('/login', [App\Http\Controllers\LoginController::class, 'loginPage'])->name('main.login');
Route::post('/login/auth', [App\Http\Controllers\LoginController::class, 'login'])->name('main.login.auth');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('main.logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('/category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/add', [CategoryController::class, 'showAddCategory'])->name('admin.category.show_add');
            Route::post('/add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
        });
    });
});

Route::get('/homePage', [HomePageController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('client.about.index');
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('client.contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('client.contact.store');
});

Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('client.about.index');
});
// Route::prefix('blog')->group(function () {
//     Route::get('/{id}', [BlogController::class, 'show'])->name('client.blog.show');
// });

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('client.blog.show');

// Blog page
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index']);
});


Route::prefix('shop')->group(function () {
    Route::get('/{categoryId?}', [ProductListControler::class, 'index'])->name('client.shop.productList');
    Route::get('/product/{productId}', [ProductDetailController::class, 'index'])->name('client.shop.productDetail');
});