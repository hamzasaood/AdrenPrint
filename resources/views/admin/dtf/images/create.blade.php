@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add DTF Image</h4>
        <a href="{{ route('admin.dtf-images.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="white_card_body">
        <form action="{{ route('admin.dtf-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="path" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="dtf-transfer-by-size">Dtf Transfer By Size</option>
                    <option value="dtf-gangsheet-upload">Dtf Gangsheet Upload</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
