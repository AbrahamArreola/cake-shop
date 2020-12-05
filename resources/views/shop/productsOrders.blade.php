@extends('layouts.mainContent', ['menu' => 'menu3'])

@section('title', 'Pedidos')

@section('content')
    @livewire('shop.orders-view')
@endsection
