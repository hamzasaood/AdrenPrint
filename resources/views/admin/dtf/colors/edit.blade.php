@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit DTF Color</h4>
        <a href="{{ route('admin.dtf-colors.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="white_card_body">
        <form action="{{ route('admin.dtf-colors.update',$dtf_color) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Key (slug)</label>
                <input type="text" name="key" value="{{ $dtf_color->key }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Label</label>
                <input type="text" name="label" value="{{ $dtf_color->label }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Surcharge ($)</label>
                <input type="number" step="0.01" name="surcharge" value="{{ $dtf_color->surcharge }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="dtf-transfer-by-size" {{ $dtf_color->type === 'dtf-transfer-by-size' ? 'selected' : '' }}>Dtf Transfer By Size</option>
                    <option value="dtf-gangsheet-upload" {{ $dtf_color->type === 'dtf-gangsheet-upload' ? 'selected' : '' }}>Dtf Gangsheet Upload</option>
                </select>
            </div>

            

            <div class="form-check mb-3">
                <input type="checkbox" name="is_active" class="form-check-input" value="1" {{ $dtf_color->is_active ? 'checked':'' }}>
                <label class="form-check-label">Active</label>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
