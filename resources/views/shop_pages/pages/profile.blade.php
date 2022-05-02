@extends('shop_pages.master')
@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Shop</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Account</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->
<!-- account area start -->
<div class="account-dashboard pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Tài khoản của tôi</a></li>
                        <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Lịch sử mua hàng</a></li>
                        {{-- <li><a href="#address" data-bs-toggle="tab" class="nav-link">Địa chỉ</a></li> --}}
                        <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Sửa thông tin</a></li>
                        <li><a href="#change-password" data-bs-toggle="tab" class="nav-link">Đổi mật khẩu</a></li>
                        {{-- <li><a href="#" class="nav-link">Đăng xuất</a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active" id="dashboard">
                        {{-- <p>The following addresses will be used on the checkout page by default.</p> --}}
                        <h5 class="billing-address">Thông tin cá nhân</h5>
                        <p class="mb-2"><strong>{{Auth::user()->name}}</strong></p>
                        <address>
                            <span class="mb-1 d-inline-block"><strong>Email:</strong>{{Auth::user()->email}}</span>,
                            <br>
                            <span class="mb-1 d-inline-block"><strong>SĐT:</strong>{{Auth::user()->phoneNumber}}</span>,
                            <br>
                            <span class="mb-1 d-inline-block"><strong>Địa chỉ:</strong>{{Auth::user()->address}}</span>,
                            <br>
                            <span><strong>Quốc gia:</strong> Việt Nam</span>
                        </address>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Đơn hàng</th>
                                        <th>Ngày</th>
                                        <th>Địa chỉ</th>
                                        <th>Giá trị đơn hàng</th>
                                        <th>Tình trạng đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $cart_value)
                                    {{-- chi lay cac ban ghi don hang da mua --}}
                                    @if($cart_value->status!=1)
                                    <tr>
                                        <td>{{$cart_value->id}}</td>
                                        <td>{{$cart_value->created_at->format('d/m/Y')}}</td>
                                        <td><span class="success">{{$cart_value->order_address}}</span></td>
                                        @php
                                            $grand_total = 0;
                                            $product_quantity = 0;
                                            foreach ($cartDetails as $item)
                                            if($cart_value->id == $item->cart_id){
                                                $grand_total += $item->product->price * $item->quantity;
                                                $product_quantity += $item->quantity;
                                            }
                                        @endphp
                                        <td>
                                            ₫{{number_format($grand_total,0,',','.')}} cho {{$product_quantity}} sản
                                            phẩm
                                        </td>
                                        <td><span class="success">{{$cart_value->status}}</span></td>
                                        {{-- <td><a href="cart.html" class="view">Chi tiết</a></td> --}}
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="tab-pane" id="address">
                        <p>Địa chỉ này sẽ được sử dụng làm địa chỉ mặc định khi thanh toán</p>
                        <h5 class="billing-address">{{Auth::user()->name}}</h5>
                        <address>
                            <span class="mb-1 d-inline-block"><strong>Địa chỉ: </strong>{{Auth::user()->address}}</span>,
                            <br>
                            <span class="mb-1 d-inline-block"><strong>SĐT: </strong>{{Auth::user()->phoneNumber}}</span>,
                            <br>
                            <span><strong>Email: </strong>{{Auth::user()->email}}</span>
                        </address>
                    </div> --}}
                    <div class="tab-pane fade" id="account-details">
                        <h3>Sửa thông tin cá nhân</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form method="POST" action="{{route('profile.update.user',['id' => Auth::user()->id])}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="default-form-box mb-20">
                                                    <label>Họ tên</label>
                                                    <input type="text" name="name" placeholer="Nhập họ tên" value="{{Auth::user()->name}}">
                                                    @error('name')
                                                        <span style="color: red" role="alert">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Email</label>
                                                    <input type="email" name="email" placeholer="Nhập email" value="{{Auth::user()->email}}">
                                                    @error('email')
                                                        <span style="color: red" role="alert">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Số điện thoại</label>
                                                    <input type="tel" name="phoneNumber" placeholer="Nhập số điện thoại" value="{{Auth::user()->phoneNumber}}">
                                                    @error('phoneNumber')
                                                    <span style="color: red" role="alert">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" name="address" placeholer="Nhập địa chỉ" value="{{Auth::user()->address}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ảnh đại diện</label>
                                                <img class="avatar mb-3" src="{{url('storage/'.Auth::user()->avatar)}}"
                                                    style="" alt="">
                                                <br>
                                                <label>Chọn file</label>
                                                <input type="file" name="avatar" value="{{Auth::user()->avatar}}">
                                                @error('avatar')
                                                <span style="color: red" role="alert">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="save_button mt-3">
                                            <button class="btn" type="submit">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="change-password">
                        <h3>Đổi mật khẩu</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form method="POST" action="{{route('profile.update.user',['id' => Auth::user()->id])}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                                                <div class="default-form-box mb-20">
                                                    <label>Mật khẩu cũ *</label>
                                                    <input type="password" name="" placeholder="Mật khẩu cũ">
                                                    {{-- @error('')
                                                        <span style="color: red" role="alert">{{$message}}</span>
                                                    @enderror --}}
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Mật khẩu mới *</label>
                                                    <input type="password" name="" placeholder="Mật khẩu mới">
                                                    {{-- @error('')
                                                        <span style="color: red" role="alert">{{$message}}</span>
                                                    @enderror --}}
                                                </div>
                                                <div class="default-form-box mb-20">
                                                    <label>Xác nhận lại mật khẩu *</label>
                                                    <input type="password" name="" placeholder="Xác nhận lại mật khẩu">
                                                    {{-- @error('')
                                                    <span style="color: red" role="alert">{{$message}}</span>
                                                    @enderror --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="save_button mt-3">
                                            <button class="btn" type="submit">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- account area start -->
@endsection
