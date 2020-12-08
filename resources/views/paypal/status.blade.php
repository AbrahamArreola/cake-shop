@extends('layouts.mainContent', ['menu' => 'menu1'])

@section('title', 'Inicio')

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

    @if (session('status'))
      <h3>{{$status}}</h3>
      <p>holi1</p>

    @endif

    <p>holi</p>
    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

@endsection
