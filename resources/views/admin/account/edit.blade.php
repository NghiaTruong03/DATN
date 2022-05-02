@extends('admin.master')


@section('content')

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa thông tin tài khoản</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{route('account.edit.user',$user_id)}}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Tên tài khoản</label>
                            <input type="text" class="form-control" name="name" value="{{$user_account->name}}"
                                placeholder="">
                            @error('name')
                            <span style="color: red" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Tài khoản email</label>
                            <input type="email" class="form-control" name="email" value="{{$user_account->email}}"
                                placeholder="">
                            @error('email')
                            <span style="color: red" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phoneNumber"
                                value="{{$user_account->phoneNumber}}" placeholder="">
                            @error('phoneNumber')
                            <span style="color: red" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="input" value="1"
                                    {{($user_account->deleted_at)?'checked':''}}>
                                Khóa
                            </label>
                        </div>
                        <div class="form-check radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="input" value="2"
                                    {{(!$user_account->deleted_at)?'checked':''}}>
                                Hoạt Động
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
