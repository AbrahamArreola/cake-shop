{{-- Start Shop Page --}}
<div class="shop-box-inner" x-data="{showSuccess: false}">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            @can('admin-settings')
                                <button class="btn hvr-hover" data-toggle="modal" data-target="#productModal">Agregar
                                    producto</button>
                            @endcan
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i
                                            class="fa fa-th"></i> </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i
                                            class="fa fa-list-ul"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">

                                    @if (count($products) == 0)
                                        <h2>No hay productos que mostrar</h2>
                                    @else
                                        @foreach ($products as $prod)
                                            @php
                                            $productDate = new DateTime($prod->created_at);
                                            $currentDate = new DateTime(date('Y-m-d H:i:s'));
                                            $daysDiff = $productDate->diff($currentDate)->days;
                                            @endphp

                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">
                                                                {{ $daysDiff <= $maxDays ? 'Nuevo' : 'En venta' }}
                                                            </p>
                                                        </div>
                                                        <img src="{{ asset('storage/products/' . $prod->image) }}"
                                                            class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                @can('client-settings')
                                                                    <li><a x-on:click="showSuccess=true; setTimeout(() => { showSuccess = false; }, 1000);"
                                                                            wire:click="addToCart({{ $prod->id }})"
                                                                            class="cursor-pointer" data-toggle="tooltip"
                                                                            data-placement="right"
                                                                            title="Agregar al carrito">
                                                                            <i
                                                                                class="fas fa-shopping-cart text-white"></i></a>
                                                                    </li>
                                                                @endcan
                                                                <li><a href="{{ route('product.show', [$prod]) }}"
                                                                        data-toggle="tooltip" data-placement="right"
                                                                        title="Ver">
                                                                        <i class="fas fa-eye"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <h4>{{ $prod->name }}</h4>
                                                        <h5>${{ $prod->price }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="list-view">

                                @if (count($products) == 0)
                                    <h2>No hay productos que mostrar</h2>
                                @else
                                    @foreach ($products as $prod)
                                        @php
                                        $productDate = new DateTime($prod->created_at);
                                        $currentDate = new DateTime(date('Y-m-d H:i:s'));
                                        $daysDiff = $productDate->diff($currentDate)->days;
                                        @endphp

                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="new">
                                                                    {{ $daysDiff <= $maxDays ? 'Nuevo' : 'En venta' }}
                                                                </p>
                                                            </div>
                                                            <img src="{{ asset('storage/products/' . $prod->image) }}"
                                                                class="img-fluid" alt="Image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                    <div class="why-text full-width">
                                                        <h4>{{ $prod->name }}</h4>
                                                        <h5>${{ $prod->price }}</h5>
                                                        <p> {{ $prod->description }}</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <input class="form-control" placeholder="Buscar producto" type="text" wire:model="searchString"
                            wire:input="filterSearch">
                        <button type="submit"> <i class="fa fa-search"></i> </button>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Categorías</h3>
                            @can('admin-settings')
                                <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="right"
                                    title="Editar categorías" id="editCategoriesTrigger"
                                    onclick="$(this).tooltip('hide');"></i>
                            @endcan
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                            data-children=".sub-men">

                            @if (count($categories) == 0)
                                <p>No hay categorías que mostrar</p>
                            @else
                                @foreach ($categories as $category)
                                    <div class="list-group-collapse sub-men">
                                        <a class="list-group-item list-group-item-action"
                                            href="{{ '#sub-men' . $category->id }}" data-toggle="collapse"
                                            aria-expanded="true" aria-controls="{{ 'sub-men' . $category->id }}">
                                            {{ $category->name }}
                                            <small class="text-muted"> {{ count($category->products) }} </small>
                                        </a>
                                        <div class="collapse show" id="{{ 'sub-men' . $category->id }}"
                                            data-parent="#list-group-men">
                                            <div class="list-group">

                                                @foreach ($category->products as $prod)
                                                    <a href="{{ route('product.show', [$prod]) }}"
                                                        class="list-group-item list-group-item-action">
                                                        {{ $prod->name }}
                                                    </a>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="filter-price-left">
                        <div class="title-left">
                            <h3>Precio</h3>
                        </div>
                        <div class="price-box-slider">
                            <div id="slider">
                                <input type="range" id="priceRange" min="0" max="2000" style="width: 100%"
                                    wire:model="priceValue">
                            </div>
                            <p>
                                <input type="text" id="amount" readonly value="$0 - $1000"
                                    style="border:0; color: #808080; font-weight:bold; background: #f5f5f5">
                                <button class="btn hvr-hover" type="submit" wire:click="filterByPrice">Filtrar</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Product added to cart success message --}}
    <div x-show.transition.opacity.out.duration.1500ms="showSuccess"
        class=" fixed left-0 bottom-0 z-50 w-full md:w-1/3 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
        role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                </svg></div>
            <div>
                <p class="font-bold">Producto agregado al carrito</p>
            </div>
        </div>
    </div>

    {{-- Product/category added success message --}}
    @if (session()->has('success'))
        <div x-show.transition.opacity.out.duration.1500ms="show"
            class=" fixed left-0 bottom-0 z-50 w-full md:w-1/3 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 pl-4 pr-1 pb-4 shadow-md"
            x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" role="alert">
            <div>
                <p class="w-full text-right cursor-pointer" x-on:click="show = false">Cerrar<i
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
                        <p class="font-bold">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
{{-- End Shop Page --}}
