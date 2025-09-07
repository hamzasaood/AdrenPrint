@extends('layout.default')

@section('content')
    <section>
        <div class="hero-img d-flex align-items-center">
            <div class="text-center site-container my-5">
                <h1 class="font-jost fw-bold text-dark">DTF Transfers</h1>
            </div>
        </div>
    </section>
    <section class="site-container">
        <div class=" py-5">
            <div class="row g-5">
                {{-- LEFT SIDE: Product Gallery --}}
                <div class="col-lg-6">
                    <div class="product-gallery">
                        <div class="main-image mb-3">
                            <img id="mainProductImg" src="{{ asset('assets/media/gangSheet.png') }}"
                                class="img-fluid rounded shadow-sm object-fit-cover"
                                style="max-height: 800px; width: 100%; object-fit: cover;" alt="DTF Transfers">
                        </div>

                        <div class="thumbs d-flex gap-2 flex-wrap">
                            @foreach($images as $img)
                                <img src="{{ asset('assets/media/gangSheet.png') }}"
                                    class="thumb-img img-thumbnail {{ $loop->first ? 'active' : '' }}" width="80">
                            @endforeach
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

                        <p class="my-2 text-dark">Don’t have a gang sheet ready? Try Our <a href="">Gang Sheet Builder</a>
                        </p>

                        <h3 class=" text-dark">Get Started</h3>
                        <ul class="nav nav-tabs mb-3" id="startTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="upload-tab" data-bs-toggle="tab"
                                    data-bs-target="#upload-tab-pane" type="button" role="tab"
                                    aria-controls="upload-tab-pane" aria-selected="true">Upload Your Gang Sheet</button>
                            </li>
                        </ul>

                        <form id="dtfForm" method="POST" action="{{ route('dtf-gangsheet.addToCart') }}"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Step 1: Upload Artwork --}}
                            <div class="mb-4 step step-1">
                                <h5 class="fw-bold">1. Upload Artwork</h5>
                                <div
                                    class="upload-box border border-dashed rounded p-4 text-center bg-light cursor-pointer">
                                    <input type="file" name="artwork" id="artworkInput" class="d-none" required>
                                    <label for="artworkInput" class="d-block">
                                        <img src="https://via.placeholder.com/100?text=Upload" id="artPreview" class="mb-2">
                                        <p class="text-muted">Drag & drop or click to upload</p>
                                    </label>
                                </div>
                            </div>

                            {{-- Step 2: Choose Color --}}
                            <div class="mb-4 step step-2 d-none">
                                <h5 class="fw-bold">2. Choose Color Option</h5>
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
                                <h5 class="fw-bold">3. Select Size</h5>
                                <div class="row g-3">
                                    @foreach($sizes as $s)
                                        <div class="col-6 col-md-4">
                                            <label class="size-card border rounded p-3 text-center cursor-pointer h-100">
                                                <input type="radio" name="size_id" value="{{ $s->id }}" class="d-none">
                                                <h6 class="fw-bold mb-1">{{ $s->title }}</h6>
                                                <p class="small text-muted">{{ $s->width }}x{{ $s->height }} in</p>
                                                <span class="badge bg-primary">from ${{ number_format($s->rate, 2) }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Step 4: Quantity & Price --}}
                            <div class="mb-4 step step-4 d-none">
                                <h5 class="fw-bold">4. Quantity</h5>
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
                            <button type="submit" class="btn btn-success btn-lg w-100 d-none" id="addToCartBtn">Add to
                                Cart</button>
                        </form>
                    </div>
                </div>
            </div>

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
            </div>
            <!-- Customer Reviews -->
            <div class="text-center mb-5">
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
            </div>
    </section>

    <script>
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