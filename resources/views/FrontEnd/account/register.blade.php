@extends('FrontEnd.layouts.master')
@section('title', 'Đăng ký')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Login Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <!-- Thông báo lỗi -->
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong>
                    </div>
                    @endforeach
                    @endif
                    <form action="/account/postRegister" method="post">
                        <div class="group-input">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="group-input">
                            <label for="email">Email address <span>*</span></label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Password <span>*</span></label>
                            <input type="password" name="password" id="pass">
                        </div>
                        <div class="group-input">
                            <label for="con-pass">Confirm Password <span>*</span></label>
                            <input type="password" name="password_confirmation" id="con-pass">
                        </div>
                        <button type="submit" class="site-btn register-btn">Đăng Ký</button>
                        @csrf
                    </form>
                    <div class="switch-login">
                        <a href="/account/login" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Section End -->
@endsection