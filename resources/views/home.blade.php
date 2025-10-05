@extends('layout.default')

@section('content')
  <style>
    .hero-bg {
      background: #FEFAE0;
      min-height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-card {
      border: none;
      border-radius: 15px;
      transition: box-shadow 0.2s;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      text-decoration: none;
    }

    .hero-card:hover {
      box-shadow: 0 4px 14px rgba(0, 0, 0, 0.10);
      text-decoration: none;
    }

    .hero-card-header {
      background: #FBBF24;
      color: #22223B;
      font-weight: 700;
      font-size: 1rem;
      padding: 0.6rem 1rem;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      letter-spacing: 0.05em;
      text-align: center;
    }

    .hero-card-body {
      padding: 0;
      height: 440px;
      overflow: hidden;
      border-bottom-left-radius: 15px;
      border-bottom-right-radius: 15px;
      background: #fff;
    }

    .hero-card-body img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      border-bottom-left-radius: 15px;
      border-bottom-right-radius: 15px;
    }

    .feature-icon {
      max-width: 48px;
      margin-bottom: 8px;
      width: 100px;
    }

    .feature-text {
      font-weight: 600;
      font-size: 1rem;
      letter-spacing: 0.05em;
      color: #222;
    }

    @media (max-width: 767px) {
      .hero-card-body {
        min-height: 120px;
      }
    }

    @media (max-width: 576px) {
      .hero-card-body {
        margin-bottom: 20px
      }
    }

    .banner-bg {
      background: #FBBF24;
      overflow: hidden;
      min-height: 100%;
    }

    .banner-content {
      position: relative;
      z-index: 2;
      padding: 7rem 4rem;
    }

    .banner-btn {
      background: #0f0f0f;
      padding: 0.6rem 1.25rem;
      border: none;
    }

    .banner-btn:hover {
      background: #1a1b1d;
      color: #fff;
    }

    .banner-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      min-height: 225px;
      border-radius: 0;
      display: block;
    }

    .custom-card-img {
      width: auto;
      height: auto;
      border-bottom-left-radius: 15px;
      border-bottom-right-radius: 15px;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      object-fit: contain;
    }

    .custom-btn-yellow {
      background-color: #ffbe2e;
      font-weight: 700;
      padding-left: 1.2rem;
      padding-right: 1.2rem;
    }

    .custom-btn-yellow:hover {
      background-color: #e6ac25;
    }

    .shopping img {
      height: 390px;
    }

    .overlay-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #222;
      font-weight: 700;
      letter-spacing: 0.04em;
      text-align: center;
      z-index: 10;
    }

    .product-thumb {
      width: 130px;
      height: 130px;
      object-fit: contain;
    }

    .promo-img {
      object-fit: cover;
      width: 100%;
      height: 392px;
    }

    .bg-custom-gold {
      background: #dea928;
    }

    .bg-custom-dark {
      background: #222;
      color: #fff;
    }

    .text-custom-gold {
      color: #FBBF24;
    }

    .icon-check {
      color: #FBBF24;
      font-size: 1.25rem;
      vertical-align: middle;
    }

    .icon-arrow {
      color: #FBBF24;
      font-size: 1.2rem;
      vertical-align: middle;
    }

    .image-laptop {
      max-width: 95%;
      height: auto;
      border-radius: 0.5rem;
      background: #fff;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.12);
    }

    .logo-ardens {
      font-weight: 700;
      font-size: 1.25rem;
      letter-spacing: 0.05em;
      margin-top: 1.5rem;
    }

    .feature-emoji {
      font-size: 2.7rem;
      line-height: 1;
      display: block;
      margin-bottom: 0.4rem;
    }

    .tier-box {
      min-width: 100px;
      height: 200px;
      border-radius: 0.8rem;
    }

    .tier-gold {
      background-color: #dfb13d;
      color: #fff;
    }

    .tier-dark {
      background-color: #2c2c2d;
      color: #fff;
    }

    .tier-label {
      font-weight: 700;
      font-size: 1.05rem;
      letter-spacing: 0.02em;
    }

    .bg-color-tp {
      background-color: #FEFAF2
    }

    .bg-yellow-brand {
      background-color: #dea928;
    }

    .shop-btn:hover {
      background-color: #dea928;
    }

    .tier-title {
      font-size: 0.99rem;
      opacity: 0.78;
      margin-bottom: 1rem;
      letter-spacing: 0.04em;
    }

    .tier-price {
      font-weight: 700;
      font-size: 1.5rem;
      line-height: 1.1;
    }

    .tier-month {
      font-size: 0.85rem;
      opacity: 0.8;
      margin-top: 0.12rem;
      letter-spacing: 0.04em;
    }

    .btn-full-width {
      width: 220px;
      margin: 25px auto 0 auto;
      border-radius: 50px;
      font-weight: 700;
    }

    @media (max-width: 768px) {
      .promo-img {
        height: 160px;
      }
    }

    @media (max-width: 991.98px) {

      .banner-bg,
      .banner-image img {
        min-height: 180px;
      }
    }

    @media (max-width: 767.98px) {
      .banner-bg {
        padding: 1.1rem 0.5rem;
      }

      .banner-image img {
        min-height: 150px;
      }
    }

     @media screen and (max-width: 768px) {
    .image-laptop {
      width :100%;
      height: auto;
    
    }
    .bgty{

      background-image: url('{{ asset('assets/media/background.jpeg') }}');
       background-size: cover;
        background-position: left !important;

    }
    .feature-text {
    font-weight: 600;
    font-size: 12px;
    letter-spacing: 0.05em;
    color: #222;
    text-align: left;
}
.feature-icon {
    max-width: 25px;
    margin-bottom: 8px;
    width: 100px;
}
.banner-content {
    position: relative;
    z-index: 2;
    padding: 6rem 1rem;
}
.guide{

  max-width: 100px !important;
}


.tier-label {
    font-weight: 700;
    font-size: 12px;
    letter-spacing: 0.02em;
}

.tier-title {
    font-size: 12px;
    opacity: 0.78;
    margin-bottom: 1rem;
    letter-spacing: 0.04em;
}

.tier-price {
    font-weight: 700;
    font-size: 12px;
    line-height: 1.1;
}

.tier-month {
    font-size: 12px;
    opacity: 0.8;
    margin-top: 0.12rem;
    letter-spacing: 0.04em;
}
.btn-full-width {
    
    font-size: 12px;
}
.con{

  padding-left: 10%;
    padding-right: 20%;
}

.tier-box {
    min-width: auto;
    height: 200px;
    border-radius: 0.8rem;
}



  }




  img:hover {
  transform: scale(1.1); /* zoom effect */
}
img {
  transition: transform 0.5s ease; /* smooth ease */
}
  </style>

  <div class="container-fluid hero-bg" >
    <div class="container py-5">
      <div class="row g-4 justify-content-center">
        <!-- Card 1 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{url('/dtf/transfer_by_size')}}" class="hero-card d-block h-100">
            <div class="hero-card-header">DTF TRANSFERS</div>
            <div class="hero-card-body">
              <img src="{{asset('assets/media/hero-1.png')}}" alt="DTF Transfers" class="img-fluid">
            </div>
          </a>
        </div>
        <!-- Card 2 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{url('/blanks')}}" class="hero-card d-block h-100">
            <div class="hero-card-header">BLANK APPAREL</div>
            <div class="hero-card-body">
              <img src="{{asset('assets/media/hero-2.png')}}" alt="Blank Apparel">
            </div>
          </a>
        </div>
        <!-- Card 3 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="#" class="hero-card d-block h-100">
            <div class="hero-card-header">CUSTOM PRINT</div>
            <div class="hero-card-body">
              <img src="{{asset('assets/media/hero-3.png')}}" alt="Custom Print">
            </div>
          </a>
        </div>
        <!-- Card 4 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{url('/pod')}}" class="hero-card d-block h-100">
            <div class="hero-card-header">PRINT ON DEMAND</div>
            <div class="hero-card-body">
              <img src="{{asset('assets/media/hero-4.png')}}" alt="Print On Demand">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container my-5" data-aos="fade-up">
    <div class="row text-center justify-content-between">
      <div class="col-6 col-sm-3 d-flex align-items-center gap-2 justify-content-center">
        <img src="{{asset('assets/media/palette.svg')}}" alt="Perfect for any fabric icon" class="feature-icon" />
        <div class="feature-text">PERFECT FOR ANY<br>FABRIC & COLOR</div>
      </div>
      <div class="col-6 col-sm-3 d-flex align-items-center gap-2 justify-content-center">
        <img src="{{asset('assets/media/clock.svg')}}" alt="No minimum order icon" class="feature-icon" />
        <div class="feature-text">NO MINIMUM ORDER<br>REQUIREMENTS</div>
      </div>
      <div class="col-6 col-sm-3 d-flex align-items-center gap-2 justify-content-center">
        <img src="{{asset('assets/media/box.svg')}}" alt="Free & fast shipping icon" class="feature-icon" />
        <div class="feature-text">FREE & FAST<br>SHIPPING ELIGIBLE</div>
      </div>
      <div class="col-6 col-sm-3 d-flex align-items-center gap-2 justify-content-center">
        <img src="{{asset('assets/media/check.svg')}}" alt="100% satisfaction guarantee icon" class="feature-icon" />
        <div class="feature-text">100% SATISFACTION<br>GUARANTEE</div>
      </div>
    </div>
  </div>
  <section class="container my-4 bg-light py-5" data-aos="fade-up">
    <div class="px-0">
      <div class="row g-0 bgty" style="background-image: url('{{ asset('assets/media/background.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="col-md-6 d-flex  d-flex align-items-center">
          <div class="banner-content">
            <div class="">
              <h2 class="fs-1 text-dark fw-bold mb-2">Need Custom Printing Done Right?</h2>
            </div>
            <div class="fs-5 text-dark mb-2">
              From DTF transfers to full print-on-demand services — we’ve got you covered with top quality, fast
              turnaround, and no minimums.
            </div>
            <a href="#" class="banner-btn text-light">Get Started &rarr;</a>
          </div>
        </div>
        <!-- Right Banner Image -->
        <div class="col-md-6 banner-image">
          
        </div>
      </div>
    </div>
  </section>
  <section data-aos="fade-up">
    <div class="container py-5">
      <h2 class="text-center fw-bold mb-1 text-dark">Your DTF Printing HUB</h2>
      <p class="text-center text-muted mb-4">
        Ready in 24 Hours — Pick Your Perfect Option Below
      </p>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col">
          <div class="card h-100 text-center border-0">
            <img src="{{asset('assets/media/DTF-Transfer-by-size.png')}}" alt="DTF Transfer by Size"
              class="card-img-top mx-auto mt-3 custom-card-img" />
            <div class="card-body">
              <h6 class="card-title fw-bold">DTF Transfer by Size</h6>
              <p class="card-text small text-muted mb-1">
                Print transfers in your exact size. Perfect for custom fits and unique projects.
              </p>
              <a href="{{url('/dtf/transfer_by_size')}}" class="btn btn-warning fw-bold px-3">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 text-center border-0">
            <img src="{{asset('assets/media/DTF-Gang-shift-builder.png')}}" alt="DTF Gang Sheet Builder"
              class="card-img-top mx-auto mt-3 custom-card-img" />
            <div class="card-body">
              <h6 class="card-title fw-bold">DTF Gang Sheet Builder</h6>
              <p class="card-text small text-muted mb-1">
                Design your gang sheet online. Add multiple designs to maximize your sheet.
              </p>
              <a href="{{url('/dtf/build-a-gangsheet')}}" class="btn btn-warning fw-bold px-3">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 text-center border-0">
            <img src="{{asset('assets/media/upload-a-print-ready-file.png')}}" alt="Upload a Print-Ready File"
              class="card-img-top mx-auto mt-3 custom-card-img" />
            <div class="card-body">
              <h6 class="card-title fw-bold">Upload a Print-Ready File</h6>
              <p class="card-text small text-muted mb-1">
                Upload and print instantly. Fast, high-quality results with no hassle.
              </p>
              <a href="{{url('/dtf/upload-gangsheet')}}" class="btn custom-btn-yellow">Upload your Gang Sheet</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 text-center border-0">
            <img src="{{asset('assets/media/DTF-Ready-transfer.png')}}" alt="DTF Ready Transfer"
              class="card-img-top mx-auto mt-3 custom-card-img" />
            <div class="card-body">
              <h6 class="card-title fw-bold">DTF Ready Transfer</h6>
              <p class="card-text small text-muted mb-1">
                Heat-press ready designs. Apply easily to any fabric in minutes.
              </p>
              <a href="{{url('/dtf/transfer_by_size')}}" class="btn custom-btn-yellow">Shop Now!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="my-5" data-aos="fade-up">
    <div class="position-relative text-center mb-4 shopping container">
      <img src="{{asset('assets/media/shopping-banner.png')}}" alt="Blank Shirts Banner" class="img-fluid w-100" />
      <div class="overlay-content">
        <h1 class="text-dark opacity-75 fw-bold">BLANK SHIRTS</h1>
        <a href="{{url('/blanks')}}" class="btn btn-warning fw-bold px-4 py-2">SHOP NOW</a>
      </div>
    </div>

    <!-- Bestseller Section -->
    <section class="text-center container py-5" data-aos="fade-up">
    <h3 class="text-dark fw-bold mb-3">Your next bestseller awaits</h3>
    <div class="row g-4 justify-content-center">
        @foreach($bestSelling as $product)
            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                <div class="latest-product-card p-2 h-100">
                    <div class="image-box mb-2">
                        <a href="{{ url('/product/' . $product->product->slug) }}">
                            @if($product->product->image)
                                <img src="{{ asset('/images/' . $product->image) }}" 
                                     class="product-image w-100 product-thumb" 
                                     alt="{{ $product->name }}">
                            @else
                                <img src="https://www.ssactivewear.com/{{ $product->product->main_image }}" 
                                     class="product-image w-100 product-thumb" 
                                     alt="{{ $product->name }}">
                            @endif
                        </a>
                    </div>
                    <div class="product-desc text-center">
                        <a href="{{ url('/product/' . $product->slug) }}" 
                           class="product-title h6 fw-500 d-block mb-1">
                            {{ $product->product->name }}
                        </a>
                        <p class="fw-600 mb-1">${{ $product->product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


    <!-- Promo Collection Section -->
    <div class="container" data-aos="fade-up">
      <div class="row align-items-center g-0">
        <div class="col-md-6 p-5  text-center text-md-start ">
          <div class="d-flex flex-column align-items-center">
            <small class="text-uppercase text-muted fw-semibold">Shop Now</small>
            <h3 class="fw-semibold mb-3 mt-2 text-dark text-left">Ready-to-Press & Custom Apparel Designs</h3>
            <p class="mb-4 text-muted text-left">
              Discover our collection of ready-to-press designs and bring your vision to life in minutes! Whether
               you’re looking for trendy graphics, seasonal themes, or everyday essentials, 
               we’ve got a wide selection of high-quality DTF transfers and apparel designs to choose from.
            </p>
            <p class="mb-4 text-muted text-left">
               ✨ Pick a Ready Design – Browse our curated selection of bold, vibrant prints made to stand out. Perfect for t-shirts, hoodies, totes, and more.
 
            </p>
            <p class="mb-4 text-muted text-left">
🎨 Customize Your Own – Want something truly unique? Personalize your design with names, logos, or artwork. Great for gifts, teams, events, or your own clothing brand.
            </p>
            <a href="{{url('/shop')}}" class="banner-btn text-light shop-btn text-center">Shop Now &rarr;</a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="{{asset('assets/media/man2.png')}}" alt="Collection" class="promo-img" />
        </div>
      </div>
    </div>

  </section>

  <style>
  .bg-custom-gold {
    background-color: #fbaf1c;
  }
  .bg-custom-dark {
    background-color: #111;
  }
  .icon-arrow {
    color: #fbaf1c;
    font-size: 1.2rem;
    margin-right: 5px;
  }
  .icon-check {
    color: #fbaf1c;
    font-size: 1.2rem;
    margin-right: 5px;
  }
  .image-laptop {
    max-width: 450px;
    height: auto;
  }

 
</style>

<div class="container py-4" data-aos="fade-up">
  <!-- Top Section (Gold Background) -->
  <div class="row bg-custom-gold py-5 px-5 d-flex align-items-center">
    <div class="col-lg-6 text-start">
      <h2 class="fw-bold display-5 mb-3 text-dark">No Designer?<br>No Problem.</h2>
      <h5 class="fw-semibold mb-0 text-dark">
        Design &amp; Preview Your <br>
        CustomGear Online &mdash; Instantly
      </h5>
    </div>
    <div class="col-lg-6 text-start">
      <h3 class="fw-bold mb-3 text-dark">How It Works:</h3>
      <ul class="list-unstyled fs-5 mb-0" style="color: #000;">
        <li class="mb-2">
          <span class="fw-bold text-dark">1.</span> Go to ardensprint.com <br>
          <span class="ms-4">&rarr; Click <span class="fw-bold">"Design Studio"</span></span>
        </li>
        <li class="mb-2">
          <span class="fw-bold text-dark">2.</span> Create Your Design
        </li>
        <li>
          <span class="fw-bold text-dark">3.</span> Place Your Order
        </li>
      </ul>
    </div>
  </div>

  <!-- Bottom Section (Dark Background) -->
  <div class="row bg-custom-dark py-5 px-5 d-flex align-items-center" data-aos="fade-up">
    <div class="col-lg-6 text-start text-white">
      <h4 class="fw-bold mb-4">What You Can Do:</h4>
      <ul class="list-unstyled fs-5" style="color : #fff !important;">
        <li class="mb-3">
          <span class="icon-arrow">&#8593;</span>
          <span class="fw-bold" >Upload Your Artwork</span>
          <span class="text-white-50" style="color : #fff !important;">
            Logo or image &mdash; or use our 
            <span class="text-custom-gold fw-bold" style="color:#fbaf1c;">Design Library</span>
          </span>
        </li>
        <li class="mb-3">
          <span class="icon-check">&#10003;</span>
          <span class="fw-bold">See It on a Mockup</span>
          <span class="text-white-50" style="color : #fff !important; "> Easy product preview for t-shirts, hoodies, totes & more</span>
        </li>
        <li>
          <span class="icon-check">&#10003;</span>
          <span class="fw-bold">Works Great for..</span>
          <span class="text-white-50" style="color : #fff !important;"> Schools, fundraisers, businesses, events</span>
        </li>
      </ul>
    </div>
    <div class="col-lg-6 text-center">
      <img src="{{asset('assets/media/laptop.png')}}" alt="Design Studio Preview" class="image-laptop">
    </div>
  </div>
</div>

  <section class="container py-5" data-aos="fade-up">
    <div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 g-4 text-center">
      <div class="col mb-2">
        <span class="feature-emoji">🎨</span>
        <div class="fw-bold fs-4 lh-1">Custom<br>Design</div>
        <div class="mt-2 fs-6 text-muted">Create tees,<br>bags &amp; more.</div>
      </div>
      <div class="col mb-2">
        <span class="feature-emoji">⚡</span>
        <div class="fw-bold fs-4 lh-1">Fast<br>Shipping</div>
        <div class="mt-2 fs-6 text-muted">Ships in<br>a few days.</div>
      </div>
      <div class="col mb-2">
        <span class="feature-emoji">👕</span>
        <div class="fw-bold fs-4 lh-1">Premium<br>Quality</div>
        <div class="mt-2 fs-6 text-muted">Built to last,<br>feel great.</div>
      </div>
      <div class="col mb-2">
        <span class="feature-emoji">👜</span>
        <div class="fw-bold fs-4 lh-1">Wide<br>Range</div>
        <div class="mt-2 fs-6 text-muted">From tees<br>to tote bags.</div>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-4 text-center mt-3">
      <div class="col mb-2">
        <span class="feature-emoji">🚀</span>
        <div class="fw-bold fs-4 lh-1">Easy Ordering</div>
        <div class="mt-2 fs-6 text-muted">From t tees<br>to tote bags.</div>
      </div>
      <div class="col mb-2">
        <span class="feature-emoji">🛒</span>
        <div class="fw-bold fs-4 lh-1">Checkout</div>
        <div class="mt-2 fs-6 text-muted">From checkout,<br>no minimum.</div>
      </div>
      <div class="col mb-2">
        <span class="feature-emoji">🌐</span>
        <div class="fw-bold fs-4 lh-1">One-Stop Shop</div>
        <div class="mt-2 fs-6 text-muted">All you need<br>in one place.</div>
      </div>
    </div>
  </section>
  <section class="container-fluid text-dark py-5" data-aos="fade-up">
    <div class="container">
      <div class="container py-4 bg-yellow-brand row justify-content-center align-items-center">
        <!-- Left Text -->
        <div class="col-lg-6 col-12 mb-4 mb-lg-0">
          <div class="d-flex align-items-center flex-column">
            <h1 class="fw-bold mb-3">
              <div>Browse</div>
              <div>DESIGN</div>
              <div>LIBRARY</div>
            </h1>
            <p class="fs-5">Find graphics by categories<br>for your custom gear</p>
          </div>
        </div>
        <!-- Design Library Card -->
        <div class="col-lg-6 col-12 d-flex justify-content-center">
          <div class="bg-white rounded-3 shadow-sm p-4 w-100" style="max-width: 330px;">
            <h5 class="fw-bold mb-3">Design Library</h5>
            <div class="mb-3 d-flex gap-2">
              <span class="badge bg-light text-dark">Graphics</span>
              <span class="badge bg-yellow-brand text-dark fw-semibold">Categories</span>
            </div>
            <div class="d-flex gap-3 mb-3">
              <div
                class="bg-yellow-brand text-dark fw-bold d-flex flex-column justify-content-center align-items-center rounded-2 p-2"
                style="width: 60px; height: 60px; font-size: 0.75rem; line-height: 1;">
                GOOD<br>VIBES
              </div>
              <div class="bg-light rounded-2 d-flex justify-content-center align-items-center"
                style="width: 60px; height: 60px; font-size: 1.8rem;">
                <i class="fa-solid fa-mountain"></i>
              </div>
              <div class="bg-light rounded-2 d-flex justify-content-center align-items-center"
                style="width: 60px; height: 60px; font-size: 1.8rem;">
                <i class="fa-solid fa-fish"></i>
              </div>
            </div>
            <a href="#" class="text-dark fw-semibold text-decoration-none d-block text-end">LEARN MORE</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="container py-5" data-aos="fade-up">
    <div class="row justify-content-center align-items-center">
      <!-- Left video and guide -->
      <div class="col-lg-6 d-flex align-items-center mb-4 mb-lg-0" style="background-color:#FEFAF2">
        <div class="d-flex gap-4 align-items-center w-100 justify-content-center">
          <img src="{{asset('assets/media/watch.png')}}" alt="Guide Video" class="rounded shadow guide"
            style="max-width: 270px;">
          <div>
            <div class="fw-bold fs-4 text-end">WATCH<br>FOR GUIDE</div>
            <button class="btn btn-outline-dark btn-sm mt-2 float-end">WATCH FOR GUIDE</button>
          </div>
        </div>
      </div>
      <!-- Right tier pricing -->
      <div class="col-lg-5 p-4 bg-color-tp">
        <div class="text-center">
          <h4 class="fw-bold mb-4">BECOME A KNIGHT<br>OF SAVINGS!</h4>
          <p class="text-muted mb-5">
            Join our membership program to unlock magical savings and exclusive discounts.
          </p>
          <div class="d-flex justify-content-center gap-3 con">
            <div class="tier-box tier-gold d-flex flex-column justify-content-center align-items-center p-3">
              <div class="tier-label">WARRIOR</div>
              <div class="tier-title">TIER</div>
              <div class="tier-price">$14.99</div>
              <div class="tier-month">/MONTH</div>
            </div>
            <div class="tier-box tier-dark d-flex flex-column justify-content-center align-items-center p-3">
              <div class="tier-label">ELITE</div>
              <div class="tier-title">TIER</div>
              <div class="tier-price">$39.99</div>
              <div class="tier-month">/MONTH</div>
            </div>
            <div class="tier-box tier-gold d-flex flex-column justify-content-center align-items-center p-3">
              <div class="tier-label">ROYAL</div>
              <div class="tier-title">TIER</div>
              <div class="tier-price">$89.99</div>
              <div class="tier-month">/MONTH</div>
            </div>
          </div>
          <a href="{{url('/login')}}" class="btn btn-dark btn-lg btn-full-width mt-4">BECOME A MEMBER</a>
        </div>
      </div>
    </div>
  </section>
  <section class="container mt-5" data-aos="fade-up">
    <div class="container bg-yellow-brand p-5 d-flex justify-content-center align-items-center">
      <div class="d-flex flex-column align-items-center">
        <div class="d-flex gap-4 align-items-center">
          <i class="fa-solid fa-message text-white fs-1"></i>
          <h2 class="text-center text-dark fw-bold">Easy Ordering</h2>
          <i class="fa-solid fa-phone-volume text-white fs-1"></i>
        </div>
        <p class="text-muted text-center fs-4">Text or Call 24/7</p>
        <a href="{{url('/shop')}}" class="btn btn-dark btn-lg btn-full-width mb-3">Shop Now</a>
        <h4 class="text-white fw-semibold text-center">(234) 567-8901</h4>
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