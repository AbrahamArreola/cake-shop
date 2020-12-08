<ul class="cart-list">
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
            <li>
                <a href="{{ route('product.show', [$product]) }}" class="photo"><img
                        src="{{ asset('storage/products/' . $product->image) }}" class="cart-thumb" alt="" /></a>
                <h6><a href="{{ route('product.show', [$product]) }}">{{ $product->name }}</a></h6>
                <p>{{ $productAmount }}x - <span class="price">${{ $product->price }}</span></p>
            </li>
        @endif
    @endforeach
    <li class="total">
        <a href="{{ route('shopCart') }}" class="btn btn-default hvr-hover btn-cart">VER CARRITO</a>
        <span class="float-right"><strong>Total</strong>: ${{ $total }}</span>
    </li>
</ul>
