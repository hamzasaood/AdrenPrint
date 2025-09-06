@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add DTF Color</h4>
        <a href="{{ route('admin.dtf-colors.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="white_card_body">
        <form action="{{ route('admin.dtf-colors.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Key (slug)</label>
                <input type="text" name="key" class="form-control" placeholder="e.g. white" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Label</label>
                <input type="text" name="label" class="form-control" placeholder="e.g. White Ink" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Surcharge ($)</label>
                <input type="number" step="0.01" name="surcharge" class="form-control" value="0">
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
