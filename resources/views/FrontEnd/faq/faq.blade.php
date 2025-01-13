@extends('FrontEnd.layouts.master')
@section('title', 'Faq')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>FAQS</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Faq Section Begin -->
<div class="faq-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-accordin">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-heading active">
                                <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                    DuogBachDev có đẹp trai không ?
                                </a>
                            </div>
                            <div class="collapse show" id="collapseOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi sint non
                                        explicabo voluptate voluptatem animi atque molestias suscipit expedita, quod
                                        tempore itaque reprehenderit dignissimos amet! Autem facilis maxime
                                        consequuntur et?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseTwo">
                                    DuogBachDev có đẹp trai không ?
                                </a>
                            </div>
                            <div class="collapse" id="collapseTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi sint non
                                        explicabo voluptate voluptatem animi atque molestias suscipit expedita, quod
                                        tempore itaque reprehenderit dignissimos amet! Autem facilis maxime
                                        consequuntur et?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-heading">
                                <a data-toggle="collapse" data-target="#collapseThree">
                                    DuogBachDev có đẹp trai không ?
                                </a>
                            </div>
                            <div class="collapse" id="collapseThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi sint non
                                        explicabo voluptate voluptatem animi atque molestias suscipit expedita, quod
                                        tempore itaque reprehenderit dignissimos amet! Autem facilis maxime
                                        consequuntur et?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Faq Section End -->
@endsection