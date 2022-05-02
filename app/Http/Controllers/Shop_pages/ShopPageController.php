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

class ShopPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $banner = Banner::all();
        //san pham moi
        $newProducts = Product::where('status', '1')->orderBy('created_at', 'desc')->take(10)->get();

        // $cart_count_product = 0;
        // if(Auth::user()){
        //     $cart_count = Cart::where('user_id', '=', Auth::user()->id)->where('status','=',config('const.CART.STATUS.PENDING'))->first();

        //     if(count($cart_count->cart_details)){
        //         foreach($cart_count->cart_details as $item) {
        //             $cart_count_product += $item->quantity;
        //         }
        //     }
        // }


        // $products_categories = Product::where('category_id', $category->id)->get();

        $cartDetails = [];
        if (Auth::user()) {
            $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
            if ($cart) {
                $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
            }
        }
        return view('shop_pages.pages.home', compact(['cartDetails', 'newProducts', 'banner']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $child_img = ImgProduct::where('product_id', $id)->get();
        // dd($product);
        return view('shop_pages.pages.product_detail_variable', compact('product','child_img'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}