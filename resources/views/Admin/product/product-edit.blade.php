@extends('admin.layouts.master')
@section('title', 'Sửa sản phẩm')

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
                        View, create, update, delete and manage.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">

                <!-- Thông báo lỗi -->
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$error}}</strong>
                </div>
                @endforeach
                @endif

                <div class="card-body">
                    <form action="/quantri/product/update/{{$product['id']}}" method="post" enctype="multipart/form-data">
                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-3 text-md-right col-form-label">Nhãn hiệu sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <select name="brand_id" id="brand_id" class="form-control">
                                    @foreach ($brands as $brand)
                                    <option {{$product->brand_id == $brand->id ? 'selected' : '' }} value={{ $brand->id }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="product_category_id" class="col-md-3 text-md-right col-form-label">Danh mục sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <select name="product_category_id" id="product_category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option {{$product->product_category_id == $category->id ? 'selected' : '' }} value={{ $category->id }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{$product['name']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="content" class="col-md-3 text-md-right col-form-label">Nội dung</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="content" id="content" placeholder="Content" type="text" class="form-control" value="{{$product['content']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price" class="col-md-3 text-md-right col-form-label">Giá sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="price" id="price" placeholder="Price" type="text" class="form-control" value="{{$product['price']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="discount" class="col-md-3 text-md-right col-form-label">Giảm giá</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="discount" id="discount" placeholder="Discount" type="text" class="form-control" value="{{$product['discount']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="weight" class="col-md-3 text-md-right col-form-label">Câng nặng</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="weight" id="weight" placeholder="Weight" type="text" class="form-control" value="{{$product['weight']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="sku" class="col-md-3 text-md-right col-form-label">Mã sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="sku" id="sku" placeholder="SKU" type="text" class="form-control" value="{{$product['sku']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="qty" class="col-md-3 text-md-right col-form-label">Qty</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="qty" id="qty" placeholder="QTY" type="text" class="form-control" value="{{$product['qty']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="tag" class="col-md-3 text-md-right col-form-label">Tag</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="tag" id="tag" placeholder="Tag" type="text" class="form-control" value="{{$product['tag']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="featured" class="col-md-3 text-md-right col-form-label">Featured</label>
                            <div class="col-md-9 col-xl-8">
                                <select name="featured" id="featured" class="form-control">
                                    <option value="">-- Featured --</option>
                                    <option @if($product['featured']==1) {{"selected"}} @endif value=1>
                                        Có
                                    </option>
                                    <option @if($product['featured']==0) {{"selected"}} @endif value=0>
                                        Không
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="state" class="col-md-3 text-md-right col-form-label">State</label>
                            <div class="col-md-9 col-xl-8">
                                <select name="state" id="state" class="form-control">
                                    <option value="">-- State --</option>
                                    <option @if($product['state']==1) {{"selected"}} @endif value=1>
                                        Còn hàng
                                    </option>
                                    <option @if($product['state']==0) {{"selected"}} @endif value=0>
                                        Hết hàng
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label">Mô tả sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                <script>
                                    CKEDITOR.replace("description")
                                </script>
                            </div>
                        </div>


                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="/quantri/product" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Cancel</span>
                                </a>

                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <span>Save</span>
                                </button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection