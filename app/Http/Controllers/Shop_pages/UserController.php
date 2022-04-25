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
        $rules = [
            'name' => 'required|max:30',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|min:8|max:20',
            'phoneNumber' => 'nullable|size:10',
        ];

        $messages = [
            'name.required' => 'Yêu cầu nhập họ tên',
            'name.max' => 'Tên không được nhập quá :max kí tự',
            'email.required' => 'Yêu cầu nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.min'=> 'Mật khẩu phải từ :min đến :max kí tự',
            'phoneNumber.size' => 'Số điện thoại phải đủ :size kí tự'
        ];

        $request->validate($rules,$messages);

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
        
        $rules = [
                'email' => 'required|email:rfc,dns',
                'password' => 'required|min:8',
        ];

        $messages = [
                'email.required' => 'Yêu cầu nhập email',
                'password.required' => 'Yêu cầu nhập mật khẩu',
                'password.min'=> 'Mật khẩu phải từ :min đến :max kí tự',
        ];
        $request->validate($rules,$messages);

        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('shop.index');
        }else{
            dd('Sai thông tin đăng nhập');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
