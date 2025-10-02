@extends('layout.default')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <style>

    .product-section .features-list i {
    font-size: 1rem;
}
.product-section .border-dashed {
    border-style: dashed !important;
}
.product-gallery .badge {
    font-size: 0.9rem;
}
.product-section .upload-box {
    border: 2px dashed #0d6efd;
    background: #f8fbff;
    transition: 0.3s;
}
.product-section .upload-box:hover {
    background: #e9f3ff;
}

.instruction-card {
    background-color: #222;
    border-radius: 8px;
    transition: all 0.3s 
ease-in-out;
    color: #dea928;
}


@media (min-width: 768px) {
    .delivery-block.print-ready-box {
        justify-content: space-between;
        display: flex
;
        text-align: left;
        align-items: center;
    }
}

.delivery-block.print-ready-box {
    margin-top: 24px;
    margin-bottom: 15px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 15px;
    padding-bottom: 15px;
}

.delivery-block {
    border: solid 1px #DADADA;
    padding: 8px 16px;
    color: #000;
    background: #F4F4F4;
    text-align: center;
    border-radius: 8px;
    line-height: 30px;
    margin-top: 40px;
    margin-bottom: 30px;
}
    </style>
    <section class="site-container" data-aos="fade-up">
        <div class=" py-5">
            <div class="row g-5">
                {{-- LEFT SIDE: Product Gallery --}}
                <div class="col-lg-6">
                    <div class="product-gallery">
                        <!-- Main Slider -->
                        <div class="swiper mySwiper2 mb-3">
                            <div class="swiper-wrapper">
                                @foreach($images as $img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('dtf-transfer/' . $img->path) }}"
                                            class="img-fluid rounded shadow-sm">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Navigation -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <!-- Thumbs Slider -->
                        <div class="swiper mySwiper mt-2">
                            <div class="swiper-wrapper">
                                @foreach($images as $img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('dtf-transfer/' . $img->path) }}" class="img-thumbnail">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE: Product Options --}}
                <div class="col-lg-6">
                    <div>
                        <h2 class="product-title d-flex align-items-center text-dark">DTF Transfers — Gang Sheet Upload
                        </h2>
                        <p class="text-muted mb-4 text-dark">Upload your artwork, then choose color, size & quantity to get
                            live
                            pricing.
                        </p>
                        <div class="star-rating mb-2 text-dark">★★★★★ <small class="text-muted text-dark">745
                                Reviews</small></div>
                        <p class="mb-2">$0.02 per square inch</p>
                        <div class="row mb-3 fs-6 text-dark">
                            <div class="col-6 d-flex align-items-center mb-2">
                                <i class="fa-solid fa-print feature-icon"></i> Print On Virtually Any Fabric
                            </div>
                            <div class="col-6 d-flex align-items-center mb-2">
                                <i class="fa-solid fa-droplet feature-icon"></i> Crisp Detail, Vibrant Color
                            </div>
                            <div class="col-6 d-flex align-items-center mb-2">
                                <i class="fa-solid fa-soap feature-icon"></i> Wash-Resistant Durability
                            </div>
                            <div class="col-6 d-flex align-items-center mb-2">
                                <i class="fa-solid fa-thumbs-up feature-icon"></i> Satisfaction Guaranteed
                            </div>
                        </div>

                        <div class="my-2">
                            <h3 class="mb-2 text-dark">What We Accept</h3>
                            <ul class="d-flex flex-column gap-2">
                                <li class=" text-dark"><strong>Accepted File Types: </strong>PNG, AI, PDF
                                </li>
                                <li class=" text-dark"><strong>Max File Size: </strong>5GB
                                </li>
                                <li class=" text-dark"><strong>Sheet Width: </strong>All sizes are 22" wide
                                </li>
                                <li class=" text-dark"><strong>No Setup or Art Fees</strong> – Ever
                                </li>
                            </ul>
                        </div>

                        

                        

                        <form id="dtfForm" method="POST" action="{{ route('dtf-gangsheet.addToCart') }}"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Step 1: Upload Artwork --}}

                            <div class="border border-primary rounded bg-light p-4 text-center mb-4" style="border-style:dashed !important;border-color:#fbaf1c !important;">
                                <input type="file" name="artwork" id="artworkInput" class="d-none" required>
                                <label for="artworkInput" class="d-block cursor-pointer mt-4">
                                    <a class="mb-4 instruction-card text-decoration-none d-block px-2 text-center btn btn-warning">Choose image to get started ⬆</a>
                                    <p class="mb-4 text-muted small">or drag and drop image here</p>
                                    <p class="mb-4 text-muted small">or <a href="{{url('/login')}}" style="color:#fbaf1c;">Login</a> to see previous designs</p>
                                </label>
                            </div>


                            <div class="delivery-block print-ready-box w3_bg">
              <div class="del-sh-text w3_bg">
                <h5 class="head-title">Don’t have a print-ready Gang Sheet?</h5>
                <div class="subline w3_bg">Try our easy to use Gang Sheet Builder</div>
              </div>
              <div class="ctabox w3_bg">
                <a href="{{url('/dtf/build-a-gangsheet/')}}" class="d-inline-cta">
                  <span>Build a Gang Sheet</span>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3333 5L20 12M20 12L13.3333 19M20 12L4 12" stroke="#171717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </a>
              </div>
            </div>

                            

                            {{-- Step 2: Choose Color --}}
                            <div class="mb-4 step step-2 d-none">
                                <h5 class="fw-bold">Choose Color Option</h5>
                                <div class="d-flex gap-3 flex-wrap">
                                    @foreach($colors as $c)
                                        <label class="color-option border rounded p-3 cursor-pointer">
                                            <input type="radio" name="color_id" value="{{ $c->id }}" class="d-none">
                                            {{ $c->label }}
                                            @if($c->surcharge > 0)
                                                <small class="text-muted">(+${{ number_format($c->surcharge, 2) }})</small>
                                            @endif
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Step 3: Select Size --}}
                            <div class="mb-4 step step-3 d-none">
                                <h5 class="fw-bold">Select Size</h5>
                                <div class="row g-3">
                                    @foreach($sizes as $s)
                                        <div class="col-2 col-md-2">
                                            <label class="size-card border rounded p-3 text-center cursor-pointer h-100">
                                                <input type="radio" name="size_id" value="{{ $s->id }}" class="d-none">
                                                <h6 class="fw-bold mb-1">{{ $s->title }}</h6>
                                                
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Step 4: Quantity & Price --}}
                            <div class="mb-4 step step-4 d-none">
                                <h5 class="fw-bold">Quantity</h5>
                                <div class="d-flex align-items-center gap-4">
                                    <input type="number" name="quantity" id="qtyInput" class="form-control w-25" value="1"
                                        min="1">
                                    <div>
                                        <h6>Unit Price: $<span id="unitPrice">0.00</span></h6>
                                        <h5 class="fw-bold">Subtotal: $<span id="subtotal">0.00</span></h5>
                                        <p class="text-muted">Shipping & taxes calculated at checkout</p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="unitprice" id="price" />
                            <input type="hidden" name="subtotal" id="subtotal" />
                            <button type="submit" class="btn btn-warning btn-lg w-100 d-none" id="addToCartBtn">Add to
                                Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <section class="site-container">
                <div class="my-3">
                    <h2 class="section-title text-center">DTF Gang Sheet – Upload a Print-Ready File</h2>
                    <h5 class="section-title text-center text-dark">Perfect for Advanced Users with Pre-Arranged Designs
                    </h5>
                    <p class="text-dark fs-5 mb-5 text-center">
                        Already have your gang sheet laid out? Upload your <strong>print-ready file</strong> and let us
                        handle the
                        rest.
                        This option
                        is perfect for experienced users who want full control over their design layout and need fast,
                        reliable
                        printing.
                    </p>
                </div>
            </section>

            <div class=" my-5">
                <h4 class="mb-4 text-dark fw-semibold">Features You'll Love</h4>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-card p-3 border rounded shadow-sm h-100 d-flex align-items-start">
                            <div class="me-3 fs-3 text-primary"><i class="fa-solid fa-print"></i></div>
                            <div>
                                <h6 class=" text-dark">Easy Peel Technology</h6>
                                <p class="mb-0">Peel hot, cold, fast, or slow</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-card p-3 border rounded shadow-sm h-100 d-flex align-items-start">
                            <div class="me-3 fs-3 text-success"><i class="fa-solid fa-palette"></i></div>
                            <div>
                                <h6 class=" text-dark">Vibrant Full-Color Prints</h6>
                                <p class="mb-0">Ultra-fine detail and rich saturation</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-card p-3 border rounded shadow-sm h-100 d-flex align-items-start">
                            <div class="me-3 fs-3 text-warning"><i class="fa-solid fa-shirt"></i></div>
                            <div>
                                <h6 class=" text-dark">Works on Any Fabric or Color</h6>
                                <p class="mb-0">Cotton, polyester, blends, leather &amp; more</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-card p-3 border rounded shadow-sm h-100 d-flex align-items-start">
                            <div class="me-3 fs-3 text-info"><i class="fa-solid fa-soap"></i></div>
                            <div>
                                <h6 class=" text-dark">Certified for 100+ Washes</h6>
                                <p class="mb-0">Intertek tested for long-lasting durability</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="feature-card p-3 border rounded shadow-sm h-100 d-flex align-items-start">
                            <div class="me-3 fs-3 text-danger"><i class="fa-solid fa-face-smile"></i></div>
                            <div>
                                <h6 class=" text-dark">No Minimums</h6>
                                <p class="mb-0">Order just what you need</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pro Tips Accordion Section -->
            <div class=" my-5">
                <h4 class="mb-4">Pro Tips for Uploading</h4>
                <div class="accordion" id="proTipsAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Gang Sheet Sizing
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#proTipsAccordion">
                            <div class="accordion-body">
                                Be sure your gang sheet is sized correctly (22" wide by your chosen length)
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Design Margins
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#proTipsAccordion">
                            <div class="accordion-body">
                                Leave a small margin between designs if you plan to cut manually
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Backgrounds
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#proTipsAccordion">
                            <div class="accordion-body">
                                Use transparent backgrounds for PNGs for best results
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Templates
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#proTipsAccordion">
                            <div class="accordion-body">
                                Download our free 22” width templates: <a href="#" class="link-primary">AI</a> / <a href="#"
                                    class="link-primary">PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="my-5" data-aos="fade-up">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-lg-6 col-md-6 mb-4">
                        <h3 class="fw-bold text-dark mb-2 text-left">DTF Gang Sheet – Upload a Print-Ready File
                        </h3>
                        <p class="text-left"><strong>Perfect for Advanced Users with Pre-Arranged Designs</strong></p>
                        <p class="text-left">
                            Already have your gang sheet laid out? Upload your print-ready file and let us handle the rest.
                            This option is perfect for experienced users who want full control over their design layout and
                            need fast, reliable printing.
                        </p>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-6 col-md-6">
                        <div class="accordion accordion-flush" id="productAccordion" style="border-style: dashed;">

                            <!-- Features (open by default) -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingShippingReturns">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseShippingReturns" aria-expanded="true"
                                        aria-controls="collapseShippingReturns">
                                        ✅ What We Accept
                                    </button>
                                </h2>
                                <div id="collapseShippingReturns" class="accordion-collapse collapse show"
                                    aria-labelledby="headingShippingReturns" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><strong>Accepted File Types:</strong> PNG, AI, PDF</li>
                                            <li><strong>Max File Size:</strong> 5GB</li>
                                            <li><strong>Sheet Width:</strong> All sizes are 22" wide</li>
                                            <li><strong>No Setup or Art Fees</strong> – Ever</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFeatures">
                                    <button class="accordion-button lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFeatures" aria-expanded="false"
                                        aria-controls="collapseFeatures">
                                        ⚡Features You'll Love
                                    </button>
                                </h2>
                                <div id="collapseFeatures" class="accordion-collapse collapse"
                                    aria-labelledby="headingFeatures" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Easy Peel Technology – Peel hot, cold, fast, or slow</li>
                                            <li>Vibrant Full-Color Prints – Ultra-fine detail and rich saturation</li>
                                            <li>Works on Any Fabric or Color – Cotton, polyester, blends, leather & more
                                            </li>
                                            <li>Certified for 100+ Washes – Intertek tested for long-lasting durability</li>
                                            <li>No Minimums – Order just what you need</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Satisfaction Guarantee -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingGuarantee">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGuarantee" aria-expanded="false"
                                        aria-controls="collapseGuarantee">
                                        💡Pro Tips for Uploading
                                    </button>
                                </h2>
                                <div id="collapseGuarantee" class="accordion-collapse collapse"
                                    aria-labelledby="headingGuarantee" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Be sure your gang sheet is sized correctly (22" wide by your chosen length)
                                            </li>
                                            <li>Leave a small margin between designs if you plan to cut them manually</li>
                                            <li>Use transparent backgrounds for PNGs for best results</li>
                                            <li>
                                                Download our free 22” width templates:
                                                <a href="#">AI</a> / <a href="#">PDF</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>




                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingsize">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsesize" aria-expanded="false"
                                        aria-controls="collapseGuarantee">
                                        📦 Sizes & Pricing
                                    </button>
                                </h2>
                                <div id="collapsesize" class="accordion-collapse collapse"
                                    aria-labelledby="headingsize" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <table class="table table-bordered">
                        <tr>

                        <th>Length</th>
                        <th>Discount</th>
                        </tr>

                        <tr>

                        <td>2 Feet</td>
                        <td>37% Off</td>
                        </tr>

                        <tr>

                        <td>5 Feet</td>
                        <td>37% Off</td>
                        </tr>

                        <tr>

                        <td>7 Feet</td>
                        <td>37% Off</td>
                        </tr>


                        <tr>

                        <td>10 Feet</td>
                        <td>43% Off</td>
                        </tr>
                        <tr>

                        <td>15 Feet</td>
                        <td>54% Off</td>
                        </tr>

                        <tr>

                        <td>20 Feet</td>
                        <td>59% Off</td>
                        </tr>

                        <tr>

                        <td>30 Feet</td>
                        <td>62% Off (Lowest Rate: $0.02/sq in)</td>
                        </tr>

                        


                        </table>
                                    </div>
                                </div>
                            </div>





                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingcta">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsecta" aria-expanded="false"
                                        aria-controls="collapsecta">
                                        🚀 Ready to Upload?
                                    </button>
                                </h2>
                                <div id="collapsecta" class="accordion-collapse collapse"
                                    aria-labelledby="headingcta" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>[Choose File to Start] or simply drag and drop your print-ready gang sheet.
                                                Don’t have a gang sheet ready? 👉 [Try Our Gang Sheet Builder]

                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


            






            <section class="bg-light py-5" data-aos="fade-up">
                <div class="" style="">
                    <h2 class="section-title text-center">What Our Customers Say</h2>
                    <div class="row g-4">

                        <script defer async src='https://cdn.trustindex.io/loader.js?bee03e45460d278af256ac8441b'></script>

                    </div>
                    <div class="mt-5">
                        <img src="assets/media/about-2.png" alt="" class="img-fluid w-100 rounded-3 shadow-sm">
                    </div>
                </div>
            </section>
            <!-- Customer Reviews -->
            {{-- <div class="text-center mb-5">
                <h2 class="section-title">Customer Reviews</h2>
                <div class="site- mt-5 mb-5">

                    <div class="row g-2">
                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="{{asset('assets/media/customer.png')}}" class="rounded-circle" width="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Samuel Bailey</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="{{asset('assets/media/customer-2.png')}}" class="rounded-circle" width="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Mark Smith</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="{{asset('assets/media/customer.png')}}" class="rounded-circle" width="80">
                                </div>

                                <div class="user-content">
                                    <h5 class="mb-0">Hardy Cole</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="{{asset('assets/media/customer.png')}}" class="rounded-circle" width="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Benjamin Joseph</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="{{asset('assets/media/customer.png')}}" class="rounded-circle" width="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Rajeet Singh</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-3 text-center px-4">
                                <div class="user-image">
                                    <img src="{{asset('assets/media/customer.png')}}" class="rounded-circle" width="80">
                                </div>
                                <div class="user-content">
                                    <h5 class="mb-0">Veera Duncan</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="site-">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <div class="accordion mb-5" id="faqAccordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1"
                                aria-expanded="true" aria-controls="faq1">
                                Q1: How many 3.5" x 3.5" designs fit on a 22" x 24" gang sheet?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Approximately 36 designs fit, with minimal spacing.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                Q2: What size gang sheet do I need for three 13" x 22" designs?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">At least 22" x 66" is recommended.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                Q3: How many 2.5" x 3" designs fit on a 22" x 24" gang sheet?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Approximately 70 designs, depending on spacing.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                Q4: Are gang sheets delivered as one continuous piece or pre-cut?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Gang sheets are delivered as one continuous piece.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                Q5: Can DTF transfers be applied to clear acrylic surfaces?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">DTF is designed for fabric. Use UV DTF for acrylic.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                Q6: Is it possible to apply DTF transfers to leather?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Yes, but test press for optimal adhesion.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                                Q7: What fabrics are compatible with DTF transfers?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Cotton, polyester, blends, nylon, canvas, denim.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                                Q8: Can DTF transfers be applied to dark garments?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Yes! The white ink base keeps colors vibrant.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq9" aria-expanded="false" aria-controls="faq9">
                                Q9: What equipment is needed to apply DTF transfers?
                            </button>
                        </h2>
                        <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">A heat press (300–320°F, medium–firm pressure), parchment/Teflon
                                sheet.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq10" aria-expanded="false" aria-controls="faq10">
                                Q10: How durable are DTF transfers after washing?
                            </button>
                        </h2>
                        <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">50+ washes with proper application and care.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq11" aria-expanded="false" aria-controls="faq11">
                                Q11: What are the recommended care instructions?
                            </button>
                        </h2>
                        <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Wash inside out cold, mild detergent, no bleach, tumble dry low,
                                avoid
                                direct ironing.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq12" aria-expanded="false" aria-controls="faq12">
                                Q12: What file formats are accepted for custom DTF designs?
                            </button>
                        </h2>
                        <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">PNG (preferred), PDF, AI, SVG, PSD.</div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq13" aria-expanded="false" aria-controls="faq13">
                                Q13: Do you offer assistance with creating gang sheets?
                            </button>
                        </h2>
                        <div id="faq13" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Yes! Use our Gang Sheet Builder tool to arrange designs easily.
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
    </section>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });

        document.addEventListener("DOMContentLoaded", function () {
            // STEP HANDLING
            const step2 = document.querySelector('.step-2');
            const step3 = document.querySelector('.step-3');
            const step4 = document.querySelector('.step-4');
            const addToCartBtn = document.getElementById('addToCartBtn');

            // Artwork preview
            const artworkInput = document.getElementById("artworkInput");
            const artPreview = document.getElementById("artPreview");
            artworkInput.addEventListener("change", function () {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = e => artPreview.src = e.target.result;
                    reader.readAsDataURL(this.files[0]);

                    // Show Step 2 after upload
                    step2.classList.remove('d-none');
                }
            });

            // Gallery thumbnails
            document.querySelectorAll(".thumb-img").forEach(img => {
                img.addEventListener("click", function () {
                    document.getElementById("mainProductImg").src = this.src;
                    document.querySelectorAll(".thumb-img").forEach(t => t.classList.remove("active"));
                    this.classList.add("active");
                });
            });

            // Radio styling (Color & Size)
            document.querySelectorAll(".color-option, .size-card").forEach(label => {
                label.addEventListener("click", function () {
                    let input = this.querySelector("input");
                    input.checked = true;

                    // highlight selection
                    this.closest(".step").querySelectorAll("label").forEach(l => l.classList.remove("border-success"));
                    this.classList.add("border-success");

                    if (input.name === "color_id") {
                        step3.classList.remove('d-none'); // Show size options after color
                    }
                    if (input.name === "size_id") {
                        step4.classList.remove('d-none'); // Show qty after size
                        addToCartBtn.classList.remove('d-none');
                        updatePrice();
                    }
                });
            });

            // Dynamic pricing
            function updatePrice() {
                let sizeInput = document.querySelector("[name='size_id']:checked");
                let colorInput = document.querySelector("[name='color_id']:checked");
                let qtyInput = document.getElementById("qtyInput");
                let priceinput = document.getElementById("price");

                if (!sizeInput || !colorInput) return;

                let size_id = sizeInput.value;
                let color_id = colorInput.value;
                let quantity = qtyInput.value;

                fetch("{{ route('dtf-gangsheet.calculate') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ size_id, color_id, quantity })
                })
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById("unitPrice").innerText = data.unit_price.toFixed(2);
                        priceinput.value = data.unit_price.toFixed(2);
                        document.getElementById("subtotal").innerText = data.subtotal.toFixed(2);
                    });
            }

            document.getElementById("qtyInput").addEventListener("input", updatePrice);
        });
    </script>
@endsection