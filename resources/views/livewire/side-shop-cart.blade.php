<ul class="cart-list">
    @foreach ($products as $product)
        <li>
            <a href="{{ route('product.show', [$product]) }}" class="photo"><img
                    src="{{ asset('storage/products/' . $product->image) }}" class="cart-thumb" alt="" /></a>
            <h6><a href="{{ route('product.show', [$product]) }}">{{ $product->name }}</a></h6>
            <p><span class="price">${{ $product->price }}</span></p>
        </li>
    @endforeach
    <li class="total">
        <a href="#" class="btn btn-default hvr-hover btn-cart">VER CARRITO</a>
    </li>
</ul>
