<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        return view('admin.product.upload');
    }

    public function store(Request $request){
        // dd($request->file);
        if($request->has("file")){
            $file = $request->file;
            //lay ten file
            $file_name = $file->getClientOriginalName();
            //upload file
            $file->move(base_path('uploads'),$file_name);
            // dd($file_name);  
        }
    }
}
