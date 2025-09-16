@extends('layout.default')

@section('content')
<style>

.color-circle {
    display: inline-block;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 2px solid #ddd;
    cursor: pointer;
}

.color-option input {
    display: none;
}

.color-option input:checked + .color-circle {
    border: 2px solid #000; /* highlight selected color */
}

</style>


<style>
/* Product Detail Styling */
.product-detail-sec {
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.product-image-container {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    background: #fafafa;
    padding: 16px;
}

.product-text-container h5 {
    font-size: 24px;
    line-height: 1.4;
}

.quick-view-text {
    color: #555;
    font-size: 15px;
    line-height: 1.6;
}

/* Color Swatches */
.color-circle {
    display: inline-block;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid #ddd;
    cursor: pointer;
    transition: all 0.2s ease;
}
.color-circle:hover {
    transform: scale(1.1);
}
.color-option input {
    display: none;
}
.color-option input:checked + .color-circle {
    border: 2px solid #000;
}

/* Sizes */
.button-label {
    display: inline-block;
    padding: 8px 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    cursor: pointer;
    margin: 4px 6px 4px 0;
    transition: all 0.2s ease;
}
.button-label:hover {
    background: #f5f5f5;
}
.radio-label:checked + .button-label {
    background: #000;
    color: #fff;
    border-color: #000;
}

/* Quantity */
.quantity-wrap {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 6px;
    overflow: hidden;
    width: max-content;
}
.quantity-wrap button {
    background: #f8f8f8;
    border: none;
    padding: 8px 14px;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.2s;
}
.quantity-wrap button:hover {
    background: #eee;
}
.quantity-wrap .number {
    width: 50px;
    border: none;
    text-align: center;
    font-size: 16px;
}

/* Tabs */
.nav-tabs .nav-link {
    border: none;
    font-weight: 500;
    padding: 10px 20px;
    color: #666;
}
.nav-tabs .nav-link.active {
    color: #000;
    border-bottom: 2px solid #000;
}

/* Trending Products */
.latest-product-card {
    border: 1px solid #eee;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.2s ease;
    background: #fff;
}
.latest-product-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    transform: translateY(-4px);
}
.latest-product-card .image-box {
    position: relative;
}
.sale-label {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #e63946;
    padding: 4px 8px;
    font-size: 13px;
    border-radius: 4px;
}
.product-title {
    color: #000;
    transition: color 0.2s;
}
.product-title:hover {
    color: #e63946;
}
</style>
    <section>
        <div class="hero-img d-flex align-items-center">
            <div class="text-center site-container my-5">
                <h1 class="font-jost fw-bold text-dark">Product Detail</h1>
            </div>
        </div>
    </section>
    <!-- PRODUCT DETAIL START -->
    <section class="site-container">
    <section class="product-detail-sec py-40">
        <div class="container">
            <div class="row g-4">
                {{-- Product Images --}}
                <div class="col-lg-6">
                    <div class="product-image-container">
                        <div class="product-detail-slider slider-2 mb-3">
                            <div class="detail-image">
                                <img src="https://www.ssactivewear.com/{{ ltrim($mainImage, '/') }}" 
                                     alt="{{ $product->name }}" class="img-fluid rounded">
                            </div>
                            @foreach($product->images->sortBy('sort') as $image)
                                <div class="detail-image">
                                    <img src="https://www.ssactivewear.com/{{ ltrim($image->path, '/') }}" 
                                         alt="{{ $product->name }}" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                        <div class="product-slider-asnav asnav-2">
                            @foreach($product->images->sortBy('sort') as $image)
                                <div class="nav-image">
                                    <img src="https://www.ssactivewear.com/{{ ltrim($image->path, '/') }}" 
                                         alt="{{ $product->name }}" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Product Info --}}
                <div class="col-lg-6">
                    <div class="product-text-container">
                        <h5 class="black fw-700 mb-3">{{ $product->name }}</h5>

                        {{-- Price --}}
                        <div id="variant-price" class="d-flex align-items-center gap-2 mb-3">
                            <h4 class="fw-600 text-dark" id="variant-price-value">
                                ${{ number_format($product->price, 2) }}
                            </h4>
                        </div>

                        {{-- Description --}}
                        <p class="quick-view-text mb-3">{{ $product->description }}</p>

                        {{-- Colors --}}
                        @if($product->variants->pluck('color')->filter()->unique()->count() > 0)
                            <div class="mb-3">
                                <p class="fw-500 mb-2">Color:</p>
                                <div class="d-flex gap-2 flex-wrap">
                                    @foreach($product->variants->groupBy('color') as $color => $colorVariants)
                                        <label class="color-option">
                                            <input type="radio" name="color" value="{{ $color }}" class="variant-color">
                                            <span class="color-circle" style="background-color: {{ $colorVariants->first()->color_code ?? '#ccc' }}"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Sizes --}}
                        @if($product->variants->pluck('size')->filter()->unique()->count() > 0)
                            <div class="mb-3">
                                <p class="fw-500 mb-2">Size:</p>
                                <div class="select-size">
                                    @foreach($product->variants->pluck('size')->unique() as $size)
                                        <input class="hidden radio-label" type="radio" name="size" id="size-{{ $size }}" value="{{ $size }}">
                                        <label class="button-label" for="size-{{ $size }}">{{ strtoupper($size) }}</label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Stock --}}
                        <p id="variant-stock" class="mb-3">Stock: {{ $product->stock }}</p>

                        {{-- Quantity --}}
                        <div class="mb-3">
                            <p class="mb-2">Quantity:</p>
                            <div class="quantity">
                                <div class="quantity-wrap">
                                    <button class="decrement" type="button">-</button>
                                    <input type="text" name="quantity" value="1" maxlength="2" size="1" class="number">
                                    <button class="increment" type="button">+</button>
                                </div>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row g-2 mb-3">
                            <div class="col-sm-6">
                                <input type="hidden" name="variant_id" id="selected_variant_id">
                                <input type="hidden" name="product_id" id="selected_product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" id="cart_quantity" value="1">
                                <button type="button" class="w-100 text-center cus-btn modalCartBtn" data-product-id="{{ $product->id }}">
                                    Add to Cart
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{url('/gang-sheet/'.$product->id)}}" class="w-100 text-center cus-btn btn-sec">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Description --}}
    <section class="product-description py-40">
        <div class="container">
            <div class="description-wrapper">
                <nav class="mb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab" data-bs-target="#nav-desc"
                            type="button" role="tab" aria-controls="nav-desc" aria-selected="true">
                            Description
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                        <h5 class="fw-600 black mb-2">Description:</h5>
                        <p class="mb-2">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trending Products --}}
    <section class="product-sec py-40">
        <div class="container">
            <div class="heading-container text-center mb-4">
                <div class="eyebrow mb-2">Products</div>
                <h2 class="fw-500">Trending Picks for You</h2>
            </div>
            <div class="row g-4">
                @foreach($latestProducts as $latest)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="latest-product-card p-2">
                            <div class="image-box mb-3">
                                
                                <a href="{{url('/product/'.$latest->slug)}}">
                                    @if($latest->image)
                                        <img src="{{ asset('/images/' . $latest->image) }}" class="product-image w-100" alt="">
                                    @else
                                        <img src="https://www.ssactivewear.com/{{ $latest->main_image }}" class="product-image w-100" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="product-desc text-center">
                                <a href="{{url('/product/'.$latest->slug)}}" class="product-title h6 fw-500 d-block mb-2">
                                    {{$latest->name}}
                                </a>
                                <p class="fw-600 mb-2">${{$latest->price}}</p>
                                
                            </div>
                            <a href="{{url('/gang-sheet/'.$latest->id)}}" class="btn-primary-custom w-100">
                                    Design Product
                                </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</section>


    <!-- FOOTER Start -->


<script>
    const variants = @json($product->variants);
    let selectedVariant = null;

    function updateVariant() {
        let color = document.querySelector('input[name="color"]:checked')?.value;
        let size = document.querySelector('input[name="size"]:checked')?.value;

        selectedVariant = variants.find(v => v.color === color && v.size === size);

        if (selectedVariant) {
            document.getElementById('selected_variant_id').value = selectedVariant.id;
            document.getElementById('variant-price').innerHTML =
                `<h5 class="medium-black fw-600" id="variant-price-value">$${parseFloat(selectedVariant.price).toFixed(2)}</h5>`;
            document.getElementById('variant-stock').innerText =
                `Stock: ${selectedVariant.stock}`;
        }
    }

    document.querySelectorAll('input[name="color"], input[name="size"]').forEach(input => {
        input.addEventListener('change', updateVariant);
    });

    // Quantity handling
    document.querySelector('.increment').addEventListener('click', () => {
        let qty = document.querySelector('.number');
        qty.value = parseInt(qty.value) + 1;
        document.getElementById('cart_quantity').value = qty.value;
    });
    document.querySelector('.decrement').addEventListener('click', () => {
        let qty = document.querySelector('.number');
        if (qty.value > 1) qty.value = parseInt(qty.value) - 1;
        document.getElementById('cart_quantity').value = qty.value;
    });
</script>

@endsection