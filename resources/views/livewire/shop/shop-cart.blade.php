{{-- Start Shop Cart --}}
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
                                <th class="text-center">Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                @php
                                $productAmount = Session::get('products')[$product->id]
                                @endphp
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="{{ route('product.show', [$product]) }}">
                                            <img class="img-fluid"
                                                src="{{ asset('storage/products/' . $product->image) }}"
                                                alt="{{ $product->name }}" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{ route('product.show', [$product]) }}">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>${{ $product->price }}</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="{{ $productAmount }}"
                                            min="1" step="1"
                                            wire:input='updateProductAmount({{ $product->id }},$event.target.value)'
                                            class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p class="w-16 m-0">${{ $productAmount * $product->price }}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <button class="focus:outline-none"
                                            wire:click='removeProduct({{ $product->id }})'>
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
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
                        $total = 0
                    @endphp
                    @foreach ($products as $product)
                        @php
                        $productAmount = Session::get('products')[$product->id];
                        $productTotal = $productAmount * $product->price;
                        $total += $productTotal;
                        @endphp
                        <div class="d-flex pl-3">
                            <h4>{{ $productAmount . ' - ' . $product->name }}</h4>
                            <div class="ml-auto font-weight-bold"> ${{ $productTotal }} </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-flex gr-total py-2">
                        <h5>Total</h5>
                        <div class="ml-auto h5">${{ $total }}</div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-8 d-flex shopping-box py-2"><button
                    class="ml-auto btn hvr-hover text-white font-semibold" wire:click="makeOrder">Realizar pedido</button> </div>
        </div>
    </div>
</div>
