@extends('FrontEnd.layouts.master')
@section('title', 'Liên hệ với chúng tôi')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./index.html"><i class="fa fa-home"></i> Trang trủ</a>
                    <span>Liên hệ</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Map Section Begin -->
<div class="map spad">
    <div class="container">
        <div class="map-inner">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d5296.815894282523!2d106.39130498048605!3d20.705368472223036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDQyJzE5LjMiTiAxMDbCsDIzJzQyLjAiRQ!5e1!3m2!1svi!2s!4v1692510880225!5m2!1svi!2s" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="icon">
                <i class="fa fa-map-marker"></i>
            </div>
        </div>
    </div>
</div>
<!-- Map Section Map -->

<!-- Contact Section Bengin -->
<section class="contact-section spad">
    <section class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Liên hệ chúng tôi</h4>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi quo fugit repellat,
                        tempore repudiandae praesentium error officiis corporis, non obcaecati dolorum
                        necessitatibus ipsam dolores deserunt quod velit! Adipisci, accusamus architecto.
                    </p>
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Address : </span>
                            <p>89A Linh Dam, Ha Noi</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Phone : </span>
                            <p>+84 123.456.789</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email : </span>
                            <p>duogbachdev@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Gửi Tin Nhắn Cho Chúng Tôi</h4>
                        <p>Nhân viên của chúng tôi sẽ gọi lại sau và giải đáp thắc mắc của bạn.</p>
                        <form action="" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Your name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Your email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="" id="" placeholder="Your message"></textarea>
                                    <button type="submit" class="site-btn">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- Contact Section End -->
@endsection