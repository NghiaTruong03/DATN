<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\ProWishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id' , '=' , Auth::user()->id)->first();
        // dd( $wishlist);
        $product_wishlist= [];
        if ($wishlist) {
            
            $product_wishlist = ProWishlist::where('wishlist_id', '=' , $wishlist->id)->get();
        }
        return view('shop_pages.pages.wishlist',compact('product_wishlist'));
    }

    public function addWishList($id) {
        DB::beginTransaction();
        try {
            if (Auth::user()) {
                // dd(Auth::user()->id);
                //Checking if user already have wishlist or not
                
                $wishlist = Wishlist::where('user_id', '=', Auth::user()->id)->first();
            //   dd($wishlist);
                $product = Product::find($id); 
                //if not then create new wishlist 
                if (!$wishlist) {
                    $wishlist_id = Wishlist::create([
                        'user_id' => Auth::user()->id,
                    ])->id; //return id of new wishlist 
                    // dd($wishlist_id);
                    ProWishlist::create([
                        'wishlist_id' => $wishlist_id,
                        'product_id' => $id,
                    ]);
                } else {
                    // $alreadyhaveproduct = true;       
                    ProWishlist::create([
                        "wishlist_id"=> Auth::user()->id,
                        "product_id" => $id,
                    ]);     
                }
                DB::commit();
            }
        } catch (\Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }
        // Wishlist::create([
        //     'user_id' => Auth::user()->id,
        // ]);
        return redirect()->route('shop.index');
    }

    //delete product in wishlist
    public function deleteWishlist($id){
        $product_wishlist = ProWishlist::find($id);
        $product_wishlist->delete();
        return redirect()->route('wishlist.index');
    }
}
