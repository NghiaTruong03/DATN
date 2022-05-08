<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function create()
    {
        // $cartDetails = [];
        //Lay cart status = 1 cua user
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
        if ($cart) {
            //Lay toan bo cart detail theo cart id
            $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
        }
        return view('shop_pages.pages.checkout', compact('cartDetails'));
    }
    public function checkoutSuccess()
    {
        return view('shop_pages.pages.order_success');
    }

    public function store(Request $request)
    {
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
            'order_phone.size' => 'Số điện thoại phải đủ :size chữ số',
            'order_phone.numeric' => 'Số điện thoại phải ở dạng số',
            'order_address.required' => 'Yêu cầu nhập địa chỉ',
        ];

        $request->validate($rules, $messages);

        try {
            //tim gio hang de lay id
            $cart_id = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first()->id;
            $checkout = Cart::find($cart_id);
            // dd($checkout);
            $checkout->update($request->all());
            $cartDetails = CartDetails::where('cart_id', '=', $cart_id)->get();

            foreach ($cartDetails as $cartDetail) {
                //tim id product duoc mua 
                $product_id = $cartDetail->product->id;
                $product_update = Product::find($product_id);
                //tim tong so luong san pham co trong db
                $product_quantity = $product_update->product_quantity;
                //thuc hien cap nhat san pham con lai trong db sau khi mua hang
                $new_product_qty = $product_quantity - ($cartDetail->quantity);

                $product_update->update([
                    'product_quantity' => $new_product_qty
                ]);
            }
            if ($checkout) {
                $checkout->update([
                    'status' => config('const.CART.STATUS.CONFIRMED')
                ]);
                // dd($request->order_email);
                $send_mail = Mail::to($request->order_email)->send(new mailNotify);
                return redirect()->route('checkout.success');
                // return response()->json([
                //     'status' => true,
                // ]);
            }
        } catch (\Exception $e) {
            Log::debug($e);
        }
    }
}
