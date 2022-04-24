@extends('admin.master')

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
                        <li class="breadcrumb-item"><a href="{{ Route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $cate)
                                    <tr>
                                        <td>{{ $cate->id }}</td>
                                        <td>{{ $cate->name }}</td>
                                        <td>
                                            @if ($cate->status == 1)
                                            <span class="label label-success">Hiển thị</span>
                                            @else
                                            <span class="label label-danger">Đang ẩn</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('category.destroy',$cate->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-md" href="{{route('category.edit',$cate->id)}}"><i
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
                  </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ Route('category.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Điên tên danh mục" name="name">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="input" value="1"
                                            checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="input" value="2">
                                        <label class="form-check-label" for="exampleRadios2">Ẩn</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-block bg-gradient-primary btn-md">Thêm danh
                                            mục</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                
                {{-- <div class="col-3">
                      <div class="card">
                          <div class="card-body">
                              
                          </div>
                      </div>
                  </div> --}}
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->







@endsection
