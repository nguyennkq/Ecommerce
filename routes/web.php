<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PermissionController;

// Route::get('/',function(){
//     return view('admin.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('client.home');


Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::match(['get', 'post'], 'add', [CategoryController::class, 'add'])->name('category.add');
    Route::match(['get', 'post'], 'edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/deleted', [CategoryController::class, 'deleted'])->name('category.deleted');
    Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');

    Route::get('delete/permanently/{id}', [CategoryController::class, 'permanentlyDelete'])->name('category.permanently.delete');

    Route::get('{slug}', [CategoryController::class, 'productCategory'])->name('category.product');


});
Route::get('/changeStatusCategory', [CategoryController::class, 'changeStatus'])->name('changeStatusCategory');

Route::prefix('banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/deleted', [BannerController::class, 'deleted'])->name('banner.deleted');
    Route::get('/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');

    Route::match(['get', 'post'], 'add', [BannerController::class, 'add'])->name('banner.add');
    Route::match(['get', 'post'], 'edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');

    Route::get('delete/permanently/{id}', [BannerController::class, 'permanentlyDelete'])->name('banner.permanently.delete');

    Route::get('/changeStatusBanner', [BannerController::class, 'changeStatus'])->name('changeStatusBanner');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::match(['get', 'post'], 'add', [ProductController::class, 'add'])->name('product.add');
    Route::match(['get', 'post'], 'edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/deleted', [ProductController::class, 'deleted'])->name('product.deleted');
    Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');

    Route::get('delete/permanently/{id}', [ProductController::class, 'permanentlyDelete'])->name('product.permanently.delete');

    Route::get('shop', [ProductController::class, 'shop'])->name('client.shop');
    Route::get('/product-detail/{slug}', [ProductController::class, 'productDetail'])->name('product.detail');

    Route::get('/changeStatusProduct', [ProductController::class, 'changeStatus'])->name('changeStatusProduct');


    // Route::post('edit/image', [ProductController::class, 'editMultiImage'])->name('edit.image');

    Route::get('/delete/image/{id}', [ProductController::class, 'deleteMultiImage'])->name('delete.image');
});

Route::post('/edit/image', [ProductController::class, 'editMultiImage'])->name('edit.image');
// Route::get('category', 'ListCategory')->name('category.list');
// Route::get('category/create', 'CreateCategory')->name('category.create');
// Route::post('category/create', 'StoreCategory')->name('category.store');

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cartView')->name('cart');
    Route::post('/add-to-cart', 'addToCart')->name('client.addToCart');
    Route::get('/get-cart-product', 'getCart')->name('client.getCart');
    // Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCartDetails']);
});

Route::prefix('coupon')->group(function () {
    Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
    Route::match(['get', 'post'], 'add', [CouponController::class, 'add'])->name('coupon.add');
    Route::match(['get', 'post'], 'edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::get('delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');


    Route::get('/deleted', [CouponController::class, 'deleted'])->name('coupon.deleted');
    Route::get('/restore/{id}', [CouponController::class, 'restore'])->name('coupon.restore');

    Route::get('delete/permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('coupon.permanently.delete');

    Route::get('/changeStatusCoupon', [CouponController::class, 'changeStatus'])->name('changeStatusCoupon');
});


Route::prefix('permission')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
    Route::match(['get', 'post'], 'add', [PermissionController::class, 'add'])->name('permission.add');
    Route::match(['get', 'post'], 'edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::get('delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');


    Route::get('/deleted', [PermissionController::class, 'deleted'])->name('permission.deleted');
    Route::get('/restore/{id}', [PermissionController::class, 'restore'])->name('permission.restore');

    Route::get('delete/permanently/{id}', [PermissionController::class, 'permanentlyDelete'])->name('permission.permanently.delete');

});


