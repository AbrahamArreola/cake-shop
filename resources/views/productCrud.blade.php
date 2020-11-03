@extends('layouts.mainContent', ['menu' => 'menu3'])

@section('title', 'Registrar productos')

@section('styleFiles')
    <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')
    <script src="{{ asset('js/productCrud.js') }}"></script>
@endsection

@section('content')
    @include('layouts.sectionTitle', ['section' => 'Tienda'])

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <button class="btn hvr-hover" data-toggle="modal" data-target="#productModal">Agregar
                                    producto</button>
                                <p>Mostrando los resultados</p>
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
                                            @foreach ($products as $product)
                                                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                    <div class="products-single fix">
                                                        <div class="box-img-hover">
                                                            <div class="type-lb">
                                                                <p class="sale">Sale</p>
                                                            </div>
                                                            <img src="{{ asset('assets/images/img-pro-02.jpg') }}"
                                                                class="img-fluid" alt="Image">
                                                            <div class="mask-icon">
                                                                <a class="cart" href="#">Editar producto</a>
                                                            </div>
                                                        </div>
                                                        <div class="why-text">
                                                            <h4>{{ $product->name }}</h4>
                                                            <h5>${{ $product->price }}</h5>
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
                                        @foreach ($products as $product)
                                            <div class="list-view-box">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                        <div class="products-single fix">
                                                            <div class="box-img-hover">
                                                                <div class="type-lb">
                                                                    <p class="new">New</p>
                                                                </div>
                                                                <img src="{{ asset('assets/images/img-pro-02.jpg') }}"
                                                                    class="img-fluid" alt="Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                        <div class="why-text full-width">
                                                            <h4>{{ $product->name }}</h4>
                                                            <h5>${{ $product->price }}</h5>
                                                            <p> {{ $product->description }}</p>
                                                            <a class="btn hvr-hover" href="#">Editar producto</a>
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
                            <form action="#">
                                <input class="form-control" placeholder="Buscar producto" type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categorías</h3>
                                <i class="fa fa-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="right"
                                    title="Editar categorías" id="editCategoriesTrigger"></i>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                                data-children=".sub-men">

                                @if (count($categories) == 0)
                                    <p>Nothing to show</p>
                                @else
                                    @foreach ($categories as $category)
                                        <div class="list-group-collapse sub-men">
                                            <a class="list-group-item list-group-item-action" href="#sub-men1"
                                                data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">
                                                {{ $category->name }}
                                                <small class="text-muted"> {{ count($category->products) }} </small>
                                            </a>
                                            <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                                <div class="list-group">

                                                    @foreach ($category->products as $product)
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            {{ $product->name }}
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
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly
                                        style="border:0; color: #808080; font-weight:bold; background: #f5f5f5">
                                    <button class="btn hvr-hover" type="submit">Filtrar</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registrar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nombre del producto</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Pastel red velvet">
                        </div>
                        <div class="form-group">
                            <label for="price">Precio ($)</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" max="5000"
                                placeholder="$300">
                        </div>
                        <div class="form-group">
                            <label for="category">Categoría</label>
                            <select class="form-control" id="category" name="category">
                                <option selected disabled hidden>Selecciona una categoría</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3" style="resize: none"
                                placeholder="Delicioso"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar categorías</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn">Editar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
