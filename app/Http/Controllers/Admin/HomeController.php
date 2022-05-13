<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        //tong so luong don hang
        // $category = Category::all();
        // foreach($category as $category_value){
        //     $product_chart = Product::where('category_id', '=' , $category_value->id)->get();
            // dump(count($product_chart));
            // foreach($product_chart as $value){
            //     count($value->id);
            // }
        // }
        // die();
        $current_order = count(Cart::where('status', '!=','1')->get()) *10;
        // $count = count($current_order);
        $cart = Cart::where('status','=',config('const.CART.STATUS.DELIVERED'))->get();
        $revenue = 0;
        foreach($cart as $cart_value){
            $cart_id = $cart_value->id;
            $cart_details = CartDetails::where('cart_id', '=' , $cart_id)->get();
            foreach($cart_details as $cDetail_value){
                $revenue += $cDetail_value->total;               
            }
        } 
        //tong so luong user
        $current_user = count(User::all())*10;
        //tong so luong san pham
        $current_product = count(Product::all())*10;
        return view('admin.dashboard',compact('current_user','current_product','current_order','revenue'));
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
