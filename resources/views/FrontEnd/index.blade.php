@extends('FrontEnd.layouts.master')
@section('title', 'Trang Chủ')

@section('body')
<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        @foreach($sliders as $slider)
        <div class="single-hero-items set-bg" data-setbg="/admin/assets/images/sliders/{{$slider['path'] ?? 'default-avatar.png'}}">
        </div>
        @endforeach
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="./img/banner-1.jpg" alt="">
                    <div class="inner-text">
                        <h4>Điện thoại</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="./img/banner-2.jpg" alt="">
                    <div class="inner-text">
                        <h4>Laptop</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="./img/banner-3.jpg" alt="">
                    <div class="inner-text">
                        <h4>Máy tính bảng</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                    <h2>Điện thoại</h2>
                    <a href="/shop">Khám Phá Thêm</a>
                </div>
            </div>

            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="phone">ALL</li>
                        <li class="item" data-tag=".Apple" data-category="phone">IPHONE</li>
                        <li class="item" data-tag=".Samsung" data-category="phone">SAMSUNG</li>
                        <li class="item" data-tag=".Oppo" data-category="phone">OPPO</li>
                        <li class="item" data-tag=".phukien" data-category="phone">PHỤ KIỆN</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel phone">
                    @foreach($phoneProducts as $phoneProduct)
                    <div class="product-item item {{$phoneProduct->tag}}">
                        <div class="pi-pic">
                            <img src="/admin/assets/images/products/{{$phoneProduct->productImage[0]->path ?? ''}}" alt="">

                            @if($phoneProduct->discount != null)
                            <div class="sale">Sale</div>
                            @endif
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="javascript:addCart({{ $phoneProduct->id }})"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="/shop/product-detail/{{$phoneProduct->id}}">+ Xem Chi Tiết</a></li>
                                <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="category-name">{{$phoneProduct->tag}}</div>
                            <a href="/shop/product-detail/{{$phoneProduct->id}}">
                                <h5>{{$phoneProduct->name}}</h5>
                            </a>
                            <div class="product-price">
                                @if($phoneProduct->discount != null)
                                ${{ $phoneProduct->discount }}
                                <span>${{ $phoneProduct->price }}</span>
                                @else
                                ${{ $phoneProduct->price }}
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="laptop">ALL</li>
                        <li class="item" data-tag=".Acer" data-category="laptop">ACER</li>
                        <li class="item" data-tag=".Lenovo" data-category="laptop">LENOVO</li>
                        <li class="item" data-tag=".HP" data-category="laptop">HP</li>
                        <li class="item" data-tag=".PHUKIEN" data-category="laptop">PHỤ KIỆN</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel laptop">
                    @foreach($laptopProducts as $laptopProduct)
                    <div class="product-item item {{$laptopProduct->tag}}">
                        <div class="pi-pic">
                            <img src="/admin/assets/images/products/{{$laptopProduct->productImage[0]->path ?? ''}}" alt="">

                            @if($laptopProduct->discount != null)
                            <div class="sale">Sale</div>
                            @endif
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="javascript:addCart({{ $laptopProduct->id }})"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="/shop/product-detail/{{$laptopProduct->id}}">+ Xem Chi Tiết</a></li>
                                <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="category-name">{{$laptopProduct->tag}}</div>
                            <a href="/shop/product-detail/{{$laptopProduct->id}}">
                                <h5>{{$laptopProduct->name}}</h5>
                            </a>
                            <div class="product-price">
                                @if($laptopProduct->discount != null)
                                ${{ $laptopProduct->discount }}
                                <span>${{ $laptopProduct->price }}</span>
                                @else
                                ${{ $laptopProduct->price }}
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg" data-setbg="img/products/man-large.jpg">
                    <h2>Laptop</h2>
                    <a href="/shop">Khám Phá Thêm</a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="latest-blog spad">
    <div class="container">
        
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit single-benefitnek">
                        <div class="sb-icon">
                            <img src="./img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Miễn phí vận chuyển</h6>
                            <p>Đối với đơn hàng trên 99$</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="./img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Giao hàng đúng hạn</h6>
                            <p>Nếu không có vấn đề gì</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="./img/icon-3.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Thanh toán an toàn</h6>
                            <p>Thanh toán an toàn 100%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->
@endsection