<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartDetails;

class HomepageController extends Controller
{
    public function shopIndex(){
        $product = Product::all();
        $banner = Banner::all();
        //san pham moi
        $newProducts = Product::where('status', '1')->orderBy('created_at', 'desc')->take(10)->get();



        $cartDetails = [];
        if (Auth::user()) {
            $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
            if ($cart) {
                $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
            }
        }
        return view('shop_pages.pages.home', compact(['cartDetails', 'newProducts', 'banner']));
    }

    public function productDetail($id){
        $product = Product::find($id);
        $related_product = Product::where('brand_id', '=' , $product->brand_id)->get();
        $child_img = ImgProduct::where('product_id', $id)->get();
        return view('shop_pages.pages.product_detail_variable', compact('product','child_img','related_product'));
    }

    public function categoryIndex($id){
        $product = Product::where('category_id', '=' , $id)->get();
        return view('shop_pages.pages.shop_grid',compact('product'));
    }

    public function brandIndex($id){
        $product = Product::where('brand_id', '=' , $id)->get();
        return view('shop_pages.pages.shop_grid',compact('product'));
    }
    
    public function getSearch(Request $request) {
        $product = Product::where('name','like', '%'.$request->keyword.'%')
                            ->orWhere('price', $request->keyword)
                            ->get();
        return view('shop_pages.pages.shop_grid',compact('product'));
    }
}
