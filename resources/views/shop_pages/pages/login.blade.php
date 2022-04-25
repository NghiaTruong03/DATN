    
    @extends('shop_pages.master')
    @section('content')
    <!-- login area start -->
    @if (session('alert'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>{{ session('alert') }}</strong>
                            </div>
     @endif
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a data-bs-toggle="tab" href="#lg1">
                                <h4>đăng nhập</h4>
                            </a>
                            <a class="active" data-bs-toggle="tab" href="#lg2">
                                <h4>đăng ký</h4>
                            </a>                              
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane ">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{Route('login')}}" method="POST">
                                            @csrf
                                            <input type="text" name="name" placeholder="Tài khoản" />
                                            <input type="password" name="password" placeholder="Mật khẩu" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                    <a class="flote-none" href="javascript:void(0)">Ghi nhớ</a>
                                                    <a href="#">Quên mật khẩu?</a>
                                                </div>
                                                <button type="submit"><span>Đăng nhập</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{Route('register')}}" method="POST">
                                            @csrf
                                            
                                            <input type="email" name="email" placeholder="Email đăng nhập"  />
                                            <input type="text" name="name" placeholder="Họ Tên" />
                                            <input type="password" name="password" placeholder="Mật khẩu" />                                           
                                            <input type="number" name="phoneNumber" placeholder="Số điện thoại"  />
                                            <div class="button-box">
                                                <button type="submit"><span>Đăng kí</span></button>
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
    <!-- login area end -->
    @endsection