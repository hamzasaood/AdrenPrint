@extends('admin.layout.default')

@section('admin.content')

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="box_header m-0 d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Categories</h4>
                        <a href="{{ route('admin.categories.create') }}" class="btn_1">Add New</a>
                    </div>
                </div>

                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="categoryTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $c)
                                        <tr>
                                            <td>{{ $c->name }}</td>
                                            <td>
                                                @if($c->image)
                                                    <img src="{{ asset('images/' . $c->image) }}" width="50" height="50">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>{{ $c->is_active ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $c->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                
                                                <form action="{{ route('admin.categories.destroy', $c->id) }}" method="POST" class="d-inline delete-form">
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

    <!-- Delete Confirmation -->
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();

            $('.delete-form').on('submit', function (e) {
                if (!confirm('Are you sure you want to delete this category?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</div>
@endsection
