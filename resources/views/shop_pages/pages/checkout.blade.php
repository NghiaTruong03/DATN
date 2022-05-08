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
                                    </div>
                                    @error('order_name')
                                        <span style="color: red" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
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
                                        <li>Sản phẩm ({{ count($cartDetails) }} sp)</li>
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
                            <button class="btn-hover" style="
                                            background-color: #fb5d5d ;
                                            color: #fff;
                                            display: inline-block;
                                            font-size: 14px;
                                            font-weight: 600;
                                            line-height: 1;
                                            padding: 18px 63px 17px;
                                            text-transform: uppercase;
                                            width:100%;
                                            " type="submit" id='cua-dat-hang'>Đặt hàng</button>
                            {{-- <a type="submit" class="btn-hover" href="{{route('checkout.add.order',['id' => Auth::user()->id])}}">Đặt hàng</a> --}}
                        </div>
                    </div>
                </div>
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
