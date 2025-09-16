@extends('layout.default')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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
    <!-- Main Slider -->
    <div class="swiper mySwiper2 mb-3">
        <div class="swiper-wrapper">
            @foreach($images as $img)
                <div class="swiper-slide">
                    <img src="{{ asset('dtf-transfer/'.$img->path) }}" class="img-fluid rounded shadow-sm">
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
                    <img src="{{ asset('dtf-transfer/'.$img->path) }}" class="img-thumbnail">
                </div>
            @endforeach
        </div>
    </div>
</div>

                </div>

                {{-- RIGHT SIDE: Product Options --}}
                <div class="col-lg-6">
                    <h2 class="product-title d-flex align-items-center text-dark">DTF Transfers — Transfer By Size
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

                    <form id="dtfForm" method="POST" action="{{ route('dtf.addToCart') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Step 1: Upload Artwork --}}
                        <div class="mb-4 step step-1">
                            <h5 class="fw-bold">1. Upload Artwork</h5>
                            <div class="upload-box border border-dashed rounded p-4 text-center bg-light cursor-pointer">
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
        <h2 class="section-title">Key Features</h2>
        <div class="row g-4 mb-5" id="featuresAccordion">
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100 border shadow-lg" data-bs-toggle="collapse" href="#feature1"
                    role="button" aria-expanded="false" aria-controls="feature1">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-palette-fill feature-icon"></i>
                        <div>
                            <h5 class="card-title">Print On Virtually Any Fabric</h5>
                            <div class="collapse" id="feature1" data-bs-parent="#featuresAccordion">
                                From 100% cotton to poly blends, nylon, and even leather — our transfers bond seamlessly
                                with almost any material. No more limitations on fabric type or garment color.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100 border shadow-lg" data-bs-toggle="collapse" href="#feature2"
                    role="button" aria-expanded="false" aria-controls="feature2">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-droplet feature-icon"></i>
                        <div>
                            <h5 class="card-title">Crisp Detail, Vibrant Color</h5>
                            <div class="collapse" id="feature2" data-bs-parent="#featuresAccordion">
                                Expect exceptional clarity and vivid saturation in every print. Our DTF process captures
                                fine lines, gradients, and intricate artwork with stunning precision.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100 border shadow-lg" data-bs-toggle="collapse" href="#feature3"
                    role="button" aria-expanded="false" aria-controls="feature3">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-lightning-charge feature-icon"></i>
                        <div>
                            <h5 class="card-title">Fast & Simple Application</h5>
                            <div class="collapse" id="feature3" data-bs-parent="#featuresAccordion">
                                No pretreatment, no weeding — just press and peel. Get pro-level results in minutes
                                using your heat press, with minimal effort and setup.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100 border shadow-lg" data-bs-toggle="collapse" href="#feature4"
                    role="button" aria-expanded="false" aria-controls="feature4">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-cloud-sun feature-icon"></i>
                        <div>
                            <h5 class="card-title">Lightweight & Soft Finish</h5>
                            <div class="collapse" id="feature4" data-bs-parent="#featuresAccordion">
                                Unlike vinyl or other print methods, our DTF transfers leave a smooth, breathable finish
                                that moves with the garment and feels great against the skin.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100 border shadow-lg" data-bs-toggle="collapse" href="#feature5"
                    role="button" aria-expanded="false" aria-controls="feature5">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-shield-check feature-icon"></i>
                        <div>
                            <h5 class="card-title">Wash-Resistant Durability</h5>
                            <div class="collapse" id="feature5" data-bs-parent="#featuresAccordion">
                                Our transfers hold up to 100+ wash cycles, resisting cracks, fading, or peeling. Built
                                to last through everyday wear and laundering.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Specialty Options as List -->
        <h2 class="section-title">Specialty DTF Film Options (Coming Soon)</h2>
        <ul class="list-group list-group-flush mb-5">
            <li class="list-group-item"><strong>Glow-in-the-Dark</strong> — Bring your designs to life even in the dark.
                Our glow film activates in lighter design areas, delivering a bold green illumination at night while
                preserving contrast in darker elements.</li>
            <li class="list-group-item"><strong>Full-Cover Glitter Film</strong> — Infuse your designs with sparkle.
                This specialty film adds a shimmering overlay across your entire artwork, delivering a premium,
                high-visibility effect perfect for statement pieces and fashion items.</li>
            <li class="list-group-item"><strong>Metallic Foil (Gold & Silver)</strong> — Create eye-catching finishes
                with our metallic DTF transfers. Ideal for logos, outlines, or bold text, these foil designs offer a
                long-lasting chrome look on all fabric types — no special steps required.</li>
        </ul>

        <!-- Pressing Instructions as Accordion -->
        <h2 class="section-title">Pressing Instructions (Standard DTF)</h2>
        <p>Follow these four steps for professional-grade results:</p>
        <div class="accordion mb-5" id="pressingAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#step1" aria-expanded="true" aria-controls="step1">
                        Position the Transfer
                    </button>
                </h2>
                <div id="step1" class="accordion-collapse collapse show" data-bs-parent="#pressingAccordion">
                    <div class="accordion-body">
                        Align your artwork flat on the garment. Use heat-resistant tape for hats or textured items.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#step2" aria-expanded="false" aria-controls="step2">
                        Press the Design
                    </button>
                </h2>
                <div id="step2" class="accordion-collapse collapse" data-bs-parent="#pressingAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li><strong>Temp:</strong> 310°F (155°C)</li>
                            <li><strong>Time:</strong> 13 seconds</li>
                            <li><strong>Pressure:</strong> Medium–High (Use a silicone pad or Teflon cover if needed for
                                protection)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#step3" aria-expanded="false" aria-controls="step3">
                        Peel the Film
                    </button>
                </h2>
                <div id="step3" class="accordion-collapse collapse" data-bs-parent="#pressingAccordion">
                    <div class="accordion-body">
                        Wait a few seconds, then peel warm or hot. If any parts don’t stick, lay the film back down and
                        press again with a bit more pressure and heat.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#step4" aria-expanded="false" aria-controls="step4">
                        Final Press
                    </button>
                </h2>
                <div id="step4" class="accordion-collapse collapse" data-bs-parent="#pressingAccordion">
                    <div class="accordion-body">
                        Place parchment paper or a soft fabric layer over the print and press for another 15 seconds.
                        This boosts adhesion, reduces shine, and softens the final feel.
                    </div>
                </div>
            </div>
        </div>

        <!-- Care Instructions -->
        <h2 class="section-title">Care Instructions</h2>
        <ul class="list-group list-group-flush mb-5">
            <li class="list-group-item">Wash inside out in cold water</li>
            <li class="list-group-item">Tumble dry low or hang to dry</li>
            <li class="list-group-item">Avoid bleach and ironing directly on design</li>
        </ul>

        <!-- Shipping & Returns -->
        <h2 class="section-title">Shipping & Returns</h2>
        <ul class="list-group list-group-flush mb-5">
            <li class="list-group-item"><strong>Free shipping</strong> on orders over $75</li>
            <li class="list-group-item"><strong>1–2 day express shipping</strong> options available</li>
            <li class="list-group-item">Contact us within 45 days for reprint or support requests</li>
            <li class="list-group-item">Free reprints for print quality issues (not low-res files)</li>
        </ul>

        <!-- Artwork Setup -->
        <h2 class="section-title">Artwork Setup</h2>
        <ul class="list-group list-group-flush mb-5">
            <li class="list-group-item">All file types accepted: PNG, PDF, SVG, AI, PSD</li>
            <li class="list-group-item">Minimum <strong>300 DPI</strong> recommended</li>
            <li class="list-group-item">Vector files preferred for sharpest results</li>
            <li class="list-group-item">Canva/Procreate users: export as <strong>high-res PDF</strong></li>
        </ul>

        <!-- Gang Sheet Templates -->
        <h2 class="section-title">Gang Sheet Templates (Downloads Available)</h2>
        <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item">22" x 2 ft</li>
            <li class="list-group-item">22" x 5 ft</li>
            <li class="list-group-item">22" x 10 ft</li>
            <li class="list-group-item">22" x 15 ft</li>
            <li class="list-group-item">22" x 20 ft</li>
        </ul>
        <p class="text-muted mb-5">You can build your gang sheets directly using our <strong>Arden's Print Gang Sheet
                Builder</strong>.</p>

        <!-- Satisfaction Guarantee -->
        <h2 class="section-title">Satisfaction Guaranteed</h2>
        <p class="lead mb-5">
            We stand by our work. If your transfer doesn't perform due to print quality or adhesion,
            we'll reprint it at no cost with a new or corrected file. Your satisfaction is our priority.
        </p>

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

        <!-- FAQs Accordion -->
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
                    <div class="accordion-body">A heat press (300–320°F, medium–firm pressure), parchment/Teflon sheet.
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
                    <div class="accordion-body">Wash inside out cold, mild detergent, no bleach, tumble dry low, avoid
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
                    <div class="accordion-body">Yes! Use our Gang Sheet Builder tool to arrange designs easily.</div>
                </div>
            </div>
        </div>
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

                fetch("{{ route('dtf.calculate') }}", {
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