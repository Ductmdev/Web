@extends('FrontEnd.layouts.master')
@section('title', 'Đơn hàng của tôi')

@section('body')
<!-- Breadcrunb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Trang Chủ</a>
                    <span> Đơn Hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrunb Section End -->
<!-- Shopping Cart Section Begin -->

<div class="shopping-cart spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Mã đơn hàng</th>
                                <th class="p-name">Tên sản phẩm</th>
                                <th>Tổng cộng</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr data-rowid="">
                                <td class="cart-pic first-row">
                                    <img class="pl-5" style="height: 100px;" src="/admin/assets/images/products/{{ $order->orderDetails[0]->product->productImage[0]->path ?? 'DEFAU.JPG' }}" alt="Image">
                                </td>
                                <td class="first-row">{{$order->id}}</td>
                                <td class="cart-title first-row">
                                    <h5>{{ $order->orderDetails[0]->product->name ?? '' }}
                                        @if (count($order->orderDetails) > 1)
                                        (Và {{ count($order->orderDetails) }} sản phẩm khác)
                                        @endif
                                    </h5>
                                </td>
                                <td class="total-price first-row">
                                    {{ number_format(array_sum(array_column($order->orderDetails->toArray(), 'total')), 0, ',', '.') }}₫
                                </td>
                                <td class=" first-row"><a class="btn" href="/account/myorder/detail/{{$order->id}}">Chi tiết</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Shopping Cart Section End -->
    @endsection