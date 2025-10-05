@extends('layout.default')

@section('content')

<style>
.big-img {
    height: 300px;
    object-fit: cover;
    
}
.small-img {
    height: 120px;
    object-fit: contain;
    
}
img:hover {
  transform: scale(1.1); /* zoom effect */
}
img {
  transition: transform 0.5s ease; /* smooth ease */
}
</style>

<section class="container py-5">

    @foreach($collections as $collection)

        <!-- Hero Banner -->
        <div class="collection-hero mb-5 d-flex align-items-center" 
             style="background: url('{{ asset('assets/media/bg2.png') }}') no-repeat center center; background-size: contain; height: 300px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h4 class="fw-bold display-5 text-dark">{{ $collection->name }}</h4>
                        <div class="col-lg-4">
                        <a href="{{ url('/shop') }}" style="background: transparent;
    color: #000;" class="btn btn-dark mt-3 ">Shop All</a>
    </div>
                    </div>

                    <div class="col-lg-6">
@php
        $firstCategory = $collection->categories->first();
    @endphp
    <img src="{{ $firstCategory && $firstCategory->image 
        ? asset('images/'.$firstCategory->image) 
        : asset('images/no-image.png') }}" 
        class="img-fluid" 
        alt="{{ $collection->name }} Image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Collection Description -->
        <div class="text-center mb-5">
            <p class="text-muted">{{ $collection->description }}</p>
        </div>

        <!-- Categories Grid -->
        <!-- Categories Grid -->
<div class="mb-5">
    @php
        $total = count($collection->categories);
    @endphp

    @if($total < 4)
        <!-- Simple grid if less than 4 categories -->
        <div class="row g-3">
            @foreach($collection->categories as $category)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div style="border: 2px solid steelblue; padding: 2%; background:#f9f9f9; border-radius: 4px;">
                        <a href="{{ route('collections.category.products', [$collection->slug, $category->slug]) }}">
                            <h6 class="text-center mt-2">{{ $category->name }}</h6><br>
                            <img src="{{ $category->image ? asset('images/'.$category->image) : asset('images/no-image.png') }}" 
                                 class="w-100 img-fluid" 
                                 alt="{{ $category->name }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Special layout if 4 or more categories -->
        @for($i = 0; $i < $total; $i += 4)
            <div class="row g-2 mb-3 align-items-stretch">

                <!-- 1st Big -->
                @if(isset($collection->categories[$i]))
                    <div class="col-lg-4 col-md-6" style="background: #dce6ff; padding: 2%; border-radius: 1%;">
                        <div style="border: 2px solid steelblue; padding: 2%;">
                            <a style="width: 100%;" href="{{ route('collections.category.products', [$collection->slug, $collection->categories[$i]->slug]) }}">
                                <h6 class="text-center mt-2">{{ $collection->categories[$i]->name }}</h6><br>
                                <img src="{{ $collection->categories[$i]->image ? asset('images/'.$collection->categories[$i]->image) : asset('images/no-image.png') }}" 
                                     class="w-100 big-img" alt="{{ $collection->categories[$i]->name }}">
                            </a>
                        </div>
                    </div>
                @endif

                <!-- 2nd + 3rd Small stacked -->
                <div class="col-lg-4 col-md-6 d-flex flex-column justify-content-between" style="gap: 14px;">
                    @if(isset($collection->categories[$i+1]))
                        <div style="background: #f0f7ef; padding: 2%; border-radius: 1%;">
                            <div style="border: 2px solid steelblue; padding: 2%;">
                                <a style="width: 100%;" href="{{ route('collections.category.products', [$collection->slug, $collection->categories[$i+1]->slug]) }}">
                                    <h6 class="text-center mt-2">{{ $collection->categories[$i+1]->name }}</h6><br>
                                    <img src="{{ $collection->categories[$i+1]->image ? asset('images/'.$collection->categories[$i+1]->image) : asset('images/no-image.png') }}" 
                                         class="w-100 small-img" alt="{{ $collection->categories[$i+1]->name }}">
                                </a>
                            </div>
                        </div>
                    @endif

                    @if(isset($collection->categories[$i+2]))
                        <div style="background: #f0f7ef; padding: 2%; border-radius: 1%;">
                            <div style="border: 2px solid steelblue; padding: 2%;">
                                <a style="width: 100%;" href="{{ route('collections.category.products', [$collection->slug, $collection->categories[$i+2]->slug]) }}">
                                    <h6 class="text-center mt-2">{{ $collection->categories[$i+2]->name }}</h6><br>
                                    <img src="{{ $collection->categories[$i+2]->image ? asset('images/'.$collection->categories[$i+2]->image) : asset('images/no-image.png') }}" 
                                         class="w-100 small-img" alt="{{ $collection->categories[$i+2]->name }}">
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- 4th Big -->
                @if(isset($collection->categories[$i+3]))
                    <div class="col-lg-4 col-md-6" style="background: #dce6ff; padding: 2%; border-radius: 1%;">
                        <div style="border: 2px solid steelblue; padding: 2%;">
                            <a style="width: 100%;" href="{{ route('collections.category.products', [$collection->slug, $collection->categories[$i+3]->slug]) }}">
                                <h6 class="text-center mt-2">{{ $collection->categories[$i+3]->name }}</h6><br>
                                <img src="{{ $collection->categories[$i+3]->image ? asset('images/'.$collection->categories[$i+3]->image) : asset('images/no-image.png') }}" 
                                     class="w-100 big-img" alt="{{ $collection->categories[$i+3]->name }}">
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        @endfor
    @endif
</div>


    @endforeach

</section>
@endsection
