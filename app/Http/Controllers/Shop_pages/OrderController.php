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
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
        if ($cart) {
        //Lay toan bo cart detail theo cart id
        $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
        }
        return view('shop_pages.pages.checkout',compact('cartDetails'));
    }

    public function store(Request $request, $id){
        
        $rules = [
            'order_name' => 'required|max:30',
            'order_email' => 'required|email:rfc,dns',
            'order_phone' => 'required|numeric',
            'order_address' => 'required',
        ];

        $messages = [
            'order_name.required' => 'Yêu cầu nhập họ tên',
            'order_name.max' => 'Tên không được nhập quá :max kí tự',
            'order_email.required' => 'Yêu cầu nhập email',
            'order_phone.required' => 'Yêu cầu nhập số điện thoại',
            'order_phone.size' => 'Số điện thoại phải đủ :size kí tự',
            'order_phone.numeric' => 'Số điện thoại phải ở dạng số',
            'order_address.required' => 'Yêu cầu nhập địa chỉ',
        ];

        $request->validate($rules,$messages);

        try{
            //tim gio hang de lay id
            $cart_id = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first()->id;
            $checkout = Cart::find($cart_id);
            // dd($checkout);
            $checkout->update($request->all());
            
            if($checkout){
                $checkout->update([
                    'status' => config('const.CART.STATUS.CONFIRMED')
                ]);
                return view('shop_pages.pages.order_success');
            }
            
        }catch (\Exception $e) {
            Log::debug($e);
        }
    }
}
