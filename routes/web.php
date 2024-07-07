<?php

use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\client\AboutController;
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

// Route::middleware(['auth'])->group(function () {
//     Route::prefix('admin')->group(function () {
//         Route::prefix('/category')->group(function () {
//             Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
//             Route::get('/add', [CategoryController::class, 'showAddCategory'])->name('admin.category.show_add');
//             Route::post('/add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
//         });
//     });
// });

Route::get('/homePage', [HomePageController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('client.about.index');
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('client.contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('client.contact.store');
});

Route::prefix('shop')->group(function () {
    Route::get('/{categoryId?}', [ProductListControler::class, 'index'])->name('client.shop.productList');
    Route::get('/product/{productId}', [ProductDetailController::class, 'index'])->name('client.shop.productDetail');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.index');
    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/add', [CategoryController::class, 'showAddCategory'])->name('admin.category.show_add');
        Route::post('/add', [CategoryController::class, 'addCategory'])->name('admin.category.add');
        Route::post('/edit', [CategoryController::class, 'editCategory'])->name('admin.category.edit');
        Route::get('/edit/{id}', [CategoryController::class, 'showEditCategory'])->name('admin.category.show_edit');
        Route::get('/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
    });

    // Route::prefix('/method')->group(function () {
    //     Route::get('/', [MethodController::class, 'index'])->name('admin.method.index');
    //     Route::get('/add', [MethodController::class, 'showAddMethod'])->name('admin.method.show_add');
    //     Route::post('/add', [MethodController::class, 'addMethod'])->name('admin.method.add');
    //     Route::post('/edit', [MethodController::class, 'editMethod'])->name('admin.method.edit');
    //     Route::get('/edit/{id}', [MethodController::class, 'showEditMethod'])->name('admin.method.show_edit');
    //     Route::get('/delete/{id}', [MethodController::class, 'deleteMethod'])->name('admin.method.delete');
    // });

    Route::prefix('/Banner')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/add', [ProductController::class, 'showAddProduct'])->name('admin.product.show_add');
        Route::post('/add', [ProductController::class, 'addProduct'])->name('admin.product.add');
        Route::post('/edit', [ProductController::class, 'editProduct'])->name('admin.product.edit');
        Route::get('/edit/{id}', [ProductController::class, 'showEditProduct'])->name('admin.product.show_edit');
        Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.product.delete');
    });

    Route::prefix('/banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banner.index');
        Route::get('/add', [BannerController::class, 'showAddBanner'])->name('admin.banner.show_add');
        Route::post('/add', [BannerController::class, 'addBanner'])->name('admin.banner.add');
        Route::post('/edit', [BannerController::class, 'editBanner'])->name('admin.banner.edit');
        Route::get('/edit/{id}', [BannerController::class, 'showEditBanner'])->name('admin.banner.show_edit');
        Route::get('/delete/{id}', [BannerController::class, 'deleteBanner'])->name('admin.banner.delete');
    });

    // Route::prefix('/dish')->group(function () {
    //     Route::get('/', [DishController::class, 'index'])->name('admin.dish.index');
    //     Route::get('/add', [DishController::class, 'showAddDish'])->name('admin.dish.show_add');
    //     Route::post('/add', [DishController::class, 'addDish'])->name('admin.dish.add');
    //     Route::post('/edit', [DishController::class, 'editDish'])->name('admin.dish.edit');
    //     Route::get('/edit/{id}', [DishController::class, 'showEditDish'])->name('admin.dish.show_edit');
    //     Route::get('/delete/{id}', [DishController::class, 'deleteDish'])->name('admin.dish.delete');
    // });

    // Route::prefix('/table')->group(function () {
    //     Route::get('/', [TableController::class, 'index'])->name('admin.table.index'); 
    //     Route::get('/add', [TableController::class, 'showAddTable'])->name('admin.table.show_add');
    //     Route::post('/add', [TableController::class, 'addTable'])->name('admin.table.add');
    //     Route::post('/edit', [TableController::class, 'editTable'])->name('admin.table.edit');
    //     Route::get('/edit/{id}', [TableController::class, 'showEditTable'])->name('admin.table.show_edit');
    //     Route::get('/delete/{id}', [TableController::class, 'deleteTable'])->name('admin.table.delete');
    // });

    // Route::prefix('/kitchen')->group(function () {
    //     Route::get('/', [KitchenController::class, 'index'])->name('admin.kitchen.index');
    //     Route::get('/add', [KitchenController::class, 'showAddKitchen'])->name('admin.kitchen.show_add');
    //     Route::post('/add', [KitchenController::class, 'addKitchen'])->name('admin.kitchen.add');
    //     Route::post('/edit', [KitchenController::class, 'editKitchen'])->name('admin.kitchen.edit');
    //     Route::get('/edit/{id}', [KitchenController::class, 'showEditKitchen'])->name('admin.kitchen.show_edit');
    //     Route::get('/delete/{id}', [KitchenController::class, 'deleteKitchen'])->name('admin.kitchen.delete');
    //     Route::post('/add-kitchen-method', [KitchenController::class, 'addKitchenMethod'])->name('admin.kitchen.add_kitchen_method');
    //     Route::post('/get-kitchen-method', [KitchenController::class, 'getKitchenMethod'])->name('admin.kitchen.get_kitchen_method');
    // });
    
    // Route::prefix('/bill')->group(function () {
    //     Route::get('/', [BillController::class, 'index'])->name('admin.bill.index'); 
    //     Route::get('/{id}', [BillController::class, 'showDetail'])->name('admin.bill.show_detail');
    // });
    
    // Route::prefix('/user')->group(function () {
    //     Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
    //     Route::get('/add', [UserController::class, 'showAddUser'])->name('admin.user.show_add');
    //     Route::post('/add', [UserController::class, 'addUser'])->name('admin.user.add');
    //     Route::post('/edit', [UserController::class, 'editUser'])->name('admin.user.edit');
    //     Route::get('/edit/{id}', [UserController::class, 'showEditUser'])->name('admin.user.show_edit');
    //     Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('admin.user.delete');
    // });

});