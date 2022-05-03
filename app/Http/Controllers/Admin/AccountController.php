<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function indexUser(){
        $user_list = User::withTrashed()->get();
        // $account_list = User::all();
        return view('admin.account.index',compact('user_list'));
    }

    public function indexStaff(){
        $staff_list = User::all();
        return view('admin.account.staff',compact('staff_list'));
    }
    public function editStaff($id)
    {   
        
        // $user_account = User::where('role','!=','0');   
        // return view('admin.account.edit',compact('user_account'));
    }
    public function editAccount($id)
    {   
        // $user_account = User::find($id);
        // $user_account = User::withTrashed()->where('id', '=' ,$id)->first();
        // dd($user_account->role);
                // if($user_account->role != 0){
        //     $user_id = $id;
        // }else{
            // $user_account = User::withTrashed()->where('id', '=' ,$id)->first();
        //     $user_id= $user_account->id;      
        // }
        $user_account = User::withTrashed()->where('id', '=' ,$id)->first();
        $user_id= $user_account->id;      
        return view('admin.account.edit',compact('user_account','user_id'));
    }


    public function updateAccount(Request $request,$id ){
        $rules = [
            'name' => 'required|unique:users,name,'.$id,
            'email' => 'required|unique:users,email,'.$id,
            'phoneNumber' => 'required|numeric'

        ];

        $messages = [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'phoneNumber.required' => 'Số điện thoại không được để trống',
            'phoneNumber.numeric' => 'Số điện thoại phải ở dạng số'

        ];
        $request->validate($rules,$messages);
        
        // $user_account = User::find($id);
        $user_account = User::withTrashed()->where('id', '=' ,$id)->first();

        //kiem tra tai khoan la khach hang hay nhan vien
        if($user_account->role != 0){
                $user_account->update($request->all());
            return redirect()->route('account.staff.index')->with('success','Cập nhật thành công');
        }else{
            //kiem tra status tu request va thay doi trang thai tai khoan (hoatdong/khoa)
            if($request->status) {
                if($request->status==2){
                     User::withTrashed()->where('id', '=' ,$id)->restore();
                }else{
                     User::withTrashed()->where('id', '=' ,$id)->delete();
                }
             }
             $account_update = User::withTrashed()->where('id', '=' ,$id)->update($request->only('name','phoneNumber','email'));
             return redirect()->route('account.user.index')->with('success','Cập nhật thành công');
        }


       

    }
    
    public function lockAccount($id){
        $delete_user = User::find($id);
        //khi delete voi user($id) thi user do thuc hien update thoi gian tai cot deleted_at
        $delete_user->delete();
        return redirect()->back();
    }

    public function deleteAccount($id){
        $delete_user = User::find($id);
        if(Auth::user()->id == $id || $delete_user->role == 1){
            return redirect()->route('account.staff.index')->with('error','Không thể xóa tài khoản này');
        }else{
            //su dung forceDelete toan bo ban ghi
            $delete_user->forceDelete();
            return redirect()->route('account.staff.index')->with('success','Xóa tài khoản thành công');
            // return redirect()->back();
        }

    }
}
