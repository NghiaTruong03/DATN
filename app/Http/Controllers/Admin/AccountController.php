<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index(){
        
        $account_list = User::all();
        return view('admin.account.index',compact('account_list'));
    }

    public function viewProfile(){

    }

    public function editAccount($id)
    {
        $account_edit = User::find($id);
        return view('admin.account.edit',compact('account_edit'));
    }


    public function updateAccount(Request $request,$id ){
        $account_update = User::find($id);
        $account_update->update($request->all());
        if($account_update){
            return redirect()->route('account.index')->with('success','Cập nhật thành công');
        }else{
            dd('Cập nhật thất bại');
        }
    }
    
    public function deleteAccount($id){
        $delete_user = User::find($id);
        $delete_user->delete();
        return redirect()->back();
    }
}
