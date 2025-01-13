@extends('FrontEnd.layouts.master')
@section('title', 'Chi tiết sản phẩm')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="/shop">Shop</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="/admin/assets/images/products/{{$product->productImage[0]->path ?? '' }}" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                @foreach($product->productImage as $productImage)
                                <div class="pt active" data-imgbigurl="/admin/assets/images/products/{{ $productImage->path }}">
                                    <img src="/admin/assets/images/products/{{ $productImage->path }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{$product->tag}}</span>
                                <h3>{{$product->name}}</h3>

                                <!-- Có thể bỏ qua -->
                                <a href="/" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <!-- Đánh giá này sẽ bỏ qua -->
                            <!-- <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div> -->
                            <div class="pd-desc">
                                <p>{{$product->content}}</p>
                                <h4>
                                    @if($product->discount != null)
                                    ${{ $product->discount }}
                                    <span>${{ $product->price }}</span>
                                    @else
                                    ${{ $product->price }}
                                    @endif
                                </h4>
                            </div>
                            <div class="pd-color">
                                <h6>Color</h6>
                                <div class="pd-color-choose">
                                    @foreach ($product->productDetail as $color)
                                    <div class="cc-item">
                                        <input type="radio" name="" id="cc-{{$color->color}}">
                                        <label for="cc-{{$color->color}}" class="cc-{{$color->color}}"></label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pd-size-choose">
                                @foreach ($product->productDetail as $size)
                                <div class="sc-item">
                                    <input type="radio" id="{{ 'size-' . $size->id }}" name="product_size" value="{{ $size->size }}">
                                    <label for="{{ 'size-' . $size->id }}">
                                        @if ($size->size == 1)
                                        {{$size->size}}T
                                        @else
                                        {{$size->size}}GB
                                        @endif
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <div class="quantity">
                                <div class="pro-qty2">
                                    <input type="text" name="quantity" id="quantity" min="1" value="1">
                                </div>
                                @if($product->qty > 0)
                                <a href="javascript:addCartInDetails({{ $product->id }})" class="primary-btn pd-cart">Add to Cart</a>
                                @endif
                            </div>
                            <input type="hidden" name="qty_fill" id="qty_fill" value="{{$product->qty}}">
                            <ul class="pd-tags">
                                <li><span>CATEGORIES</span> : {{ $product->category->name }}</li>
                                <li><span>TAGS</span> : {{$product->tag}}</li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">Sku : {{$product->sku}}</div>
                                <div class="pd-social">
                                    <a href="https://donate-duogbachdev.vercel.app/"><i class="ti-facebook"></i></a>
                                    <a href="https://donate-duogbachdev.vercel.app/"><i class="ti-twitter-alt"></i></a>
                                    <a href="https://donate-duogbachdev.vercel.app/"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">MÔ TẢ</a>
                                </li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">THÔNG SỐ KỸ THUẬT</a></li>
                                <!-- <li><a href="#tab-3" data-toggle="tab" role="tab">NHẬN XÉT CỦA KHÁCH HÀNG (02)</a></li> -->
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <!-- Cái !! để loại bỏ thẻ p -->
                                                {!!$product->description!!}
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="/admin/assets/images/products/{{$product->productImage[0]->path ?? '' }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Đánh giá của khách hàng</td>
                                                <td>
                                                    <div class="p-weight">Đang thử nghiệm</div>
                                                    <!-- <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Giá</td>
                                                <td>
                                                    <div class="p-price">${{$product->price}}</div>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="p-catagory">Còn hàng</td>
                                                <td>
                                                    <div class="p-stock">{{$product->qty}} trong kho</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Cân nặng</td>
                                                <td>
                                                    <div class="p-weight">{{$product->weight}}kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Dung Lượng</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach ($product->productDetail as $size)
                                                        @if ($size->size == 1)
                                                        {{$size->size}}T
                                                        @else
                                                        {{$size->size}}GB
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="p-catagory">Màu sắc</td>
                                                <td>
                                                    @foreach ($product->productDetail as $color)
                                                    <span class="cs-{{$color->color}}"></span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Mã hàng</td>
                                                <td>
                                                    <div class="p-code">{{$product->sku}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="./img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2023</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="./img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2023</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Rating</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Để Lại Bình Luận Của Bạn</h4>
                                            <form action="" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" name="" id="" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="" id="" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea name="" id="" placeholder="Messages"></textarea>
                                                        <button class="site-btn" type="submit">Send
                                                            messages</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section Beign -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Liên Quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">

                        <!-- $key sẽ đếm số lần lặp qua mảng $relatedProduct->productImage, và khi $key bằng 0 (tức là lần đầu tiên trong vòng lặp), nó sẽ hiển thị ảnh đầu tiên. Sau đó, nó sẽ không hiển thị các ảnh khác. -->
                        @foreach($relatedProduct->productImage as $key => $productImage)
                        @if($key == 0)
                        <img src="/admin/assets/images/products/{{ $productImage->path }}" alt="">
                        @endif
                        @endforeach

                        @if($relatedProduct->discount != null)
                        <div class="sale pp-sale">Sale</div>
                        @endif
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="javascript:addCart({{ $relatedProduct->id }})"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="/shop/product-detail/{{$relatedProduct->id}}">+ Xem chi tiết</a></li>
                            <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">{{$relatedProduct->tag}}</div>
                        <a href="/shop/product-detail/{{$relatedProduct->id}}">
                            <h5>{{$relatedProduct->name}}</h5>
                        </a>
                        <div class="product-price">
                            @if($relatedProduct->discount != null)
                            ${{ $relatedProduct->discount }}
                            <span>${{ $relatedProduct->price }}</span>
                            @else
                            ${{ $relatedProduct->price }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Related Products Section End -->

@endsection