@extends('shop_pages.master')
@section('content')
    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('checkout.add.order', ['id' => Auth::user()->id]) }}"
                        id="cua-form">
                        @csrf
                        <div class="billing-info-wrap">
                            <h3>Thông tin người nhận hàng</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Họ và Tên</label>
                                        <input type="text" name="order_name" value="{{ Auth::user()->name }}" />
                                        @error('order_name')
                                        <span style="color: red" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="order_phone" value="{{ Auth::user()->phoneNumber }}" />
                                        @error('order_phone')
                                            <span style="color: red" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-8">
                                    <div class="billing-info mb-4">
                                        <label>Địa chỉ Email</label>
                                        <input type="email" name="order_email" value="{{ Auth::user()->email }}" />
                                        @error('order_email')
                                            <span style="color: red" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-8">
                                    <div class="billing-info mb-4">
                                        <label>Địa chỉ nhận hàng</label>
                                        <input type="text" name="order_address" value="{{ Auth::user()->address }}" />
                                        @error('order_address')
                                            <span style="color: red" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="additional-info-wrap">
                                <h4>Thông tin thêm</h4>
                                <div class="additional-info">
                                    <label>Lời nhắn</label>
                                    <textarea placeholder="Lưu ý cho người bán..." name="order_note"></textarea>
                                </div>
                            </div>

                        </div>

                </div>

                <div class="col-lg-6 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản phẩm</li>
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
                                                $grand_total += $item->product->sale_price ?? $item->product->price * $item->quantity;
                                            @endphp
                                            <li>
                                                <span class="order-middle-left">{{ $item->product->name }} x
                                                    {{ $item->quantity }}</span>
                                                {{-- <span class="order col-2">x {{$item->quantity}}</span> --}}
                                                <span class="order-price">₫
                                                    {{ $item->product->sale_price ?? $item->product->price * $item->quantity }}</span>
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
                                        <li>{{ $grand_total }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion element-mrg">
                                    <div id="faq" class="panel-group">
                                        <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-1"
                                                        class="collapsed" aria-expanded="true">Direct bank transfer</a>
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
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-2"
                                                        aria-expanded="false" class="collapsed">Check payments</a></h4>
                                            </div>
                                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">

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
                                            <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">

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
                            <button class="btn-hover checkout_btn" type="submit" id='cua-dat-hang'>Đặt hàng</button>
                            <a onclick="document.getElementById('momo_form').submit();" class="payment" name="payUrl"><img src="{{ url('assets/shop_pages/assets') }}/images/logo/momo.png" alt=""></a>
                            <a onclick="document.getElementById('vnpay_form').submit();" class="payment" name="redirect"><img src="{{ url('assets/shop_pages/assets') }}/images/logo/vnpay.png" alt=""></a>
                            {{-- <a type="submit" class="btn-hover" href="{{route('checkout.add.order',['id' => Auth::user()->id])}}">Đặt hàng</a> --}}
                        </div>
                    </div>
                </div>
                </form>
                <form action="{{url('vnpay_payment')}}" method="POST" id="vnpay_form">
                    @csrf
                    <input type="hidden" name="total_vnpay" value="{{$grand_total}}">
                    <input type="hidden" name="redirect" value="redirect">
                    <input type="text" name="order_name" value="{{ Auth::user()->name }}" />
                    <input type="text" name="order_phone" value="{{ Auth::user()->phoneNumber }}" />
                    <input type="text" name="order_email" value="{{ Auth::user()->email }}" />
                    <input type="text" name="order_address" value="{{ Auth::user()->address }}" />
                    <input type="text" name="order_note" value="" />



                    {{-- <button class="btn-hover checkout_btn" type="submit" name="redirect">Thanh toán VNPAY</button> --}}
                </form>
                {{-- <a href="{{route('momo_payment')}}" class="btn-hover checkout_btn" type="submit" name="redirect">MÔMO</a> --}}
                <form action="{{url('momo_payment')}}" method="POST" id="momo_form">
                    @csrf
                    <input type="hidden" name="total_momo" value="{{$grand_total }}" >






                    {{-- <button class="btn-hover checkout_btn" type="submit" name="payUrl">Thanh toán MOMO</button> --}}
                </form>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection
@push('scripts')
    <script>

    </script>
@endpush
