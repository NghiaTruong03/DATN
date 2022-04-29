<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index() {
        $banner = Banner::all();
        return view('admin.banner.index',compact('banner'));
    }

    public function create() {
        return view('admin.banner.add');
    }

    public function addBanner(Request $request) {
        $data = $request->all();
        // dd($data);
        if($request->file('banner_img')) {
            $request->file('banner_img')->store('public');
            $data['banner_img'] = $request->file('banner_img')->hashName();
        }else{
            dd("ssss");
        }
        $banner = Banner::create($data);
        if($banner){
            return redirect()->route('banner.index')->with('success','Thêm mới thành công');
        } else {
            dd("Thêm mới thất bại");
        }
        
    }
}
