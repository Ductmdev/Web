@extends('FrontEnd.layouts.master')
@section('title', 'Đăng nhập')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Login</span>
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
                <div class="login-form">
                    <h2>Login</h2>
                    <!-- Thông báo -->
                    @if(session("alert"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session("alert")}}</strong>
                    </div>
                    @endif

                    @if(session("noti"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session("noti")}}</strong>
                    </div>
                    @endif
                    <form action="" method="post">
                        <div class="group-input">
                            <label for="email">Email address <span>*</span></label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Password <span>*</span></label>
                            <input type="password" name="password" id="pass">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" name="remember" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="/" class="forget-pass">Forget your Password</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Sign In</button>
                        @csrf
                    </form>
                    <div class="switch-login">
                        <a href="/account/register" class="or-login">Or Create An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Section End -->
@endsection