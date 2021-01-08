@can('admin-settings')
    <li class="side-menu">
        <a href="{{ route('orders') }}">
            <i class="fas fa-bell"></i>
            <span class="badge">{{ $notifications > 0 ? $notifications : '' }}</span>
            <p>Pedidos</p>
        </a>
    </li>

    @elsecannot('admin-settings')
    <li class="side-menu side-menu-animate">
        <a href="#">
            <i class="fa fa-shopping-bag"></i>
            <span class="badge">{{ $notifications > 0 ? $notifications : '' }}</span>
            <p>Carrito</p>
        </a>
    </li>
@endcan
