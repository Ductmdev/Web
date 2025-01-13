@extends('admin.layouts.master')
@section('title', 'Dashboard')

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
                    Dashboard
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-night-fade">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Tổng số đơn đặt hàng</div>

                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{count($orders)}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Tổng sản phẩm</div>

                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{count($products)}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-happy-green">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Tài khoản</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{count($users)}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-love-kiss">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Đơn hàng bị hủy</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$countCancelledOrders}}</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mb-5">
        <h2>Thống kế doanh thu</h2>
    </div>
    <!-- <div class="row mt-5">
        <form autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="main-card mb-3 card">
                        <div class="card-header">
                            <div class="input-group">
                                <p>Từ ngày :<input type="text" id="datepicker" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="main-card mb-3 card">
                        <div class="card-header">
                            <div class="input-group">
                                <p>Đến ngày :<input type="text" id="datepicker2" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="main-card mb-3 card">
                        <div class="card-header">
                            <div class="input-group">
                                <p class="text-center">Lọc theo :
                                    <select class="dashboard-filter form-control">
                                        <option>-- Lựa chọn --</option>
                                        <option value="7ngay">7 day</option>
                                        <option value="thangtruoc">Last month</option>
                                        <option value="thangnay">This month</option>
                                        <option value="365ngayqua">365 day</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="main-card mb-3 card">
                        <div class="card-header">
                            <div class="input-group">
                                <input type="button" id="btn-dashboard-filter" class="btn btn-primary" value="Filter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> -->
    <!-- <div class="row">
        <div class="col-lg-12">
            <div id="chart" style="height: 250px;"></div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body display_data">
                    <div class="table-responsive">
                        <h2 class="text-center">Top 5 Sản Phẩm Bán Chạy Nhất Tháng</h2>
                        <hr>
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($bestSellingProducts as $product)
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 60px;" data-toggle="tooltip" title="Image" data-placement="bottom" src="/admin/assets/images/products/{{ $product->path }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $product->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{ $product->total_sold }}
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body display_data">
                    <div class="table-responsive">
                        <h2 class="text-center">Top 5 Sản Phẩm Bị Hủy</h2>
                        <hr>
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($cancelledProducts as $product)
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 60px;" data-toggle="tooltip" title="Image" data-placement="bottom" src="/admin/assets/images/products/{{ $product->path }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $product->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{ $product->total_cancelled }}
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection