<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function create(){
        // $cartDetails = [];
        //Lay cart status = 1 cua user
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.DRAFT'))->first();
        if ($cart) {
        //Lay toan bo cart detail theo cart id
        $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
        }
        return view('shop_pages.pages.checkout',compact('cartDetails'));
    }

    public function store(Request $request, $id){
        //Lấy thông tin cart theo user id
        // $cart = Cart::where('user_id', '=' , Auth::user()->id)->get();
        // dd($cart->all());
        // dd($request->all()); 
        // $cart_id
        try{
            //tim gio hang de lay id
            $cart_id = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.DRAFT'))->first()->id;
            $checkout = Cart::find($cart_id);
            // dd($checkout);
            $checkout->update($request->all());
            
            if($checkout){
                return view('shop_pages.pages.order_success');
            }
            
        }catch (\Exception $e) {
            Log::debug($e);
        }
    }
}
