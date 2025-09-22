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

    */ @media (max-width: 767px) {
      .hero-card-body {
        min-height: 120px;
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
      padding: 2rem 1rem;
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
      width: 95px;
      height: 95px;
      object-fit: contain;
      border-radius: 50%;
    }

    .promo-img {
      object-fit: cover;
      width: 100%;
      height: 327px;
    }

    .bg-custom-gold {
      background: #FBBF24;
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
  </style>
  </style>

  <div class="container-fluid hero-bg">
    <div class="container py-5">
      <div class="row g-4 justify-content-center">
        <!-- Card 1 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="#" class="hero-card d-block h-100">
            <div class="hero-card-header">DTF TRANSFERS</div>
            <div class="hero-card-body">
              <img src="{{asset('assets/media/hero-1.png')}}" alt="DTF Transfers" class="img-fluid">
            </div>
          </a>
        </div>
        <!-- Card 2 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="#" class="hero-card d-block h-100">
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
          <a href="#" class="hero-card d-block h-100">
            <div class="hero-card-header">PRINT ON DEMAND</div>
            <div class="hero-card-body">
              <img src="{{asset('assets/media/hero-4.png')}}" alt="Print On Demand">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container my-5">
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
  <section class="container my-4 bg-light py-5">
    <div class="px-0">
      <div class="row g-0">
        <div class="col-md-6 d-flex banner-bg d-flex align-items-center">
          <div class="banner-content">
            <div class="fs-2 text-dark fw-bold mb-2">Need Custom Printing Done Right?</div>
            <div class="fs-6 text-dark mb-2">
              From DTF transfers to full print-on-demand services — we’ve got you covered with top quality, fast
              turnaround, and no minimums.
            </div>
            <a href="#" class="banner-btn text-light">Get Started &rarr;</a>
          </div>
        </div>
        <!-- Right Banner Image -->
        <div class="col-md-6 banner-image">
          <img src="{{asset('assets/media/customPrint.png')}}" alt="Custom printing equipment" />
        </div>
      </div>
    </div>
  </section>
  <section>
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
              <a href="#" class="btn btn-warning fw-bold px-3">Get Started</a>
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
              <a href="#" class="btn btn-warning fw-bold px-3">Get Started</a>
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
              <a href="#" class="btn custom-btn-yellow">Upload your Gang Sheet</a>
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
              <a href="#" class="btn custom-btn-yellow">Shop Now!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="my-5">
    <div class="position-relative text-center mb-4 shopping">
      <img src="{{asset('assets/media/shopping-banner.png')}}" alt="Blank Shirts Banner" class="img-fluid w-100" />
      <div class="overlay-content">
        <h1 class="text-dark opacity-75 fw-bold">BLANK SHIRTS</h1>
        <a href="#" class="btn btn-warning fw-bold px-4 py-2">SHOP NOW</a>
      </div>
    </div>

    <!-- Bestseller Section -->
    <section class="text-center mb-5">
      <h3 class="text-dark fw-bold mb-3">Your next bestseller awaits</h3>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <img src="{{asset('assets/media/mockup.jpeg')}}" alt="Shirt" class="product-thumb" />
        <img src="{{asset('assets/media/mockup.jpeg')}}" alt="Sweatshirt" class="product-thumb" />
        <img src="{{asset('assets/media/mockup.jpeg')}}" alt="Mug" class="product-thumb" />
        <img src="{{asset('assets/media/mockup.jpeg')}}" alt="Hoodie" class="product-thumb" />
        <img src="{{asset('assets/media/mockup.jpeg')}}" alt="Tshirt" class="product-thumb" />
        <img src="{{asset('assets/media/mockup.jpeg')}}" alt="Phone" class="product-thumb" />
      </div>
    </section>

    <!-- Promo Collection Section -->
    <div class="container">
      <div class="row align-items-center g-0">
        <div class="col-md-6 px-4 py-3 bg-light text-center text-md-start">
          <small class="text-uppercase text-muted fw-semibold">Summer Collection</small>
          <h3 class="fw-bold mb-3 mt-2">Risus commodo viverrra maecenas accumsan.</h3>
          <p class="mb-4 text-muted">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore magna aliqua.
          </p>
          <a href="#" class="btn btn-outline-danger px-4 py-2">Shop Now &rarr;</a>
        </div>
        <div class="col-md-6">
          <img src="{{asset('assets/media/man.jpg')}}" alt="Collection" class="promo-img" />
        </div>
      </div>
    </div>

  </section>
  <div class="container-fluid px-0">
    <div class="row flex-column g-0">
      <div class="col-lg-6 col-12 bg-custom-gold py-4 px-4 d-flex justify-content-between">
        <div>
          <h2 class="fw-bold display-5 mb-3">No Designer?<br>No Problem.</h2>
          <h5 class="fw-semibold mb-4">Design &amp; Preview Your <br>CustomGear Online &mdash; Instantly</h5>
        </div>
        <div>
          <h3 class="fw-bold mb-3">How It Works:</h3>
          <ul class="list-unstyled fs-5 mb-4">
            <li class="mb-1">
              <span class="fw-bold">1.</span>
              Go to ardensprint.com
              <br><span class="ms-4">&rarr; Click <span class="fw-bold">"Design Studio"</span></span>
            </li>
            <li class="mb-1">
              <span class="fw-bold">2.</span>
              Create Your Design
            </li>
            <li class="mb-1">
              <span class="fw-bold">3.</span>
              Place Your Order
            </li>
          </ul>
        </div>
      </div>
      <!-- Dark Column (Feature List & Image) -->
      <div class="col-lg-6 col-12 bg-custom-dark py-4 px-4 d-flex flex-column justify-content-between align-items-center">
        <div class="mb-4">
          <h4 class="fw-bold text-white mb-3">What You Can Do:</h4>
          <ul class="list-unstyled">
            <li class="mb-2">
              <span class="icon-arrow">&#8593;</span>
              <span class="fw-bold text-white">Upload Your Artwork</span>
              <span class="text-white-50"> Logo or image &mdash; or use our <span class="text-custom-gold fw-bold">Design
                  Library</span></span>
            </li>
            <li class="mb-2">
              <span class="icon-check">&#10003;</span>
              <span class="fw-bold text-white">See It on a Mockup</span>
              <span class="text-white-50"> Easy product preview for t-shirts, hoodies, totes & more</span>
            </li>
            <li>
              <span class="icon-check">&#10003;</span>
              <span class="fw-bold text-white">Works Great for..</span>
              <span class="text-white-50"> Schools, fundraisers, businesses, events</span>
            </li>
          </ul>
        </div>
        <div class="w-100 d-flex flex-column align-items-center">
          <img src="https://via.placeholder.com/300x180?text=Design+Mockup" alt="Design Studio Preview"
            class="image-laptop mb-2" />
          <div class="logo-ardens text-custom-gold">
            ARDEN'S <span class="text-white">PRINT</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 text-center">
      <div class="col">
        <span class="feature-emoji">🎨</span>
        <div class="fw-bold fs-4 lh-1">Custom<br>Design</div>
        <div class="mt-2 fs-6 text-muted">Create tees,<br>bags &amp; more.</div>
      </div>
      <div class="col">
        <span class="feature-emoji">⚡</span>
        <div class="fw-bold fs-4 lh-1">Fast<br>Shipping</div>
        <div class="mt-2 fs-6 text-muted">Ships in<br>a few days.</div>
      </div>
      <div class="col">
        <span class="feature-emoji">👕</span>
        <div class="fw-bold fs-4 lh-1">Premium<br>Quality</div>
        <div class="mt-2 fs-6 text-muted">Built to last,<br>feel great.</div>
      </div>
      <div class="col">
        <span class="feature-emoji">👜</span>
        <div class="fw-bold fs-4 lh-1">Wide<br>Range</div>
        <div class="mt-2 fs-6 text-muted">From tees<br>to tote bags.</div>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-4 text-center mt-3">
      <div class="col">
        <span class="feature-emoji">🚀</span>
        <div class="fw-bold fs-4 lh-1">Easy Ordering</div>
        <div class="mt-2 fs-6 text-muted">From t tees<br>to tote bags.</div>
      </div>
      <div class="col">
        <span class="feature-emoji">🛒</span>
        <div class="fw-bold fs-4 lh-1">Checkout</div>
        <div class="mt-2 fs-6 text-muted">From checkout,<br>no minimum.</div>
      </div>
      <div class="col">
        <span class="feature-emoji">🌐</span>
        <div class="fw-bold fs-4 lh-1">One-Stop Shop</div>
        <div class="mt-2 fs-6 text-muted">All you need<br>in one place.</div>
      </div>
    </div>
  </section>
  <section class="container-fluid bg-warning text-dark py-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <!-- Left Text -->
        <div class="col-lg-6 col-12 mb-4 mb-lg-0">
          <h1 class="fw-bold mb-3">
            <div>Browse</div>
            <div>DESIGN</div>
            <div>LIBRARY</div>
          </h1>
          <p class="fs-5">Find graphics by categories<br>for your custom gear</p>
        </div>
        <!-- Design Library Card -->
        <div class="col-lg-6 col-12 d-flex justify-content-center">
          <div class="bg-white rounded-3 shadow-sm p-4 w-100" style="max-width: 330px;">
            <h5 class="fw-bold mb-3">Design Library</h5>
            <div class="mb-3 d-flex gap-2">
              <span class="badge bg-light text-dark">Graphics</span>
              <span class="badge bg-warning text-dark fw-semibold">Categories</span>
            </div>
            <div class="d-flex gap-3 mb-3">
              <div
                class="bg-warning text-dark fw-bold d-flex flex-column justify-content-center align-items-center rounded-2 p-2"
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