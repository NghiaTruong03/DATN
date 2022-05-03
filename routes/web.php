<?php
//admin
use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttrController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\OrderManageController;

//shop
use App\Http\Controllers\Shop_pages\HomePageController;
use App\Http\Controllers\Shop_pages\UserController;
use App\Http\Controllers\Shop_pages\CartController;
use App\Http\Controllers\Shop_pages\OrderController;
use App\Http\Controllers\Shop_pages\WishlistController;


//<--Admin
Route::middleware(['admin'])->prefix('admin')->group(function () {
         
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    //Quan li danh muc
    Route::resource('category', CategoryController::class);
    //Quan li thuoc tinh
    Route::resource('attr', AttrController::class);
    Route::post('attr-value-add', [AttrController::class, 'addValue'])->name('attr.addValue');
   // Upload
    Route::get('upload_file', [FileController::class, 'index'])->name('product.upload');
    Route::post('upload_file', [Filecontroller::class, 'store']);

   // Quan li nhan hieu
    Route::resource('brand', BrandController::class);

   // Quan li tai khoan
    Route::get('account',[AccountController::class,'index'])->name('account.index');

    //Quan ly banner
    Route::get('banner', [BannerController::class,'index'])->name('banner.index');
    Route::get('banner/create', [BannerController::class,'create'])->name('banner.create');
    Route::post('banner/create', [BannerController::class,'addBanner']);
    Route::get('banner/editBanner/{id}', [BannerController::class,'editBanner'])->name('banner.editBanner');
    Route::post('banner/editBanner/{id}', [BannerController::class,'updateBanner'])->name('banner.updateBanner');
    Route::get('banner/deleteBanner/{id}', [BannerController::class,'deleteBanner'])->name('banner.deleteBanner');
    
    //Quan ly don hang
    Route::get('order', [OrderManageController::class,'index'])->name('order.index');
    Route::get('order.detail/{id}', [OrderManageController::class,'detail'])->name('order.detail');
    Route::post('order.detail/{id}', [OrderManageController::class,'updateOrder'])->name('order.update');
    


    Route::middleware(['role:'.config('const.ROLE.ADMIN')])->group(function () {    
         //Quan li tai khoan
         //user
        Route::get('account.user',[AccountController::class,'indexUser'])->name('account.user.index');
        Route::get('account/edit/user/{id}',[AccountController::class,'editAccount'])->name('account.edit.user');
        Route::put('account/edit/user/{id}',[AccountController::class,'updateAccount'])->name('account.update.user');
        Route::get('account/delete/user/{id}', [AccountController::class, 'deleteAccount'])->name('account.delete.user');


        //staff
        Route::get('account.staff',[AccountController::class,'indexStaff'])->name('account.staff.index');
        Route::get('account/edit/staff/{id}',[AccountController::class,'editAccount'])->name('account.edit.staff');
        Route::put('account/edit/staff/{id}',[AccountController::class,'updateAccount'])->name('account.update.staff');
        Route::get('account/delete/staff/{id}', [AccountController::class, 'deleteAccount'])->name('account.delete.staff');


        
    });
    
    Route::middleware(['role:'.config('const.ROLE.ADMIN').','.config('const.ROLE.WAREHOUSE-STAFF')])->group(function () {    
        //dashboard
        Route::get('/', [HomeController::class, 'index'])->name('admin.index');

        //Quan li san pham
        Route::resource('product', ProductController::class);

        //Quan li danh muc
        Route::resource('category', CategoryController::class);
        //Quan li nhan hieu
        Route::resource('brand', BrandController::class);

        //Quan li thuoc tinh
        Route::resource('attr', AttrController::class);
        Route::post('attr-value-add', [AttrController::class, 'addValue'])->name('attr.addValue');
        
        //Upload anh
        // Route::get('upload_file', [FileController::class, 'index'])->name('product.upload');
        // Route::post('upload_file', [Filecontroller::class, 'store']);

    });

});


Route::get('admin_login', [HomeController::class, 'login'])->name('admin.login');
Route::post('admin_login', [HomeController::class, 'postLogin']);
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
//Admin-->


//<--FE

Route::get('/', [HomePageController::class, 'shopIndex'])->name('shop.index');
Route::get('product.detail/{id}',[HomePageController::class,'productDetail'])->name('product_detail.show');

Route::get('signin', [UserController::class, 'index'])->name('signin.index');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');

route::get('category.select/{id}',[HomePageController::class,'categoryIndex'])->name('category.select');
route::get('brand.select/{id}',[HomePageController::class,'brandIndex'])->name('brand.select');
route::get('search',[HomePageController::class,'getSearch'])->name('search');


Route::middleware(['auth'])->group(function () {
    //route Cart
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('cart/delete', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('cart/delete/product/{id}', [CartController::class, 'deleteCartDetail'])->name('cart.delete.product');

    //route Wishlist
    Route::get('wishlist', [WishlistController::class,'index'])->name('wishlist.index');
    Route::get('add_to_wishlist/{id}', [WishlistController::class,'addWishlist'])->name('add_to_wishlist');
    Route::get('wishlist/delete/product/{id}', [WishlistController::class, 'deleteWishlist'])->name('wishlist.delete.product');

    //route Profile
    Route::get('profile', [UserController::class,'viewProfile'])->name('user.profile');
    Route::get('profile.update.user/{id}', [UserController::class,'updateProfile'])->name('profile.update.user');
    Route::post('profile.update.user/{id}', [UserController::class,'updateProfile'])->name('profile.update.user');

    //route Checkout
    Route::get('checkout', [OrderController::class,'create'])->name('order.create');
    Route::get('checkout.add.order/{id}',[OrderController::class,'store'])->name('checkout.add.order');
    Route::post('checkout.add.order/{id}',[OrderController::class,'store'])->name('checkout.add.order');

});


//FE-->
