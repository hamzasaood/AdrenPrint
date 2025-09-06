@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">DTF Images</h4>
        <a href="{{ route('admin.dtf-images.create') }}" class="btn btn-primary">Add Image</a>
    </div>

    <div class="white_card_body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Preview</th>
                    <th>Path</th>
                    <th>Sort</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($images as $image)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('/dtf-transfer/'.$image->path) }}" alt="DTF Image" width="100" class="border rounded">
                        </td>
                        <td>{{ $image->path }}</td>
                        <td>{{ $image->sort }}</td>
                        <td>{{ $image->type }}</td>
                        <td>
                            <a href="{{ route('admin.dtf-images.edit',$image) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.dtf-images.destroy',$image) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this image?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No images found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
