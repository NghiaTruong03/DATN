@extends('admin.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Danh sách banner</h1>
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

                <a href="{{ route('banner.create') }}" class="btn btn-primary">Thêm mới banner</a>
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Giảm giá</th>
                        <th scope="col">Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($banner as $banner_value)
                      <tr>
                        <th scope="row">{{$banner_value->id}}</th>
                        <td>{{ $banner_value->title }}</td>                
                        <td>
                            <img style="width:100px;height:100px;object-fit:cover;"
                                                        src="{{ url('storage/'.$banner_value->banner_img) }}" alt="">
                        </td>
                        <td>
                          <form id="delete-form-{{$banner_value->id}}" action="{{ route('banner.destroy',$banner_value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-md" href="{{route('banner.edit',$banner_value->id)}}"><i class="nav-icon far fa-edit"></i></a>
                            <button type="button" class="btn btn-md"><i class="nav-icon fas fa-times"  data-toggle="modal" data-target="#modal-delete-{{$banner_value->id}}"></i></button>
                          </form>
                          
                        </td>
                          
                      </tr>
                      <div class="modal fade" id="modal-delete-{{$banner_value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Đồng ý xóa danh mục?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Đóng
                                    </button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{$banner_value->id}}').submit()">Xóa</button>
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