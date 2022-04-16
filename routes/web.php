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
Route::middleware(['admin'])->prefix('admin')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    //Quan li danh muc
    Route::resource('category', CategoryController::class);
    //Quan li thuoc tinh
    Route::resource('attr', AttrController::class);
    Route::post('attr-value-add',[AttrController::class,'addValue'])->name('attr.addValue');
    //Upload
    Route::get('upload_file', [FileController::class,'index'])->name('product.upload');
    Route::post('upload_file',[Filecontroller::class,'store']);
    //Quan li san pham
    Route::resource('product', ProductController::class);
   
    //Quan li nhan hieu
    Route::resource('brand', BrandController::class);


});
    Route::get('admin_login', [HomeController::class,'login'])->name('admin.login');
    Route::post('admin_login', [HomeController::class,'postLogin']);
    Route::get('logout',[HomeController::class,'logout'])->name('logout');
//Admin-->


//<--FE
Route::get('/', [ShopPageController::class,'index'])->name('shop.index');
Route::resource('product_detail', ShopPageController::class);

Route::get('signin',[UserController::class,'index'])->name('signin.index');
Route::post('register',[UserController::class,'register'])->name('register');
Route::post('login',[UserController::class,'login'])->name('login');

Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::get('cart',[CartController::class,'index'])->name('cart');
//FE-->
