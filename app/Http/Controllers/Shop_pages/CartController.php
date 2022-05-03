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
    public function index(){
        $cartDetails = [];
        //Lay cart status = 1 cua user
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
    if ($cart) {
        //Lay toan bo cart detail theo cart id
        $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
    }
    return view("shop_pages.pages.cart", compact('cartDetails'));
    }

    public function addToCart($id) {
        DB::beginTransaction();
        try {
            if (Auth::user()) {
                $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
                $product = Product::find($id);
                if (!$cart) {
                    //Neu tai khoan chua co gio hang thi tao moi
                    $cart_id = Cart::create([
                        'user_id' => Auth::user()->id,
                        'status' => config('const.CART.STATUS.PENDING'),
                        'order_name' => Auth::user()->name,
                        'order_email' => Auth::user()->email,
                        'order_phone' => Auth::user()->phoneNumber,
                        'order_address' => Auth::user()->address,
                    ])->id;
                    
                   
                    $create_cart = CartDetails::create([
                        'cart_id' => $cart_id,
                        'product_id' => $id,
                        'quantity' => 1,
                        'total' => $product->sale_price??$product->price,
                    ]);
                    
                } else {
                    $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
                    $alreadyHaveProduct = false;
                    foreach ($cartDetails as $cartDetail) {
                        // If user have temp cart and buy a exists product in cart then + 1 quantity
                        if ($cartDetail->product_id == $id) {
                            $data['quantity'] = $cartDetail->quantity + 1;
                            $data['total'] = $product->sale_price??$product->price * $data['quantity'];
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
                            'total' => $product->sale_price??$product->price,
                        ]);
                    }
                }
                DB::commit();
                //Temp view
                return response()->json([
                    'status' => true,
                    'product_id' => $id,
                ]);
            }
            //End temp  view
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }
    }
    
    public function updateCart(Request $request)
    {
        $cart = Cart::where('user_id', '=' , Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
        dd($cart->all());
    }

    //Xóa toàn bộ cart
    public function delete()
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
        if ($cart) {
            $cart->delete();
        }
        return redirect()->route('shop.index');
    }

    // Xóa từng sản phẩm trong cart
    public function deleteCartDetail($id)
    {
        $cartDetails = CartDetails::find($id);
        $cartDetails->delete();
        return redirect()->back();
    }
}
