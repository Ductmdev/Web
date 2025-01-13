@extends('FrontEnd.layouts.master')
@section('title', 'Shop')

@section('body')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                @include('FrontEnd.shop.components.produts-sidebar-filter')
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <!-- <div class="select-option">
                                <select class="sorting" name="" id="">
                                    <option value="">Default Sorting</option>
                                </select>
                                <select class="p-show" name="" id="">
                                    <option value="">Show</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>Hiển thị {{ $startResult }} - {{ $endResult }} sản phẩm</p>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item item {{$product->tag}}">
                                <div class="pi-pic">
                                    <img src="/admin/assets/images/products/{{ $product->productImage[0]->path ?? '' }}" alt="">

                                    @if($product->discount != null)
                                    <div class="sale pp-sale">Sale</div>
                                    @endif
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="javascript:addCart({{ $product->id }})"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="/shop/product-detail/{{$product->id}}">+ Xem chi tiết</a></li>
                                        <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$product->tag}}</div>
                                    <a href="/shop/product-detail/{{$product->id}}">
                                        <h5>{{$product->name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        @if($product->discount != null)
                                        ${{ $product->discount }}
                                        <span>${{ $product->price }}</span>
                                        @else
                                        ${{ $product->price }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-5">
                    {{ $products->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
@endsection