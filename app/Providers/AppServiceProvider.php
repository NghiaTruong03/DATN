<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            //đếm số lượng sản phẩm trong giỏ hàng
            $cart_count_product = 0;
            if(Auth::user()){
                $cart_count = Cart::where('user_id', '=', Auth::user()->id)->where('status','=',config('const.CART.STATUS.DRAFT'))->first();
                // if(count($cart_count->cart_details)){
                if($cart_count){
                    foreach($cart_count->cart_details as $item) {
                        $cart_count_product += $item->quantity;
                    }
                }
            }
            $view->with([
                'all_product' => Product::paginate(7),
                'all_category' => Category::all(),
                'cart_count_product' => $cart_count_product,
            ]);
        });

        Paginator::useBootstrap();

        Schema::defaultStringLength(191); // add: default varchar(191)
    }






}
