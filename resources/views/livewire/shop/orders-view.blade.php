<div class="min-h-screen w-full md:p-10">
    <div class="w-full rounded-lg shadow-lg bg-cm-pink1 py-10 text-center" style="min-height: 44em">
        <img class="w-40 h-40 rounded-full mx-auto mb-8" src="{{ asset('assets/images/order.jpg') }}" alt="order">

        @foreach ($orders as $order)
            <div class="inline-block rounded bg-gray-200 w-64 p-2 m-2">
                <div class="flex justify-between py-1">
                    <h3 class="text-sm pl-2 text-base">Order #{{ $order->id }}</h3>
                    @if ($order->state == 0)
                        <p class="text-gray-500">Status: En proceso</p>
                    @else
                        <p class="text-green-500">Status: tomado</p>
                    @endif
                </div>
                <div class="text-sm mt-2">
                    <div class="bg-white p-2 rounded mt-1 border-b border-grey hover:bg-grey-lighter">
                        <b>Fecha:</b> {{ $order->created_at }}
                    </div>

                    <div class="bg-white p-2 rounded mt-1 border-b border-grey hover:bg-grey-lighter">
                        <b>Total:</b> ${{ $order->amount }}
                    </div>

                    <div
                        class="bg-white p-2 rounded mt-1 border-b border-grey hover:bg-grey-lighter divide-y divide-gray-300 overflow-auto">
                        <p><b>Productos</b></p>
                        <div class="h-24">
                            @foreach ($order->products as $product)
                                <p>{{ $product->pivot->quantity . ' x ' . $product->name . '  $' . $product->price }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @can('admin-settings')
                    @if ($order->state == 0)
                        <button class="bg-cm-main-pink px-2 py-1 mt-3 text-white rounded focus:outline-none hover:bg-black"
                            wire:click="takeOrder({{ $order->id }})"><b>Tomar
                                pedido</b></button>
                    @endif
                @endcan
            </div>
        @endforeach
    </div>
</div>
