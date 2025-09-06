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


</style>


            <!-- TITLE BANNER START -->
            <section class="title-banner">
                <div class="container">
                    <h1 class="medium-black fw-700">Shop</h1>
                </div>
            </section>
            <!-- TITLE BANNER END -->

            <!-- COLLECTION SECTION START -->
            <div class="collection-sec pt-80 pb-40">
                <div class="container">
                    <div class="row gx-lg-4 gx-3 row-gap-lg-4 row-gap-3">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                            <a href="{{url('/shop')}}" class="collection-block w-100">
                                <div class="image-box mb-12">
                                    <img src="assets/media/collection/collection-1.png" alt="">
                                </div>
                                <div class="text-box">
                                    <h6 class="title-text fw-500 text-center">Posters</h6>
                                    <p class="dark-gray">12</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                            <a href="{{url('/shop')}}" class="collection-block w-100">
                                <div class="image-box mb-12">
                                    <img src="assets/media/collection/collection-2.png" alt="">
                                </div>
                                <div class="text-box">
                                    <h6 class="title-text fw-500 text-center">Packaging</h6>
                                    <p class="dark-gray">18</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                            <a href="{{url('/shop')}}" class="collection-block w-100">
                                <div class="image-box mb-12">
                                    <img src="assets/media/collection/collection-3.png" alt="">
                                </div>
                                <div class="text-box">
                                    <h6 class="title-text fw-500 text-center">T-shirt</h6>
                                    <p class="dark-gray">5</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                            <a href="{{url('/shop')}}" class="collection-block w-100">
                                <div class="image-box mb-12">
                                    <img src="assets/media/collection/collection-4.png" alt="">
                                </div>
                                <div class="text-box">
                                    <h6 class="title-text fw-500 text-center">Invitation Card</h6>
                                    <p class="dark-gray">8</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                            <a href="{{url('/shop')}}" class="collection-block w-100">
                                <div class="image-box mb-12">
                                    <img src="assets/media/collection/collection-5.png" alt="">
                                </div>
                                <div class="text-box">
                                    <h6 class="title-text fw-500 text-center">Brochure</h6>
                                    <p class="dark-gray">16</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                            <a href="{{url('/shop')}}" class="collection-block w-100">
                                <div class="image-box mb-12">
                                    <img src="assets/media/collection/collection-6.png" alt="">
                                </div>
                                <div class="text-box">
                                    <h6 class="title-text fw-500 text-center">Books</h6>
                                    <p class="dark-gray">10</p>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- COLLECTION SECTION END -->

            <!-- Shop SECTION START -->
            <section class="shop-section py-80">
                <div class="container">
                    <div class="row row-gap-4">
                        <div class="col-lg-3">
                            <div class="sidebar">
                                <form action="https://uiparadox.co.uk/templates/print-hive/index.html" method="post" class="search-bar-container mb-24">
                                    <div class="search-input-block">
                                        <input type="text" name="search" placeholder="Search Here...">
                                    </div>
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M9.74062 0C15.1116 0 19.4812 4.36964 19.4812 9.74063C19.4812 12.1734 18.5847 14.4008 17.1047 16.1097L23.7941 22.7997C24.0687 23.0743 24.0686 23.5195 23.794 23.7941C23.5194 24.0687 23.0743 24.0686 22.7997 23.7941L16.1104 17.1041C14.4014 18.5845 12.1738 19.4813 9.74062 19.4813C4.36964 19.4813 0 15.1116 0 9.74063C0 4.36964 4.36964 0 9.74062 0ZM9.74062 18.075C14.3362 18.075 18.075 14.3362 18.075 9.74063C18.075 5.14505 14.3362 1.40625 9.74062 1.40625C5.14505 1.40625 1.40625 5.14505 1.40625 9.74063C1.40625 14.3362 5.14505 18.075 9.74062 18.075Z" fill="white"/>
                                        </svg>
                                    </button>
                                </form>
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
                                            <div class="cus-checkBox">
                                                <input type="checkbox" id="outStock" class="inp-cbx">
                                                <label for="outStock" class="cbx black">
                                                    Out Stock
                                                </label>
                                            </div>
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
                                        <h6 class="fw-500 medium-black">Filter By Price</h6>
                                        <span>
                                            <i class="fa-light fa-chevron-up"></i>
                                        </span>
                                    </div>
                                    <div class="content-block">
                                        <div class="wrapper">
                                            <div class="price-input mb-24">
                                                <div class="field">
                                                    <div class="medium-black mb-4p">From</div>
                                                    <div class="sidebar-price-block">
                                                        <p class="price-sign">$</p>
                                                        <input type="number" class="input-min dark-gray" value="2500">
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <div class="medium-black mb-4p">To</div>
                                                    <div class="sidebar-price-block">
                                                        <p class="price-sign">$</p>
                                                        <input type="number" class="input-max dark-gray" value="7500">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider">
                                                <div class="progress"></div>
                                            </div>
                                            <div class="range-input">
                                                <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                                                <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="category-block box-6 wow fadeInUp animated mb-32" data-wow-delay="200ms">
                                    <div class="title mb-24" data-count="6">
                                        <h6 class="fw-500 medium-black">Color</h6>
                                        <span>
                                            <i class="fa-light fa-chevron-up"></i>
                                        </span>
                                    </div>
                                    <div class="content-block">
                                        <div class="product-color">
                                            <ul class="unstyled list d-flex flex-wrap gap-2">
                                                @foreach($colors as $color)
                                                <li>
                                                    <input type="radio" id="color-{{ $loop->index }}" 
                                                        name="color" 
                                                        class="color-filter d-none" 
                                                        value="{{ $color }}">
                                                    <label for="color-{{ $loop->index }}" 
                                                        class="color-swatch" 
                                                        style="background-color:{{$color}}" 
                                                        title="{{ ucfirst($color) }}">
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="category-block box-11">
                                    <div class="title mb-24" data-count="11">
                                        <h6 class="fw-500 medium-black">Size</h6>
                                        <span>
                                            <i class="fa-light fa-chevron-up"></i>
                                        </span>
                                    </div>
                                    <div class="content-block">
                                        <div class="select-size">
                                            @foreach($sizes as $size)
                                            <input class="hidden radio-label size-filter" 
                                                type="radio" 
                                                name="sizes" 
                                                id="size-{{ $size }}" 
                                                value="{{ $size }}">
                                            <label class="button-label" for="size-{{ $size }}">
                                                {{ strtoupper($size) }}
                                            </label>
                                            @endforeach
                                        </div>

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
                                            <div class="drop-container shop-dropdown">
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
                    
                    <a href="{{url('/product-detail')}}">
                        <img src="{{ asset('images/'.$product->image) }}"
                             class="product-image" alt="" style="height: 230px;">
                    </a>

                    <div class="side-icons">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"  
                                   class="btn quick-view-btn"  
                                   data-bs-toggle="modal" 
                                   data-bs-target="#productQuickView"
                                   data-id="{{ $product->id }}" 
                                   data-name="{{ $product->name }}" 
                                   data-price="{{ $product->price }}"
                                   data-regular-price="{{ $product->price }}" 
                                   data-sale-price="{{ $product->sale_price }}"
                                   data-image="{{ asset('images/'.$product->image) }}" 
                                   data-description="{{ $product->description }}"
                                   data-design="{{ $product->design_type }}" 
                                   data-stock="{{ $product->stock }}" 
                                   data-category="{{ $product->category->name ?? '' }}">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="zui-wrapper-button" data-bs-toggle="modal"
                                   data-bs-target="#comparepopup">
                                   <!-- SVG compare icon -->
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                        viewBox="0 0 16 17" fill="none">
                                        <path d="M12.979 16.5293C12.8173 16.5293 12.6557 16.4669 12.5333 16.3425C12.2913 16.0964 12.2947 15.7007 12.5408 15.4586L14.6415 13.393C14.7584 13.2759 14.8228 13.1207 14.8228 12.9558C14.8228 12.7913 14.7588 12.6366 14.6426 12.5197L12.5432 10.4773C11.9709 9.87765 12.8002 9.02596 13.4148 9.5813L15.5176 11.627C15.5194 11.6288 15.5213 11.6305 15.523 11.6323C15.8775 11.9858 16.0728 12.4558 16.0727 12.9558C16.0727 13.4559 15.8775 13.9259 15.523 14.2793C15.522 14.2803 15.521 14.2813 15.5199 14.2823L13.4172 16.35C13.2955 16.4696 13.1372 16.5293 12.979 16.5293ZM12.979 13.5293H3.82275C1.755 13.5293 0.0727539 11.8471 0.0727539 9.7793V8.18555C0.103473 7.35718 1.29232 7.3578 1.32275 8.18555V9.7793C1.32275 11.1578 2.44425 12.2793 3.82275 12.2793H12.979C13.8074 12.31 13.8068 13.4989 12.979 13.5293ZM15.4478 9.49805C15.1026 9.49805 14.8228 9.21824 14.8228 8.87305V7.2793C14.8228 5.9008 13.7013 4.7793 12.3228 4.7793H3.1665C2.33813 4.74858 2.33875 3.55974 3.1665 3.5293H12.3228C14.3905 3.5293 16.0728 5.21155 16.0728 7.2793V8.87305C16.0728 9.21824 15.7929 9.49805 15.4478 9.49805ZM3.16644 7.6543C3.00938 7.6543 2.85216 7.59549 2.73069 7.47727L0.627879 5.43162C0.626035 5.42983 0.624223 5.42805 0.622441 5.42624C0.267973 5.07283 0.0727539 4.60283 0.0727539 4.1028C0.0727539 3.60277 0.267973 3.13274 0.622441 2.77937C0.623473 2.77833 0.624473 2.77733 0.625504 2.77633L2.72832 0.708647C2.97444 0.466647 3.37016 0.46996 3.61216 0.716085C3.85416 0.96221 3.85085 1.35793 3.60472 1.59993L1.50397 3.66562C1.26438 3.89593 1.26388 4.30799 1.50285 4.5389L3.60232 6.5813C3.84972 6.82199 3.85516 7.21768 3.61447 7.46512C3.492 7.59102 3.32925 7.6543 3.16644 7.6543Z"
                                              fill="#363636" />
                                   </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="product-desc">
                    <div>
                        <a href="{{url('/product-detail')}}" class="product-title h6 fw-500 mb-12">{{ $product->name }}</a>
                      
                        <p class="black fw-600">
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="subtitle text-decoration-line-through fw-400 light-gray">${{ $product->price }}</span>&nbsp; 
                                ${{ $product->sale_price }}
                            @else
                                ${{ $product->price }}
                            @endif                                            
                        </p>
                    </div>
                    <a href="javascript:void(0)" class="cart-btn modalCartBtn" data-product-id="{{ $product->id }}">
                        <!-- cart SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M18.6372 17.8959C18.1487 14.4776 16.957 6.13472 16.957 6.13472C16.9157 5.84569 16.6681 5.63102 16.3762 5.63102H13.821V3.70419C13.6329 -1.23661 6.55028 -1.23285 6.364 3.70419V5.63102H3.80887C3.51691 5.63102 3.26943 5.84569 3.22813 6.13472C3.22813 6.13472 2.03641 14.4776 1.54789 17.8959C1.47221 18.4253 1.62982 18.9606 1.98021 19.3644C2.33059 19.7684 2.83816 20 3.37279 20H16.8123C17.3469 20 17.8544 19.7683 18.2048 19.3644C18.5552 18.9606 18.7128 18.4254 18.6372 17.8959ZM7.53734 3.70419C7.66621 0.318209 12.52 0.320751 12.6477 3.70419V5.63102H7.53734V3.70419ZM17.3186 18.5956C17.1912 18.7425 17.0066 18.8267 16.8123 18.8267H3.37279C3.17842 18.8267 2.9939 18.7425 2.86648 18.5956C2.73914 18.4488 2.68188 18.2543 2.70937 18.0619C3.12574 15.1487 4.0528 8.65872 4.31769 6.80432H6.36404V8.10277C6.3929 8.88031 7.50875 8.87973 7.53734 8.10277V6.80432H12.6477V8.10277C12.6766 8.88031 13.7924 8.87973 13.821 8.10277V6.80432H15.8674C16.1323 8.65872 17.0594 15.1487 17.4757 18.0619C17.5032 18.2543 17.4459 18.4488 17.3186 18.5956Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="pagination mt-32">
    <ul id="border-pagination" class="mb-0">
        @foreach ($products->links()->elements[0] as $page => $url)
            <li>
                <a href="{{ $url }}" class="{{ $page == $products->currentPage() ? 'active' : '' }}">
                    {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                </a>
            </li>
        @endforeach
        <li>
            <a href="{{ $products->nextPageUrl() ?? '#' }}" class="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" fill="none" viewBox="0 0 12 20">
                    <path d="M0.813 0.266a.9.9 0 0 0 0 1.286l8.448 8.448-8.448 8.448a.9.9 0 1 0 1.285 1.286l9.091-9.091a.9.9 0 0 0 0-1.285L2.098.266a.9.9 0 0 0-1.285 0Z" fill="white"/>
                </svg>
            </a>
        </li>
    </ul>
</div>
                        </div>
                    </div>
                </div>
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