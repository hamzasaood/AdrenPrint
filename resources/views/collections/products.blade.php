@extends('layout.default')

@section('content')
<section class="container py-5">
    <div class="collection-hero mb-5 d-flex align-items-center" 
             style="background: url('{{ asset('assets/media/bg2.png') }}') no-repeat center center; background-size: contain; height: 300px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h4 class="fw-bold display-5 text-dark">{{ $category->name }}</h4>
                        <div class="col-lg-4">
                        <a href="{{ url('/shop') }}" style="background: transparent;
    color: #000;" class="btn btn-dark mt-3 ">Shop All</a>
    </div>
                    </div>

                    <div class="col-lg-6">
<img src="{{ $category->image 
    ? asset('images/' . $category->image) 
    : asset('images/no-image.png') }}" 
    class="img-fluid" 
    alt="{{ $category->name }} Image">
                    </div>
                </div>
            </div>
        </div>


    <div class="row row-gap-4 all-products">
        @foreach($products as $product)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="latest-product-card">
                    <div class="image-box mb-16">
                        @if($product->image)
                            <img src="{{ asset('images/'.$product->image) }}" style="height:230px" alt="{{ $product->name }}">
                        @elseif($product->main_image)
                            <img src="https://www.ssactivewear.com/{{$product->main_image}}" style="height:230px" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" style="height:230px" alt="{{ $product->name }}">
                        @endif
                    </div>
                    <div class="product-desc">
                        <a href="{{url('/product/'.$product->slug)}}" class="product-title h6 fw-500 mb-12">{{ $product->name }}</a>
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

    <div class="pagination mt-32 d-flex justify-content-center">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>
</section>
@endsection
