<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
                        'order_total' => $product->sale_price??$product->price,
                        'order_name' => Auth::user()->name,
                        'order_email' => Auth::user()->email,
                        'order_phone' => Auth::user()->phoneNumber,
                        'order_address' => Auth::user()->address,
                    ])->id;
                    
                        
                    $create_cartDetails = CartDetails::create([
                        'cart_id' => $cart_id,
                        'product_id' => $id,
                        'quantity' => 1,
                        'total' => $product->sale_price??$product->price,
                    ]);
                    
                } else {
                    $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
                    $alreadyHaveProduct = false;
                    $order_total=0;
                    foreach ($cartDetails as $cartDetail) {
                        // Neu mua san pham da co trong gio thi + 1 quantity
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
            //End temp view
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }
    }
    
    public function updateCart(Request $request)
    {   
        $cart = Cart::where('user_id', '=' , Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
        //update quatity 
        foreach($cart->cart_details as $value){
            //kiểm tra kho còn đủ sản phẩm hay không
            if($value->product->product_quantity - $request['qtybutton-'.$value->product_id] <0){
                return redirect()->route('cart')->with('success','Hiện tại kho không đủ sản phẩm, yêu cầu nhập lại số lượng');            
            }else{
                if($value->product->sale_price>0){
                    $total = $request['qtybutton-'.$value->product_id] * $value->product->sale_price;                  
                }else{
                    $total = $request['qtybutton-'.$value->product_id] * $value->product->price;
                }

                $value->update([
                    'quantity'=>$request['qtybutton-'.$value->product_id],
                    'total' => $total, 
                ]);          
            }
            
        }
        
        if($value){
            Session::put('coupon_checked');
            return redirect()->route('cart')->with('success','Cập nhật giỏ hàng thành công');
        }else{
            dd('Cập nhật thất bại');
        }

       

    }
    public function checkCoupon(Request $request){
        if(Session::get('coupon_checked')){
            return redirect()->route('cart')->with('success','Mã giảm giá chỉ áp dụng được 1 lần cho 1 tài khoản');
        }else{
            $coupon = Coupon::where('coupon_code',$request->coupon)->first();  
            if($coupon->coupon_quantity<=0){
                return redirect()->route('cart')->with('success','Mã giảm giá đã hết');
            }else{
                $sale_total = 0;   
                //kiem tra ma giam gia co ton tai hay khong         
                if($coupon){               
                    //lay thong tin san pham tu gio hang
                    $cart = Cart::where('user_id', '=' , Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first()->id;
                    $cart_details = CartDetails::where('cart_id', '=' , $cart)->get();
                    foreach($cart_details as $cart_detail){
                        if($coupon->coupon_type == 0){     
                            if($coupon->coupon_value > $cart_detail->total){
                                // return redirect()->route('cart')->with('success','Mã giảm giá vượt quá giá trị sản phẩm');
                                $sale_total = $cart_detail->total;
                            } else {
                                $sale_total = $cart_detail->total - $coupon->coupon_value;
                                $cart_detail->update([
                                    'total' => $sale_total
                                ]);      
                            }         
                        }else{
                            $sale_total = $cart_detail->total * ($coupon->coupon_value / 100);
                            $cart_detail->update([
                                'total' => $sale_total
                            ]); 
                        }   
                                        
                    }         
                    $coupon->update([
                        'coupon_quantity' => $coupon->coupon_quantity - 1
                    ]); 
                    Session::put('coupon_checked',$coupon->coupon_code);
                    return redirect()->route('cart')->with('success','Áp dụng mã giảm giá thành công');
                }
                else{
                    return redirect()->route('cart')->with('success','Mã giảm giá không tồn tại');
                }
            }
        }
    }

    //Xóa toàn bộ cart
    public function delete()
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
        if ($cart) {
            $cart->delete();
            Session()->forget('coupon_checked');
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
