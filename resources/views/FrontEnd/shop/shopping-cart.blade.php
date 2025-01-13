@extends('FrontEnd.layouts.master')
@section('title', 'Giỏ hàng')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Trang trủ</a>
                    <a href="/shop">Cửa hàng</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<div class="shopping-cart spad">
    <div class="container">
        <div class="row">
            @if (Cart::count() > 0)
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>
                                    <i onclick="confirm('Bạn có muốn xóa hết giỏ hàng không ?') === true ? destroyCart() : ''" style="cursor: pointer" class="ti-close"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr data-rowid="{{ $cart->rowId }}">
                                <td class="cart-pic first-row">
                                    @if ($cart->options->images && count($cart->options->images) > 0)
                                    <img style="height: 170px;" src="/admin/assets/images/products/{{ $cart->options->images[0]->path }}" alt="">
                                    @endif
                                </td>
                                <td class="cart-title first-row">
                                    <h5>{{ $cart->name }}</h5>
                                </td>
                                <td class="p-price first-row">${{ number_format($cart->price, 2) }}</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{ $cart->qty }}" data-rowId="{{ $cart->rowId }}">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row">${{ number_format($cart->price * $cart->qty , 2) }}</td>
                                <td class="close-td first-row">
                                    <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-lg-4">                   
                        <div class="discount-coupon">
                            <h6>Discount codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Nhập mã code của bạn">
                                <button class="site-btn coupon-btn" type="submit">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal: <span>${{ $total }}</span></li>
                                <li class="cart-total">Total: <span>${{ $subtotal }}</span></li>
                            </ul>
                            <a href="/checkout" class="proceed-btn">Tiến hành thanh toán</a>
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
    </div>
</div>
<!-- Shopping Cart Section End -->

@endsection