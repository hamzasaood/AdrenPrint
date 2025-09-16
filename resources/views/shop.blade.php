@extends('layout.default')

@section('content')

<style>


.color-swatch {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid #ddd;
    display: inline-block;
}
.color-filter:checked + .color-swatch {
    border: 2px solid #000;
}




/* Fix swatches */
.color-swatch {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    border: 2px solid #ddd;
    display: inline-block;
    cursor: pointer;
    transition: 0.3s;
}
.color-filter:checked + .color-swatch {
    border: 2px solid #000;
    transform: scale(1.1);
}

/* Product card improvements */
.latest-product-card {
    border: 1px solid #eee;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: #fff;
}
.latest-product-card:hover {
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    transform: translateY(-4px);
}
.latest-product-card .image-box {
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f9f9f9;
}
.latest-product-card img {
    max-height: 230px;
    object-fit: contain;
}

/* Product description */
.product-desc {
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Pagination styling */
.pagination .page-item .page-link {
    border-radius: 50% !important;
    margin: 0 4px;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #333;
}
.pagination .page-item.active .page-link {
    background: #ffc107; /* brand yellow */
    border-color: #ffc107;
    color: #fff;
}
</style>





            <!-- TITLE BANNER START -->
             <section>
        <div class="hero-img d-flex align-items-center">
            <div class="text-center site-container my-5">
                <h1 class="font-jost fw-bold text-dark">Shop</h1>
            </div>
        </div>
    </section>
            <!-- TITLE BANNER END -->

            <!-- COLLECTION SECTION START -->
            <section class="site-container">
      

            <!-- Shop SECTION START -->
            <section class="shop-section py-80">
                <div class="">
                    <div class="row row-gap-4">
                        <div class="col-lg-3">
                            <div class="sidebar">
                                
                                <div class="category-block box-3 mb-32 wow fadeInUp animated" data-wow-delay="200ms">
                                    <div class="title" data-count="3">
                                        <h6 class="fw-500 medium-black">Availability</h6>
                                        <span>
                                            <i class="fa-light fa-chevron-up"></i>
                                        </span>
                                    </div>
                                    <div class="content-block mt-24">
                                        <div class="d-flex align-items-center justify-content-between mb-12">
                                            <div class="cus-checkBox">
                                                <input type="checkbox" id="inStock" class="inp-cbx">
                                                <label for="inStock" class="cbx black">
                                                    In Stock
                                                </label>
                                            </div>
                                            <p>{{ $availability['in_stock'] }}</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            
                                            <p>({{ $availability['out_stock'] }})</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="category-block box-1 mb-32 wow fadeInUp animated" data-wow-delay="300ms">
                                    <div class="title" data-count="1">
                                        <h6 class="fw-500 medium-black">Product Categories</h6>
                                        <span>
                                            <i class="fa-light fa-chevron-up"></i>
                                        </span>
                                    </div>
                                    <div class="content-block mt-24">
                                      @foreach($categories as $cat)
                                        <div class="d-flex align-items-center justify-content-between mb-12">
                                            <div class="cus-checkBox">
                                                <input type="checkbox" id="cat-{{ $cat->id }}" 
                                                    value="{{ $cat->id }}" 
                                                    class="inp-cbx category-filter">
                                                <label for="cat-{{ $cat->id }}" class="cbx black">
                                                    {{ $cat->name }}
                                                </label>
                                            </div>
                                            <p>({{ $cat->products_count }})</p>
                                        </div>
                                      @endforeach

                                        
                                        
                                    </div>
                                </div>
                                <div class="category-block box-5 wow fadeInUp animated mb-32" data-wow-delay="200ms">
                                    <div class="title mb-24" data-count="5">
                                        <h6 class="fw-500 medium-black">Filter By Brand</h6>
                                        <span>
                                            <i class="fa-light fa-chevron-up"></i>
                                        </span>
                                    </div>
                                    <div class="content-block">
                                    @foreach($brands as $brand)
                                        <div class="d-flex align-items-center justify-content-between mb-12">
                                            <div class="cus-checkBox">
                                                <input type="checkbox" 
                                                    id="brand-{{ $loop->index }}" 
                                                    value="{{ $brand->brand }}" 
                                                    class="inp-cbx brand-filter">
                                                <label for="brand-{{ $loop->index }}" class="cbx black">
                                                    {{ $brand->brand }}
                                                </label>
                                            </div>
                                            <p>({{ $brand->product_count }})</p>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row row-gap-3 justify-content-between align-items-center mb-16">
                                <div class="col-xl-4 col-lg-5 col-md-5 col-8">
                                <p>
                                    Showing {{ $products->firstItem() }} - {{ $products->lastItem() }}
                                    of {{ $products->total() }} Results
                                </p>
                                </div>
                                <div class="col-xl-4 col-lg-7 col-md-7 d-sm-block d-none">
                                    <div class="d-flex align-items-center gap-16 justify-content-end">
                                        <div class="d-flex align-items-center gap-8">
                                            <p class="dark-gray">Short by:</p>
                                            <div class="drop- shop-dropdown">
                                                <div class="wrapper-dropdown" id="dropdown8">
                                                    <span class="selected-display" id="destination8">high to low</span>
                                                    <svg id="drp-arrow8" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow transition-all ml-auto rotate-180">
                                                        <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    <ul class="topbar-dropdown bg-lightest-gray" id="sortOptions">
                                                        <li class="item dark-black" data-sort="high_to_low">High to Low</li>
                                                        <li class="item dark-black" data-sort="low_to_high">Low to High</li>
                                                        <li class="item dark-black" data-sort="discounted">Discounted</li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          <div class="row row-gap-4 all-products">
    @foreach($products as $product)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <div class="latest-product-card">
                <div class="image-box mb-16">
                    @if($product->sale_price && $product->sale_price < $product->price)
                        <span class="sale-label subtitle fw-400 white">Sale</span>
                    @endif

                    <a href="{{url('/product/'.$product->slug)}}">
                        @if($product->image)
                                <img src="{{ asset('images/'.$product->image) }}" style="height: 230px;"
                                     class="product-image" alt="{{ $product->name }}">

                                @elseif($product->main_image)

                                <img src="https://www.ssactivewear.com/{{$product->main_image}}" style="height: 230px;"
                                     class="product-image" alt="{{ $product->name }}">

                                @else
                                <img src="{{ asset('images/no-image.png') }}" style="height: 230px;"
                                     class="product-image" alt="{{ $product->name }}">

                        @endif
                    </a>
                    {{--    
                    <div class="side-icons">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </li>
                            
                            <li>
                                
                            </li>
                        </ul>
                    </div>
                                --}}
                </div>
                <div class="product-desc">
                    <div>
                        <a href="{{url('/product/'.$product->slug)}}" class="product-title h6 fw-500 mb-12">{{ $product->name }}</a>

                        <p class="black fw-600">
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="subtitle text-decoration-line-through fw-400 light-gray">${{ $product->price }}</span>&nbsp; 
                                ${{ $product->sale_price }}
                            @else
                                ${{ $product->price }}
                            @endif                                            
                        </p>
                    </div>
                    
                </div>
                <a href="{{url('/gang-sheet/'.$product->id)}}" class="btn-primary-custom w-100" data-product-id="{{$product->id}}">
                        Design & Buy
                    </a>
            </div>
        </div>
    @endforeach
</div>

<div class="pagination mt-32 d-flex justify-content-center" id="pagination-wrapper">
    {{ $products->links('vendor.pagination.bootstrap-4') }}
</div>
                        </div>
                    </div>
                </div>
            </section>
            </section>
      
            <!-- Shop SECTION END -->

            <!-- FOOTER Start -->
            

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).on('click', '#inStock, #outStock, .category-filter, .size-filter, .color-filter, .range-input input', function () {
    console.log("Clicked:", this);
    applyFilters();
});





// bind change instead of click



function applyFilters() {
    let data = {};

    // ✅ In Stock filter
    if ($('#inStock').is(':checked')) {
        data.inStock = 1;
    }

    // ✅ Out of Stock filter
    if ($('#outStock').is(':checked')) {
        data.outStock = 1;
    }

    // ✅ Categories (multiple allowed)
    let categories = $('.category-filter:checked').map(function () {
        return $(this).val();
    }).get();
    if (categories.length > 0) {
        data.categories = categories;
    }

    // ✅ Sizes (multiple allowed)
    let sizes = $('.size-filter:checked').map(function () {
        return $(this).val();
    }).get();
    if (sizes.length > 0) {
        data.size = sizes;
    }

    // ✅ Colors (multiple allowed)
    let colors = $('.color-filter:checked').map(function () {
        return $(this).val();
    }).get();
    if (colors.length > 0) {
        data.color = colors;
    }

    // ✅ Price Range (only if user actually changed)
    /*
    let minPrice = $('.range-min').val();
    let maxPrice = $('.range-max').val();
    if (minPrice && maxPrice) {
        data.min_price = minPrice;
        data.max_price = maxPrice;
    }
    */

    // ✅ Reset pagination on filter change
    //data.page = 1;

    console.log("Final Data Sent:", data);

    $.get('/products/filter', data, function (res) {
        console.log("Filter Response:", res);

        document.querySelector(".row.row-gap-4.all-products").innerHTML = res.html;
        $('#pagination-wrapper').html(res.meta.links);

        $('.results-count').text(
            `Showing ${res.meta.from} - ${res.meta.to} of ${res.meta.total} Results`
        );
    });
}




    


</script>



            <script>


document.querySelectorAll('#sortOptions .item').forEach(item => {
    item.addEventListener('click', function () {
        let sortBy = this.getAttribute('data-sort');

        // Update selected label
        document.getElementById('destination8').innerText = this.innerText;

        fetch("{{ route('products.sort') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ sort: sortBy })
        })
        .then(res => res.json())
        .then(data => {
            document.querySelector(".row.row-gap-4.all-products").innerHTML = data.html;
        });
    });
});







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