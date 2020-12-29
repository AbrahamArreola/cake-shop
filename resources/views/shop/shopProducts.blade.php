@if (Gate::authorize('client-settings'))
    @extends('layouts.mainContent', ['menu' => 'menu3'])

    @section('title', 'Carrito de compras')

    @section('styleFiles')
        <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
        <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
    @endsection

    @section('content')
        @livewire('shop.shop-cart')
    @endsection
@endif
