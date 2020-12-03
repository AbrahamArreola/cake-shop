@extends('layouts.mainContent', ['menu' => 'menu1'])

@section('title', 'Registrar productos')

@section('styleFiles')
  <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
  <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')

@endsection

@section('content')

    <!-- -->
    <div class="text-slid-box">
        <div id="offer-box" class="carouselTicker">
            <ul class="offer-box">
                <li>
                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                </li>
                <li>
                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                </li>
                <li>
                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                </li>
                <li>
                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                </li>
            </ul>
        </div>
    </div>
    <!-- -->
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{ asset('assets/images/carrusel_1.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Cupcake Mío</strong></h1>
                            <p class="m-b-40">Pastelería y repostería.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('assets/images/carrusel_2.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Cupcake Mío</strong></h1>
                            <p class="m-b-40">Pastelería y repostería.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('assets/images/carrusel_3.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Cupcake Mío</strong></h1>
                            <p class="m-b-40">Pastelería y repostería.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
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
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets/images/extra_2.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets/images/extra_3.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

  <div class="box-add-products">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="offer-box-products">
            <img class="img-fluid" src="images/add-img-01.jpg" alt="" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="offer-box-products">
            <img class="img-fluid" src="images/add-img-02.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Start Products  -->
    
    <!-- End Products  -->


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_1.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_2.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_3.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_4.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_5.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_6.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_7.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_8.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_9.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ asset('assets/images/instagram_10.jpg') }}" alt="" />
                    <div class="hov-in">
                        <a href="https://www.instagram.com/cupcakemio/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

@endsection
