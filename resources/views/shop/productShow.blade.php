@extends('layouts.mainContent', ['menu' => 'menu3'])

@section('title', 'Productos')

@section('styleFiles')
    <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('scriptFiles')
    <script src="{{ asset('js/productCrud.js') }}"></script>

    @if ($errors->any())
        <script>
            $('#productModal').modal('show');

        </script>
    @endif

    <script>
        $('#productModal').on('hidden.bs.modal', function() {
            window.location.href = '{{ route('product.show', [$product]) }}'
        });

    </script>
@endsection

@section('content')
    @include('layouts.sectionTitle', ['section' => 'Tienda'])

    <div class="return-section">
        <div class="items" onclick="window.location.replace('{{ url()->previous() }}')">
            <i class="fas fa-arrow-left"></i>
            <p>Regresar</p>
        </div>
    </div>

    <div role="tabpanel" class="tab-pane fade show active" id="list-view">
        <div class="list-view-box">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid" alt="Image">
                            @if (Auth::user() && Auth::user()->role->name == 'admin')
                                <div class="mask-icon">
                                    <ul>
                                        <form action="{{ route('product.update', [$product]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <input type="file" id="image" name="image" style="display: none"
                                                accept=".jpg,.png,.jpeg,.svg" onchange="this.form.submit()">

                                            <li><button type="button" data-toggle="tooltip" data-placement="right"
                                                    title="Modificar imagen"
                                                    onclick="document.getElementById('image').click()"><i
                                                        class=" fas fa-camera"></i></button></li>
                                        </form>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                    <div class="why-text full-width">
                        <h4>{{ $product->name }}</h4>
                        <h5>${{ $product->price }}</h5>
                        <p>{{ $product->description }}</p>
                        @if (Auth::user())
                            @if (Auth::user()->role->name == 'admin')
                                <button class="btn hvr-hover" data-toggle="modal" data-target="#productModal">Editar
                                    producto</button>
                                <button class="btn hvr-hover delete" data-toggle="modal"
                                    data-target="#confirmModal">Eliminar
                                    producto</button>
                            @else
                                <button class="btn hvr-hover">Agregar al carrito</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shop.productForm')

    {{-- Confirmation modal --}}
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro que deseas eliminar este producto?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('product.destroy', [$product]) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn primary">Sí</button>
                    </form>
                    <button type="button" class="btn secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

@endsection
