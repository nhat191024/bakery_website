<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\client\AboutController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CheckoutController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\HomePageController;
use App\Http\Controllers\client\ProductDetailController;
use App\Http\Controllers\client\ProductListController;
use App\Http\Controllers\client\BlogController;

use App\Models\Cart;

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

Route::get('/', [HomePageController::class, 'index'])->name('client.homepage.index');
Route::get('/about', [AboutController::class, 'index'])->name('client.about.index');
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('client.contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('client.contact.store');
});

// Blog page
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('client.blog.index');
    Route::get('/{id}', [BlogController::class, 'show'])->name('client.blog.show');
});

Route::prefix('shop')->group(function () {
    Route::get('/{categoryId?}', [ProductListController::class, 'index'])->name('client.shop.productList');
    Route::get('/product/{productId}', [ProductDetailController::class, 'index'])->name('client.shop.productDetail');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('client.cart.index');
    Route::post('/add', [CartController::class, 'addToCart'])->name('client.cart.add');
    Route::post('/update', [CartController::class, 'updateCart'])->name('client.cart.update');
    Route::post('/remove', [CartController::class, 'removeFromCart'])->name('client.cart.remove');
    Route::post('/applyVoucher', [CartController::class, 'applyVoucher'])->name('client.cart.applyVoucher');
    Route::post('/removeVoucher', [CartController::class, 'removeVoucher'])->name('client.cart.removeVoucher');
    Route::get('/getCount',[Cart::class, 'getCartCount'])->name('cart.getCartCount');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('client.checkout.index');
    Route::post('/confirm', [CheckoutController::class, 'confirmOrder'])->name('client.checkout.store');
});

