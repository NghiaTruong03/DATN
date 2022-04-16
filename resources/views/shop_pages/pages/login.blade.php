    
    @extends('shop_pages.master')
    @section('content')
    <!-- login area start -->
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active"data-bs-toggle="tab" href="#lg1">
                                <h4>login</h4>
                            </a>
                            <a  data-bs-toggle="tab" href="#lg2">
                                <h4>register</h4>
                            </a>    
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{Route('login')}}" method="POST">
                                            @csrf
                                            <input type="text" name="name" placeholder="Username" />
                                            <input type="password" name="password" placeholder="Password" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                    <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="submit"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{Route('register')}}" method="POST">
                                            @csrf
                                            <input type="text" name="name" placeholder="Username" />
                                            <input type="password" name="password" placeholder="Password" />
                                            <input type="email" name="email" placeholder="Email"  />
                                            <div class="button-box">
                                                <button type="submit"><span>Register</span></button>
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