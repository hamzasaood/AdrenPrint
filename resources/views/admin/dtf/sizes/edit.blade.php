@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit DTF Size</h4>
        <a href="{{ route('admin.dtf-sizes.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="white_card_body">
        <form action="{{ route('admin.dtf-sizes.update',$dtf_size) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $dtf_size->title }}" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Width (in)</label>
                    <input type="number" step="0.01" name="width" value="{{ $dtf_size->width }}" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Height (in)</label>
                    <input type="number" step="0.01" name="height" value="{{ $dtf_size->height }}" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Rate ($)</label>
                <input type="number" step="0.01" name="rate" value="{{ $dtf_size->rate }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort" value="{{ $dtf_size->sort }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="dtf-transfer-by-size" {{ $dtf_size->type === 'dtf-transfer-by-size' ? 'selected' : '' }}>Dtf Transfer By Size</option>
                    <option value="dtf-gangsheet-upload" {{ $dtf_size->type === 'dtf-gangsheet-upload' ? 'selected' : '' }}>Dtf Gangsheet Upload</option>
                </select>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $dtf_size->is_active ? 'checked':'' }}>
                <label class="form-check-label">Active</label>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
