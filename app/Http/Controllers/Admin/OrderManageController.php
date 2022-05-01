<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\User;


class OrderManageController extends Controller
{
    public function index() {
        $cart = Cart::all();
        $cart_detail = CartDetails::all();
        return view('admin.order.index',compact('cart','cart_detail'));
    }
}
