@extends('admin.layout.default')

@section('admin.content')
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="modal-content cs_modal">
                        <div class="modal-header justify-content-center theme_bg_1">
                            <h5 class="modal-title text_white">{{ isset($product->id) ? 'Edit' : 'Add' }} Product</h5>
                        </div>

                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data"
                                  action="{{ isset($product->id) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
                                  novalidate>
                                @csrf
                                @if(isset($product->id)) @method('PUT') @endif

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Product Name</label>
                                        <input type="text" required name="name" class="form-control"
                                               placeholder="Product Name"
                                               value="{{ old('name', $product->name ?? '') }}">
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="price">Base Price</label>
                                        <input type="number" step="0.01" name="price" class="form-control"
                                               placeholder="Price" value="{{ old('price', $product->price ?? '') }}" required>
                                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" class="form-control" placeholder="Base Stock"
                                               value="{{ old('stock', $product->stock ?? 0) }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="design_type">Design Type</label>
                                        <select name="design_type" class="form-control" required>
                                            <option value="custom" {{ old('design_type', $product->design_type ?? '') == 'custom' ? 'selected' : '' }}>Custom</option>
                                            <option value="dtf" {{ old('design_type', $product->design_type ?? '') == 'dtf' ? 'selected' : '' }}>DTF</option>
                                            <option value="pod" {{ old('design_type', $product->design_type ?? '') == 'pod' ? 'selected' : '' }}>POD</option>
                                        </select>
                                        @error('design_type')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control">
                                        @if(isset($product->image))
                                            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" placeholder="Description">{{ old('description', $product->description ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <h5>Variants (optional)</h5>

                                        <div id="variant-container">
                                            @if(old('variants'))
                                                @foreach(old('variants') as $index => $variant)
                                                    <div class="variant-row row mb-2">
                                                        <div class="col-md-5">
                                                            <label>Variant Name</label>
                                                            <input type="text" name="variants[{{ $index }}][variant_name]" class="form-control" placeholder="Variant Name" value="{{ $variant['variant_name'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Price</label>
                                                            <input type="number" step="0.01" name="variants[{{ $index }}][price]" class="form-control" placeholder="Price" value="{{ $variant['price'] }}">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Stock</label>
                                                            <input type="number" name="variants[{{ $index }}][stock]" class="form-control" placeholder="Stock" value="{{ $variant['stock'] }}">
                                                        </div>
                                                        <div class="col-md-1 d-flex align-items-end">
                                                            <button type="button" class="btn btn-danger remove-variant">X</button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <button type="button" id="add-variant" class="btn btn-sm btn-primary mt-2">+ Add Variant</button>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn_1 full_width text-center">{{ isset($product->id) ? 'Update' : 'Save' }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Variant Row JS -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    let variantIndex = {{ old('variants') ? count(old('variants')) : 0 }};

    document.getElementById('add-variant').addEventListener('click', function () {
        const container = document.getElementById('variant-container');
        const row = document.createElement('div');
        row.classList.add('variant-row', 'row', 'mb-2');
        row.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="variants[${variantIndex}][variant_name]" class="form-control" placeholder="Variant Name">
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="variants[${variantIndex}][price]" class="form-control" placeholder="Price">
            </div>
            <div class="col-md-3">
                <input type="number" name="variants[${variantIndex}][stock]" class="form-control" placeholder="Stock">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-variant">X</button>
            </div>
        `;
        container.appendChild(row);
        variantIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-variant')) {
            e.target.closest('.variant-row').remove();
        }
    });
});
</script>
@endsection
