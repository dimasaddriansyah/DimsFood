<div class="row">
    <div class="col-6 align-self-center">
        <img class="img-fluid rounded mx-auto d-block zoom" src="{{ asset('uploads/products/' . $food->image) }}">
    </div>
    <div class="col-6">
        <div class="form-group">
            <label class="form-label">Foods Name</label>
            <input type="text" class="form-control" value="{{ $food->name }}" disabled>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control " value="{{ $food->price }}" disabled>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control" value="{{ $food->stock }}" disabled>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" value="{{ $food->description }}" disabled>
        </div>
    </div>
</div>
