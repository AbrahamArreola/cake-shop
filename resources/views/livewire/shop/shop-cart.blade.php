{{-- Start Shop Cart --}}
<div class="relative cart-box-main" x-data="{ loading: false }">
    <div @loading-window.window="loading = true;setTimeout(() => loading = false, 800)" x-show="loading"
        class="absolute inset-0 h-full z-10 flex justify-center" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="spinner-border fixed top-2/4 w-28 h-28" role="status" style="color: white">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
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
                            <hr>
                        @endif
                    @endforeach
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
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Seleccione un método de pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="w-full flex justify-center">
                            <div id="payment-options">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="card-option"
                                        value="card">
                                    <label class="form-check-label" for="card-option">
                                        Tarjeta de crédito/débito
                                    </label>
                                    <img src="{{ asset('assets/images/card-logos.png') }}" alt="Available payment cards"
                                        class="inline-block w-aut h-4 ml-2">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="paypal-option"
                                        value="paypal">
                                    <label class="form-check-label" for="paypal-option">
                                        Paypal
                                    </label>
                                    <img src="{{ asset('assets/images/paypal-logo.png') }}" alt="Paypal payment method"
                                        class="inline-block w-aut h-4 ml-2">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="cash-option"
                                        value="cash" checked>
                                    <label class="form-check-label" for="cash-option">
                                        Efectivo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hidden flex flex-col space-y-2 w-full mt-2 bg-gray-100 rounded border border-black p-2"
                            id="card-payment" wire:ignore>
                            <div id="payment-form">
                                <div class="form-row">
                                    <div id="card-element"></div>
                                    <div id="card-errors" role="alert" class=" text-red-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn primary" id="acceptOrder" wire:loading.attr="disabled">

                            <p wire:loading.remove>Realizar pago</p>
                            <div class="text-red-400" wire:loading>
                                <div class="spinner-border inline-block w-6 h-6" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <p class="inline-block">Espere por favor...</p>
                            </div>

                        </button>
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

        <input type="hidden" id="stripe_key" value="{{ env('STRIPE_KEY') }}"/>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $("#payment-options").click(function() {
            if ($("#card-option").is(":checked")) {
                $("#card-payment").slideDown();
            } else {
                $("#card-payment").slideUp();
            }
        });

        $(function loadStripe() {
            // Create a Stripe client.
            var stripeKey = document.getElementById('stripe_key').value;
            var stripe = Stripe(stripeKey);

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            $("#acceptOrder").on("click", function() {
                var paymentOption = $('#payment-options input:radio:checked').val()

                if (paymentOption === "card") {
                    stripe.createToken(card).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Send the token to your server.
                            Livewire.emit("confirm:order", {
                                paymentOption,
                                token: result.token.id
                            });
                        }
                    });
                } else {
                    Livewire.emit("confirm:order", {
                        paymentOption
                    });
                }
            });
        });

    </script>
</div>
