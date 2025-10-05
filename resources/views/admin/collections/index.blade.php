@extends('admin.layout.default')

@section('admin.content')

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<!-- Bootstrap 5 -->


<style>
/* Force Bootstrap modal to always sit on top */
/* Make sure modal is clickable & visible */
/* Bootstrap modal override fix for conflicts */
/* Fix modal layering */



</style>

<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    {{-- Flash Messages --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="box_header m-0 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Collections</h4>
                        <button class="btn_1" data-bs-toggle="modal" data-bs-target="#addCollectionModal">Add New</button>
                    </div>
                </div>

                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="collectionTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Categories</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collections as $collection)
                                        <tr>
                                            <td>{{ $collection->name }}</td>
                                            <td>{{ $collection->slug }}</td>
                                            <td>{{ $collection->description }}</td>
                                            <td>
                                                @foreach($collection->categories as $cat)
                                                    <span class="badge bg-info">{{ $cat->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn"
                                                    data-id="{{ $collection->id }}"
                                                    data-name="{{ $collection->name }}"
                                                    data-slug="{{ $collection->slug }}"
                                                    data-description="{{ $collection->description }}"
                                                    data-categories="{{ $collection->categories->pluck('id') }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCollectionModal">
                                                    Edit
                                                </button>

                                                <form action="{{ route('admin.collections.destroy', $collection->id) }}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger delete-button">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Place modals OUTSIDE the main container --}}
{{-- Add Modal --}}
<div class="modal fade" id="addCollectionModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.collections.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Categories</label>
                    <select name="categories[]" class="form-control" multiple>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold Ctrl to select multiple</small>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Collection</button>
            </div>
        </form>
    </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editCollectionModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editCollectionForm" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="collection_id" id="edit-id">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" id="edit-name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" id="edit-slug" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" id="edit-description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Categories</label>
                    <select name="categories[]" id="edit-categories" class="form-control" multiple>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Collection</button>
            </div>
        </form>
    </div>
</div>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $('#collectionTable').DataTable();

        // Delete confirmation
        $('.delete-form').on('submit', function (e) {
            if (!confirm('Are you sure you want to delete this collection?')) {
                e.preventDefault();
            }
        });

        // Prefill edit modal
        $('.edit-btn').click(function () {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let slug = $(this).data('slug');
            let description = $(this).data('description');
            let categories = $(this).data('categories');

            $('#edit-id').val(id);
            $('#edit-name').val(name);
            $('#edit-slug').val(slug);
            $('#edit-description').val(description);
            $('#edit-categories').val(categories).trigger('change');

            let action = "{{ url('admin/collections') }}/" + id;
            $('#editCollectionForm').attr('action', action);
        });
    });
</script>
@endsection
