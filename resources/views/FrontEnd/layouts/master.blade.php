<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="/frontend/">
    <meta charset="UTF-8">
    <meta name="description" content="DuogBachDev Template">
    <meta name="keywords" content="DuogBachDev, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>@yield('title') | DphoneS</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>
    <!-- Start coding here -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-evenlope"></i>
                        ductmd2002@gmail.com.
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        +84 394820050
                    </div>
                </div>

                <div class="ht-right">
                    @if (Auth::check())
                    <a href="/account/logout" class="login-panel">
                        <i class="fa fa-user"></i>
                        {{ Auth::user()->name }} - Logout
                    </a>
                    @else
                    <a href="/account/login" class="login-panel"><i class="fa fa-user"></i> Login</a>
                    @endif
                    <div class="lan-selector">
                        <select name="countries" id="countries" class="language_drop" style="width: 300px;">
                            <option data-image="img/flag-1.png" data-imagecss="flag yt" data-title="Vietnamese" value="yv">
                                Vietnam</option>
                            <option data-image="img/flag-2.jpg" data-imagecss="flag yu" data-title="German" value="ye">
                                English</option>
                            <option data-image="img/flag-3.jpg" data-imagecss="flag yu" data-title="German" value="yg">
                                German</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="https://www.facebook.com/duw0703" target="blank"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="/">
                                <img src="./img/duogbachdev.png" height="30" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Tất cả danh mục</button>
                            <div class="input-group">
                                <input type="text" name="" id="" placeholder="Bạn cần tìm kiếm cái gì ?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="/cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach (Cart::content() as $cart)
                                                <tr data-rowId="{{ $cart->rowId }}">
                                                    <td class="si-pic">
                                                        @if ($cart->options->images && count($cart->options->images) > 0)
                                                        <img style="height: 70px;" src="/admin/assets/images/products/{{ $cart->options->images[0]->path ?? ''}}" alt="Image">
                                                        @endif
                                                    </td>

                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>${{ $cart->price }} x {{ $cart->qty }}</p>
                                                            <h6>{{ $cart->name }}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="select-total">
                                        <span>Total : </span>
                                        <h5>${{ Cart::total() }}</h5>
                                    </div>

                                    <div class="select-button">
                                        <a href="/cart" class="primary-btn view-card">Xem Giỏ Hàng</a>
                                        <!-- <form action="" method="post">
                                            @csrf
                                            <button class="primary-btn checkout-btn">Thanh Toán</button>
                                        </form> -->
                                        <a href="/checkout" class="primary-btn checkout-btn">Thanh Toán</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">${{ Cart::total() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="/">Trang chủ</a></li>
                        <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="/shop">Cửa hàng</a></li>
                        <li class="{{ (request()->segment(1) == 'category') ? 'active' : '' }}"><a href="/">Danh mục</a>
                            <ul class="dropdown">
                                @foreach($categories as $category)
                                @if (!empty($category->name))
                                <li><a href="/shop/filter/category/{{ $category->name }}">{{ $category->name }}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ (request()->segment(1) == 'blog') ? 'active' : '' }}"><a href="/blog">Blog</a>
                        <ul class="dropdown">
                        <li class="{{ (request()->segment(1) == '/blog/blog-detail') ? 'active' : '' }}"><a href="/blog/blog-detail">Blog Details</a></li>
                        </ul>
                        </li>
                        <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"><a href="https://donate-duogbachdev.vercel.app/">Liên hệ</a></li>
                        <li><a href="/">Pages</a>
                            <ul class="dropdown">
                                <li class="{{ (request()->segment(1) == '/blog/blog-detail') ? 'active' : '' }}"><a href="/blog/blog-detail">Blog Details</a></li>
                                <li class="{{ (request()->segment(1) == '/account/myorder') ? 'active' : '' }}"><a href="/account/myorder">My Order</a></li>
                                <li class="{{ (request()->segment(1) == '/account/profile') ? 'active' : '' }}"><a href="/account/profile">My Profile</a></li>
                                <li class="{{ (request()->segment(1) == '/account/changepass') ? 'active' : '' }}"><a href="/account/changepass">Change Password</a></li>
                                <li class="{{ (request()->segment(1) == '/cart') ? 'active' : '' }}"><a href="/cart">Giỏ Hàng</a></li>
                                <li class="{{ (request()->segment(1) == '/check-out') ? 'active' : '' }}"><a href="/checkout">Thanh Toán Đơn Hàng</a></li>
                                <li class="{{ (request()->segment(1) == '/faq') ? 'active' : '' }}"><a href="/faq">Câu Hỏi Thường Gặp</a></li>
                                <li class="{{ (request()->segment(1) == '/account/register') ? 'active' : '' }}"><a href="/account/register">Đăng Ký</a></li>
                                <li class="{{ (request()->segment(1) == '/account/login') ? 'active' : '' }}"><a href="/account/login">Đăng Nhập</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    {{-- body here --}}
    @yield('body')

    <!-- Partner Logo Section Begin -->
    <!-- <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="./img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="./img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="./img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="./img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="./img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="/">
                                <img src="./img/duogbachdev.png" height="30" alt="footerlogo">
                            </a>
                        </div>
                        <ul>
                            <li>1A. Linh Dam, Hoang Mai</li>
                            <li>Phone : +84 123.456.789</li>
                            <li>Email : duogbachdev@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="https://donate-duogbachdev.vercel.app/"><i class="fa fa-facebook"></i></a>
                            <a href="https://donate-duogbachdev.vercel.app/"><i class="fa fa-instagram"></i></a>
                            <a href="https://donate-duogbachdev.vercel.app/"><i class="fa fa-twitter"></i></a>
                            <a href="https://donate-duogbachdev.vercel.app/"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông tin</h5>
                        <ul>
                            <li><a href="https://donate-duogbachdev.vercel.app/">Về chúng tôi</a></li>
                            <li><a href="https://donate-duogbachdev.vercel.app/">Thủ tục thanh toán</a></li>
                            <li><a href="https://donate-duogbachdev.vercel.app/">Liên hệ</a></li>
                            <li><a href="https://donate-duogbachdev.vercel.app/">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="https://donate-duogbachdev.vercel.app/">My Account</a></li>
                            <li><a href="https://donate-duogbachdev.vercel.app/">Liên hệ</a></li>
                            <li><a href="https://donate-duogbachdev.vercel.app/">Giỏ hàng</a></li>
                            <li><a href="https://donate-duogbachdev.vercel.app/">Cửa hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Tham gia bản tin của chúng tôi ngay bây giờ</h5>
                        <p>Nhận thông tin cập nhật qua Email về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.
                        </p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập emal của bạn   ">
                            <button type="button">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> All rights reserved | This
                            template made width <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/duogbachdev" target="_blank">DuogBachDev</a>
                        </div>

                        <div class="payment-pic">
                            <img src="./img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/owlcarousel2-filter.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>