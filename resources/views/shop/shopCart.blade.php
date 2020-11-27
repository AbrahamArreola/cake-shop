@extends('layouts.mainContent', ['menu' => 'menu3'])

@section('title', 'Carrito de compras')

@section('content')
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="images/img-pro-01.jpg" alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            Lorem ipsum dolor sit amet
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ 80.0</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="1" min="0" step="1"
                                            class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p>$ 80.0</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-4 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Resumen del pedido</h3>
                        <div class="d-flex">
                            <h4>Productos</h4>
                        </div>
                        <hr class="my-1">
                        @php
                            $auxArr = ['uno', 'dos', 'uno', 'dos', 'uno', 'dos', 'uno', 'dos',];
                        @endphp
                        @foreach ($auxArr as $item)
                            <div class="d-flex">
                                <h4>{{$item}}</h4>
                                <div class="ml-auto font-weight-bold"> $ 40 </div>
                            </div>
                        @endforeach
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Costo de envío</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Descuento</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Subtotal</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total py-2">
                            <h5>Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-8 d-flex shopping-box py-2"><a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>
        </div>
    </div>
@endsection
