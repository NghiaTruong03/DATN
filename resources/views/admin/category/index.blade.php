@extends('admin.master')

@section('content')



  

  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Danh sách danh mục</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container">
          {{-- <div class="row"> --}}
            {{-- <div class="col-12"> --}}
              @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>{{session('success')}}</strong>
                </div>
              @endif

                <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới danh mục</a>
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Last</th>
                        <th scope="col">Status</th>
                        <th scope="col">Option</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $cate)
                      <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{ $cate->name }}</td>
                        <td>Otto</td>
                        <td>
                            @if ($cate->status == 1)
                            <span class="label label-success">Hiển thị</span>
                            @else
                            <span class="label label-danger">Đang ẩn</span>
                            @endif
                        </td>
                        <td>
                          <form id="delete-form-{{$cate->id}}" action="{{ route('category.destroy',$cate->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-md" href="{{route('category.edit',$cate->id)}}"><i class="nav-icon far fa-edit"></i></a>
                            <button type="button" class="btn btn-md"><i class="nav-icon fas fa-times"  data-toggle="modal" data-target="#modal-delete-{{$cate->id}}"></i></button>
                          </form>
                          
                        </td>
                          
                      </tr>
                      <div class="modal fade" id="modal-delete-{{$cate->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Đồng ý xóa sản phẩm</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Đóng
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{$cate->id}}').submit()">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                      @endforeach
                    </tbody>
                  </table>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    




@endsection