<div class="min-h-screen w-full md:p-10" x-data="{ showSuccess: false }">
    <div class="w-full rounded-lg shadow-lg bg-cm-pink1 py-10 text-center" style="min-height: 44em">
        <img class="w-40 h-40 rounded-full mx-auto mb-8" src="{{ asset('assets/images/order.jpg') }}" alt="order">

        @foreach ($orders as $order)
            @if (!$order->user->trashed())
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
                            <button
                                class="bg-cm-main-pink px-2 py-1 mt-3 text-white rounded focus:outline-none hover:bg-black"
                                x-on:click="showSuccess = true" wire:click="takeOrder({{ $order->id }})"><b>Tomar
                                    pedido</b></button>
                        @endif
                    @endcan
                </div>
            @endif
        @endforeach
    </div>

    <div x-show.transition.opacity.out.duration.1500ms="showSuccess"
        class=" fixed left-0 bottom-0 z-50 w-full md:w-1/3 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 pl-4 pr-1 pb-4 shadow-md"
        role="alert">
        <div>
            <p class="w-full text-right cursor-pointer" x-on:click="showSuccess = false">Cerrar<i
                    class="fas fa-times"></i></p>
            <div class="flex">
                <div class="py-1">
                    <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Ahora usted atiende este pedido</p>
                </div>
            </div>
        </div>
    </div>
</div>
