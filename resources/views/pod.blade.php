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
  </style>
  </style>

  <div class="container-fluid hero-bg">
  <div class="container py-1">
    <div class="row align-items-center">
      
      <!-- Left Text & Logo -->
      <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
        <div class="text-center text-md-start">
          
          <!-- Logo aligned with text -->
          <img src="{{asset('assets/media/logo.gif')}}" 
               alt="Logo" 
               class="img-fluid mb-3 d-block mx-auto mx-md-0" 
               style="max-width: 160px;">

          <h1 class="text-dark fw-bold mb-3">Create and Sell With Arden's Print</h1>
          <h3 class="text-dark mb-4 fs-5">
            Design Custom Products and sell them online. <br class="d-none d-md-block"> 
            Free to use - No inventory needed.
          </h3>

          <a href="{{url('/login')}}" class="btn btn-success fw-bold px-4 py-3">
            Get Started For Free
          </a>
        </div>
      </div>

      <!-- Right Image -->
      <div class="col-lg-6 col-md-6 text-center text-md-end">
        <img src="{{asset('heropod.png')}}" 
             alt="Collection" 
             class="img-fluid rounded mx-auto mx-md-0" 
             style="max-width: 90%;">
      </div>

    </div>
  </div>
</div>






  <div class="container py-5 bg-light" >
    
    <h2 class="text-center fw-bold mb-5 text-dark">Why choose Arden’s Print?</h2>
    
    <div class="row g-4 justify-content-center">
      
      <!-- Feature 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="p-4 text-center h-100 shadow-sm rounded bg-white">
          <img src="{{asset('tshirt-yellow.png')}}" 
               alt="Products" 
               class="mb-3" style="width:60px; height:auto;">
          <h4 class="fw-bold text-dark">1000+ Products</h4>
          <p class="mb-0 text-dark">
            From t-shirts to mugs and more, choose from over a thousand unique products to sell.
          </p>
        </div>
      </div>

      <!-- Feature 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="p-4 text-center h-100 shadow-sm rounded bg-white">
          <img src="{{asset('gobe.png')}}" 
               alt="Worldwide Shipping" 
               class="mb-3" style="width:60px; height:auto;">
          <h4 class="fw-bold text-dark">Worldwide Shipping</h4>
          <p class="mb-0 text-dark">
            Reach customers anywhere with fast and reliable global shipping options.
          </p>
        </div>
      </div>

      <!-- Feature 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="p-4 text-center h-100 shadow-sm rounded bg-white">
          <img src="{{asset('link.png')}}" 
               alt="Easy Integrations" 
               class="mb-3" style="width:60px; height:auto;">
          <h4 class="fw-bold text-dark">Easy Integrations</h4>
          <p class="mb-0 text-dark">
            Connect with Shopify, Etsy, and more to streamline your workflow.
          </p>
        </div>
      </div>

    </div>
  </div>




  <div class="container-fluid py-5" style="background-color: #FEFAE0;">
  <div class="container text-center">

    <!-- Heading -->
    <h2 class="fw-bold mb-3 text-dark">Sell Everywhere. <br class="d-md-none"> Start With $0.</h2>
    <p class="mb-4 fs-5 text-dark">Launch your store from anywhere. No upfront fees.</p>

    <!-- Button -->
    <a href="{{url('/login')}}" class="btn btn-dark fw-bold px-5 py-3 mb-5">
      Start selling
    </a>

    <!-- Platforms -->
    <div class="row justify-content-center mb-5 g-4">
      <div class="col-6 col-md-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="200px" viewBox="0 0 50 24" aria-hidden="true" focusable="false">
            <path d="M42.973 23.998C45.006 23.998 46.673 23.321 47.768 22.045 48.89 20.716 49.254 19.386 49.254 16.675V7.739C49.254 7.008 49.254 6.2 49.306 5.627 49.332 5.13 48.889 5.027 48.497 5.184 47.377 5.627 46.412 5.861 45.11 6.148 44.797 6.226 44.667 6.435 44.667 6.67S44.826 7.166 45.32 7.14C46.492 7.088 46.804 7.323 46.804 8.18V13.941C46.621 15.504 45.32 16.833 43.678 16.833 42.192 16.833 41.332 15.843 41.332 13.81V7.738C41.332 7.008 41.358 6.2 41.384 5.627 41.41 5.13 40.994 5.027 40.575 5.184 39.48 5.601 38.568 5.861 37.343 6.148 37.004 6.226 36.873 6.435 36.873 6.67S37.03 7.166 37.525 7.14C38.592 7.088 38.879 7.323 38.879 8.18V14.254C38.879 17.094 40.52 18.37 42.969 18.37 44.482 18.37 46.072 17.51 46.802 15.92V18.033C46.801 19.699 46.462 20.768 45.785 21.576 45.082 22.411 44.17 22.88 42.997 22.88 41.615 22.879 40.86 22.383 40.86 21.654 40.86 21.42 40.938 21.158 40.938 20.794 40.938 20.117 40.468 19.517 39.739 19.517 38.827 19.517 38.385 20.22 38.385 21.03 38.385 22.437 39.922 24 42.97 24M31.3 18.474C34.296 18.474 36.146 16.65 36.146 14.435 36.146 10.032 29.293 11.151 29.293 8.311 29.293 7.216 30.075 6.304 31.508 6.304 32.836 6.304 33.853 6.904 34.399 8.154L34.66 8.754C34.921 9.352 35.65 9.223 35.572 8.623L35.312 6.487C35.26 6.122 35.156 5.965 34.842 5.836 33.852 5.393 32.782 5.184 31.637 5.184 28.823 5.184 27.18 6.931 27.18 9.094 27.18 13.576 34.033 12.404 34.033 15.218 34.033 16.337 33.121 17.328 31.375 17.328 29.863 17.329 28.95 16.704 28.274 15.295L27.884 14.487C27.647 13.99 26.918 14.122 27.023 14.774L27.387 17.119C27.439 17.46 27.57 17.563 27.858 17.694 28.977 18.215 29.89 18.475 31.296 18.475M22.464 18.5C24.262 18.5 25.487 17.562 25.955 15.92 26.14 15.348 25.54 15.009 25.175 15.583 24.679 16.442 23.95 16.807 23.115 16.807 22.048 16.807 21.5 16.024 21.5 14.592V6.696L24.94 6.722C25.33 6.722 25.487 6.357 25.487 6.045 25.487 5.706 25.304 5.419 24.887 5.419L21.5 5.445V3.464C21.5 3.125 21.291 2.968 21.03 2.968A.6.6 0 0 0 20.535 3.228C19.597 4.664 18.97 5.158 17.512 5.705 17.199 5.834 17.016 6.017 17.016 6.252 17.016 6.512 17.146 6.694 17.538 6.694H19.049V14.877C19.049 17.25 20.431 18.5 22.462 18.5M11.806 17.014H7.27C5.863 17.014 5.499 16.65 5.499 15.424V9.692H9.147C10.501 9.691 10.919 10.056 11.387 11.384L11.753 12.454C11.962 13.079 12.794 13.104 12.794 12.376 12.69 10.29 12.69 7.84 12.742 5.756 12.794 5.027 11.959 5.053 11.752 5.678L11.388 6.748C10.918 8.102 10.553 8.52 9.147 8.52H5.499V1.745C5.499 1.38 5.654 1.223 6.046 1.223H11.493C13.083 1.223 13.759 1.665 14.255 3.047L14.855 4.742C15.089 5.419 15.896 5.316 15.896 4.664L15.844.468C15.845.13 15.637 0 15.35 0H.599C.13 0 0 .26 0 .522 0 .782.13 1.017.573 1.069 2.398 1.2 2.71 1.565 2.71 2.633V15.715C2.71 16.705 2.398 17.043.677 17.175.261 17.226.13 17.46.13 17.722S.26 18.244.703 18.244H15.61C15.896 18.244 16.105 18.114 16.105 17.776L16.157 13.58C16.157 12.928 15.35 12.85 15.141 13.502L14.594 15.196C14.15 16.604 13.394 17.021 11.806 17.021"></path></svg>
      </div>
      <div class="col-6 col-md-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="200px" height="200px" xml:space="preserve" style="enable-background:new 0 0 500 142.8" viewBox="0 0 500 142.8">
            <path d="M107.4 27.1c-.1-.7-.7-1.1-1.2-1.1s-10.4-.2-10.4-.2-8.3-8-9.1-8.9c-.8-.8-2.4-.6-3-.4 0 0-1.6.5-4.2 1.3-.4-1.4-1.1-3.1-2-4.9-2.9-5.6-7.3-8.6-12.5-8.6-.4 0-.7 0-1.1.1-.2-.2-.3-.4-.5-.5C61.1 1.5 58.2.3 54.7.4 48 .6 41.3 5.5 35.8 14.1c-3.8 6.1-6.7 13.7-7.6 19.6-7.7 2.4-13.1 4.1-13.3 4.1-3.9 1.2-4 1.3-4.5 5C10.2 45.6 0 124.5 0 124.5l85.6 14.8 37.1-9.2c-.1 0-15.2-102.3-15.3-103zm-32.2-7.9c-2 .6-4.2 1.3-6.6 2.1 0-3.4-.5-8.2-2-12.2 5.1.8 7.6 6.6 8.6 10.1zm-11.1 3.4c-4.5 1.4-9.4 2.9-14.3 4.4 1.4-5.3 4-10.5 7.2-14 1.2-1.3 2.9-2.7 4.8-3.5 2 3.9 2.4 9.4 2.3 13.1zM54.9 4.9c1.6 0 2.9.3 4 1.1-1.8.9-3.6 2.3-5.2 4.1-4.3 4.6-7.6 11.7-8.9 18.6-4.1 1.3-8.1 2.5-11.7 3.6C35.5 21.4 44.6 5.2 54.9 4.9z" style="fill:#95bf47"/><path d="M106.2 26c-.5 0-10.4-.2-10.4-.2s-8.3-8-9.1-8.9c-.3-.3-.7-.5-1.1-.5v122.9l37.1-9.2s-15.1-102.3-15.2-103c-.2-.7-.8-1.1-1.3-1.1z" style="fill:#5e8e3e"/><path d="m65 45.1-4.3 16.1s-4.8-2.2-10.5-1.8c-8.4.5-8.4 5.8-8.4 7.1.5 7.2 19.4 8.8 20.5 25.7.8 13.3-7 22.4-18.4 23.1-13.6.7-21.1-7.3-21.1-7.3l2.9-12.3s7.6 5.7 13.6 5.3c3.9-.2 5.4-3.5 5.2-5.7-.6-9.4-16-8.8-17-24.3-.8-13 7.7-26.1 26.5-27.3 7.3-.5 11 1.4 11 1.4z" style="fill:#fff"/>
        <path d="M172.9 79.4c-4.3-2.3-6.5-4.3-6.5-7 0-3.4 3.1-5.6 7.9-5.6 5.6 0 10.6 2.3 10.6 2.3l3.9-12s-3.6-2.8-14.2-2.8c-14.8 0-25.1 8.5-25.1 20.4 0 6.8 4.8 11.9 11.2 15.6 5.2 2.9 7 5 7 8.1 0 3.2-2.6 5.8-7.4 5.8-7.1 0-13.9-3.7-13.9-3.7l-4.2 12s6.2 4.2 16.7 4.2c15.2 0 26.2-7.5 26.2-21-.1-7.3-5.6-12.5-12.2-16.3zM233.5 54.1c-7.5 0-13.4 3.6-17.9 9l-.2-.1 6.5-34H205l-16.5 86.6h16.9L211 86c2.2-11.2 8-18.1 13.4-18.1 3.8 0 5.3 2.6 5.3 6.3 0 2.3-.2 5.2-.7 7.5l-6.4 33.9h16.9l6.6-35c.7-3.7 1.2-8.1 1.2-11.1.1-9.6-4.9-15.4-13.8-15.4zM285.7 54.1c-20.4 0-33.9 18.4-33.9 38.9 0 13.1 8.1 23.7 23.3 23.7 20 0 33.5-17.9 33.5-38.9.1-12.1-7-23.7-22.9-23.7zm-8.3 49.7c-5.8 0-8.2-4.9-8.2-11.1 0-9.7 5-25.5 14.2-25.5 6 0 8 5.2 8 10.2 0 10.4-5.1 26.4-14 26.4zM352 54.1c-11.4 0-17.9 10.1-17.9 10.1h-.2l1-9.1h-15c-.7 6.1-2.1 15.5-3.4 22.5l-11.8 62h16.9l4.7-25.1h.4s3.5 2.2 9.9 2.2c19.9 0 32.9-20.4 32.9-41 0-11.4-5.1-21.6-17.5-21.6zM335.8 104c-4.4 0-7-2.5-7-2.5l2.8-15.8c2-10.6 7.5-17.6 13.4-17.6 5.2 0 6.8 4.8 6.8 9.3 0 11-6.5 26.6-16 26.6zM393.7 29.8c-5.4 0-9.7 4.3-9.7 9.8 0 5 3.2 8.5 8 8.5h.2c5.3 0 9.8-3.6 9.9-9.8 0-4.9-3.3-8.5-8.4-8.5zM370 115.5h16.9l11.5-60h-17zM441.5 55.4h-11.8l.6-2.8c1-5.8 4.4-10.9 10.1-10.9 3 0 5.4.9 5.4.9l3.3-13.3s-2.9-1.5-9.2-1.5c-6 0-12 1.7-16.6 5.6-5.8 4.9-8.5 12-9.8 19.2l-.5 2.8h-7.9l-2.5 12.8h7.9l-9 47.4h16.9l9-47.4h11.7l2.4-12.8zM482.3 55.5S471.7 82.2 467 96.8h-.2c-.3-4.7-4.2-41.3-4.2-41.3h-17.8l10.2 55.1c.2 1.2.1 2-.4 2.8-2 3.8-5.3 7.5-9.2 10.2-3.2 2.3-6.8 3.8-9.6 4.8l4.7 14.4c3.4-.7 10.6-3.6 16.6-9.2 7.7-7.2 14.9-18.4 22.2-33.6L500 55.5h-17.7z"/></svg>
      </div>
      <div class="col-6 col-md-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="200px" height="200px" viewBox="7.082 -380.929 957.518 957.518"><path d="M380.724 149.019c-34.999 25.798-85.729 39.562-129.406 39.562-61.243 0-116.377-22.652-158.088-60.325-3.277-2.962-.341-7 3.592-4.692 45.015 26.189 100.673 41.947 158.166 41.947 38.774 0 81.43-8.023 120.65-24.671 5.925-2.517 10.88 3.879 5.086 8.179" fill="#f90"/><path d="M395.275 132.372c-4.457-5.715-29.573-2.701-40.847-1.363-3.434.42-3.958-2.569-.865-4.719 20.004-14.079 52.827-10.016 56.655-5.297 3.827 4.746-.996 37.648-19.794 53.352-2.884 2.412-5.637 1.127-4.352-2.07 4.222-10.54 13.686-34.162 9.203-39.903" fill="#f90"/><path d="M355.216 26.901V13.216c0-2.071 1.573-3.46 3.46-3.46h61.27c1.966 0 3.539 1.416 3.539 3.46v11.719c-.026 1.966-1.678 4.536-4.614 8.599l-31.749 45.329c11.798-.289 24.251 1.468 34.947 7.498 2.412 1.363 3.067 3.356 3.251 5.322v14.603c0 1.992-2.202 4.326-4.509 3.119-18.851-9.883-43.888-10.958-64.729.105-2.124 1.154-4.353-1.153-4.353-3.146V92.496c0-2.229.026-6.03 2.255-9.412l36.782-52.749h-32.011c-1.967 0-3.539-1.389-3.539-3.434M131.717 112.29h-18.641c-1.782-.131-3.198-1.469-3.329-3.172V13.452c0-1.914 1.6-3.434 3.592-3.434h17.382c1.809.078 3.251 1.468 3.382 3.198v12.505h.341c4.535-12.086 13.056-17.723 24.539-17.723 11.666 0 18.955 5.637 24.198 17.723 4.509-12.086 14.76-17.723 25.745-17.723 7.812 0 16.359 3.225 21.576 10.46 5.898 8.049 4.692 19.741 4.692 29.992l-.025 60.377c0 1.914-1.6 3.461-3.592 3.461h-18.614c-1.861-.131-3.355-1.626-3.355-3.461V58.125c0-4.037.366-14.104-.524-17.932-1.39-6.423-5.559-8.232-10.959-8.232-4.509 0-9.229 3.015-11.143 7.839-1.913 4.824-1.729 12.898-1.729 18.325v50.704c0 1.914-1.6 3.461-3.592 3.461h-18.614c-1.888-.131-3.355-1.626-3.355-3.461l-.026-50.704c0-10.67 1.757-26.374-11.483-26.374-13.396 0-12.872 15.311-12.872 26.374v50.704c-.003 1.914-1.602 3.461-3.594 3.461M476.232 7.999c27.659 0 42.629 23.752 42.629 53.955 0 29.179-16.543 52.329-42.629 52.329-27.16 0-41.947-23.752-41.947-53.351 0-29.784 14.971-52.933 41.947-52.933m.157 19.531c-13.737 0-14.603 18.719-14.603 30.385 0 11.693-.184 36.651 14.445 36.651 14.445 0 15.127-20.134 15.127-32.404 0-8.075-.341-17.723-2.778-25.378-2.097-6.659-6.266-9.254-12.191-9.254M554.725 112.29h-18.562c-1.861-.131-3.355-1.625-3.355-3.461l-.026-95.691c.157-1.756 1.704-3.12 3.592-3.12h17.277c1.625.078 2.962 1.18 3.329 2.674V27.32h.341c5.217-13.082 12.531-19.322 25.404-19.322 8.363 0 16.517 3.015 21.76 11.273 4.876 7.655 4.876 20.528 4.876 29.782v60.22c-.209 1.678-1.756 3.016-3.592 3.016h-18.692c-1.704-.131-3.119-1.39-3.303-3.016V57.312c0-10.46 1.205-25.771-11.667-25.771-4.535 0-8.704 3.041-10.775 7.655-2.621 5.846-2.962 11.667-2.962 18.116v51.516c-.026 1.915-1.652 3.462-3.645 3.462M621.028 104.686c0-4.824 4.116-8.704 9.176-8.704s9.176 3.879 9.176 8.704c0 4.798-4.116 8.73-9.176 8.73s-9.176-3.932-9.176-8.73M818.519 112.315c-1.94-.078-3.461-1.572-3.461-3.46V13.189c.105-1.704 1.547-3.041 3.33-3.146h6.843c1.888 0 3.408 1.363 3.565 3.146v13.947c4.876-11.063 13.947-19.715 25.404-19.715h1.389c12.165 0 21.053 8.966 24.355 21.996 5.165-12.873 14.865-21.996 27.659-21.996h1.416c9.045 0 17.748 5.82 22.258 14.682 4.352 8.468 4.194 19.741 4.194 29.206l-.026 57.546c.026 1.835-1.468 3.329-3.329 3.46h-8.18c-1.782-.078-3.225-1.336-3.461-2.988V51.309c0-6.843.341-14.105-2.438-20.344-2.832-6.371-8.259-10.356-14.079-10.645-6.501.315-12.479 5.06-16.359 11.457-5.033 8.258-4.85 15.704-4.85 25.352v52.25c-.236 1.572-1.625 2.805-3.33 2.936h-8.127c-1.939-.078-3.486-1.572-3.486-3.46l-.053-61.374c0-5.637-.341-12.27-2.937-17.33-3.015-5.768-8.415-9.543-14.078-9.832-5.872.341-11.798 4.824-15.311 10.042-4.535 6.659-5.4 14.891-5.4 23.359v55.134c0 1.835-1.495 3.329-3.356 3.46h-8.152M762.363 114.308c-26.453 0-38.303-26.977-38.303-53.955 0-28.366 13.921-52.932 40.558-52.932h1.415c25.902 0 38.802 26.165 38.802 53.142 0 28.576-14.289 53.745-41.082 53.745H762.363m1.94-13.083c8.703-.287 15.572-5.688 19.636-14.681 3.645-8.075 4.353-17.33 4.353-26.191 0-9.647-1.049-19.715-5.585-27.973-4.063-7.21-11.037-11.798-18.43-12.06-8.232.289-15.6 5.873-19.296 14.472-3.329 7.446-4.352 17.33-4.352 25.562 0 9.255 1.205 19.951 5.033 28 3.723 7.628 10.881 12.583 18.641 12.871M679.701 100.806c11.877-.366 18.116-9.883 20.686-22.206.524-1.547 1.704-2.727 3.435-2.727l7.839-.026c1.861.079 3.565 1.495 3.408 3.225-3.618 21-16.281 35.235-34.318 35.235h-1.416c-26.269 0-37.595-26.375-37.595-53.142 0-26.558 11.483-53.745 37.752-53.745h1.416c18.247 0 31.251 14.052 34.082 35.052 0 1.573-1.468 2.937-3.198 3.12l-8.206-.105c-1.73-.236-2.857-1.704-3.12-3.355-1.966-11.719-8.704-21.052-19.925-21.419-17.855.578-22.941 22.547-22.941 39.457 0 16.281 4.247 40.059 22.101 40.636M339.564 94.75c-3.408-4.719-7.026-8.547-7.026-17.277V48.425c0-12.296.865-23.595-8.206-32.063-7.157-6.869-19.007-9.281-28.078-9.281-17.723 0-37.543 6.606-41.685 28.524-.446 2.333 1.258 3.565 2.778 3.906l18.063 1.94c1.704-.079 2.937-1.73 3.251-3.408 1.547-7.55 7.865-11.194 14.97-11.194 3.854 0 8.206 1.416 10.461 4.85 2.622 3.828 2.281 9.071 2.281 13.501v2.412c-10.802 1.232-24.933 2.019-35.053 6.476-11.692 5.034-19.872 15.337-19.872 30.464 0 19.375 12.19 29.048 27.895 29.048 13.239 0 20.502-3.119 30.727-13.555 3.382 4.903 4.509 7.289 10.696 12.428 1.39.734 3.172.655 4.404-.445l.026.052c3.723-3.304 10.486-9.202 14.288-12.374 1.522-1.259 1.26-3.278.08-4.956zm-36.678-8.389c-2.963 5.244-7.682 8.468-12.898 8.468-7.157 0-11.353-5.453-11.353-13.502 0-15.887 14.236-18.771 27.738-18.771v4.037c.001 7.262.184 13.319-3.487 19.768zM95.196 94.75c-3.408-4.719-7.025-8.547-7.025-17.277V48.425c0-12.296.865-23.595-8.206-32.063-7.157-6.869-19.008-9.281-28.078-9.281-17.723 0-37.517 6.606-41.685 28.524-.42 2.333 1.258 3.565 2.778 3.906l18.09 1.94c1.678-.079 2.91-1.73 3.225-3.408 1.547-7.55 7.892-11.194 14.996-11.194 3.828 0 8.18 1.416 10.461 4.85 2.595 3.828 2.254 9.071 2.254 13.501v2.412c-10.801 1.232-24.932 2.019-35.052 6.476C15.288 59.122 7.082 69.425 7.082 84.552c0 19.375 12.217 29.048 27.895 29.048 13.266 0 20.502-3.119 30.727-13.555 3.408 4.903 4.509 7.289 10.696 12.428 1.39.734 3.172.655 4.404-.445l.053.052c3.723-3.304 10.486-9.202 14.288-12.374 1.52-1.259 1.257-3.278.051-4.956zm-36.677-8.389c-2.963 5.244-7.655 8.468-12.898 8.468-7.157 0-11.326-5.453-11.326-13.502 0-15.887 14.235-18.771 27.711-18.771v4.037c0 7.262.183 13.319-3.487 19.768zM954.821 11.066c4.482 0 8.206 3.618 8.206 8.18 0 4.457-3.671 8.206-8.206 8.206-4.51 0-8.18-3.67-8.18-8.206 0-4.615 3.723-8.18 8.18-8.18m.026-1.573c-5.244 0-9.779 4.247-9.779 9.779 0 5.427 4.457 9.752 9.779 9.752 5.348 0 9.752-4.378 9.752-9.752 0-5.532-4.482-9.779-9.752-9.779m-3.67 15.258h2.098v-4.404h1.939c.761 0 .971.315 1.128.944 0 .157.367 2.937.394 3.46h2.333c-.288-.524-.446-2.019-.551-2.91-.21-1.39-.314-2.36-1.809-2.464.76-.262 2.071-.682 2.071-2.701 0-2.884-2.544-2.884-3.854-2.884h-3.749v10.959m2.044-9.202h1.757c.576 0 1.625 0 1.625 1.494 0 .577-.262 1.547-1.678 1.547h-1.704v-3.041" fill="#221f1f"/></svg>
      </div>
      <div class="col-6 col-md-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="200px" height="200px" viewBox="0 0 32 32" version="1.1">

<path d="M15.103 14.682c0.292 0 0.443 0.273 0.443 0.826 0.002 0.029 0.003 0.063 0.003 0.098 0 0.215-0.046 0.42-0.13 0.604l0.004-0.009c-0.066 0.105-0.181 0.174-0.312 0.174-0.006 0-0.011-0-0.017-0l0.001 0c-0.003 0-0.007 0-0.010 0-0.126 0-0.235-0.070-0.292-0.172l-0.001-0.002c-0.070-0.17-0.111-0.368-0.111-0.575 0-0.045 0.002-0.090 0.006-0.135l-0 0.006c0-0.546 0.138-0.814 0.416-0.814zM9.56 14.675c-0.165 0.020-0.303 0.121-0.374 0.261l-0.001 0.003c-0.157 0.217-0.25 0.489-0.25 0.783 0 0.006 0 0.012 0 0.018v-0.001c0.002 0.137 0.029 0.267 0.078 0.386l-0.003-0.007c0.061 0.163 0.146 0.248 0.245 0.269 0.011 0.001 0.024 0.002 0.036 0.002 0.12 0 0.227-0.052 0.301-0.134l0-0c0.163-0.161 0.276-0.373 0.315-0.609l0.001-0.006c0.017-0.092 0.028-0.198 0.029-0.307v-0.001c-0.002-0.137-0.029-0.267-0.078-0.386l0.003 0.007c-0.063-0.163-0.145-0.248-0.245-0.269-0.017-0.004-0.036-0.007-0.056-0.007l-0.001-0zM6.953 14.675c-0.165 0.020-0.304 0.121-0.375 0.261l-0.001 0.003c-0.157 0.217-0.25 0.489-0.25 0.783 0 0.006 0 0.012 0 0.018v-0.001c0.002 0.137 0.029 0.267 0.078 0.386l-0.003-0.007c0.061 0.163 0.146 0.248 0.245 0.269 0.011 0.001 0.024 0.002 0.036 0.002 0.12 0 0.227-0.052 0.301-0.134l0-0c0.163-0.161 0.276-0.373 0.315-0.609l0.001-0.006c0.018-0.089 0.029-0.191 0.029-0.295 0-0.005-0-0.009-0-0.014v0.001c-0.002-0.137-0.029-0.267-0.078-0.386l0.003 0.007c-0.063-0.163-0.145-0.248-0.245-0.269-0.017-0.004-0.036-0.007-0.056-0.007l-0.001-0zM26.003 14.661c0.014-0.001 0.030-0.002 0.047-0.002 0.127 0 0.246 0.034 0.348 0.093l-0.003-0.002c0.071 0.060 0.116 0.149 0.116 0.248 0 0.013-0.001 0.025-0.002 0.037l0-0.002q0 0.293-0.506 0.3v-0.675zM23.469 14.12v2.834h1.552v-0.605h-0.785v-0.521h0.677v-0.586h-0.676v-0.519h0.779v-0.603zM29.468 14.115v2.834h1.552v-0.605h-0.789v-0.518h0.676v-0.586h-0.676v-0.521h0.784v-0.605zM25.241 14.115v2.834h0.765v-1.29h0.015l0.618 1.289h0.807l-0.612-1.275c0.271-0.118 0.459-0.382 0.463-0.69v-0.001c0-0.007 0-0.016 0-0.024 0-0.25-0.123-0.472-0.311-0.607l-0.002-0.002c-0.219-0.147-0.488-0.235-0.778-0.235-0.026 0-0.051 0.001-0.077 0.002l0.004-0zM20.249 14.115l-0.363 2.834h0.725l0.195-1.951 0.496 1.951h0.516l0.469-1.946 0.207 1.946h0.755l-0.382-2.834h-0.988l-0.149 0.636c-0.038 0.163-0.075 0.33-0.108 0.501l-0.083 0.441c-0.079-0.441-0.188-0.965-0.325-1.577zM16.785 14.115l-0.363 2.834h0.725l0.195-1.951 0.494 1.951h0.516l0.474-1.946 0.205 1.946h0.755l-0.381-2.834h-0.99l-0.15 0.636c-0.038 0.163-0.075 0.33-0.109 0.501l-0.084 0.44q-0.145-0.792-0.323-1.577zM28.798 14.040c-0.017-0.001-0.038-0.001-0.058-0.001-0.778 0-1.409 0.631-1.409 1.409 0 0.017 0 0.034 0.001 0.051l-0-0.002c-0.001 0.021-0.002 0.045-0.002 0.069 0 0.4 0.157 0.764 0.413 1.033l-0.001-0.001c0.262 0.261 0.622 0.422 1.021 0.422 0.020 0 0.040-0 0.060-0.001l-0.003 0c0.155-0.002 0.304-0.025 0.444-0.068l-0.011 0.003v-0.676c-0.113 0.037-0.243 0.060-0.377 0.064l-0.002 0c-0.007 0-0.016 0-0.025 0-0.199 0-0.378-0.085-0.503-0.221l-0-0c-0.125-0.164-0.2-0.371-0.2-0.597 0-0.222 0.073-0.427 0.197-0.592l-0.002 0.003c0.115-0.139 0.288-0.227 0.481-0.227 0.006 0 0.011 0 0.017 0l-0.001-0c0.148 0.001 0.291 0.023 0.426 0.064l-0.011-0.003v-0.672c-0.132-0.036-0.283-0.056-0.439-0.056-0.005 0-0.010 0-0.016 0h0.001zM13.26 14.040c-0.017-0.001-0.038-0.001-0.058-0.001-0.778 0-1.409 0.631-1.409 1.409 0 0.017 0 0.034 0.001 0.051l-0-0.002c-0.001 0.021-0.002 0.045-0.002 0.069 0 0.4 0.157 0.764 0.413 1.033l-0.001-0.001c0.261 0.261 0.622 0.422 1.020 0.422 0.020 0 0.040-0 0.061-0.001l-0.003 0c0.155-0.002 0.304-0.025 0.444-0.068l-0.011 0.003v-0.676c-0.113 0.037-0.243 0.060-0.377 0.064l-0.002 0c-0.007 0-0.016 0-0.025 0-0.199 0-0.378-0.085-0.503-0.221l-0-0c-0.125-0.164-0.2-0.371-0.2-0.597 0-0.222 0.073-0.427 0.197-0.592l-0.002 0.003c0.115-0.139 0.288-0.227 0.481-0.227 0.006 0 0.011 0 0.017 0l-0.001-0c0.149 0.001 0.291 0.023 0.426 0.064l-0.011-0.003v-0.672c-0.132-0.036-0.283-0.056-0.44-0.056-0.005 0-0.010 0-0.016 0h0.001zM15.095 14.037c-0.017-0.001-0.036-0.001-0.056-0.001-0.335 0-0.636 0.147-0.842 0.381l-0.001 0.001c-0.202 0.266-0.324 0.602-0.324 0.967 0 0.037 0.001 0.073 0.004 0.109l-0-0.005c-0.002 0.035-0.004 0.075-0.004 0.116 0 0.382 0.121 0.735 0.328 1.023l-0.004-0.005c0.208 0.244 0.516 0.398 0.86 0.398 0.025 0 0.050-0.001 0.075-0.002l-0.003 0c0.018 0.001 0.040 0.002 0.061 0.002 0.341 0 0.645-0.154 0.849-0.395l0.001-0.002c0.202-0.278 0.324-0.625 0.324-1.002 0-0.036-0.001-0.073-0.003-0.109l0 0.005c0.002-0.032 0.003-0.069 0.003-0.106 0-0.374-0.123-0.72-0.332-0.998l0.003 0.004c-0.216-0.236-0.525-0.383-0.868-0.383-0.025 0-0.050 0.001-0.074 0.002l0.003-0zM9.541 13.979c0.080 0 0.158 0.009 0.232 0.026l-0.007-0.001c0.288 0.055 0.526 0.234 0.661 0.478l0.002 0.005c0.127 0.221 0.201 0.485 0.201 0.768 0 0.018-0 0.036-0.001 0.054l0-0.003c0 0.006 0 0.013 0 0.021 0 0.427-0.121 0.827-0.33 1.166l0.005-0.010c-0.182 0.366-0.549 0.616-0.976 0.626l-0.001 0c-0.081-0.002-0.158-0.011-0.233-0.029l0.007 0.001c-0.288-0.055-0.527-0.233-0.662-0.476l-0.002-0.005c-0.126-0.225-0.201-0.493-0.201-0.779 0-0.016 0-0.032 0.001-0.048l-0 0.002c-0-0.006-0-0.013-0-0.021 0-0.426 0.121-0.824 0.331-1.162l-0.005 0.009c0.183-0.365 0.549-0.613 0.975-0.623l0.001-0zM6.933 13.979c0.080 0 0.158 0.009 0.232 0.026l-0.007-0.001c0.288 0.057 0.525 0.235 0.661 0.478l0.003 0.005c0.127 0.221 0.202 0.487 0.202 0.77 0 0.017-0 0.034-0.001 0.051l0-0.002c0 0.005 0 0.012 0 0.018 0 0.428-0.121 0.829-0.331 1.168l0.005-0.010c-0.182 0.366-0.549 0.616-0.976 0.626l-0.001 0c-0.081-0.002-0.158-0.011-0.233-0.029l0.007 0.001c-0.288-0.055-0.527-0.233-0.662-0.476l-0.003-0.005c-0.125-0.224-0.199-0.491-0.199-0.775 0-0.018 0-0.035 0.001-0.053l-0 0.003c-0-0.008-0-0.016-0-0.025 0-0.424 0.12-0.821 0.329-1.157l-0.005 0.009c0.183-0.365 0.549-0.613 0.975-0.623l0.001-0zM5.315 13.528h0.038c0.086 0.002 0.164 0.033 0.225 0.084l-0.001-0c0.073 0.056 0.122 0.14 0.129 0.237l0 0.001c0.001 0.009 0.001 0.019 0.001 0.030 0 0.062-0.016 0.121-0.043 0.172l0.001-0.002c-0.2 0.438-0.343 0.945-0.401 1.478l-0.002 0.022c-0.077 0.41-0.121 0.883-0.121 1.365 0 0.078 0.001 0.155 0.003 0.232l-0-0.011c0.002 0.016 0.003 0.035 0.003 0.054 0 0.080-0.019 0.156-0.053 0.222l0.001-0.003c-0.041 0.084-0.123 0.143-0.219 0.15l-0.001 0c-0.001 0-0.001 0-0.002 0-0.132 0-0.249-0.060-0.327-0.154l-0.001-0.001c-0.433-0.488-0.753-1.085-0.914-1.744l-0.006-0.028q-0.406 0.798-0.598 1.198c-0.245 0.471-0.454 0.711-0.628 0.723-0.113 0.009-0.208-0.086-0.292-0.285-0.295-0.901-0.535-1.97-0.676-3.069l-0.009-0.090c-0.003-0.017-0.005-0.037-0.005-0.058 0-0.083 0.027-0.159 0.073-0.221l-0.001 0.001c0.061-0.078 0.156-0.128 0.262-0.128 0 0 0.001 0 0.001 0h-0c0.018-0.004 0.038-0.006 0.059-0.006 0.167 0 0.302 0.135 0.302 0.302 0 0.001 0 0.001 0 0.002v-0c0.129 0.87 0.272 1.607 0.421 2.21l0.91-1.736c0.052-0.132 0.169-0.228 0.311-0.249l0.002-0c0.183-0.013 0.297 0.104 0.342 0.35 0.097 0.541 0.233 1.018 0.412 1.474l-0.018-0.052c0.043-0.837 0.242-1.618 0.567-2.328l-0.016 0.040c0.050-0.105 0.152-0.178 0.272-0.184l0.001-0zM1.924 12.971c0 0 0 0 0 0-0.521 0-0.944 0.423-0.944 0.944 0 0.002 0 0.004 0 0.005v-0 3.16c0 0 0 0.001 0 0.001 0 0.523 0.424 0.947 0.947 0.947 0 0 0.001 0 0.001 0h3.924l1.791 1-0.408-1h2.97c0 0 0.001 0 0.001 0 0.523 0 0.948-0.424 0.948-0.948 0-0 0-0.001 0-0.001v0-3.16c0-0 0-0.001 0-0.001 0-0.523-0.424-0.948-0.948-0.948-0 0-0.001 0-0.001 0h0z"/>
</svg>
      </div>
    </div>

    <!-- Features -->
    <div class="row text-center border-top pt-4">
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="fw-bold mb-0">No subscription fees</h6>
      </div>
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="fw-bold mb-0">10,000+ products</h6>
      </div>
      <div class="col-md-4">
        <h6 class="fw-bold mb-0">Easy to use tools</h6>
      </div>
    </div>

    <!-- Logo -->
    <div class="mt-4">
      <img src="{{asset('assets/media/logo.gif')}}" alt="Arden's Print" 
           class="img-fluid" style="max-width: 120px;">
    </div>

  </div>
</div>









<div class="container-fluid py-5" style="background-color: #fdfaf4;">
  <div class="container">

    <div class="row">
        <div class="col text-center mb-5">
            <img src="{{asset('b2.png')}}" class="image-fluid"  alt="Hats">
        </div>
    </div>


    <!-- Product Categories Row -->
    <div class="row align-items-center mb-5">
      
      <!-- Left Text Block -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h2 class="fw-bold text-dark">Start with $0 investment</h2>
        <p class="mb-3 fs-5 text-dark">Choose to start different, upload your design</p>
        <a href="{{url('/design')}}" class="btn btn-dark fw-bold px-5 py-3 mb-2">Start designing</a>
        <p class="small text-dark">No credit card?</p>
      </div>

      <!-- Right Product Categories -->
      <div class="col-md-6">
        <div class="row g-3 text-center">
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/products/product-1.png')}}" class="mb-2" style="height:40px;" alt="Hats">
              <p class="mb-0 fw-bold">Hats</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/mug.jpg')}}" class="mb-2" style="height:40px;" alt="Mugs">
              <p class="mb-0 fw-bold">Mugs</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/mockup.jpeg')}}" class="mb-2" style="height:40px;" alt="T-Shirts">
              <p class="mb-0 fw-bold">T-Shirts</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/bag.webp')}}" class="mb-2" style="height:40px;" alt="Bags">
              <p class="mb-0 fw-bold">Tote Bags</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/poster.jpg')}}" class="mb-2" style="height:40px;" alt="Promotions">
              <p class="mb-0 fw-bold">Promotional</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/sticker.webp')}}" class="mb-2" style="height:40px;" alt="Stickers">
              <p class="mb-0 fw-bold">Stickers</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/products/product-8.png')}}" class="mb-2" style="height:40px;" alt="Bottles">
              <p class="mb-0 fw-bold">Bottles</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded shadow-sm h-100">
              <img src="{{asset('assets/media/hood.jpg')}}" class="mb-2" style="height:40px;" alt="Hoodies">
              <p class="mb-0 fw-bold">Hoodies</p>
            </div>
          </div>
        </div>
      </div>

    </div>


    

    <!-- Investment Block -->

    <!-- Lifestyle Images -->
    <div class="row g-3 mb-5">
      <div class="col-md-6">
        <img src="{{asset('lif77.png')}}" class="img-fluid rounded shadow-sm w-100" alt="Lifestyle 1" style="height: -webkit-fill-available;">
      </div>
      <div class="col-md-6">
        <div class="row g-3">
          <div class="col-12">
            <img src="{{asset('lif22.png')}}" class="img-fluid rounded shadow-sm w-100" alt="Lifestyle 2">
          </div>
          <div class="col-6">
            <img src="{{asset('lif55.png')}}" class="img-fluid rounded shadow-sm w-100" alt="Lifestyle 3">
          </div>
          <div class="col-6">
            <img src="{{asset('lif66.png')}}" class="img-fluid rounded shadow-sm w-100" alt="Lifestyle 4">
          </div>
        </div>
      </div>
    </div>

    <!-- How to Start + FAQs -->
    <div class="row g-4">
      <!-- Steps -->
      <div class="col-md-6">
        <h3 class="fw-bold mb-4 text-dark">See how to start</h3>
        <div class="mb-3">
          <h5 class="fw-bold text-dark">1. Select your product</h5>
          <p class="mb-0 text-dark">Choose from 1000+ top-quality products including brands you know and love.</p>
        </div>
        <div>
          <h5 class="fw-bold text-dark">2. Add your design</h5>
          <p class="mb-0 text-dark">Easy set up: put your product design in place, and you’re ready.</p>
        </div>
       

        <div>
          <h5 class="fw-bold text-dark">3. Publish and sell</h5>
          <p class="mb-0 text-dark">Export your product to your chosen sales channel with a click.</p>
        </div>
    </div>
      <!-- FAQs -->
      <div class="col-md-6">
        <h3 class="fw-bold mb-4 text-dark">Answering Arden’s Print FAQs</h3>
        <div class="accordion" id="faqsAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header " id="faq1">
              <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                Answering: Arden’s Print FAQ 1
              </button>
            </h2>
            <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqsAccordion">
              <div class="accordion-body">
                It’s as easy as A-B-C. Check out our complete, easy-to-follow getting started guide.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
              <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                Answering: Arden’s Print FAQ 2
              </button>
            </h2>
            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqsAccordion">
              <div class="accordion-body">
                Additional helpful info about designing, products, or shipping here.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>



<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bolder mb-5 text-dark">How It Works</h2>

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="d-flex align-items-center mb-5">
                    
                    <div class="d-flex justify-content-center align-items-center me-5" style="flex-shrink: 0; width: 100px; height: 100px;">
                        <img src="{{asset('3.png')}}" class="image-fluid"  alt="Hats">
                    </div>

                    <div>
                        <h3 class="fw-bold text-dark">1 Design your product</h3>
                        <p class="text-secondary mb-0">Choose from a huge range of products and easily add your design.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center flex-row-reverse mb-5 text-end">

                    <div class="d-flex justify-content-center align-items-center ms-5" style="flex-shrink: 0; width: 120px; height: 80px;">
                        <img src="{{asset('1.png')}}" class="image-fluid"  alt="Hats">
                    </div>

                    <div>
                        <h3 class="fw-bold text-dark">2 Publish and sell <span class="fs-4 text-dark">&#8594;</span></h3> 
                        <p class="text-secondary mb-0">Export your product to your chosen sales channel with a click.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-5">
                    

                    <div class="d-flex justify-content-center align-items-center me-5" style="flex-shrink: 0; width: 120px; height: 80px;">
                        <img src="{{asset('2.png')}}" class="image-fluid"  alt="Hats">
                    </div>
                    
                    <div>
                        <h3 class="fw-bold text-dark"><span class="fs-4 text-dark">&#8592;</span> 3 Let us do the rest </h3>
                        <p class="text-secondary mb-0">You get the sales, we handle printing and shipping your orders.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn btn-dark btn-lg fw-bold">Get started</a>
        </div>
    </div>
</section>


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
        <a href="{{url('/shop')}}" class="btn btn-warning fw-bold px-4 py-2">SHOP NOW</a>
      </div>
    </div>

    <!-- Bestseller Section -->
    <section class="text-center container py-5" data-aos="fade-up">
    <h3 class="text-dark fw-bold mb-3">Your next bestseller awaits</h3>
    <div class="row g-4 justify-content-center">
        
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