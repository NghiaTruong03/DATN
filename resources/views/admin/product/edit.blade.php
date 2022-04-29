@extends('admin.master')


@section('content')

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{Route('product.update',$product_edit->id)}}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" value="{{$product_edit->name}}"
                                placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" name="price" value="{{$product_edit->price}}"
                                placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giá KM</label>
                            <input type="text" class="form-control" name="sale_price"
                                value="{{$product_edit->sale_price}}" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="" id="validatedCustomFile">
                            <label class="custom-file-label" for="validatedCustomFile">
                                @if($product_edit->image)
                                {{ $product_edit->image }}
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div><label style="margin-top: 0.5rem;" for="">Ảnh hiện tại:</label></div>
                        @if($product_edit->image)
                        <img style="width:100px;object-fit:cover" src="{{ url('storage/'.$product_edit->image) }}"
                            alt="">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Anh lien quan</label>
                        <input type="file" name="child_img[]" multiple class="" id="">
                        <div>
                            <label for="">Anh cu</label>
                            @if($cImg_edit)
                                @foreach ($cImg_edit as $value)
                                <img style="width:100px;object-fit:cover" src="{{ url('storage/'.$value->child_img) }}">
                                @endforeach
                            @endif
                        </div>
                        
                    </div>

                    <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src="" id="previewImage">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <select name="category_id" class="custom-select" aria-placeholder="">
                            @foreach ($category as $value)
                            <option value="{{$value->id}}" @if ($product_edit->category_id == $value->id)
                                selected
                                @endif >{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên Nhãn hàng</label>
                        <select name="brand_id" class="custom-select">
                            @foreach ($brand as $value)
                            <option value="{{$value->id}}" @if ($product_edit->brand_id == $value->id)
                                selected
                                @endif >{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="validationTextarea">Mô tả</label>
                        <textarea class="form-control" name="description" id="" rows="3"
                            value="">{{ $product_edit->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="input" value="1" checked>
                                Còn hàng
                            </label>
                        </div>
                        <div class="form-check radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="input" value="2">
                                Hết hàng
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
