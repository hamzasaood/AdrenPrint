@extends('admin.layout.default')

@section('admin.content')
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">DTF Colors</h4>
        <a href="{{ route('admin.dtf-colors.create') }}" class="btn btn-primary">Add Color</a>
    </div>

    <div class="white_card_body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Key</th>
                    <th>Label</th>
                    <th>Surcharge</th>
                    <th>Type</th>
                    <th>Status</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($colors as $color)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $color->key }}</td>
                        <td>{{ $color->label }}</td>
                        <td>${{ number_format($color->surcharge,2) }}</td>
                        <td>{{ $color->type }}</td>
                        <td>
                            <span class="badge {{ $color->is_active ? 'bg-success':'bg-danger' }}">
                                {{ $color->is_active ? 'Active':'Inactive' }}
                            </span>
                        </td>
                        
                        <td>
                            <a href="{{ route('admin.dtf-colors.edit',$color) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.dtf-colors.destroy',$color) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this color?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No colors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
