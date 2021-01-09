<tr>
    <td class="thumbnail-img">
        <a href="{{ route('product.show', [$product]) }}">
            {{-- <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}"
                alt="{{ $product->name }}" /> --}}
            {{-- Static image for heroku deployment --}}
            <img src="{{ asset('assets/images/desserts.jpeg') }}" class="img-fluid" alt="Desserts image">
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

    <td class="quantity-box">
        <div class="flex">
            <p class="pt-2 w-6">{{ $productAmount }}</p>
            <div class="flex flex-col ml-4 text-lg space-y-2">
                <button class="fas fa-angle-up block cursor-pointer" wire:click="upAmount"
                    wire:loading.attr="disabled"></button>
                <button class="fas fa-angle-down block cursor-pointer" wire:click="downAmount"
                    wire:loading.attr="disabled"></button>

            </div>
        </div>
    </td>
    <td class="total-pr">
        <p class="w-16 m-0">${{ $productAmount * $product->price }}</p>
    </td>
    <td class="remove-pr">
        <button class="focus:outline-none" wire:click="removeProduct">
            <i class="fas fa-times"></i>
        </button>
    </td>
</tr>
