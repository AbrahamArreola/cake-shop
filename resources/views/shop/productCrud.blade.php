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
    @livewire('shop-container', ['products' => $products, 'categories' => $categories])
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
