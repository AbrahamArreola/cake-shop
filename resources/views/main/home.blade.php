@extends('layouts.mainContent', ['menu' => 'menu1'])

@section('title', 'Inicio')

@section('styleFiles')
    <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')

@endsection

@section('content')
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{ asset('assets/images/carrusel_1.jpg') }}" alt="Cupcake mio Brownies">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Cupcake Mío</strong></h1>
                            <p class="m-b-40">Pasteles, cupcakes personalizados, trabajo en fondant, postres y más.</p>
                            <p><a class="btn hvr-hover" href="{{ route('product.index') }}">Comprar Ahora</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('assets/images/carrusel_2.jpg') }}" alt="Cupcake mio birthday cookies">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Cupcake Mío</strong></h1>
                            <p class="m-b-40">Pastelería y repostería.</p>
                            <p><a class="btn hvr-hover" href="{{ route('product.index') }}">Comprar ahora</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('assets/images/carrusel_3.jpg') }}" alt="Cupcake mio happy world cake">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Cupcake Mío</strong></h1>
                            <p class="m-b-40">Pastelería y repostería.</p>
                            <p><a class="btn hvr-hover" href="{{ route('product.index') }}">Comprar ahora</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets/images/extra_1.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="{{ route('product.index') }}">Ir a la Tienda</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets/images/extra_2.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="{{ route('product.index') }}">Ir a la Tienda</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets/images/extra_3.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="{{ route('product.index') }}">Ir a la Tienda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_1.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_2.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_3.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_4.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_5.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_6.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_7.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_8.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_9.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_10.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

@endsection
