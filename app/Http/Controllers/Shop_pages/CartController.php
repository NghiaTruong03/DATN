<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        return view("shop_pages.pages.cart");
<<<<<<< HEAD
=======
        // return view("shop_pages.pages.cart", compact('cart'));
>>>>>>> d440520 (fix view)
    }

    public function addToCart($id)
    {
        if (Auth::check()) {
            DB::beginTransaction();
            try {
                $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.TEMP'))->first();
                $product = Product::find($id);
                if (!$cart) {
                    // If user dont have temp cart then create
                    $cart_id = Cart::create([
                        'user_id' => Auth::user()->id,
                        'status' => config('const.CART.STATUS.TEMP')
                    ])->id;

<<<<<<< HEAD
        DB::beginTransaction();
        try {
            if (Auth::user()) {
                $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.DRAFT'))->first();
                $product = Product::find($id);
                if (!$cart) {
                    // If user dont have temp cart then create
                    $cart_id = Cart::create([
                        'user_id' => Auth::user()->id,
                        'status' => config('const.CART.STATUS.DRAFT')
                    ])->id;

=======
>>>>>>> 63adff3 (fix bug)
                    CartDetails::create([
                        'cart_id' => $cart_id,
                        'product_id' => $id,
                        'quantity' => 1,
                        'total' => $product->price,
                    ]);
                } else {
                    $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
                    $alreadyHaveProduct = false;
                    foreach ($cartDetails as $cartDetail) {
                        // If user have temp cart and buy a exists product in cart then + 1 quantity
                        if ($cartDetail->product_id == $id) {
                            $data['quantity'] = $cartDetail->quantity + 1;
                            $data['total'] = $product->price * $data['quantity'];
                            $cartDetail->update($data);
                            $alreadyHaveProduct = true;
                            break;
                        }
                    }
                    if ($alreadyHaveProduct == false) {
                        CartDetails::create([
                            'cart_id' => $cart->id,
                            'product_id' => $id,
                            'quantity' => 1,
                            'total' => $product->price,
                        ]);
                    }
                }
                DB::commit();
<<<<<<< HEAD
                //Temp view
                return response()->json([
                    'status' => true,
                    'product_id' => $id
                ]);
            }
            //End temp  view
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
=======
            } catch (\Exception $e) {
                Log::debug($e);
                DB::rollBack();
            }
>>>>>>> 63adff3 (fix bug)
        }
        //Temp view
        return redirect()->route('shop.index');
        //End temp  view

    }
}
