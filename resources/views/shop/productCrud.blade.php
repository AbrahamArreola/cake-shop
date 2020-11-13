@extends('layouts.mainContent', ['menu' => 'menu3'])

@section('title', 'Registrar productos')

@section('styleFiles')
    <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')
    <script src="{{ asset('js/productCrud.js') }}"></script>

    @if ($errors->any() || isset($product))
        @if ($errors->has('categoryName') || $errors->has('categoryColumnName'))
            <script>
                $('#categoryModal').modal('show');

            </script>
        @else
            <script>
                $('#productModal').modal('show');

            </script>
        @endif
    @endif

    @if (isset($product))
        <script>
            $('#productModal').on('hidden.bs.modal', function() {
                window.location.replace('/product');
            });

        </script>
    @endif

@endsection

@section('content')
    @include('layouts.sectionTitle', ['section' => 'Tienda'])

    {{-- Start Shop Page --}}
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
                            <form action="#">
                                <input class="form-control" placeholder="Buscar producto" type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
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
    {{-- End Shop Page --}}

    @include('shop.productForm')

    {{-- Start Category Modal --}}
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Categorías</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-category-form" action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="categoryName">
                        <button type="submit" class="btn">Agregar categoría</button>
                    </form>
                    @error('categoryName')
                        <p class="text-danger"> ({{ $message }}) </p>
                    @enderror

                    <div class="body-scroll-container">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Categoría</th>
                                    <th scope="col" style="width: 10%">Acciones</th>
                                    <th scope="col" style="width: 10%"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <form action="{{ route('category.update', [$category]) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <td>
                                                <input type="text" class="form-control" name="categoryColumnName"
                                                    value="{{ $category->name }}">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn secondary"><i class="fa fa-refresh"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </form>
                                        <form action="{{ route('category.destroy', [$category]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <td>
                                                <button type="submit" class="btn primary"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @error('categoryColumnName')
                        <p class="text-danger"> ({{ $message }}) </p>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn">Editar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Category Modal --}}

@endsection
