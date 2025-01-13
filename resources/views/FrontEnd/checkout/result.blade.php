@extends('FrontEnd.layouts.master')
@section('title', 'Thành Công')

@section('body')
<!-- Breadcrumb section begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="shop.html">Shop</a>
                    <span>Checkout</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb section end -->
<!-- Shopping cart section begin -->
<div class="checkout-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session("alert"))
                <h4>
                    {{session("alert")}}
                </h4>
                @endif
                <a href="/" class="primary-btn mt-5">Tiếp tục mua sắm nèo</a>
            </div>
        </div>
    </div>
</div>
<!-- Shopping cart section end -->
@endsection