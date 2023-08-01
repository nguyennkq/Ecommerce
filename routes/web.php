<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\CouponController;

// Route::get('/',function(){
//     return view('admin.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('client.home');


Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::match(['get', 'post'], 'add', [CategoryController::class, 'add'])->name('category.add');
    Route::match(['get', 'post'], 'edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('inactive/{id}', [CategoryController::class, 'inactive'])->name('category.inactive');
    Route::get('active/{id}', [CategoryController::class, 'active'])->name('category.active');

    Route::get('{slug}', [CategoryController::class, 'productCategory'])->name('category.product');
});

Route::prefix('banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/deleted', [BannerController::class, 'deleted'])->name('banner.deleted');
    Route::get('/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');

    Route::match(['get', 'post'], 'add', [BannerController::class, 'add'])->name('banner.add');
    Route::match(['get', 'post'], 'edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');

    Route::get('inactive/{id}', [BannerController::class, 'inactive'])->name('banner.inactive');
    Route::get('active/{id}', [BannerController::class, 'active'])->name('banner.active');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::match(['get', 'post'], 'add', [ProductController::class, 'add'])->name('product.add');
    Route::match(['get', 'post'], 'edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('active/{id}', [ProductController::class, 'active'])->name('product.active');

    Route::get('shop', [ProductController::class, 'shop'])->name('client.shop');
    Route::get('/product-detail/{slug}', [ProductController::class, 'productDetail'])->name('product.detail');

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

    Route::get('inactive/{id}', [CouponController::class, 'inactive'])->name('coupon.inactive');
    Route::get('active/{id}', [CouponController::class, 'active'])->name('coupon.active');

    Route::get('/deleted', [CouponController::class, 'deleted'])->name('coupon.deleted');
    Route::get('/restore/{id}', [CouponController::class, 'restore'])->name('coupon.restore');

    Route::get('delete/permanently/{id}', [CouponController::class, 'permanentlyDelete'])->name('coupon.permanently.delete');


});


