@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit DTF Image</h4>
        <a href="{{ route('admin.dtf-images.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="white_card_body">
        <form action="{{ route('admin.dtf-images.update',$dtf_image) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Current Image</label><br>
                <img src="{{ asset('storage/'.$dtf_image->path) }}" width="150" class="rounded border mb-2">
            </div>

            <div class="mb-3">
                <label class="form-label">Change Image</label>
                <input type="file" name="path" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort" value="{{ $dtf_image->sort }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="dtf-transfer-by-size" {{ $dtf_image->type === 'dtf-transfer-by-size' ? 'selected' : '' }}>Dtf Transfer By Size</option>
                    <option value="dtf-gangsheet-upload" {{ $dtf_image->type === 'dtf-gangsheet-upload' ? 'selected' : '' }}>Dtf Gangsheet Upload</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
