<?php

use App\Http\Controllers\admin\AboutUsController;
use App\Http\Controllers\admin\AccessoryController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BillController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\PromotionController;
use App\Http\Controllers\admin\VariationController;
use App\Http\Controllers\admin\VoucherController;
use App\Http\Controllers\client\AboutController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CheckoutController;
use App\Http\Controllers\client\ContactController;
use App\Http\Controllers\client\HomePageController;
use App\Http\Controllers\client\ProductDetailController;
use App\Http\Controllers\client\ProductListController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\LanguageController;

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

Route::middleware(['localization'])->group(function () {
    Route::get('/', [HomePageController::class, 'index'])->name('client.homepage.index');

    Route::get('/about', [AboutController::class, 'index'])->name('client.about.index');
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('client.contact.index');
        Route::post('/', [ContactController::class, 'store'])->name('client.contact.store');
    });

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
        Route::get('/getCount', [Cart::class, 'getCartCount'])->name('cart.getCartCount');
    });

    Route::prefix('checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('client.checkout.index');
        Route::post('/confirm', [CheckoutController::class, 'confirmOrder'])->name('client.checkout.store');
    });
});


Route::get('/language', [LanguageController::class, 'changeLanguage'])->name('change-language');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'loginPage'])->name('main.login');
Route::post('/login/auth', [App\Http\Controllers\LoginController::class, 'login'])->name('main.login.auth');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('main.logout');

Route::middleware(['auth'])->group(function () {
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

        Route::prefix('/product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/add', [ProductController::class, 'showAddProduct'])->name('admin.product.show_add');
            Route::post('/add', [ProductController::class, 'addProduct'])->name('admin.product.add');
            Route::post('/edit', [ProductController::class, 'editProduct'])->name('admin.product.edit');
            Route::get('/edit/{id}', [ProductController::class, 'showEditProduct'])->name('admin.product.show_edit');
            Route::get('/delete', [ProductController::class, 'deleteProduct'])->name('admin.product.delete');
            Route::get('/restore', [ProductController::class, 'restoreProduct'])->name('admin.product.restore');
            Route::get('/detail', [ProductController::class, 'showDetail'])->name('admin.product.show_detail');
            Route::get('/detail/add', [ProductController::class, 'showAddDetail'])->name('admin.product.show_add_detail');
            Route::get('/detail/edit', [ProductController::class, 'showEditDetail'])->name('admin.product.show_edit_detail');
            Route::post('/detail/add', [ProductController::class, 'addDetail'])->name('admin.product.add_detail');
            Route::post('/detail/edit', [ProductController::class, 'editDetail'])->name('admin.product.edit_detail');
            Route::get('/detail/delete', [ProductController::class, 'deleteDetail'])->name('admin.product.delete_detail');
        });

        Route::prefix('/banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('admin.banner.index');
            Route::get('/add', [BannerController::class, 'showAddBanner'])->name('admin.banner.show_add');
            Route::post('/add', [BannerController::class, 'addBanner'])->name('admin.banner.add');
            Route::post('/edit', [BannerController::class, 'editBanner'])->name('admin.banner.edit');
            Route::get('/edit/{id}', [BannerController::class, 'showEditBanner'])->name('admin.banner.show_edit');
            Route::get('/delete/{id}', [BannerController::class, 'deleteBanner'])->name('admin.banner.delete');
        });

        Route::prefix('/about')->group(function () {
            Route::get('/', [AboutUsController::class, 'index'])->name('admin.about.index');
            Route::post('/edit', [AboutUsController::class, 'editBanner'])->name('admin.about.edit');
            Route::get('/edit/{id}', [AboutUsController::class, 'showEditBanner'])->name('admin.about.show_edit');
        });

        // Route::prefix('/user')->group(function () {
        //     Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        //     Route::get('/add', [UserController::class, 'showAddUser'])->name('admin.user.show_add');
        //     Route::post('/add', [UserController::class, 'addUser'])->name('admin.user.add');
        //     Route::post('/edit', [UserController::class, 'editUser'])->name('admin.user.edit');
        //     Route::get('/edit/{id}', [UserController::class, 'showEditUser'])->name('admin.user.show_edit');
        //     Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('admin.user.delete');
        // });


        Route::prefix('/voucher')->group(function () {
            Route::get('/', [VoucherController::class, 'index'])->name('admin.voucher.index');
            Route::post('/edit', [VoucherController::class, 'saveEdit'])->name('admin.voucher.edit');
            Route::post('/add', [VoucherController::class, 'add'])->name('admin.voucher.add');
            Route::get('/edit/{id}', [VoucherController::class, 'showEdit'])->name('admin.voucher.show_edit');
            Route::get('/detail/{id}', [VoucherController::class, 'showDetail'])->name('admin.voucher.show_detail');
            Route::get('/add', [VoucherController::class, 'showAdd'])->name('admin.voucher.show_add');
            Route::get('/delete/{id}', [VoucherController::class, 'delete'])->name('admin.voucher.delete');
        });


        Route::prefix('/bill')->group(function () {
            Route::get('/', [BillController::class, 'index'])->name('admin.bill.index');
            Route::get('/get-pending', [BillController::class, 'getPending'])->name('admin.bill.getPending');
            Route::get('/update-status', [BillController::class, 'editStatus'])->name('admin.bill.updateStatus');
            Route::post('/edit', [BillController::class, 'editStatus'])->name('admin.bill.edit_status');
            Route::get('/{id}', [BillController::class, 'showDetail'])->name('admin.bill.show_detail');
        });

        Route::prefix('/variation')->group(function () {
            Route::get('/', [VariationController::class, 'index'])->name('admin.variation.index');
            Route::get('/edit/{id}', [VariationController::class, 'showEdit'])->name('admin.variation.edit');
            Route::get('/delete/{id}', [VariationController::class, 'delete'])->name('admin.variation.delete');
            Route::get('/destroy/{id}', [VariationController::class, 'destroy'])->name('admin.variation.destroy');
            Route::get('/restore/{id}', [VariationController::class, 'restore'])->name('admin.variation.restore');
            Route::post('/edit', [VariationController::class, 'saveEdit'])->name('admin.variation.saveEdit');
            Route::post('/add', [VariationController::class, 'saveAdd'])->name('admin.variation.saveAdd');
            Route::get('/add', [VariationController::class, 'showAdd'])->name('admin.variation.show_add');
        });

        Route::prefix('/accessory')->group(function () {
            Route::get('/', [AccessoryController::class, 'index'])->name('admin.accessory.index');
            Route::get('/edit/{id}', [AccessoryController::class, 'showEdit'])->name('admin.accessory.edit');
            Route::post('/edit', [AccessoryController::class, 'saveEdit'])->name('admin.accessory.saveEdit');
            // Route::get('/{id}', [AccessoryController::class, 'showDetail'])->name('admin.bill.show_detail');
        });

        Route::prefix('/promotion')->group(function () {
            Route::get('/', [PromotionController::class, 'index'])->name('admin.promotion.index');
            Route::get('/edit/{id}', [PromotionController::class, 'showEdit'])->name('admin.promotion.edit');
            Route::post('/edit', [PromotionController::class, 'saveEdit'])->name('admin.promotion.saveEdit');
            // Route::get('/{id}', [PromotionController::class, 'showDetail'])->name('admin.bill.show_detail');
        });

        Route::prefix('/blog')->group(function () {
            Route::get('/', [\App\Http\Controllers\admin\BlogController::class, 'index'])->name('admin.blog.index');
            Route::get('/detail/{id}', [\App\Http\Controllers\admin\BlogController::class, 'showDetail'])->name('admin.blog.showDetail');
            Route::get('/edit/{id}', [\App\Http\Controllers\admin\BlogController::class, 'showEdit'])->name('admin.blog.showEdit');
            Route::post('/edit', [\App\Http\Controllers\admin\BlogController::class, 'saveEdit'])->name('admin.blog.saveEdit');
            Route::get('/add', [\App\Http\Controllers\admin\BlogController::class, 'showAdd'])->name('admin.blog.show_add');
            Route::get('/delete/{id}', [\App\Http\Controllers\admin\BlogController::class, 'delete'])->name('admin.blog.delete');
            Route::get('/restore/{id}', [\App\Http\Controllers\admin\BlogController::class, 'recover'])->name('admin.blog.restore');
            Route::post('/add', [\App\Http\Controllers\admin\BlogController::class, 'add'])->name('admin.blog.add');
        });

        Route::prefix('/message')->group(function () {
            Route::get('/', [MessageController::class, 'index'])->name('admin.message.index');
            Route::get('/get', [MessageController::class, 'getUnread']);
            Route::get('/markedAsRead', [MessageController::class, 'showDeleted'])->name('admin.message.deleted');
            Route::get('/{id}', [MessageController::class, 'showMessageDetail'])->name('admin.message.show_detail');
            Route::get('/deleted/{id}', [MessageController::class, 'showDeletedMessageDetail'])->name('admin.message.show_deleted_detail');
            Route::get('/delete/{id}', [MessageController::class, 'deleteMessage'])->name('admin.message.delete');
        });
    });
});
