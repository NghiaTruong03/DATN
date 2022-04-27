<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('admin.index');
        } else {
            dd('sai thong tin');
        }
    }
    public function logout(){
        Auth::logout();
        return view('admin.login');
    }

}
