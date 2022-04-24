<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\AttrValue;
use App\Models\ImgProduct;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_view = Product::all();
        return view('admin.product.index', compact('product_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attr_value = AttrValue::all();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.add', compact('category', 'attr_value', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        //kiểm tra ảnh tồn tại 
        if ($request->file('image')) {
            $request->file('image')->store('public');
            $data['image'] = $request->file('image')->hashName();
        }
        $product = Product::create($data)->id;
        if($product){           
            //Kiểm tra ảnh con có tồn tại không, nếu có thì lưu trữ vào thư mục Storage
            if ($request->file('childrenImg')) {
                foreach (($request->file('childrenImg')) as $value) {
                    $value->store('public');
                    $data['childrenImg'] = $value->hashName();
                    $img_product = ImgProduct::create([
                        'childrenImg' => $data['childrenImg'],
                        'product_id' => $product,
                    ]);
                }
            }
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
        } else {
            dd('Thêm mới thất bại');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_edit = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('product_edit', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_update = Product::find($id);
        // dd($product_update->image);
        $data = $request->all();
        if ($request->file('image')) {
            $file = $request->file('image')->store('public');
            $data['image'] = $request->file('image')->hashName();
            if ($product_update->image) {
                $file_name = $product_update->image;
                Storage::delete('/public/' . $file_name);
            }
            $product_update->update($data);
        }

        if ($product_update) {
            return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
        } else {
            dd('Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        $delete->delete();
        if ($delete) {
            return redirect()->route('product.index')->with('success', 'Xóa thành công');
        } else {
            dd('Xóa thất bại');
        }
    }
}
