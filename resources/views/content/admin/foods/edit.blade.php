<div class="row">
    <div class="col-6 align-self-center">
        <img class="img-fluid rounded mx-auto d-block zoom" src="{{ asset('uploads/' . $food->image) }}">
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Nama Makanan</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ $food->name }}" style=text-transform: capitalize;>
            @if ($errors->has('name')) <span
                    class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span> @endif
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label>Harga Makanan</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                        value="{{ $food->harga }}"
                        onkeyup="document.getElementById('format').innerHTML = formatCurrency(this.value);">Nominal
                    : <span id="format"></span>
                    @if ($errors->has('harga')) <span
                            class="invalid-feedback"><strong>{{ $errors->first('harga') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Stok Makanan</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                        value="{{ $food->stok }}">
                    @if ($errors->has('stok')) <span
                            class="invalid-feedback"><strong>{{ $errors->first('stok') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi Makanan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                value="{{ $food->keterangan }}" style="text-transform: capitalize;">
            @if ($errors->has('keterangan'))
                <span class="invalid-feedback"><strong>{{ $errors->first('keterangan') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <label>Upload Foto</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @if ($errors->has('image')) <span
                    class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span> @endif
            <small class="text-muted">*jika ingin mengubah foto</small>
        </div>
    </div>
</div>
</form>
