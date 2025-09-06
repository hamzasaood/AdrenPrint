@extends('admin.layout.default')

@section('admin.content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            @if (session()->has('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h5 class="modal-title text_white">{{ isset($category) ? 'Edit' : 'Add' }} Category</h5>
                                </div>

                                <div class="modal-body">
                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"
                                        novalidate id="category">
                                        @csrf
                                        @if(isset($category)) @method('PUT') @endif

                                        <div class="mb-3">
                                            <label for="name">Category Name</label>
                                            <input type="text" required name="name" class="form-control"
                                                placeholder="Category Name"
                                                value="{{ old('name', $category->name ?? '') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="is_active">Status</label>
                                            <select  name="is_active" class="form-control"
                                                
                                                value="{{ old('is_active', $category->is_active ?? '') }}">
                                                <option value="1" {{ (isset($category) && $category->is_active) ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ (isset($category) && !$category->is_active) ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="custom-files-upload">
                                                <label for="image" class="custom-labels">Choose File</label>
                                                <input type="file" name="image" id="image" class="form-control" style="display: none;">
                                                @if(isset($category) && $category->image)
                                                    <img src="{{ asset('images/' . $category->image) }}" width="100" class="mt-2">
                                                @endif
                                            </div>
                                        </div>

                                        <button type="submit" class="btn_1 full_width text-center">
                                            {{ isset($category) ? 'Update' : 'Save' }}
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('category');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            let isValid = true;
            let firstInvalid = null;
            form.querySelectorAll('[required]').forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                    if (!firstInvalid) firstInvalid = field;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            if (!isValid) {
                e.preventDefault();
                firstInvalid.focus();
            }
        });

        document.getElementById('image').addEventListener('change', function () {
            const fileList = this.files;
            const fileNames = Array.from(fileList).map(file => file.name).join(', ');
            const output = document.createElement('div');
            output.innerText = `Selected file: ${fileNames}`;
            document.querySelector('.custom-files-upload').appendChild(output);
        });
    });
</script>

@endsection
