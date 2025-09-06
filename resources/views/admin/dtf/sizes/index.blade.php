@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">DTF Sizes</h4>
        <a href="{{ route('admin.dtf-sizes.create') }}" class="btn btn-primary">+ Add Size</a>
    </div>

    <div class="white_card_body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Width</th>
                    <th>Height</th>
                    <th>Rate</th>
                    <th>Type</th>
                    <th>Active</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sizes as $size)
                <tr>
                    <td>{{ $size->title }}</td>
                    <td>{{ $size->width }}</td>
                    <td>{{ $size->height }}</td>
                    <td>${{ number_format($size->rate,2) }}</td>
                    <td>{{ $size->type }}</td>
                    <td>{{ $size->is_active ? 'Yes':'No' }}</td>
                    
                    <td>
                        <a href="{{ route('admin.dtf-sizes.edit',$size) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.dtf-sizes.destroy',$size) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this size?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $sizes->links() }}
    </div>
</div>
@endsection
