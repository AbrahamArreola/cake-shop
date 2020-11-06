@extends('layouts.mainContent', ['menu' => 'menu3'])

@section('title', 'Registrar productos')

@section('styleFiles')
    <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productCrud.css') }}">
@endsection

@section('content')
    @include('layouts.sectionTitle', ['section' => 'Tienda'])

    <div class="list-view-box">
        <div class="return-section">
            <div class="items" onclick="window.location.replace('/product')">
                <i class="fas fa-arrow-left"></i>
                <p>Regresar</p>
            </div>
        </div>
        <div class="product-info-display">
            <img src="{{ asset('storage/' . $product->image) }}" alt="image">
            <div class="product-right-display">
                <div class="why-text full-width">
                    <h4> {{ $product->name }} </h4>
                    <h5>${{ $product->price }}</h5>
                    <p> {{ $product->description }} </p>
                    <button class="btn hvr-hover" data-toggle="modal" data-target="#confirmModal">Eliminar producto</button>
                </div>
            </div>
        </div>
    </div>

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
