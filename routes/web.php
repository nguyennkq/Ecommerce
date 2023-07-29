<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/',function(){
//     return view('admin.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::prefix('category')->group(function (){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::match(['get', 'post'], 'add', [CategoryController::class, 'add'])->name('category.add');
    Route::match(['get', 'post'], 'edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');

    Route::get('inactive/{id}',[CategoryController::class, 'inactive'])->name('category.inactive');
    Route::get('active/{id}',[CategoryController::class, 'active'])->name('category.active');

});

Route::prefix('banner')->group(function (){
    Route::get('/', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/deleted', [BannerController::class, 'deleted'])->name('banner.deleted');
    Route::get('/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');

    Route::match(['get', 'post'], 'add', [BannerController::class, 'add'])->name('banner.add');
    Route::match(['get', 'post'], 'edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::get('delete/{id}',[BannerController::class, 'delete'])->name('banner.delete');

    Route::get('inactive/{id}',[BannerController::class, 'inactive'])->name('banner.inactive');
    Route::get('active/{id}',[BannerController::class, 'active'])->name('banner.active');

});

Route::prefix('product')->group(function (){
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::match(['get', 'post'], 'add', [ProductController::class, 'add'])->name('product.add');
    Route::match(['get', 'post'], 'edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('delete/{id}',[ProductController::class, 'delete'])->name('product.delete');

    Route::get('inactive/{id}',[ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('active/{id}',[ProductController::class, 'active'])->name('product.active');

    Route::get('shop', [ProductController::class, 'shop'])->name('shop');

});
 // Route::get('category', 'ListCategory')->name('category.list');
    // Route::get('category/create', 'CreateCategory')->name('category.create');
    // Route::post('category/create', 'StoreCategory')->name('category.store');
