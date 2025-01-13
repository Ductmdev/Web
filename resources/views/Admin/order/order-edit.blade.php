@extends('admin.layouts.master')
@section('title', 'Đơn hàng chi tiết sản phẩm')

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
                    Order
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
                <form action="/quantri/order/update/{{$order->id}}" method="post">
                    <div class="card-body display_data">
                        <h2 class="text-center mt-5">Order info</h2>
                        <hr>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Full Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->first_name . ' ' . $order->last_name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$order->email}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-3 text-md-right col-form-label">Phone</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$order->phone}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                Company Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{$order->company_name}}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                Street Address</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->street_address }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                Town City</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->town_city }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="country" class="col-md-3 text-md-right col-form-label">Country</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->country }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                Postcode Zip</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $order->postcode_zip }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="payment_type" class="col-md-3 text-md-right col-form-label">Payment
                                Type</label>
                            <div class="col-md-9 col-xl-8">
                                <p>
                                    @if($order->payment_type == 'pay_later') Pay Later
                                    @else Online Pay
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="status" class="col-md-3 text-md-right col-form-label">Status</label>
                            <div class="col-md-9 col-xl-8">
                                <!-- <div class="badge badge-dark mt-2"> -->

                                <select name="status" id="status" class="form-control">
                                    <option @if($order->status==1) {{"selected"}} @endif value="1">Nhận đơn đặt hàng</option>
                                    <option @if($order->status==2) {{"selected"}} @endif value="2">Chưa xác nhận</option>
                                    <option @if($order->status==3) {{"selected"}} @endif value="3">Thất Bại</option>
                                    <option @if($order->status==4) {{"selected"}} @endif value="4">Đã trả</option>
                                    <option @if($order->status==5) {{"selected"}} @endif value="5">Xử lý</option>
                                    <option @if($order->status==6) {{"selected"}} @endif value="6">Vận chuyển</option>
                                    <option @if($order->status==7) {{"selected"}} @endif value="7">Kết thúc</option>
                                    <option @if($order->status==0) {{"selected"}} @endif value="0">Hủy bỏ</option>
                                </select>
                                <!-- </div> -->
                            </div>
                        </div>

                        <!-- <div class="position-relative row form-group">
                        <label for="description" class="col-md-3 text-md-right col-form-label">Description</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$order->description}}</p>
                        </div>
                    </div> -->
                    </div>

                    <div class="position-relative row form-group mb-1">
                        <div class="col-md-9 col-xl-8 offset-md-2">
                            <a href="/quantri/order/show/{{$order->id}}" class="border-0 btn btn-outline-danger mr-1">
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
<!-- End Main -->
@endsection