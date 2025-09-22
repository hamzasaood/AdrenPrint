@extends('layout.default')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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

        .color-option input:checked+.color-circle {
            border: 2px solid #000;
            /* highlight selected color */
        }
    </style>


    <style>
        /* Product Detail Styling */
        .product-detail-sec {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .product-image-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
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

        .color-option input:checked+.color-circle {
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

        .swiper-slide {
            display: flex !important;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            max-width: 100%;
            border-radius: 8px;
        }


        .button-label:hover {
            background: #f5f5f5;
        }

        .radio-label:checked+.button-label {
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
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
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
        <section class="product-detail-sec shadow-lg py-40 my-5">
            <div class="">
                <div class="row justify-content-between">
                    {{-- Product Images --}}
                    <div class="col-lg-5">
                        <div class="">
                            <div class="swiper mySwiper mb-3">
                                <div class="swiper-wrapper">
                                    @if($mainImage)
                                        <div class="swiper-slide">
                                            <img src="https://www.ssactivewear.com/{{ ltrim($mainImage, '/') }}"
                                                alt="{{ $product->name }}" class="img-fluid rounded">
                                        </div>
                                    @endif

                                    @foreach($product->images->sortBy('sort') as $image)
                                        @if(ltrim($image->path, '/') !== ltrim($mainImage, '/'))
                                            <div class="swiper-slide">
                                                <img src="https://www.ssactivewear.com/{{ ltrim($image->path, '/') }}"
                                                    alt="{{ $product->name }}" class="img-fluid rounded">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                        </div>
                    </div>


                    {{-- Product Info --}}
                    <div class="col-lg-5">
                        <div class="product-text-container">
                            <h5 class="black fw-700 mb-3">{{ $product->name }}</h5>

                            {{-- Price --}}
                            <div id="variant-price" class="d-flex align-items-center gap-2 mb-3">
                                <h4 class="fw-600 text-dark" id="variant-price-value">
                                    ${{ number_format($product->price, 2) }}
                                </h4>
                            </div>

                            {{-- Description --}}
                            <p class="quick-view-text mb-3">{!! $product->description !!}</p>

                            {{-- Colors --}}
                            @if($product->variants->pluck('color')->filter()->unique()->count() > 0)
                                <div class="mb-3">
                                    <p class="fw-500 mb-2">Color:</p>
                                    <div class="d-flex gap-2 flex-wrap">
                                        @foreach($product->variants->groupBy('color') as $color => $colorVariants)
                                            <label class="color-option">
                                                <input type="radio" name="color" value="{{ $color }}" class="variant-color">
                                                <span class="color-circle"
                                                    style="background-color: {{ $colorVariants->first()->color_code ?? '#ccc' }}"></span>
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
                                            <input class="hidden radio-label" type="radio" name="size" id="size-{{ $size }}"
                                                value="{{ $size }}">
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
                                <div class="quantity border-0">
                                    <div class="quantity-wrap">
                                        <button class="m" type="button">-</button>
                                        <input type="text" name="quantity" value="1" maxlength="2" size="1" class="number">
                                        <button class="p" type="button">+</button>
                                    </div>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="row g-2 mb-3">
                                <div class="col-sm-6">
                                    <input type="hidden" name="variant_id" id="selected_variant_id">
                                    <input type="hidden" name="product_id" id="selected_product_id"
                                        value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" id="cart_quantity" value="1">
                                    <button type="button" class="w-100 text-center cus-btn modalCartBtn"
                                        data-product-id="{{ $product->id }}">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{url('/gang-sheet/' . $product->id)}}"
                                        class="w-100 text-center cus-btn btn-sec">Customize Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Description --}}
        {{-- <section class="product-description py-40">
            <div class="container">
                <div class="description-wrapper">
                    <nav class="mb-3">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-desc" type="button" role="tab" aria-controls="nav-desc"
                                aria-selected="true">
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
        </section> --}}
        <div class="my-5 bg-light p-4">
            <div class="row gap-5 flex-column align-items-center justify-content-center">
                <!-- Left Column -->
                <div class="col-lg-12 mb-4">
                    <h3 class="fw-bold brand-yellow mb-2 text-center">Description
                    </h3>
                    <p class="text-center">
                        {!! $product->description !!}
                    </p>
                </div>

                <!-- Right Column -->
                <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="productAccordion">

                        <!-- Features (open by default) -->
                        <div class="accordion-item bg-light">
                            <h2 class="accordion-header" id="headingShippingReturns">
                                <button class="accordion-button lh-90 bg-light" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseShippingReturns" aria-expanded="true"
                                    aria-controls="collapseShippingReturns">
                                    Size Chart
                                </button>
                            </h2>
                            <div id="collapseShippingReturns" class="accordion-collapse collapse show"
                                aria-labelledby="headingShippingReturns" data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-light">
                            <h2 class="accordion-header" id="headingFeatures">
                                <button class="accordion-button collapsed lh-90 bg-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFeatures" aria-expanded="false"
                                    aria-controls="collapseFeatures">
                                    Features You'll Love
                                </button>
                            </h2>
                            <div id="collapseFeatures" class="accordion-collapse collapse" aria-labelledby="headingFeatures"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Satisfaction Guarantee -->
                        <div class="accordion-item bg-light">
                            <h2 class="accordion-header" id="headingGuarantee">
                                <button class="accordion-button collapsed lh-90 bg-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseGuarantee" aria-expanded="false"
                                    aria-controls="collapseGuarantee">
                                    Shipping And Returns
                                </button>
                            </h2>
                            <div id="collapseGuarantee" class="accordion-collapse collapse"
                                aria-labelledby="headingGuarantee" data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Trending Products --}}
        <section class="product-sec py-40">
            <div class="" style="">
                <div class="heading-container text-center mb-4">
                    <div class="eyebrow mb-2">Products</div>
                    <h2 class="fw-500">Trending Picks for You</h2>
                </div>
                <div class="row g-4">
                    @foreach($latestProducts as $latest)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="latest-product-card p-2">
                                <div class="image-box mb-3">

                                    <a href="{{url('/product/' . $latest->slug)}}">
                                        @if($latest->image)
                                            <img src="{{ asset('/images/' . $latest->image) }}" class="product-image w-100" alt="">
                                        @else
                                            <img src="https://www.ssactivewear.com/{{ $latest->main_image }}"
                                                class="product-image w-100" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-desc text-center">
                                    <a href="{{url('/product/' . $latest->slug)}}" class="product-title h6 fw-500 d-block mb-2">
                                        {{$latest->name}}
                                    </a>
                                    <p class="fw-600 mb-2">${{$latest->price}}</p>

                                </div>
                                <a href="{{url('/gang-sheet/' . $latest->id)}}" class="btn-primary-custom w-100">
                                    Design Product
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="bg-light py-5 my-5">
            <div class="" style="">
                <h2 class="section-title text-center">What Our Customers Say</h2>
                <div class="row g-4">

                    <script defer async src='https://cdn.trustindex.io/loader.js?bee03e45460d278af256ac8441b'></script>

                </div>
                <div class="mt-5">
                    <img src="assets/media/about-2.png" alt="" class="img-fluid w-100 rounded-3 shadow-sm">
                </div>
            </div>
        </section>
    </section>


    <!-- FOOTER Start -->


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".mySwiper", {
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                slidesPerView: 1,
            });
        });
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
        document.querySelector('.p').addEventListener('click', () => {
            let qty = document.querySelector('.number');
            qty.value = parseInt(qty.value) + 1;
            document.getElementById('cart_quantity').value = qty.value;
        });
        document.querySelector('.m').addEventListener('click', () => {
            let qty = document.querySelector('.number');
            if (qty.value > 1) qty.value = parseInt(qty.value) - 1;
            document.getElementById('cart_quantity').value = qty.value;
        });
    </script>

@endsection