<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartDetails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        //tong so luong don hang
        $current_order = count(Cart::where('status', '!=','1')->get()) *10;
        // $count = count($current_order);
        // dd($count);
        $cart = Cart::where('status','=',config('const.CART.STATUS.DELIVERED'))->get();
        $sales = 0;
        foreach($cart as $cart_value){
            $cart_id = $cart_value->id;
            $cart_details = CartDetails::where('cart_id', '=' , $cart_id)->get();
            foreach($cart_details as $cDetail_value){
                $sales += $cDetail_value->quantity  *   $cDetail_value->total *100;               
            }
         
        }
        //tong so luong user
        $current_user = count(User::all())*10;
        //tong so luong san pham
        $current_product = count(Product::all())*10;
        return view('admin.dashboard',compact('current_user','current_product','current_order','sales'));
    }
    public function login(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('admin.index');
        } else {
            dd('sai thong tin');
        }
    }
    public function logout(){
        Auth::logout();
        return view('admin.login');
    }

}
