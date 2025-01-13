@extends('admin.layouts.master')
@section('title', 'Chỉnh sửa chi tiết sản phẩm')

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
                    Product deatil
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
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$error}}</strong>
                </div>
                @endforeach
                @endif
                <div class="card-body">
                    <form action="/quantri/product/product-detail/update/{{$productDetail['id']}}" method="post" enctype="multipart/form-data">

                        <div class="position-relative row form-group">
                            <label class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                            <div class="col-md-9 col-xl-8">
                                <input disabled placeholder="Product Name" type="text" class="form-control" value="{{$productDetail['product']['name']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="color" class="col-md-3 text-md-right col-form-label">Color</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="color" id="color" placeholder="Color" type="text" class="form-control" value="{{$productDetail['color']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="size" class="col-md-3 text-md-right col-form-label">Size</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="size" id="size" placeholder="Size" type="text" class="form-control" value="{{$productDetail['size']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="qty" class="col-md-3 text-md-right col-form-label">Qty</label>
                            <div class="col-md-9 col-xl-8">
                                <input name="qty" id="qty" placeholder="Qty" type="text" class="form-control" value="{{$productDetail['qty']}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="/quantri/product/product-detail/{{$productDetail['product_id']}}" class="border-0 btn btn-outline-danger mr-1">
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