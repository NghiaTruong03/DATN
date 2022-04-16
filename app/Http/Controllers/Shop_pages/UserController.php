<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('shop_pages.pages.login');
    }


    public function register(Request $request){
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0,
        ]);
    }

    public function login(Request $request){
        // dd($request->all());
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 0])){
        //     return redirect()->route('shop_pages.index');
        // }
        
        if(Auth::attempt($request->only('name','password'))){
            return redirect()->route('shop.index');
        }else{
            dd('sai thong tin');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
