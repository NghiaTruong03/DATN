<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index(){
        $this->authorize('admin');
        $account_list = User::all();
        return view('admin.account.index',compact('account_list'));
    }
}
