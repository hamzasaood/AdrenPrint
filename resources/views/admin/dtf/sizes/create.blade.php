@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add DTF Size</h4>
        <a href="{{ route('admin.dtf-sizes.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="white_card_body">
        <form action="{{ route('admin.dtf-sizes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Width (in)</label>
                    <input type="number" step="0.01" name="width" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Height (in)</label>
                    <input type="number" step="0.01" name="height" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Rate ($)</label>
                <input type="number" step="0.01" name="rate" class="form-control" required>
            </div>

           

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="dtf-transfer-by-size">Dtf Transfer By Size</option>
                    <option value="dtf-gangsheet-upload">Dtf Gangsheet Upload</option>
                </select>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" class="form-check-input" value="1" checked>
                <label class="form-check-label">Active</label>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
