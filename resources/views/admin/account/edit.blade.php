@extends('admin.master')


@section('content')

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin tài khoản/h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{route('account.edit.user',$account_edit->id)}}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Tên tài khoản</label>
                            <input type="text" class="form-control" name="name" value="{{$account_edit->name}}"
                                placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Tài khoản email</label>
                            <input type="email" class="form-control" name="email" value="{{$account_edit->email}}"
                                placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phoneNumber" value="{{$account_edit->phoneNumber}}"
                                placeholder="">
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <select name="category_id" class="custom-select" aria-placeholder="">
                            @foreach ($category as $value)
                            <option value="{{$value->id}}" @if ($product_edit->category_id == $value->id)
                                selected
                                @endif >{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group">
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
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
