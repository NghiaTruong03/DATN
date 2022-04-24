@extends('admin.master')
@section('title')
<title>Quản lí nhãn hiệu</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('ss'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>{{session('ss')}}</strong>
                    </div>
                    @endif
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 150px;">Mã nhãn hàng</th>
                                        <th>Tên nhãn hàng</th>
                                        <th>Số sản phẩm thuộc nhãn hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brand as $value )
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{  $value->name }}</td>
                                        <td style="color: red; text-transform:uppercase">Tạm thời NULL</td>
                                        <td> @if ($value->status == 1)
                                            <span class="badge bg-success">Hiện</span>
                                            @else
                                            <span class="badge bg-danger">Ẩn</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('brand.destroy',$value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-md" href="{{route('brand.edit',$value->id)}}"><i
                                                        class="nav-icon far fa-edit"></i></a>
                                                <button type="submit" class="btn btn-md"><i
                                                        class="nav-icon fas fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('brand.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tên nhãn hàng</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="input" value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Hiện
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="input" value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Ẩn
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection