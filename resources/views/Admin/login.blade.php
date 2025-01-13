<!doctype html>
<html lang="en">

<head>
    <base href="/admin/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin - DuogBachMobile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="DuogBachDev">

    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="./main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <!-- <div class="app-logo-inverse mx-auto mb-3"></div> -->
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Chào mừng bạn đã quay trở lại</div>
                                            <span>Vui lòng đăng nhập vào tài khoản của bạn bên dưới.</span>
                                        </h4>
                                    </div>
                                    @if($errors->any())
                                    @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                    @endif
                                    <form id="frm" role="form" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" id="exampleEmail" placeholder="Email here..." type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check">
                                            <input name="remember" id="exampleCheck" type="checkbox" class="form-check-input">
                                            <label for="exampleCheck" class="form-check-label">Giữ tôi luôn đăng nhập</label>
                                        </div>

                                        <div class="float-right">
                                            <button class="btn btn-primary btn-lg">Login to Dashboard</button>
                                        </div>
                                        @csrf
                                    </form>

                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Copyright © <a style="color: white;" href="http://facebook.com/duogbachdev">DuogBachMobile</a> 2023</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function submit() {
                document.getElementById('frm').submit();
            }
        </script>
        <script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>

</html>