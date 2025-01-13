@extends('FrontEnd.layouts.master')
@section('title', 'Blog Details')

@section('body')

<!-- Blog Details Section Begin -->
<div class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>The Personality Trait That Makes People Happier</h2>
                        <p>travel <span>- May 19, 2023</span></p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="./img/blog/blog-detail.jpg" alt="">
                    </div>
                    <div class="blog-detail-desc">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum reiciendis eius aperiam
                            commodi dolorem sed odio maiores accusamus amet, deserunt ipsa accusantium asperiores
                            iure, placeat saepe, iusto pariatur tenetur atque.
                        </p>
                    </div>
                    <div class="blog-quote">
                        <p>
                            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere neque sit consequatur
                            quibusdam assumenda voluptatum est numquam nemo incidunt similique sapiente quasi quas,
                            veritatis eligendi optio ut quisquam. Reiciendis, voluptate." <span>- DuogBachDev</span>
                        </p>
                    </div>
                    <div class="blog-more">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="./img/blog/blog-detail-1.jpg" alt="">
                            </div>
                            <div class="col-sm-4">
                                <img src="./img/blog/blog-detail-2.jpg" alt="">
                            </div>
                            <div class="col-sm-4">
                                <img src="./img/blog/blog-detail-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tag-share">
                        <div class="details-tag">
                            <ul>
                                <li><i class="fa fa-tags"></i></li>
                                <li>Travel</li>
                                <li>Beauty</li>
                                <li>DuogBachDev</li>
                            </ul>
                        </div>
                        <div class="blog-share">
                            <span>Share : </span>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="blog-post">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <a href="#" class="prev-blog">
                                    <div class="pb-pic">
                                        <i class="ti-arrow-left"></i>
                                        <img src="./img/blog/prev-blog.png" alt="">
                                    </div>
                                    <div class="pb-text">
                                        <span>Previous Post : </span>
                                        <h5>The Personality Trait That Makes People Happier</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-5 col-md-6 offset-lg-2">
                                <a href="#" class="next-blog">
                                    <div class="nb-pic">
                                        <img src="./img/blog/next-blog.png" alt="">
                                        <i class="ti-arrow-right"></i>
                                    </div>
                                    <div class="nb-text">
                                        <span>Next Post : </span>
                                        <h5>The Personality Trait That Makes People Happier</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="posted-by">
                        <div class="pb-pic">
                            <img src="./img/blog/post-by.png" alt="">
                        </div>
                        <div class="pb-text">
                            <a href="#">
                                <h5>DuogBachDev</h5>
                            </a>
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam laborum ullam
                                distinctio ducimus dicta aliquid at assumenda, cumque exercitationem sed ab.
                                Deserunt, quia sed? Culpa quaerat aut reprehenderit iste aliquam.
                            </p>
                        </div>
                    </div>
                    <div class="leave-comment">
                        <h4>Leave A Comment</h4>
                        <form action="" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="" id="" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="" id="" placeholder="Messages"></textarea>
                                    <button type="submit" class="site-btn">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Details Section End -->

@endsection