<div class="row">
    <div class="col-6 align-self-center">
        <img class="img-fluid rounded mx-auto d-block zoom" src="{{ asset('uploads/products/' . $drink->image) }}">
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class="form-label">Drinks Name</label>
            <input type="text" class="form-control" value="{{ $drink->name }}" readonly style="input:read-only{}">
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control " value="{{ $drink->price }}" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control" value="{{ $drink->stock }}" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" value="{{ $drink->description }}" readonly>
        </div>
    </div>
</div>

