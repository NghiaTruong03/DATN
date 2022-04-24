<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttrController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;

use App\Http\Controllers\Shop_pages\ShopPageController;
use App\Http\Controllers\Shop_pages\UserController;
use App\Http\Controllers\Shop_pages\CartController;
use App\Http\Controllers\Shop_pages\WishlistController;

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
//<--Admin
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    //Quan li danh muc
    Route::resource('category', CategoryController::class);
    //Quan li thuoc tinh
    Route::resource('attr', AttrController::class);
    Route::post('attr-value-add', [AttrController::class, 'addValue'])->name('attr.addValue');
    //Upload
    Route::get('upload_file', [FileController::class, 'index'])->name('product.upload');
    Route::post('upload_file', [Filecontroller::class, 'store']);
    //Quan li san pham
    Route::resource('product', ProductController::class);

    //Quan li nhan hieu
    Route::resource('brand', BrandController::class);
});
Route::get('admin_login', [HomeController::class, 'login'])->name('admin.login');
Route::post('admin_login', [HomeController::class, 'postLogin']);
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
//Admin-->


//<--FE
Route::get('/', [ShopPageController::class, 'index'])->name('shop.index');
Route::resource('product_detail', ShopPageController::class);

Route::get('signin', [UserController::class, 'index'])->name('signin.index');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');



Route::middleware(['auth'])->group(function () {
    //route Cart
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('cart/delete', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('cart/delete/product/{id}', [CartController::class, 'deleteCartDetail'])->name('cart.delete.product');

    //route Wishlist
    Route::get('wishlist', [WishlistController::class,'index'])->name('wishlist.index');
    Route::get('add_to_wishlist/{id}', [WishlistController::class,'addWishlist'])->name('add_to_wishlist');
    Route::get('wishlist/delete/product/{id}', [WishlistController::class, 'deleteWishlist'])->name('wishlist.delete.product');


});
//FE-->
