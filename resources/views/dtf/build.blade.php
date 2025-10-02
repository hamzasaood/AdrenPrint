@extends('layout.default')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
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
            transform: translateY(-5px);
            /* subtle lift effect */
        }

        .instruction-card:hover i,
        .instruction-card:hover h5 {
            color: #222 !important;
        }


        .modal-box {
            border: 1px solid #aaa;
            border-radius: 4px;
            padding: 20px;
            max-width: 900px;
            background: #fff;
        }

        .modal-box h2 {
            margin: 0 0 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .modal-box p {
            margin: 0 0 20px;
            font-size: 14px;
            color: #555;
        }

        .options {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 15px;
        }

        .option {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 20px;
            text-align: center;
            background: #f9f9f9;
        }

        .option img {
            max-width: 60px;
            margin-bottom: 12px;
        }

        .option h4 {
            margin: 0 0 6px;
            font-size: 14px;
            font-weight: 600;
            color: #444;
        }

        .option p {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .note {
            font-size: 12px;
            color: #666;
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
                        <h2 class="product-title d-flex align-items-center text-dark">DTF Transfers — Gang Sheet Builder
                        </h2>
                        <p class="text-dark mb-4 text-dark">Upload your artwork, then choose color, size & quantity to get
                            live
                            pricing.
                        </p>
                        <div class="star-rating mb-2 text-dark">★★★★★ <small class="text-dark text-dark">745
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
                            <h4 class="mb-2 text-dark fw-semibold">Built-In Smart Layout Tools</h4>
                            <ul class="d-flex flex-column gap-1">
                                <li class=" text-dark">Upload unlimited PNG, SVG, or PDF files
                                </li>
                                <li class=" text-dark">Resize, rotate, and arrange as needed
                                </li>
                                <li class=" text-dark">Preview in real-time before printing
                                </li>
                            </ul>
                        </div>

                        <section class="p-4">
                            <div class="mb-4">
                                <label class="form-label fw-bold text-dark">Select size <small class="text-muted">(all sizes
                                        are 22
                                        inches wide)</small></label>
                                <div class="d-flex flex-wrap gap-2 mb-2">
                                    <button type="button" class="btn btn-outline-dark active" aria-pressed="true">2
                                        Feet</button>
                                    <button type="button" class="btn btn-outline-dark">5 Feet</button>
                                    <button type="button" class="btn btn-outline-dark">7 Feet</button>
                                    <button type="button" class="btn btn-outline-dark">10 Feet</button>
                                    <button type="button" class="btn btn-outline-dark">15 Feet</button>
                                    <button type="button" class="btn btn-outline-dark">20 Feet</button>
                                    <button type="button" class="btn btn-outline-dark">30 Feet</button>
                                </div>
                                {{-- <div class="d-flex flex-wrap gap-4 text-success" style="font-size: 0.9rem;">
                                    <span>37% off</span>
                                    <span>37% off</span>
                                    <span>37% off</span>
                                    <span>43% off</span>
                                    <span>54% off</span>
                                    <span>59% off</span>
                                    <span>62% off</span>
                                </div> --}}
                                <div class="mt-2 small text-dark">
                                    <i class="bi bi-info-circle"></i> Unlock our lowest rate of <strong>0.02</strong> per
                                    sq. inch when you build 30-feet or more.
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-dark">Select film style <small
                                        class="text-muted">Choose from our
                                        professional-grade finishes:
                                    </small></label>
                                <div class="btn-group" role="group" aria-label="Film style selection">
                                    <input type="radio" class="btn-check" name="filmStyle" id="styleStandard"
                                        autocomplete="off" checked>
                                    <label class="btn btn-outline-dark" for="styleStandard">Standard</label>

                                    <input type="radio" class="btn-check" name="filmStyle" id="styleGlitter"
                                        autocomplete="off">
                                    <label class="btn btn-outline-dark" for="styleGlitter">Glitter</label>

                                    <input type="radio" class="btn-check" name="filmStyle" id="styleGlow"
                                        autocomplete="off">
                                    <label class="btn btn-outline-dark" for="styleGlow">Glow in the Dark</label>

                                    <input type="radio" class="btn-check" name="filmStyle" id="styleGold"
                                        autocomplete="off">
                                    <label class="btn btn-outline-dark" for="styleGold">Gold Foil</label>

                                    <input type="radio" class="btn-check" name="filmStyle" id="styleSilver"
                                        autocomplete="off">
                                    <label class="btn btn-outline-dark" for="styleSilver">Silver Foil</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <a href="{{url('/gangsheet')}}" class="instruction-card text-decoration-none d-block p-4 h-100 text-center">
                                    BUILD YOUR OWN GANG SHEET
                                </a>
                            </div>

                            <div class="border p-3 rounded text-center">
                                <p class="mb-1 fw-bold">Already have a print-ready gang sheet?</p>
                                <p class="mb-3 text-dark">Easily upload your gang sheet in just a few clicks!</p>
                                <a href="#" class="text-decoration-none fw-semibold">Upload a Gang Sheet &rarr;</a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="my-5">
                <div class="row ">
                    <!-- Title -->
                    <div class="col-lg-6 mb-4 col-md-6">
                        <h3 class="fw-bold text-dark mb-2 text-left">DTF Gang Sheet Builder</h3>
                        <p class="text-left mb-3 text-dark"><strong>Everything you need to know before you start
                                building</strong></p>
                        <p class="text-dark text-left">Welcome to the <strong>Arden’s Print Gang Sheet Builder,</strong>
                            the fastest way to maximize space, minimize
                            cost, and bring your designs to life. Whether you’re uploading logos, characters, tags, or
                            full-size artwork, our intuitive tool makes gang sheet creation quick and seamless.
                        </p>
                    </div>

                    <!-- Accordion -->
                    <div class="col-lg-6 col-md-6">
                        <div class="accordion accordion-flush" id="productAccordion">

                            <!-- Built-In Smart Layout Tools -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingLayout">
                                    <button class="accordion-button lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseLayout" aria-expanded="true"
                                        aria-controls="collapseLayout">
                                        Built-In Smart Layout Tools
                                    </button>
                                </h2>
                                <div id="collapseLayout" class="accordion-collapse collapse show"
                                    aria-labelledby="headingLayout" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <p><strong>Simply drag and drop your files — our system auto-optimizes placement
                                                    to fit
                                                    the most into your selected size.</strong></p>
                                            <li>Upload unlimited PNG, SVG, or PDF files</li>
                                            <li>Resize, rotate, and arrange as needed</li>
                                            <li>Preview in real-time before printing</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Product Highlights -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingHighlights">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseHighlights" aria-expanded="false"
                                        aria-controls="collapseHighlights">
                                        Product Highlights
                                    </button>
                                </h2>
                                <div id="collapseHighlights" class="accordion-collapse collapse"
                                    aria-labelledby="headingHighlights" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><strong>Standard Size:</strong> 22" wide — Choose from lengths of 2 ft to 30
                                                ft</li>
                                            <li><strong>Fast Turnaround</strong> — Rush orders available</li>
                                            <li><strong>Peel Options</strong> — Hot, warm, or cold peel compatible</li>
                                            <li><strong>No Setup Fees</strong> — You only pay for what you print</li>
                                            <li><strong>Works on Any Fabric or Color</strong> — Cotton, polyester, blends,
                                                leather, and more
                                            </li>
                                            <li><strong>Print in Full Color</strong> — Sharp detail, vibrant color,
                                                ultra-durable finish</li>
                                            <li><strong>Certified for 100+ Washes</strong> — Intertek-tested for longevity
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Film Options -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFilm">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFilm" aria-expanded="false" aria-controls="collapseFilm">
                                        Film Options
                                    </button>
                                </h2>
                                <div id="collapseFilm" class="accordion-collapse collapse" aria-labelledby="headingFilm"
                                    data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><strong>Standard Film</strong> – Smooth, soft-touch, perfect for everyday
                                                use</li>
                                            <li><strong>Glitter Film</strong> – Add sparkle to your designs</li>
                                            <li><strong>Glow-in-the-Dark</strong> – For bold nighttime visibility</li>
                                            <li><strong>Gold & Silver Foil</strong> – Luxury finish for standout details
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Simple Pricing -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingPricing">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsePricing" aria-expanded="false"
                                        aria-controls="collapsePricing">
                                        Simple Pricing
                                    </button>
                                </h2>
                                <div id="collapsePricing" class="accordion-collapse collapse"
                                    aria-labelledby="headingPricing" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><strong>Starts at $19.99</strong></li>
                                            <li><strong>Up to 62% Off</strong> when you order 30 feet or more</li>
                                            <li><strong>Lowest Rate</strong> – As low as $0.02 per square inch</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Guarantee -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingGuarantee">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseGuarantee" aria-expanded="false"
                                        aria-controls="collapseGuarantee">
                                        100% Satisfaction Guarantee
                                    </button>
                                </h2>
                                <div id="collapseGuarantee" class="accordion-collapse collapse"
                                    aria-labelledby="headingGuarantee" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <p>We stand by our prints. If you’re not completely happy with your sheet, we’ll
                                            reprint it — no hassle.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Start Building -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingStart">
                                    <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseStart" aria-expanded="false" aria-controls="collapseStart">
                                        Start Building Your Sheet Now
                                    </button>
                                </h2>
                                <div id="collapseStart" class="accordion-collapse collapse" aria-labelledby="headingStart"
                                    data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <p>Whether you're printing for yourself or your brand, our Gang Sheet Builder gives
                                            you the flexibility to <strong>create exactly what you need, when you need
                                                it.</strong></p>
                                        <ul>
                                            <li><a href="#">Launch Builder</a></li>
                                            <li><a href="#">Contact Us for Help</a></li>
                                            <li><a href="#">FAQs</a></li>
                                        </ul>
                                        <div class="my-2">
                                            <h3>START BUILDING:</h3>

                                            <div class="modal-box">
                                                <h2>Welcome to Build a Gang Sheet</h2>
                                                <p>
                                                    Welcome to our store! We are glad to have you here. If you have any
                                                    questions or need
                                                    assistance,
                                                    feel free to reach out to us. Happy shopping!
                                                </p>

                                                <div class="options">
                                                    <div class="option">
                                                        <img src="https://img.icons8.com/ios/100/add-image.png"
                                                            alt="Auto Build">
                                                        <h4>Auto Build - Upload Multiple Images at Once</h4>
                                                        <p></p>
                                                    </div>

                                                    <div class="option">
                                                        <img src="https://img.icons8.com/ios/100/plus.png" alt="Start New">
                                                        <h4>Start New</h4>
                                                    </div>

                                                    <div class="option">
                                                        <img src="https://img.icons8.com/ios/100/return.png"
                                                            alt="Edit Previous Order">
                                                        <h4>Edit Previous Order</h4>
                                                    </div>

                                                    <div class="option">
                                                        <img src="https://img.icons8.com/ios/100/numbers.png"
                                                            alt="Names and Numbers">
                                                        <h4>Names and Numbers</h4>
                                                    </div>
                                                </div>

                                                <p class="note">
                                                    It appears that there is an unsaved working design, but it has been
                                                    automatically saved.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>

            </div>

            <section class="bg-light py-5" data-aos="fade-up">
                <div class="" style="">
                    <h2 class="text-dark text-center">What Our Customers Say</h2>
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