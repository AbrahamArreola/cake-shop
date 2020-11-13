{{-- Start Product Modal --}}
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    {{ isset($product) ? 'Editar producto' : 'Registrar producto' }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @if (isset($product))
                    <form action="{{ route('product.update', [$product]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    @error('name')
                        <p class="text-danger"> ({{ $message }}) </p>
                    @enderror
                    <input type="text"
                        class="form-control resettable {{ $errors->has('name') ? 'errorValidation' : '' }}" id="name"
                        name="name" value="{{ old('name') ?? ($product->name ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="price">Precio ($)</label>
                    @error('price')
                        <p class="text-danger"> ({{ $message }}) </p>
                    @enderror
                    <input type="number"
                        class="form-control resettable {{ $errors->has('price') ? 'errorValidation' : '' }}" id="price"
                        name="price" min="0" max="5000" step="0.01"
                        value="{{ old('price') ?? ($product->price ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="category_id">Categoría</label>
                    @if ($errors->has('category_id'))
                        <p class="text-danger"> ({{ $errors->first('category_id') }}) </p>
                    @endif
                    <select class="form-control {{ $errors->has('category_id') ? 'errorValidation' : '' }}"
                        id="category" name="category_id" value="2">
                        <option selected disabled hidden>
                            {{ count($categories) == 0 ? 'Es necesario crear una categoría' : 'Selecciona una categoría' }}
                        </option>

                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id || (isset($product) && $product->category_id == $category->id))
                                <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                            @else
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    @error('description')
                        <p class="text-danger"> ({{ $message }}) </p>
                    @enderror
                    <textarea class="form-control resettable {{ $errors->has('description') ? 'errorValidation' : '' }}"
                        id="description" name="description" rows="3"
                        style="resize: none">{{ old('description') ?? ($product->description ?? '') }}</textarea>
                </div>

                @if (!isset($product))
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        @error('image')
                            <p class="text-danger"> ({{ $message }}) </p>
                        @enderror
                        <input type="file" class="form-control-file resettable" id="image" name="image"
                            accept=".jpg,.png,.jpeg,.svg">
                    </div>
                @endif

                <button id="registerProductButton" type="submit" style="display: none"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" onclick="document.getElementById('registerProductButton').click()">
                    {{ isset($product) ? 'Guardar cambios' : 'Registrar' }}
                </button>
            </div>
        </div>
    </div>
</div>
{{-- End Product Modal --}}
