@extends('FrontEnd.layouts.master')
@section('title', 'Thanh toán đơn hàng')

@section('body')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="/shop">Cửa hàng</a>
                    <span>Thanh toán đơn hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<div class="checkout-section spad">
    <div class="container">
        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @endif
        <form action="" method="POST" class="checkout-form">
            <div class="row">
                @if (Cart::count() > 0)
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="/account/login" class="content-btn">Nhấn vào đấy để đăng nhập</a>
                    </div>
                    <h4>Chi tiết thanh toán</h4>
                    <div class="row">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                        <div class="col-lg-6">
                            <label for="fir">Tên <span>*</span></label>
                            <input type="text" name="first_name" id="fir" value="{{ Auth::user()->name ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="last">Họ <span>*</span></label>
                            <input type="text" name="last_name" id="last">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun-name">Tên công ty</label>
                            <input type="text" name="company_name" id="cun-name" value="{{ Auth::user()->company_name ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Quốc gia <span>*</span></label>
                            <input type="text" name="country" id="cun" value="{{ Auth::user()->country ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Địa chỉ <span>*</span></label>
                            <input type="text" name="street_address" id="street" class="street-first" value="{{ Auth::user()->street_address ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Mã Zip</label>
                            <input type="text" name="postcode_zip" id="zip" value="{{ Auth::user()->postcode_zip ?? '' }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Thành phố <span>*</span></label>
                            <input type="text" name="town_city" id="town" value="{{ Auth::user()->town_city ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email <span>*</span></label>
                            <input type="text" name="email" id="email" value="{{ Auth::user()->email ?? '' }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone <span>*</span></label>
                            <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}">
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
                        <input type="text" name="" id="" placeholder="Nhập mã phiếu giảm giá của bạn">
                    </div>
                    <div class="place-order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Sản phẩm <span>Tổng tiền</span></li>
                                @foreach ($carts as $cart)
                                <li class="fw-normal">
                                    {{ $cart->name }} x {{ $cart->qty }}
                                    <span>${{ $cart->price * $cart->qty }}</span>
                                </li>
                                @endforeach

                                <li class="fw-normal">Subtotal <span>${{ $subtotal }}</span></li>
                                <li class="total-price">Total <span>${{ $total }}</span></li>
                            </ul>
                            <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Thanh toán sau
                                        <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Thanh toán online
                                        <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Đặt Hàng</button>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="div col-lg-12">
                    <h4>Giỏ hàng của bạn rỗng</h4>
                </div>
                @endif
            </div>
            @csrf
        </form>
    </div>
</div>
<!-- Shopping Cart Section End -->
@endsection