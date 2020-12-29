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
                                @if (isset($product))
                                    @livewire('cart-product', ['product' => $product], key($product->id))
                                @endif
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
                        @if (isset($product))
                            @php
                            $productAmount = Session::get('products')[$product->id];
                            $productTotal = $productAmount * $product->price;
                            $total += $productTotal;
                            @endphp
                            <div class="d-flex pl-3">
                                <h4>{{ $productAmount . ' - ' . $product->name }}</h4>
                                <div class="ml-auto font-weight-bold"> ${{ $productTotal }} </div>
                            </div>
                        @endif
                    @endforeach
                    <hr>
                    <div class="d-flex gr-total py-2">
                        <h5>Total</h5>
                        <div class="ml-auto h5">${{ $total }}</div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-8 d-flex shopping-box py-2"><button class="ml-auto btn hvr-hover text-white font-semibold"
                    data-toggle="modal" data-target="#confirmModal">Realizar pedido</button> </div>
        </div>

        {{-- Confirm Order Modal --}}
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmar pedido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea confirmar el pedido actual?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn primary" wire:click="confirmOrder">Confirmar</button>
                        <button type="button" class="btn secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        @if (session()->has('success') || session()->has('fail'))
            @php
            $color = session()->has('success') ? 'teal' : 'red';
            @endphp
            <div class="fixed left-0 bottom-0 z-50 w-full md:w-1/3 bg-{{ $color }}-100 border-t-4 border-{{ $color }}-500 rounded-b text-{{ $color }}-900 pl-4 pr-1 pb-4 shadow-md"
                x-data="{ show: true }" x-show.transition.opacity.out.duration.1500ms="show"
                x-init="setTimeout(() => show = false, 5000)" role="alert">
                <div>
                    <p class="w-full text-right cursor-pointer" x-on:click="show=false">Cerrar<i
                            class="fas fa-times"></i>
                    </p>
                    <div class="flex">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-{{ $color }}-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">{{ session('success') ?? session('fail') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
