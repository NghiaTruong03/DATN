@extends('admin.master')

@section('content')

<div class="content-wrapper">

    <section class="content-main" style="max-width:920px; margin: 0 auto;">
        <div class="content-header">
            <h2 class="content-title">Thêm sản phẩm</h2>
        </div>
        <form action="{{Route('product.store')}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h6>1. Thông tin chung</h6>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-4">
                                <label class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Tên danh mục</label>
                                        <select name="category_id" class="custom-select">
                                            @foreach ($category as $category_value)
                                            <option value="{{$category_value->id}}">{{$category_value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Tên nhãn hàng</label>
                                    <select name="brand_id" class="custom-select">
                                        @foreach ($brand as $brand_value)
                                        <option value="{{$brand_value->id}}">{{$brand_value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div> <!-- col.// -->
                    </div> <!-- row.// -->

                    <hr class="mb-4 mt-0">

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h6>2. Giá</h6>
                        </div>
                        <div class="col-md-9">
                            <div class="row" style="">
                                <div class="col-6" style="">
                                    <label class="form-label">Cost in VNĐ</label>
                                    <input type="text" placeholder="" class="form-control" name="price">
                                </div>
                                <div class="col-6" style="">
                                    <label class="form-label">Sale</label>
                                    <input type="text" placeholder="" class="form-control" name="sale_price">
                                </div>
                            </div>
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->

                    <hr class="mb-4 mt-0">

                    {{-- <div class="row">
                        <div class="col-md-3">
                            <h6>3. Danh mục</h6>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-4">
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" checked="" name="mycategory" type="radio">
                                    <span class="form-check-label"> Clothes </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Electronics </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Sports </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Automobiles </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Home interior </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Smartphones </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Books </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Kids item </span>
                                </label>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio">
                                    <span class="form-check-label"> Others </span>
                                </label>
                            </div>
                        </div> 
                    </div> 

                    <hr class="mb-4 mt-0"> --}}
                    

                    <div class="row">
                        <div class="col-md-3">
                            <h6>4. Media</h6>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-4">
                                <div class="form-group">
                                    <label for="">Ảnh sản phẩm</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                    <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src="" id="previewImage">
                                </div>
                                {{-- <input type="file" name="image" class="" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label> --}}
                            </div>

                        </div> <!-- col.// -->
                    </div> <!-- .row end// -->
                    <hr class="mb-4 mt-0">
                    <div class="row">
                        <div class="col-md-3">
                            <h6>5. Mô tả</h6>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-4">
                                <textarea name="description" id="editor1" rows="10" cols="80" >
                                    This is my textarea to be replaced with CKEditor 4.
                                </textarea>
                            </div>
                        </div> <!-- col.// -->
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
                                <input type="radio" class="form-check-input" name="status" id="input" value="0">
                                Hết hàng
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div> <!-- card end// -->
        </form>
    </section>
    <!-- Content Header (Page header) -->

</div>









<script>
    function ChangeToSlug() {
        var title, slug;

        //Lấy text từ thẻ input title 
        title = document.getElementById("name").value;

        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }

</script>
@endsection
