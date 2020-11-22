{{-- Start Shop Page --}}
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            @if (Auth::user() && Auth::user()->is_admin)
                                <button class="btn hvr-hover" data-toggle="modal" data-target="#productModal">Agregar
                                    producto</button>
                            @endif
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
                                        <h2>Nothing to show</h2>
                                    @else
                                        @foreach ($products as $prod)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="{{ asset('storage/' . $prod->image) }}"
                                                            class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
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
                                    <h2>Nothing to show</h2>
                                @else
                                    @foreach ($products as $prod)
                                        <div class="list-view-box">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="new">New</p>
                                                            </div>
                                                            <img src="{{ asset('storage/' . $prod->image) }}"
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
                            <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="right"
                                title="Editar categorías" id="editCategoriesTrigger"
                                onclick="$(this).tooltip('hide');"></i>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                            data-children=".sub-men">

                            @if (count($categories) == 0)
                                <p>Nothing to show</p>
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
</div>
{{-- End Shop Page --}}
