@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng #BK-00{{$cart->id}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <form action="{{ route('order.update',$cart->id) }}" method="POST">
                    @csrf
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                                    <small class="">Tòa Nhà HTC, 238 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy,<br>
                                        Hà Nội, Việt Nam</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <hr>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>DATE</strong><br>
                                    {{ $cart->created_at->format('d/m/Y') }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>INVOICE NO<br></b>
                                #{{ $cart->id }}
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">

                                <address>
                                    <strong>Invoice To</strong><br>
                                    {{ $cart->order_name }}<br>
                                    {{ $cart->order_address }}<br>
                                    {{ $cart->order_phone }}<br>
                                    {{ $cart->order_email }}
                                </address>
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sản phẩm</th>
                                            <th>Mô tả sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($cart_detail as $value)
                                        <tr>
                                            <td>{{ $value->product_id }}</td>
                                            <td>{{ $value->product->name }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td>{{ $value->quantity }}</td>
                                            <td>₫
                                                {{ number_format($value->product->sale_price??$value->product->price,0,',','.') }}
                                            </td>
                                            <td>₫ {{ number_format($value->total,0,',','.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <p class="lead">Lưu Ý:</p>
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    {{ $cart->order_note }}
                                </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:75%">Tổng tiền:</th>
                                            @php
                                            $grand_total = 0;
                                            foreach ($cart_detail as $value) {
                                            $grand_total += $value->total;
                                            }
                                            @endphp
                                            <td>₫ {{ number_format($grand_total,0,',','.') }}</td>
                                        </tr>
                                        {{-- <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr> --}}
                                        <tr>
                                            <th>Phí vận chuyển:</th>
                                            <td>₫ 0.0</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng thanh toán:</th>
                                            <td>₫ {{ number_format($grand_total,0,',','.') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="status">
                                        {{-- <option value="1">Chờ xử lý</option> --}}
                                        <option value="2">Đã xác nhận</option>
                                        <option value="3">Đang vận chuyển</option>
                                        <option value="4">Đã giao hàng</option>
                                        <option value="5">Đã hủy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                  </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection