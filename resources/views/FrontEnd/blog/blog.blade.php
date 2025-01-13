@extends('FrontEnd.layouts.master')
@section('title', 'Blog')

@section('body')


<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-8 order-2 order-lg-1">
                <div class="blog-sidebar">
                    <div class="search-form">
                        <h4>Search</h4>
                        <form action="">
                            <input type="text" name="" id="" placeholder="Search...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="blog-catagory">
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="">DuogBachDev</a></li>
                            <li><a href="">Travel</a></li>
                            <li><a href="">pinic</a></li>
                            <li><a href="">Model</a></li>
                        </ul>
                    </div>
                    <div class="recent-post">
                        <h4>Recent Post</h4>
                        <div class="recent-blog">
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="./img/blog/recent-1.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>DuogBachDev hỏi đáp nek...</h6>
                                    <p>DuogBachDev <span>- May 19, 2023</span></p>
                                </div>
                            </a>
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="./img/blog/recent-2.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>DuogBachDev hỏi đáp nek...</h6>
                                    <p>DuogBachDev <span>- May 19, 2023</span></p>
                                </div>
                            </a>
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="./img/blog/recent-3.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>DuogBachDev hỏi đáp nek...</h6>
                                    <p>DuogBachDev <span>- May 19, 2023</span></p>
                                </div>
                            </a>
                            <a href="#" class="rb-item">
                                <div class="rb-pic">
                                    <img src="./img/blog/recent-4.jpg" alt="">
                                </div>
                                <div class="rb-text">
                                    <h6>DuogBachDev hỏi đáp nek...</h6>
                                    <p>DuogBachDev <span>- May 19, 2023</span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <fiv class="blog-tags">
                        <h4>Product Tags</h4>
                        <div class="tag-item">
                            <div class="fw-tags">
                                <a href="#">Điện thoại</a>
                                <a href="#">Tai Nghe</a>
                                <a href="#">Máy tính bảng</a>
                                <a href="#">Laptop</a>
                                <a href="#">Sạc dự phòng</a>
                                <a href="#">Phụ kiện</a>
                                <a href="#">Ưu đãi</a>
                            </div>
                        </div>
                    </fiv>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="./img/blog/blog-1.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="./blog-details.html">
                                    <h4>DuogBachDev hỏi đáp nek</h4>
                                    <p>travel <span>- May 19, 2023</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="./img/blog/blog-2.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="./blog-details.html">
                                    <h4>DuogBachDev hỏi đáp nek</h4>
                                    <p>travel <span>- May 19, 2023</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="./img/blog/blog-3.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="./blog-details.html">
                                    <h4>DuogBachDev hỏi đáp nek</h4>
                                    <p>travel <span>- May 19, 2023</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="./img/blog/blog-4.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="./blog-details.html">
                                    <h4>DuogBachDev hỏi đáp nek</h4>
                                    <p>travel <span>- May 19, 2023</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="./img/blog/blog-5.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="./blog-details.html">
                                    <h4>DuogBachDev hỏi đáp nek</h4>
                                    <p>travel <span>- May 19, 2023</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="./img/blog/blog-6.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="./blog-details.html">
                                    <h4>DuogBachDev hỏi đáp nek</h4>
                                    <p>travel <span>- May 19, 2023</span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="loading-more">
                            <i class="icon_loading"></i>
                            <a href="#">Loading More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection