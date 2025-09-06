@extends('admin.layout.default')

@section('admin.content')

<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header d-flex justify-content-between">
                    <h4>Product Details</h4>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>

                <div class="white_card_body">
                    <h5>{{ $product->name }}</h5>
                    <p><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>
                    <p><strong>Base Price:</strong> ${{ $product->price }}</p>
                    <p><strong>Base Stock:</strong> {{ $product->stock }}</p>
                    <p><strong>Design Type:</strong> {{ ucfirst($product->design_type) }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>

                    @if($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" width="120">
                    @endif

                    <hr>
                    <h6>Variants</h6>

                    @if($product->variants->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->variants as $variant)
                                    <tr>
                                        <td>{{ $variant->variant_name }}</td>
                                        <td>${{ $variant->price ?? '-' }}</td>
                                        <td>{{ $variant->stock }}</td>
                                        <td>{{ $variant->is_active ? 'Active' : 'Inactive' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">No variants.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
