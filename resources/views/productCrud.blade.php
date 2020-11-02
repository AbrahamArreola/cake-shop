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
                                <button class="btn hvr-hover" data-toggle="modal" data-target="#exampleModalCenter">Agregar
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
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="{{ asset('assets/images/img-pro-02.jpg') }}" class="img-fluid"
                                                        alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                    title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                    title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                    title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                            </li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
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
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                        title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                        title="Compare"><i class="fas fa-sync-alt"></i></a>
                                                                </li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                        title="Add to Wishlist"><i
                                                                            class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> <del>$ 60.00</del> $40.79</h5>
                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien,
                                                        imperdiet quis magna nec, iaculis ultrices ante. Integer vitae
                                                        suscipit nisi. Morbi dignissim risus sit amet orci porta, eget
                                                        aliquam purus
                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in
                                                        blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis
                                                        euismod ex volutpat in. Vestibulum eleifend eros ac lobortis
                                                        aliquet.
                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin
                                                        quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut
                                                        placerat lectus.</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                                data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1"
                                        data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Fruits & Drinks
                                        <small class="text-muted">(100)</small>
                                    </a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Fruits 1
                                                <small class="text-muted">(50)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 2 <small
                                                    class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 3 <small
                                                    class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 4 <small
                                                    class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 5 <small
                                                    class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2"
                                        data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Vegetables
                                        <small class="text-muted">(50)</small>
                                    </a>
                                    <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 1 <small
                                                    class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 2 <small
                                                    class="text-muted">(20)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 3 <small
                                                    class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small
                                        class="text-muted">(150) </small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small
                                        class="text-muted">(11)</small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small
                                        class="text-muted">(22)</small></a>
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

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                            <input type="number" class="form-control" id="price" name="price" min="0" max="5000" placeholder="$300">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Categoría</label>
                            <select class="form-control" id="categorie" name="categorie">
                                <option selected disabled hidden>Selecciona una categoría</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                style="resize: none" placeholder="Delicioso"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn">Registrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
