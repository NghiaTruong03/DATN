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
                                            <input type="text" name="email" placeholder="Email" />
                                                @error('email')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror
                                            <input type="password" name="password" placeholder="Mật khẩu" />
                                                @error('password')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                                @enderror
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
                                                {{-- @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif --}}
                                            <input type="email" name="email" value="{{old('email')}}" placeholder="Email đăng nhập" />
                                            @error('email')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            <input type="text" name="name" value="{{old('name')}}"  placeholder="Họ Tên" />
                                            @error('name')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            <input type="password" name="password" placeholder="Mật khẩu" />
                                            @error('password')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            <input type="tel" name="phoneNumber" value="{{old('phoneNumber')}}" placeholder="Số điện thoại" />
                                            @error('phoneNumber')
                                                <span style="color: red" role="alert">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            <div class="button-box mt-5">
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
