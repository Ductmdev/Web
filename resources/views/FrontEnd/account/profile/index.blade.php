@extends('FrontEnd.layouts.master')
@section('title', 'My Profile')

@section('body')
<!-- Breadcrumb section begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i>Home</a>
                    <span>My Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb section end -->
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <!-- Thông báo thành công -->
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            </div>
        </div>
        <div class="col-md-6 border-right">
            <!-- Thông báo lỗi -->
            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{$error}}</strong>
            </div>
            @endforeach
            @endif

            @if(session("alert"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session("alert")}}</strong>
            </div>
            @endif
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row-mt-2">

                        <img style="width: 150px; cursor: pointer;align-items: center" class="thumbnail rounded-circle center" data-toggle="tooltip" title="Click to change the image" data-placement="bottom" src="/admin/assets/images/user/{{$user->avatar ?? 'default-avatar.jpg'}}" alt="Avatar">
                        <input name="image" type="file" onchange="changeImg(this)" class="image form-control-file" style="display: none;" value="">
                        <input type="hidden" name="image_old" value="{{$user->avatar}}">
                        <small class="form-text text-muted" style="text-align: center">
                            Click vào hình ảnh để thay đổi (bắt buộc)
                        </small>
                        <div style="text-align: center"><b style="text-align: center;font-weight: bold">{{Auth::user()->name ?? ''}}</b></div>
                        <div style="text-align: center"><span class="text-black-50">{{Auth::user()->email ?? ''}}</span></div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="first name" value="{{Auth::user()->name ?? ''}}">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="email" value="{{Auth::user()->email ?? ''}}">
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection