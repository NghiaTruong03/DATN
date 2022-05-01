@extends('shop_pages.master')
@section('content')
    <!-- account area start -->
    <div class="account-dashboard pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Tài khoản của tôi</a></li>
                            <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Đơn hàng</a></li>
                            {{-- <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Downloads</a></li>
                            <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li> --}}
                            <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Sửa thông tin cá nhân</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade " id="dashboard">
                            {{-- <p>The following addresses will be used on the checkout page by default.</p> --}}
                            <h5 class="billing-address">Thông tin cá nhân</h5>
                            <img class="avatar" src="{{url('storage/'.Auth::user()->avatar)}}" style="" alt="">
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
                            <h4>Đơn hàng</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>THời gian tạo đơn</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                       
                                        @foreach ($cart as $cart_value)
                                        <tr>
                                            <td>{{$cart_value->id}}</td>
                                            <td>{{$cart_value->created_at}}</td>
                                            <td><span class="success">{{$cart_value->status}}</span></td>
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
                                                ₫{{number_format($grand_total,0,',','.')}} cho {{$product_quantity}} sản phẩm 
                                            </td>
                                            
                                            <td><a href="cart.html" class="view">Chi tiết</a></td>
                                        </tr>                                                                             
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade" id="downloads">
                            <h4>Downloads</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shopnovilla - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="danger">Expired</span></td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Organic - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                        {{-- <div class="tab-pane fade" id="address">
                        </div> --}}
                        <div class="tab-pane fade show active" id="account-details">
                            <h3>Sửa thông tin cá nhân </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form method="POST" action="{{route('profile.update.user',['id' => Auth::user()->id])}}" enctype="multipart/form-data">  
                                            @csrf
                                            <div class="default-form-box mb-20">
                                                <label>Ảnh đại diện</label>
                                                <img class="avatar mb-3" src="{{url('storage/'.Auth::user()->avatar)}}" style="" alt="">                                         
                                                <input type="file" name="avatar" value="{{Auth::user()->avatar}}">
                                                @error('avatar')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                                <div class="custom-file">
                                                </div>                                      
                                            <div class="default-form-box mb-20">
                                                <label>Họ tên</label>
                                                <input type="text" name="name" placeholer="Nhập họ tên" value="{{Auth::user()->name}}">
                                                @error('name')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholer="Nhập email" value="{{Auth::user()->email}}">
                                                @error('email')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Số điện thoại</label>
                                                <input type="tel" name="phoneNumber"placeholer="Nhập số điện thoại" value="{{Auth::user()->phoneNumber}}">
                                                @error('phoneNumber')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror    
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="address" placeholer="Nhập địa chỉ" value="{{Auth::user()->address}}">
                                            </div>

                                            {{-- <div class="default-form-box mb-20">
                                                <label>Password</label>
                                                <input type="password" name="user-password">
                                            </div> --}}
                                            {{-- <div class="default-form-box mb-20">
                                                <label>Birthdate</label>
                                                <input type="date" name="birthday">
                                            </div> --}}
                                            <br>
                                            <div class="save_button mt-3">
                                                <button class="btn"
                                                    type="">Lưu<a  href="{{route('profile.update.user',['id' => Auth::user()->id])}}" class="save_button mt-3 btn" type="button"></a>
                                                </button>
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