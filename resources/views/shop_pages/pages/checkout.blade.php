@extends('shop_pages.master')
@section('content')
    
    
    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <form method="POST" action="{{route('checkout.add.order',['id' => Auth::user()->id])}}">
                @csrf
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Thông tin người nhận hàng</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Họ và Tên</label>
                                        <input type="text" name="order_name" value="{{Auth::user()->name}}"/>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="order_phone" value="{{Auth::user()->phoneNumber}}" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-8">
                                    <div class="billing-info mb-4">
                                        <label>Địa chỉ Email</label>
                                        <input type="email" name="order_email" value="{{Auth::user()->email}}"/>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-8">
                                    <div class="billing-info mb-4">
                                        <label>Địa chỉ nhận hàng</label>
                                        <input type="text" name="order_address" value="{{Auth::user()->address}}" />
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Last Name</label>
                                        <input type="text" />
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Company Name</label>
                                        <input type="text" />
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <div class="billing-select mb-4">
                                        <label>Country</label>
                                        <select>
                                            <option>Select a country</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Street Address</label>
                                        <input class="billing-address" placeholder="House number and street name"
                                            type="text" />
                                        <input placeholder="Apartment, suite, unit etc." type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Town / City</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>State / County</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Postcode / ZIP</label>
                                        <input type="text" />
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="checkout-account mb-30px">
                                <input class="checkout-toggle2 w-auto h-auto" type="checkbox" />
                                <label>Create an account?</label>
                            </div>
                            <div class="checkout-account-toggle open-toggle2 mb-30">
                                <input placeholder="Email address" type="email" />
                                <input placeholder="Password" type="password" />
                                <button class="btn-hover checkout-btn" type="submit">register</button>
                            </div> --}}
                            <div class="additional-info-wrap">
                                <h4>Thông tin thêm</h4>
                                <div class="additional-info">
                                    <label>Lời nhắn</label>
                                    <textarea placeholder="Lưu ý cho người bán..."
                                        name="order_note"></textarea>
                                </div>
                            </div>
                            {{-- <div class="checkout-account mt-25">
                                <input class="checkout-toggle w-auto h-auto" type="checkbox" />
                                <label>Ship to a different address?</label>
                            </div>
                            <div class="different-address open-toggle mt-30px">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>First Name</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Last Name</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Company Name</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-select mb-4">
                                            <label>Country</label>
                                            <select>
                                                <option>Select a country</option>
                                                <option>Azerbaijan</option>
                                                <option>Bahamas</option>
                                                <option>Bahrain</option>
                                                <option>Bangladesh</option>
                                                <option>Barbados</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Street Address</label>
                                            <input class="billing-address" placeholder="House number and street name"
                                                type="text" />
                                            <input placeholder="Apartment, suite, unit etc." type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Town / City</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>State / County</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Postcode / ZIP</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Phone</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Email Address</label>
                                            <input type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Sản phẩm ({{count($cartDetails)}} sp)</li>
                                            <li>Tổng</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @php
                                                $grand_total = 0;
                                            @endphp
                                            
                                            @foreach ($cartDetails as $item) 
                                                @php
                                                    $grand_total += $item->product->price * $item->quantity;
                                                @endphp                                                                                
                                                <li>
                                                    <span class="order-middle-left">{{$item->product->name}}</span> <span
                                                        class="order-price">{{$item->product->price}} VNĐ</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Phí vận chuyển</li>
                                            <li>Free shipping</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Tổng thanh toán</li>
                                            <li>{{$grand_total}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div id="faq" class="panel-group">
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-1" class="collapsed"
                                                            aria-expanded="true">Direct bank transfer</a>
                                                    </h4>
                                                </div>
                                                <div id="my-account-1" class="panel-collapse collapse show"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-2" aria-expanded="false"
                                                            class="collapsed">Check payments</a></h4>
                                                </div>
                                                <div id="my-account-2" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default single-my-account m-0">
                                                <div class="panel-heading my-account-title">
                                                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                            href="#my-account-3">Cash on delivery</a></h4>
                                                </div>
                                                <div id="my-account-3" class="panel-collapse collapse"
                                                    data-bs-parent="#faq">

                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town,
                                                            Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <a type="submit" class="btn-hover" href="{{route('checkout.add.order',['id' => Auth::user()->id])}}">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- checkout area end -->

    @endsection