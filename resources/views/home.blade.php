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




        @media (max-width: 768px) {
    section:first-of-type h1

 {
         font-size: 30px !important; 
    }

    .container{

        padding-top: 5% !important;
        padding-bottom:5% !important;
        padding-left:9% !important;
        padding-right:9% !important;

    }
}

section:first-of-type h1 {
    font-size: 48px !important;
}
   






.category-card {
  border: 1px solid #eee;
  border-radius: 8px;
  padding: 15px;
  text-align: center;
  background: #fff;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
          
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
}

.category-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.category-img {
  height: 100px;
  width: 100px;
  object-fit: contain;
}


.instruction-card {
  background-color: #222; 
  border-radius: 8px;
  transition: all 0.3s ease-in-out;
  color: #dea928; 
}

.instruction-card i,
.instruction-card h5 {
  color: #dea928;
}

.instruction-card:hover {
  background-color: #dea928; 
  color: #222 !important;
  transform: translateY(-5px); /* subtle lift effect */
}

.instruction-card:hover i,
.instruction-card:hover h5 {
  color: #222 !important;
}



    </style>


<!-- Add this once in your <head> if not already -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">



    <!-- HERO -->
   <section class="hero d-flex align-items-center" style="background-color: #dea928; ">
  <div class="container" style="    padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
    <div class="row align-items-center justify-content-between">
      
      <!-- Left Text Content -->
      <div class="col-lg-6 col-md-6">
        <h1 class="fw-bold mb-3" style="color:#111;  line-height:1.2;">
          DTF Transfers: Create <br> Custom Apparel Instantly
        </h1>
        <p class="mb-3" style="color:#222; font-size:1.1rem;">
          Effortlessly apply your designs on any t-shirt, sweatshirt or fabric with outstanding durability! 
          Best custom DTF transfers for small businesses and store owners.
        </p>
        <p class="fw-bold mb-3" style="color:#111; font-size:1.05rem;">
          No Minimum Order, No Setup Fees, Same-Day Shipping!
        </p>
        <p class="mb-4 " style="color:#fff;font-size:17px;font-weight: 400;">
         <strong> Upload your design, get your DTF transfer, apply it in seconds.</strong> <br>
          <strong>Get started and get your DTF Transfer sheets</strong><br> <strong>or DTF Gang Sheets now ⬇️ </strong>
        </p>

        <!-- Buttons -->
        <div class="d-flex flex-column flex-sm-row gap-3">
          <a href="{{url('/dtf/transfer_by_size/')}}" class="btn btn-light border px-4 py-3 fw-semibold d-flex align-items-center justify-content-center">
            Order DTF Transfers by Size
            <svg xmlns="http://www.w3.org/2000/svg" class="ms-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="16 16 12 12 8 16"></polyline>
              <line x1="12" y1="12" x2="12" y2="21"></line>
            </svg>
          </a>
          <a href="#" class="btn btn-dark px-4 py-3 fw-semibold">Create a DTF Gang Sheet</a>
        </div>
      </div>

      <!-- Right Image -->
      <div class="col-lg-6 col-md-6 text-center mt-4 mt-md-0">
        <img src="https://cdn.shopify.com/s/files/1/0651/6300/2098/files/homepage-banner-image-collage-min.webp?v=1751918319" 
             alt="DTF Products" class="img-fluid">
      </div>

    </div>
  </div>
</section>






   <!-- Features Section -->
<section class="features py-5 bg-white">
  <div class="container" style="padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="font-size: 2.5rem; color:#222;">
        Setting the Standard in Custom DTF Transfers
      </h2>
    </div>
    <div class="row g-5">

      <!-- Feature 1 -->
      <div class="col-sm-6 col-lg-4">
        <div class="d-flex align-items-start">
          <div class="me-3 fs-2" style="color:#dea928;">
            <i class="bi bi-award-fill"></i>
          </div>
          <div>
            <h5 class="fw-semibold mb-2" style="color:#222;">Premium Quality Every Time</h5>
            <p class="mb-0" style="color:#222;">Vibrant, durable DTF prints made with premium tech and materials—your best, guaranteed.</p>
          </div>
        </div>
      </div>

      <!-- Feature 2 -->
      <div class="col-sm-6 col-lg-4">
        <div class="d-flex align-items-start">
          <div class="me-3 fs-2" style="color:#dea928;">
            <i class="bi bi-cash-stack"></i>
          </div>
          <div>
            <h5 class="fw-semibold mb-2" style="color:#222;">Affordable Pricing Without Compromise</h5>
            <p class="mb-0" style="color:#222;">Premium DTF at budget-friendly prices, plus bulk discounts & perks for lasting value.</p>
          </div>
        </div>
      </div>

      <!-- Feature 3 -->
      <div class="col-sm-6 col-lg-4">
        <div class="d-flex align-items-start">
          <div class="me-3 fs-2" style="color:#dea928;">
            <i class="bi bi-truck"></i>
          </div>
          <div>
            <h5 class="fw-semibold mb-2" style="color:#222;">Fast Turnaround & Reliable Shipping</h5>
            <p class="mb-0" style="color:#222;">Fast, high-quality DTF transfers delivered on time to meet your deadlines.</p>
          </div>
        </div>
      </div>

      <!-- Feature 4 -->
      <div class="col-sm-6 col-lg-4">
        <div class="d-flex align-items-start">
          <div class="me-3 fs-2" style="color:#dea928;">
            <i class="bi bi-palette-fill"></i>
          </div>
          <div>
            <h5 class="fw-semibold mb-2" style="color:#222;">Wide Range of Options</h5>
            <p class="mb-0" style="color:#222;">Custom or ready-to-press DTF for holidays, events, or everyday needs—covered.</p>
          </div>
        </div>
      </div>

      <!-- Feature 5 -->
      <div class="col-sm-6 col-lg-4">
        <div class="d-flex align-items-start">
          <div class="me-3 fs-2" style="color:#dea928;">
            <i class="bi bi-shop"></i>
          </div>
          <div>
            <h5 class="fw-semibold mb-2" style="color:#222;">One-Stop Shop for Customization</h5>
            <p class="mb-0" style="color:#222;">Pair our DTF transfers with blank apparel for easy custom creations—business or hobby.</p>
          </div>
        </div>
      </div>

      <!-- Feature 6 -->
      <div class="col-sm-6 col-lg-4">
        <div class="d-flex align-items-start">
          <div class="me-3 fs-2" style="color:#dea928;">
            <i class="bi bi-headset"></i>
          </div>
          <div>
            <h5 class="fw-semibold mb-2" style="color:#222;">Dedicated Customer Support</h5>
            <p class="mb-0" style="color:#222;">From design uploads to final application, our expert team supports you every step of the way.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>






  <section class="py-5 bg-light">
  <div class="container" style="padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
    <h2 class="section-title text-center">Shop by Category</h2>
    <div class="row g-3 g-md-4">
      @foreach($categories as $category)
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <a href="{{ url('/shop') }}" class="text-decoration-none text-dark">
            <div class="category-card">
              @if(str_starts_with($category->image, 'Images'))
                <img src="https://www.ssactivewear.com/{{ $category->image }}" alt="" class="category-img">
              @else
                <img src="{{ asset('images/'.$category->image )}}" alt="" class="category-img">
              @endif

              <!-- Truncate to first word, full name in Bootstrap tooltip -->
              @php
                $shortName = strtok($category->name, ' ');
              @endphp
              <h6 class="fw-bold mt-2" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $category->name }}">
                {{ $shortName }}
              </h6>

              <p class="text-muted small">{{ $category->products->count() }} products</p>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Initialize tooltips -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>







    <!-- PROMOTION -->
    <section class="promotion-sec py-5 my-5">
        <div class="container" style="    padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
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
                    <a href="{{ url('/dtf/build-a-gangsheet') }}" class="text-decoration-none text-dark">
                        <div class="card shadow h-100 border-0 hover-card">
                            <img src="{{asset('/create-gang.webp')}}" class="card-img-top img-fluid"
                                alt="DTF Gang Sheet Builder">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold">DTF Gang Sheet Builder</h5>
                                <p class="card-text text-muted mb-2">Create your custom gang sheet directly in our online
                                    builder.</p>
                                <a href="{{ url('/dtf/build-a-gangsheet') }}" class="btn-primary-custom">Explore Now</a>
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



    <section class="py-5 bg-light">
  <div class="container text-center" style="    padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
    <!-- Heading -->
    <h2 class="fw-bold mb-3" style="color:#222; font-size:27px">
      Create Custom T-shirts, Sweatshirts, Hoodies, Tote Bags, Hats in Seconds!
    </h2>
    <p class="lead mb-5" style="color:#222;">
      Durable, vibrant DTF prints, easy to apply on any fabric! <br>
      Check out our Cricut EasyPress heat guide and heat press guide articles.
    </p>

    <!-- Instruction Links -->
    <div class="row justify-content-center g-4">
  <!-- Heat Press -->
  <div class="col-4 col-md-4">
    <a href="#" class="instruction-card text-decoration-none d-block p-4 h-100 text-center">
      
      Heat Press Instructions
    </a>
  </div>

  <!-- Cricut Easy Press -->
  <div class="col-4 col-md-4">
    <a href="#" class="instruction-card text-decoration-none d-block p-4 h-100 text-center">
      Cricut Easy Press Instructions
    </a>
  </div>

  <!-- Home Iron -->
  <div class="col-4 col-md-4">
    <a href="#" class="instruction-card text-decoration-none d-block p-4 h-100 text-center">
      Home Iron Instructions
    </a>
  </div>
</div>

  </div>
</section>





<section class="membership-section py-5 text-center text-white" style="background:#dea928;">
  <div class="container" style="    padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
    <!-- Crown Icon -->
    <div class="mb-3">
      <i class="fas fa-crown" style="font-size:3rem; color:#000;"></i>
    </div>
    
    <!-- Heading -->
    <h2 class="fw-bold mb-2">Membership</h2>
    <h4 class="fw-bold mb-3">Become a Member to Save More!</h4>
    
    <!-- Sub text -->
    <p class="mb-4">
      Join our exclusive membership program and start saving more on all your purchases! <br>
      Right now, you can simply create an account and enjoy shopping with us.
    </p>
    
    <!-- Button -->
    <a href="/login" class="btn btn-lg px-5" style="background:#000; color:#fff; border:none; font-weight:bold;">
      Join Now
    </a>
  </div>
</section>





<section class="py-5 bg-light" >
  <div class="container text-center" style="    padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
    <!-- Heading -->
    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color:#222;">Wholesale Blank Apparel</h2>
      <p class="text-muted">
        Discover a wide range of wholesale blank apparel that is perfect for customization and personalization. 
        Whether you're looking for blank t-shirts, hoodies, or sweatshirts, our collection offers high-quality blanks at affordable prices.
      </p>
    </div>

    <div class="row g-4">
      @foreach($blanks as $product)
      <div class="col-6 col-sm-6 col-md-4 col-lg-3">
        <div class="card product-card h-100 shadow-sm border-0 position-relative">

          <!-- Sale Badge -->
          @if($product->sale_price && $product->sale_price < $product->price)
            <span class="badge bg-danger position-absolute top-0 start-0 m-2">Sale</span>
          @endif

          <!-- Product Image -->
          <a href="{{ url('/product/' . $product->slug) }}" class="d-block">
            <div class="img-wrapper text-center bg-white">
              @if($product->image)
                <img src="{{ asset('images/'.$product->image) }}" class="" alt="{{ $product->name }}">
              @elseif($product->main_image)
                <img src="https://www.ssactivewear.com/{{$product->main_image}}" class="" alt="{{ $product->name }}">
              @else
                <img src="{{ asset('images/no-image.png') }}" class="" alt="{{ $product->name }}">
              @endif
            </div>
          </a>

          <!-- Product Info -->
          <div class="card-body text-center d-flex flex-column">
            <h6 class="fw-bold mb-2 text-truncate" title="{{ $product->name }}">{{ $product->name }}</h6>
            
            <p class="mb-3">
              @if($product->sale_price && $product->sale_price < $product->price)
                <span class="text-muted text-decoration-line-through">${{ $product->price }}</span>
                <span class="fw-bold text-danger ms-1">${{ $product->sale_price }}</span>
              @else
                <span class="fw-bold">${{ $product->price }}</span>
              @endif
            </p>

            <div class="mt-auto">
              @if($product->variants && count($product->variants) > 0)
                <a href="{{ url('/product/' . $product->slug) }}" class="btn btn-custom w-100 mb-2">
                  View Details
                </a>
              @else
                <a href="javascript:void(0)" class="btn btn-custom w-100 mb-2 modalCartBtn"
                   data-product-id="{{ $product->id }}">
                  Add to Cart
                </a>
              @endif


              
            </div>
          </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
  .product-img {
    height: 230px;
    object-fit: contain;
  }
  .btn-custom {
    background: #dea928;
    color: #000;
    font-weight: bold;
    border: none;
    transition: all 0.3s ease;
  }
  .btn-custom:hover {
    background: #000;
    color: #dea928;
  }
  .btn-outline-custom {
    background: #fff;
    color: #000;
    border: 2px solid #dea928;
    font-weight: bold;
    transition: all 0.3s ease;
  }
  .btn-outline-custom:hover {
    background: #dea928;
    color: #000;
  }
  .product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  }
</style>





    <!-- FEATURED PRODUCTS -->
    <section class="py-5 bg-white">
        <div class="container" style="    padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
            <h2 class="section-title text-center">Featured Products</h2>
            <div class="row g-4">
                @foreach($products as $product)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                        <div class="product-card h-100 card">
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="sale-badge">Sale</span>
                            @endif

                            <a href="{{ url('/product/' . $product->slug) }}">


                                <div class="img-wrapper">

                                @if($product->image)
                                                <img src="{{ asset('images/'.$product->image) }}" 
                                                     class="img-fluid" style="height: 230px;"
                                                     alt="{{ $product->name }}">
                                 @elseif($product->main_image)

                                                <img src="https://www.ssactivewear.com/{{$product->main_image}}" 
                                                     class="img-fluid" style="height: 230px;"
                                                     alt="{{ $product->name }}">

                                 @else
                                    <img src="{{ asset('images/no-image.png') }}" 
                                                     class="img-fluid" style="height: 230px;"
                                                     alt="{{ $product->name }}">

                                @endif
                                    
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
                                @if($product->variants && count($product->variants) > 0)
                                <a href="{{ url('/product/' . $product->slug) }}" class="btn-primary-custom w-100">
                                    View Details
                                </a>
                                
                                @else
                                

                                <a href="javascript:void(0)" class="btn-primary-custom w-100 modalCartBtn"
                                    data-product-id="{{ $product->id }}">
                                    Add to Cart
                                </a>
                                @endif
                                <div class="mt-2 text-center">or</div>
                                

                                <a href="{{ url('/gang-sheet/' . $product->id) }}" class="btn-primary-custom w-100">
                                    Design Now
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
    <section class="py-5 bg-light">
        <div class="container" style="    padding-top: 1%;padding-bottom:1%;padding-left:7%;padding-right:7%;">
            <h2 class="section-title text-center">What Our Customers Say</h2>
            <div class="row g-4">

            <script defer async src='https://cdn.trustindex.io/loader.js?bee03e45460d278af256ac8441b'></script>

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