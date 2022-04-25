<?php

namespace App\Http\Controllers\Shop_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('shop_pages.pages.login');
    }


    public function register(Request $request){
        // dd($request->all());
        $create_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber,
            'role' => 0,
        ]);
        
        if($create_user){
            return redirect()->route('signin.index')->with('success', 'Đăng kí thành công');
        }else{
            dd('dang ki that bai');
        }
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
