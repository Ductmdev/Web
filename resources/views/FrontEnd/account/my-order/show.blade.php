@extends('FrontEnd.layouts.master')
@section('title', 'Đơn hàng của tôi')

@section('body')
<!-- Breadcrunb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.html"><i class="fa fa-home"></i> Trang Chủ</a>
                    <span>Đơn hàng của tôi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrunb Section End -->
<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
    <div class="container">
        <form action="/account/myorder/cancel/{{$order->id}}" method="POST" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="/" class="content-btn">Mã Đơn Hàng : <b>{{ $order->id }}</b></a>
                    </div>
                    <h4>Thông Tin Đơn Hàng</h4>
                    <div class="row">
                        <input type="hidden" id="user_id" name="user_id" value="{{ $order->id ?? '' }}">
                        <div class="col-lg-6">
                            <label for="fir">Tên <span>*</span></label>
                            <input type="text" name="first_name" id="fir" value="{{ $order->first_name ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="last">Họ <span>*</span></label>
                            <input type="text" name="last_name" id="last" value="{{ $order->last_name ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun-name">Tên công ty</label>
                            <input type="text" name="company_name" id="cun-name" value="{{ $order->company_name ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Quốc gia <span>*</span></label>
                            <input type="text" name="country" id="cun" value="{{ $order->country ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Địa chỉ <span>*</span></label>
                            <input type="text" name="street_address" id="street" class="street-first" value="{{ $order->street_address ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Mã Zip</label>
                            <input type="text" name="postcode_zip" id="zip" value="{{ $order->postcode_zip ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Thành phố <span>*</span></label>
                            <input type="text" name="town_city" id="town" value="{{ $order->town_city ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email <span>*</span></label>
                            <input type="text" name="email" id="email" value="{{ $order->email ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone <span>*</span></label>
                            <input type="text" name="phone" id="phone" value="{{ $order->phone ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">Create an account ?
                                    <input type="checkbox" name="" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="/" class="content-btn">Trạng thái đơn hàng :
                            <b>{{ \App\Utilities\Constant::$order_status[$order->status] ?? '' }}</b></a>
                    </div>
                    <div class="place-order">
                        <h4>Đơn Hàng Của Bạn </h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Sản phẩm<span>Tất cả</span></li>
                                @foreach ($order->orderDetails as $orderDetail)
                                <li class="fw-normal">{{ $orderDetail->product->name }} x {{ $orderDetail->qty }}
                                    <span>{{ number_format($orderDetail->total, 0, ',', '.') }} ₫ </span>
                                </li>
                                @endforeach

                                <li class="total-price">tất cả
                                    <span>{{ number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')), 0, ',', '.') }}
                                        ₫</span>

                                </li>
                            </ul>
                            <div class="payment-check">
                                <div class="pc-item">
                                    <label class="pc-check">
                                        Thanh toán khi nhận hàng
                                        <input type="radio" name="payment_type" value="pay_later" id="pc-check" {{ $order->payment_type == 'pay_later' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Thanh toán với VNPAY
                                        <input type="radio" name="payment_type" value="online_payment" id="pc-paypal" {{ $order->payment_type == 'online_payment' ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            @if($order->status == 1 or $order->status == 4)
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-order">Cancel Order</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<!-- Shopping Cart Section End -->
@endsection