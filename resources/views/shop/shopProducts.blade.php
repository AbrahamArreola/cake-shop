@if (Gate::authorize('client-settings'))
    @extends('layouts.mainContent', ['menu' => 'menu3'])

    @section('title', 'Carrito de compras')

    @section('styleFiles')
        <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
        <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
        <style>
            .StripeElement {
                box-sizing: border-box;
                height: 40px;
                width: 100%;
                padding: 10px 12px;
                border: 1px solid transparent;
                border-radius: 4px;
                background-color: white;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
            }

            .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
                border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
            }

        </style>
    @endsection

    @section('content')
        @livewire('shop.shop-cart')
    @endsection
@endif
