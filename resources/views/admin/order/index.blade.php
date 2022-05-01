@extends('admin.master')
@section('title')
    <title>Quản lí đơn hàng</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách đơn hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">datatble</li>
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
                        {{-- <a href="{{ Route('product.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a> --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thời gian tạo</th>
                                            <th>Tên người dùng</th>
                                            <th>Số điện thoại</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Chi tiết</th>
                                            {{-- @cannot('merchandiser') --}}
                                            {{-- <th>Thao tác</th> --}}
                                            {{-- @endcannot --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $cart_value)
                                            <tr>
                                                <td style="width: 50px">{{ $cart_value->id }}</td>
                                                <td>{{ $cart_value->created_at->format('d/m/Y') }}</td>
                                                <td>{{$cart_value->order_name}}</td>
                                                <td>{{$cart_value->order_phone}}</td>
                                                  <td>
                                                   @php
                                                    $grand_total = 0; 
                                                    foreach($cart_detail as $cart_detail_value)
                                                        if($cart_detail_value->cart_id == $cart_value->id){ 
                                                            $grand_total += $cart_detail_value->product->price * $cart_detail_value->quantity;
                                                        }
                                                    @endphp
                                                    ₫ {{number_format($grand_total,0,',','.')}}
                                                </td>
                                                <td>{{ $cart_value->status }}</td>
                                                <td> Chua xong </td>
                                                {{-- <td>{{ $product_value->brand->name }}</td>
                                                <td>
                                                    @if ($product_value->status == 1)
                                                        <span class="badge bg-success">Còn hàng</span>
                                                    @else
                                                        <span class="badge bg-danger">Hết hàng</span>
                                                    @endif
                                                </td>
                                                @cannot('merchandiser')
                                                <td>
                                                
                                                        
                                                    
                                                    <form id="delete-form-{{ $product_value->id }}"
                                                        action="{{ route('product.destroy', $product_value->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-md"
                                                            href="{{ route('product.edit', $product_value->id) }}"><i
                                                                class="nav-icon far fa-edit"></i></a>

                                                        <button type="button" class="btn btn-md"><i
                                                                class="nav-icon fas fa-times" data-toggle="modal"
                                                                data-target="#modal-delete-{{ $product_value->id }}"></i></button>
                                                    </form>
                                                   
                                                </td>
                                                @endcannot --}}

                                            </tr>
                                            {{-- <div class="modal fade" id="modal-delete-{{ $product_value->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Thông báo</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Đồng ý xóa sản phẩm</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                                Đóng
                                                            </button>
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="event.preventDefault();document.getElementById('delete-form-{{ $product_value->id }}').submit()">Xóa</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endforeach

                                    </tbody>
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






    {{-- Modal --}}

    <!-- /.card -->
@endsection
