<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use App\Models\User;
use App\Models\Comment;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartDetails;

class HomepageController extends Controller
{
    public function shopIndex(){
        $product = Product::all();
        $banner = Banner::all();
        //san pham moi
        $newProducts = Product::where('status', '1')->orderBy('created_at', 'desc')->take(10)->get();



        $cartDetails = [];
        if (Auth::user()) {
            $cart = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', config('const.CART.STATUS.PENDING'))->first();
            if ($cart) {
                $cartDetails = CartDetails::where('cart_id', '=', $cart->id)->get();
            }
        }
        return view('shop_pages.pages.home', compact(['cartDetails', 'newProducts', 'banner']));
    }
    public function loadComment(Request $request){
        $product_id = $request->product_id;
        dd($request);
        $comment = Comment::where('product_id' , $product_id)->get();
        $output = '';
        foreach($comment as $key =>$value){
            $output.= '
            <div class="review-wrapper">                             
                <div class="single-review">
                        <div class="review-img review-avatar">
                                <img  src="/storage/user_info->user->avatar" alt="" />
                        </div>
                    <div class="review-content">
                        <div class="review-top-wrap">
                            <div class="review-left">
                                <div class="review-name">
                                    <h4>@'.$value->user->name.'</h4>
                                </div>
                            </div>
                            <div class="review-left">
                                
                            </div>
                        </div>
                        <div class="review-bottom comment">
                            <p>
                                @'.$value->content.'                                              
                            </p>
                        </div>
                    </div>
                </div>   
            </div>
            ';
        }
        echo $output;


    }
    public function addComment(Request $request, $id){

        if (Auth::user()) {
            //chua co comment
            $product_id = $id;
            $comments = Comment::create([
                'product_id' => $product_id,
                'user_id' => Auth::user()->id,
                'content' => $request->content
            ]);
             return redirect()->route('product_detail.show',$product_id);


            
        }else{
            dd('Chưa đăng nhập');
        }
    }

    public function deleteComment($id){
        //xoa cmt cua user tuong ung
        $comment = Comment::where('id', '=' , $id);
        if($comment){
            $comment->delete();
            return redirect()->back();
        }
    }

    public function productDetail(Request $request,$id){
        $product = Product::find($id);
        $related_product = Product::where('brand_id', '=' , $product->brand_id)->get();
        $child_img = ImgProduct::where('product_id', $id)->get();
        $comments = Comment::where('product_id' , '=' , $product->id)->get();

        return view('shop_pages.pages.product_detail_variable', compact('product','child_img','related_product','comments'));
    }

    public function categoryIndex($id){
        $product = Product::where('category_id', '=' , $id)->get();
        return view('shop_pages.pages.shop_grid',compact('product'));
    }

    public function brandIndex($id){
        $product = Product::where('brand_id', '=' , $id)->get();
        return view('shop_pages.pages.shop_grid',compact('product'));
    }
    
    public function getSearch(Request $request) {
        $product = Product::where('name','like', '%'.$request->keyword.'%')
                            ->orWhere('price', $request->keyword)
                            ->get();
        return view('shop_pages.pages.shop_grid',compact('product'));
    }
}
