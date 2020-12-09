@if (Gate::authorize('client-settings'))
    @extends('layouts.mainContent', ['menu' => 'menu3'])

    @section('title', 'Carrito de compras')

    @section('content')
        @livewire('shop.shop-cart')
    @endsection
@endif
