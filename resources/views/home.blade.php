@extends('layout.default')

@section('content')
    <style>
        /* General Styles */
        .section-title {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-transform: capitalize;
        }

        .btn-primary-custom {
            background: #111;
            color: #fff;
            border-radius: 30px;
            padding: 10px 22px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background: #dea928;
            color: #111;
        }

        /* Hero */
        .hero {
            background: url('../assets/media/hero.png') center/cover no-repeat;
            min-height: 70vh;
            position: relative;
        }

        .hero h1 {
            font-weight: 700;
            font-size: 2.2rem;
        }

        @media (min-width: 768px) {
            .hero h1 {
                font-size: 2.8rem;
            }
        }

        .hero img {
            border-radius: 20px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .banner-image-2 {
            position: absolute;
            bottom: -20px;
            right: 10%;
            width: 40%;
            max-width: 250px;
        }

        @media (max-width: 767px) {
            .banner-image-2 {
                position: static;
                margin-top: 15px;
                width: 80%;
            }
        }

        /* Categories */
        .category-card {
            background: #fff;
            border-radius: 12px;
            text-align: center;
            padding: 20px;
            transition: all .3s ease;
            border: 1px solid #eee;
            height: 100%;
        }

        .category-card img {
            max-height: 80px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Products */
        /* Force all product cards to equal height */
        .product-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Wrap image inside a fixed ratio box */
        .product-card .img-wrapper {
            width: 100%;
            aspect-ratio: 4 / 3;
            /* you can change ratio e.g. 1/1 for square */
            overflow: hidden;
            border-bottom: 1px solid #eee;
            background: #fff;
        }

        /* Make images fill card properly */
        .product-card .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* crop edges but keep proportions */
            display: block;
        }

        /* Card body should stretch evenly */
        .product-card .p-3 {
            flex: 1;
            /* ensures all bodies align */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }


        .sale-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: #dea928;
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Reviews */
        .review-card {
            border-radius: 12px;
            border: 1px solid #eee;
            padding: 20px;
            background: #fff;
            text-align: center;
            transition: .3s ease;
            height: 100%;
        }

        .review-card:hover {
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
        }

        .review-card img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>

    <!-- HERO -->
    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-center gy-4 text-center text-md-start">
                <div class="col-md-6">
                    <h1 class="text-white">Shop Smarter. Print Better.</h1>
                    <p class="text-light mb-4">Your one-stop shop for custom printing, DTF transfers, and trending designs.
                    </p>
                    <a href="{{ url('/shop') }}" class="btn-primary-custom">Explore Shop</a>
                </div>
                <div class="col-md-6 position-relative d-flex justify-content-center flex-column align-items-center">
                    <img src="assets/media/banner/banner-image-1.png" alt="Hero Image" class="img-fluid">
                    <img src="assets/media/banner/banner-image-2.png" alt="Hero Image" class="banner-image-2 img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Shop by Category</h2>
            <div class="row g-3 g-md-4">
                @foreach($categories as $category)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a href="{{ url('/shop') }}" class="text-decoration-none text-dark">
                            <div class="category-card h-100">
                                <img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="img-fluid mx-auto d-block">
                                <h6 class="fw-bold mt-2">{{ $category->name }}</h6>
                                <p class="text-muted small">{{ $category->product_count }} products</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROMOTION -->
    <section class="promotion-sec py-5 my-5">
        <div class="container">
            <h2 class="section-title text-center">Select the DTF Product That Works Best for You</h2>
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <a href="{{url('/dtf/transfer_by_size')}}" class="text-decoration-none text-dark">
                        <div class="card shadow h-100 border-0 hover-card">
                            <img src="{{asset('/READY-TO-PRESS-DTF.webp')}}" class="card-img-top img-fluid"
                                alt="DTF Transfer by Size">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold">DTF Transfer by Size</h5>
                                <p class="card-text text-muted mb-2">Order high-quality DTF transfers by the sheet or size
                                    you need.</p>
                                <a href="{{ url('/dtf/transfer_by_size') }}" class="btn-primary-custom">Explore Now</a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4">
                    <a href="/gangsheet" class="text-decoration-none text-dark">
                        <div class="card shadow h-100 border-0 hover-card">
                            <img src="{{asset('/create-gang.webp')}}" class="card-img-top img-fluid"
                                alt="DTF Gang Sheet Builder">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold">DTF Gang Sheet Builder</h5>
                                <p class="card-text text-muted mb-2">Create your custom gang sheet directly in our online
                                    builder.</p>
                                <a href="{{ url('/shop') }}" class="btn-primary-custom">Explore Now</a>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4">
                    <a href="{{url('/dtf/upload-gangsheet')}}" class="text-decoration-none text-dark">
                        <div class="card shadow h-100 border-0 hover-card">
                            <img src="{{asset('upload-gang.webp')}}" class="card-img-top img-fluid"
                                alt="Upload Print Ready File">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold">DTF Gang Sheet: Upload</h5>
                                <p class="card-text text-muted mb-2">Already have a print-ready file? Upload and order
                                    instantly.</p>
                                <a href="{{ url('/dtf/upload-gangsheet') }}" class="btn-primary-custom ms-2">Explore Now</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED PRODUCTS -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center">Featured Products</h2>
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-card h-100 card">
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="sale-badge">Sale</span>
                            @endif

                            <a href="{{ url('/product-detail/' . $product->id) }}">
                                <div class="img-wrapper">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="img-fluid">
                                </div>
                            </a>

                            <div class="p-3">
                                <h6 class="fw-bold mb-1">{{ $product->name }}</h6>
                                <p class="mb-2">
                                    @if($product->sale_price && $product->sale_price < $product->price)
                                        <span class="text-muted text-decoration-line-through">${{ $product->price }}</span>
                                        <span class="fw-bold text-danger">${{ $product->sale_price }}</span>
                                    @else
                                        <span class="fw-bold">${{ $product->price }}</span>
                                    @endif
                                </p>
                                <a href="javascript:void(0)" class="btn-primary-custom w-100 modalCartBtn"
                                    data-product-id="{{ $product->id }}">
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/shop') }}" class="btn-primary-custom">View All</a>
            </div>
        </div>
    </section>

    <!-- CUSTOMER REVIEWS -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center">What Our Customers Say</h2>
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="review-card h-100">
                        <img src="assets/media/customer.png" alt="Customer">
                        <h6 class="fw-bold">Samuel Bailey</h6>
                        <p class="text-muted">Amazing print quality and super fast delivery. Highly recommend!</p>
                        <div class="text-warning">★★★★☆</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="review-card h-100">
                        <img src="assets/media/customer-2.png" alt="Customer">
                        <h6 class="fw-bold">Mark Smith</h6>
                        <p class="text-muted">The custom DTF transfers turned out better than expected.</p>
                        <div class="text-warning">★★★★★</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="review-card h-100">
                        <img src="assets/media/customer.png" alt="Customer">
                        <h6 class="fw-bold">Hardy Cole</h6>
                        <p class="text-muted">Great customer service and easy ordering process.</p>
                        <div class="text-warning">★★★★☆</div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <img src="assets/media/about-2.png" alt="" class="img-fluid w-100 rounded-3 shadow-sm">
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const quickViewButtons = document.querySelectorAll(".quick-view-btn");
            quickViewButtons.forEach(button => {
                button.addEventListener("click", function () {
                    let name = this.getAttribute("data-name");
                    let id = this.getAttribute("data-id");
                    let image = this.getAttribute("data-image");
                    let price = this.getAttribute("data-price");
                    let regularPrice = this.getAttribute("data-regular-price");
                    let salePrice = this.getAttribute("data-sale-price");
                    let description = this.getAttribute("data-description");
                    let stock = this.getAttribute("data-stock");
                    let category = this.getAttribute("data-category");
                    let design = this.getAttribute("data-design");
                    // Update modal fields
                    document.getElementById("modalProductName").textContent = name;
                    document.getElementById("modalProductImage").src = image;
                    document.getElementById("modalProductDescription").textContent = description;
                    document.getElementById("modalProductStock").textContent = stock + " in stock, ready to ship";
                    document.getElementById("modalProductCategory").textContent = category;
                    if (design == "dtf") {
                        document.getElementById("modaldesignbtn").href = "/gang-sheet/" + id;
                    } else {
                        document.getElementById("designmodal").style.display = "none";
                    }
                    // document.getElementById("modalCartBtn").dataset.productId = id;

                    document.querySelectorAll(".modalCartBtn").forEach((btn) => {
                        btn.dataset.productId = id; // assign your dynamic id
                    });

                    // ----- Handle pricing -----
                    let activePrice = salePrice && salePrice < regularPrice ? salePrice : price;
                    document.getElementById("modalProducttotalPrice").textContent = "$" + parseFloat(activePrice).toFixed(2);
                    if (salePrice && salePrice < regularPrice) {
                        document.getElementById("modalProductSalePrice").textContent = "$" + parseFloat(salePrice).toFixed(2);
                        document.getElementById("modalProductRegularPrice").textContent = "$" + parseFloat(regularPrice).toFixed(2);
                    } else {
                        document.getElementById("modalProductSalePrice").textContent = "$" + parseFloat(price).toFixed(2);
                        document.getElementById("modalProductRegularPrice").textContent = "$" + parseFloat(price).toFixed(2);
                    }
                    // ----- Setup quantity input -----
                    let qtyInput = document.getElementById("modal-quantity");
                    qtyInput.value = 1;
                    qtyInput.setAttribute("min", 1);
                    qtyInput.setAttribute("max", stock);
                    qtyInput.dataset.stock = stock;
                    qtyInput.dataset.price = activePrice;
                    // update subtotal immediately
                    updateModalSubtotal();
                });
            });
            function updateModalSubtotal() {
                let qtyInput = document.getElementById("modal-quantity");
                let subtotalEl = document.getElementById("modalProducttotalPrice");
                let price = parseFloat(qtyInput.dataset.price);
                let stock = parseInt(qtyInput.dataset.stock);

                let qty = parseInt(qtyInput.value);
                if (isNaN(qty) || qty < 1) qty = 1;
                if (qty > stock) qty = stock;

                qtyInput.value = qty;
                subtotalEl.textContent = "$" + (qty * price).toFixed(2);
            }
            // Hook buttons + manual input
            document.querySelector(".plus").addEventListener("click", function () {
                let qtyInput = document.getElementById("modal-quantity");
                let stock = parseInt(qtyInput.dataset.stock);
                if (parseInt(qtyInput.value) < stock) {
                    qtyInput.value = parseInt(qtyInput.value) + 1;
                    updateModalSubtotal();
                }
            });
            document.querySelector(".minus").addEventListener("click", function () {
                let qtyInput = document.getElementById("modal-quantity");
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                    updateModalSubtotal();
                }
            });

            document.getElementById("modal-quantity").addEventListener("input", updateModalSubtotal);



        });
    </script>
@endsection