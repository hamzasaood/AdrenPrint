@extends('layout.default')

@section('content')
<section class="site-container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">{{ $category->name }}</h1>
    </div>

    <!-- Sort Dropdown -->
    <div class="d-flex justify-content-end mb-4">
        <div class="drop- shop-dropdown">
            <div class="wrapper-dropdown" id="dropdownSort">
                <span class="selected-display" id="selectedSort">High to Low</span>
                <ul class="topbar-dropdown bg-lightest-gray" id="sortOptions">
                    <li class="item" data-sort="high_to_low">High to Low</li>
                    <li class="item" data-sort="low_to_high">Low to High</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row row-gap-4 all-products">
        @foreach($products as $product)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="latest-product-card">
                <div class="image-box mb-16">
                    @if($product->image)
                        <img src="{{ asset('images/'.$product->image) }}" style="height: 230px;" alt="{{ $product->name }}">
                    @elseif($product->main_image)
                        <img src="https://www.ssactivewear.com/{{$product->main_image}}" style="height: 230px;" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" style="height: 230px;" alt="{{ $product->name }}">
                    @endif
                </div>
                <div class="product-desc">
                    <a href="{{url('/product/').$product->slug}}" class="product-title h6 fw-500 mb-12">{{ $product->name }}</a>
                    <p class="black fw-600">
                        @if($product->sale_price && $product->sale_price < $product->price)
                            <span class="subtitle text-decoration-line-through fw-400 light-gray">${{ $product->price }}</span> ${{ $product->sale_price }}
                        @else
                            ${{ $product->price }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination mt-32 d-flex justify-content-center">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>
</section>

<script>
document.querySelectorAll('#sortOptions .item').forEach(item => {
    item.addEventListener('click', function () {
        let sortBy = this.getAttribute('data-sort');
        document.getElementById('selectedSort').innerText = this.innerText;

        fetch("{{ route('shop.category', $category->slug) }}?sort=" + sortBy)
            .then(res => res.text())
            .then(html => {
                // Parse returned HTML and update product grid
                let tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                let newProducts = tempDiv.querySelector('.all-products').innerHTML;
                document.querySelector('.all-products').innerHTML = newProducts;
            });
    });
});
</script>
@endsection
