<div class="row">
    <div class="col-6 align-self-center">
        <img class="img-fluid rounded mx-auto d-block zoom" src="{{ asset('uploads/products/' . $food->image) }}">
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="name" class="form-label @error('name') text-danger @enderror">Foods Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $food->name }}"
                name="name" id="name">
            @if ($errors->has('name')) <span
                    class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label for="price" class="form-label @error('price') text-danger @enderror">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror "
                        value="{{ $food->price }}" name="price" id="price"
                        onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);">Nominal
                    : <span id="format"></span>
                    @if ($errors->has('price')) <span
                            class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="stock" class="form-label @error('stock') text-danger @enderror">Stock</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                        value="{{ $food->stock }}" name="stock" id="stock">
                    @if ($errors->has('stock')) <span
                            class="invalid-feedback"><strong>{{ $errors->first('stock') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="form-label @error('description') text-danger @enderror">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror"
                value="{{ $food->description }}" name="description" id="description">
            @if ($errors->has('description')) <span
                    class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span> @endif
        </div>
        <div class="form-group">
            <label for="image" class="form-label @error('image') text-danger @enderror">Upload Foto</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @if ($errors->has('image')) <span
                    class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
            @else
                <small class="text-muted">*jika ingin mengubah foto</small>
            @endif
        </div>
    </div>
</div>
