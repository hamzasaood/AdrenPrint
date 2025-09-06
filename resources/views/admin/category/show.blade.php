@extends('admin.layout.default')

@section('admin.content')
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>


<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2>Product Details</h2>
                        </div>
                        <div class="col-lg-6 text-right" style="text-align:end;">
                            <a href="{{ url('/admin/products') }}" class="btn btn-secondary">Back to Products</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="white_box mb-30">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="product_image text-center">
                                <img src="{{ isset($product->featured_img) ? asset($product->featured_img) : asset('images/default.jpg') }}" 
                                     alt="{{ $product->name }}" class="img-fluid rounded mb-3">
                            </div>

                            <!-- Gallery Images -->
                            @if(count($product->galleries) > 0)
                                <h4>Product Gallery</h4>
                                <div class="row">
                                    @foreach($product->galleries as $gallery)
                                        <div class="col-md-3 mb-3">
                                            <div class="gallery-image text-center">
                                                <img src="{{ asset($gallery->img) }}" alt="Gallery Image" class="img-fluid rounded" width="150">
                                                <form action="{{ route('deleteGalleryImage', ['productId' => $product->id, 'galleryId' => $gallery->id]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No gallery images found.</p>
                            @endif
                        </div>

                        <div class="col-md-8">
                            <div class="product_details">
                                <h3>{{ $product->name }}</h3>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Price (Incl. VAT):</strong> {{ $product->price_incl_vat }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Price (Excl. VAT):</strong> {{ $product->price_excl_vat }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Stock Quantity:</strong> {{ $product->stock }}</p>
                                    </div>
                                </div>
                                
                                <!-- Category and Subcategory -->
                                <div class="row">
                                <div class="col-md-4">
                                        <p><strong>Brand:</strong> 
                                            @if($product->brand)
                                                {{ $product->brand->name }}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Category:</strong> 
                                            @if($product->category)
                                                {{ $product->category->name }}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>Subcategory:</strong> 
                                            @if($product->subcategory)
                                                {{ $product->subcategory->name }}
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <!-- Car Specific Fields -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Car Make:</strong> {{ $product->car_make }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Car Model:</strong> {{ $product->car_model }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Car Year:</strong> {{ $product->car_year }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Fuel Type:</strong> {{ ucfirst($product->car_fuel) }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Engine Type:</strong> {{ $product->car_engine }}</p>
                                    </div>
                                </div>
                                
                                <!-- Product Description -->
                                <h4>Description</h4>
                                <div class="product-descriptions">
                                <textarea name="description" id="product-description" class="form-control"
                                                          placeholder="Product Description">{{ isset($product) ? $product->description : '' }}</textarea>

                                    
                                </div>

                                <!-- Add New Gallery Images -->
                                <form method="POST" action="{{ url('/admin/upload-gallery-images/'.$product->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="gallery_images">Upload New Gallery Images</label>
                                        <input type="file" name="images[]" id="gallery_images" class="form-control" multiple>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload Images</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
ClassicEditor
        .create(document.querySelector('#product-description'))
        .catch(error => {
            console.error(error);
        });
        </script>

@endsection
