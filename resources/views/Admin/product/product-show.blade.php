@extends('admin.layouts.master')
@section('title', 'Chi tiết sản phẩm')

@section('body')
<!-- Main -->
<div class="app-main__inner">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Product
                    <div class="page-title-subheading">
                        View, create, update, delete and manager.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body display_data">

                    <div class="position-relative row form-group">
                        <label for="" class="col-md-3 text-md-right col-form-label">Images</label>
                        <div class="col-md-9 col-xl-8">
                            <ul class="text-nowrap overflow-auto" id="images">
                                <li class="d-inline-block mr-1" style="position: relative;">
                                    <img style="height: 150px;" src="assets/images/products/{{$products->productImage[0]->path ?? ''}}" alt="Image">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="brand_id" class="col-md-3 text-md-right col-form-label">Hình ảnh sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <p><a href="/quantri/product/product-image/{{$products->id}}">Quản lý hình ảnh</a></p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="brand_id" class="col-md-3 text-md-right col-form-label">Thông tin chi tiết sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <p><a href="/quantri/product/product-detail/{{$products->id}}">Quản lý thông tin chi tiết</a></p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="brand_id" class="col-md-3 text-md-right col-form-label">Thương hiệu</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products->brand['name']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="product_category_id" class="col-md-3 text-md-right col-form-label">Danh mục</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products->category['name']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['name']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="content" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['content']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="price" class="col-md-3 text-md-right col-form-label">Giá sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <p>${{$products['price']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="discount" class="col-md-3 text-md-right col-form-label">Giảm giá</label>
                        <div class="col-md-9 col-xl-8">
                            <p>${{$products['discount']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="qty" class="col-md-3 text-md-right col-form-label">Qty</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['qty']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="weight" class="col-md-3 text-md-right col-form-label">Câng nặng</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['weight']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="sku" class="col-md-3 text-md-right col-form-label">Mã sản phẩm</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['sku']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="tag" class="col-md-3 text-md-right col-form-label">Tag</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['tag']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="featured" class="col-md-3 text-md-right col-form-label">Featured</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['featured'] ? 'Có' : 'Không'}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="featured" class="col-md-3 text-md-right col-form-label">State</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['state'] ? 'Còn hàng' : 'Hết hàng'}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$products['description']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection