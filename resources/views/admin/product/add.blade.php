@extends('admin.master')

@section('content')

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới danh mục sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{Route('product.store')}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug()"  placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giá</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder=""
                                autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Giá KM</label>
                            <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder=""
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder=""
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="" id="validatedCustomFile">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <img class="img-fluid mb-3" style="width:400px;object-fit:cover" src="" id="previewImage">
                    </div>

                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <select name="category_id" class="custom-select" aria-placeholder="">
                            {{-- <option value="">Chọn danh mục:</option> --}}
                            @foreach ($category as $category_value)
                            <option value="{{$category_value->id}}">{{$category_value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="validationTextarea">Mô tả</label>
                        <textarea class="form-control" name="description" id="" rows="3"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="">Thuộc tính sản phẩm
                        </label>
                        <div class="checkbox">
                            @foreach ($attr_value as $value)
                            <label>{{$value->attr->name}}</label>
                            <label for="">

                                <input type="checkbox" value="{{$value->id}}">
                                <div class="hop_mau" style="background:{{$value->value}}">

                                </div>
                                {{-- {{$value->value}} --}}

                            </label>
                            @endforeach
                        </div>

                        {{-- <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">L</label> --}}
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
    </div>
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
