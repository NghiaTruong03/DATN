@extends('shop_pages.master')
@section('content')
<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title">Giỏ hàng của bạn</h3>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>{{ session('success') }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                @if (count($cartDetails))
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Số tiền</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @foreach ($cartDetails as $item)
                                @php
                                $total += $item->quantity * $item->product->price;
                                @endphp
                                <tr>
                                    <td class="product-thumbnail">
                                        <img class="img-responsive ml-15px"
                                            src="{{ url('storage/' . $item->product->image) }}" alt="" />
                                    </td>
                                    <td class="product-name">{{ $item->product->name }}</td>
                                    <td class="product-price-cart"><span
                                            class="amount">{{ $item->product->price }}</span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input  class="cart-plus-minus-box" type="text"
                                                name="qtybutton-{{$item->product->id}}" value="{{ $item->quantity }}" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        {{ $item->quantity * $item->product->price }}
                                    </td>
                                    <td class="product-remove">
                                        <a type="button" class="btn btn-md"><i class="nav-icon fa fa-times"
                                                data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"></i></a>
                                        {{-- <button type="button" class="btn btn-md"><i
                                                            class="nav-icon fa fa-times" data-toggle="modal"
                                                            data-target="#modal-delete-{{ $item->id }}"></i></button>
                                        --}}
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Thông báo</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Đồng ý xóa sản phẩm</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Đóng
                                                </button>
                                                <a href="{{ route('cart.delete.product', ['id' => $item->id]) }}"
                                                    type="button" class="btn btn-danger">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{ route('shop.index') }}">Tiếp tục mua hàng</a>
                                </div>
                                <div class="cart-clear">
                                    <button type="submit">Cập nhật giỏ hàng</button>
                                    <a href="{{ route('cart.delete') }}">Xóa đơn hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="cart-tax">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                            </div>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            * Country
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            * Region / State
                                        </label>
                                        <select class="email s-email s-wid">
                                            <option>Bangladesh</option>
                                            <option>Albania</option>
                                            <option>Åland Islands</option>
                                            <option>Afghanistan</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                    <div class="tax-select mb-25px">
                                        <label>
                                            * Zip/Postal Code
                                        </label>
                                        <input type="text" />
                                    </div>
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-lm-30px">
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text" required="" name="name" />
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Tổng</h4>
                            </div>
                            <h5>Tổng giá sản phẩm<span>{{ $total }}</span></h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li><input type="checkbox" /> Standard <span>$20.00</span></li>
                                    <li><input type="checkbox" /> Express <span>$30.00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Tổng thanh toán<span>{{$total}}</span></h4>
                            <a href="{{route('order.create')}}">Mua hàng</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12 pt-50px pb-100px">
                        <div class="empty-text-contant text-center">
                            <i class="pe-7s-cart"></i>
                            <h2>Giỏ hàng hiện tại chưa có sản phẩm!</h2>
                            <a class="empty-cart-btn" href="{{ route("shop.index") }}">
                                <i class="fa fa-arrow-left"> </i> Mua sắm</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
    @endsection
    <script>
        function myFunction() {
            let tokenAmount = document.getElementById("numberInput").value;
            return // whatever you want to do with it
        }

    </script>
