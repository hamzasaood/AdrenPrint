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



.upload-progress-container {
    width: 100%;
    background-color: #000;
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 15px;
    display: none;
}

.upload-progress-bar {
    height: 25px;
    background-color: #fab01b;
    width: 0%;
    transition: width 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000;
    font-weight: bold;
    font-size: 12px;
}


</style>
    
    <section class="site-container" data-aos="fade-up">
        <div class="py-5 product-section">
             @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row g-5">

        {{-- LEFT SIDE: Product Gallery --}}
        <div class="col-lg-6 fixed-column" style="">
            <div class="position-relative product-gallery">

                

                <!-- Main Slider -->
                <div class="swiper mySwiper2 mb-3 rounded shadow-sm overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach($images as $img)
                            <div class="swiper-slide text-center">
                                <img src="{{ asset('dtf-transfer/' . $img->path) }}" class="img-fluid rounded">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <!-- Thumbs Slider -->
                <div class="swiper mySwiper mt-2">
                    <div class="swiper-wrapper">
                        @foreach($images as $img)
                            <div class="swiper-slide">
                                <img src="{{ asset('dtf-transfer/' . $img->path) }}" class="img-thumbnail rounded shadow-sm">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

       

        {{-- RIGHT SIDE: Product Details --}}
        <div class="col-lg-6 scrollable-column">
            <div class="inner">

            {{-- Title + Green Badge --}}
            <h2 class="fw-bold mb-4 text-dark d-flex align-items-center">
                DTF Transfers By Size
                <span class="badge bg-success ms-2" style="font-size:12px;">Everyday Low Prices</span>
            </h2>

            {{-- Stars + Reviews --}}
            <div class="d-flex align-items-center mb-4">
                <div class="text-warning fs-5 me-2">★★★★★</div>
                <span class="small text-muted">13794 Reviews</span>
                <a href="#" class="small ms-2 text-primary">See reviews summary</a>
            </div>

            {{-- Price Line --}}
            <p class="mb-4">
                <strong>As Low As</strong> — 
                <span class="text-success fw-bold">$0.02 per square inch</span>. 
                No Setup or Art Fees
            </p>

            <p class="fw-semibold mb-4">Printed Directly by Us. Never Outsourced. Shipped Fast from USA.</p>
            <p class="small text-muted mb-4">Save up to 50% with our Cumulative Discount on DTF Transfers and UV DTF PermaStickers.</p>

            {{-- Features with icons --}}
            <div class="row mb-4 g-2 features-list text-dark">
                <div class="col-6"><i class="fa-solid fa-check text-warning me-2"></i> Works on Any Fabric or Color</div>
                <div class="col-6"><i class="fa-solid fa-droplet text-warning me-2"></i> Vibrant Colors & Ultra-fine Details</div>
                <div class="col-6"><i class="fa-solid fa-bolt text-warning me-2"></i>  Easy Peel Technology</div>
                <div class="col-6"><i class="fa-solid fa-shield text-warning me-2"></i> Intertek Certified for 100+ Washes</div>
                <div class="col-6"><i class="fa-solid fa-thumbs-up text-warning me-2"></i> 100% Satisfaction Guaranteed</div>
                <div class="col-6"><i class="fa-solid fa-ban text-warning me-2"></i> No Minimums or Setup Fees</div>
            </div>

            {{-- Upload Box (blue box style) --}}
            

            {{-- Upload & Steps --}}
            <form id="dtfForm" method="POST" action="{{ route('dtf.addToCart') }}" enctype="multipart/form-data">
                @csrf

                {{-- Step 1: Upload Artwork --}}
            <div class="border border-primary rounded bg-light p-4 text-center mb-4" style="border-style:dashed !important;border-color:#fbaf1c !important;">
                <input type="file" name="artwork" id="artworkInput" class="d-none" required>
                <label for="artworkInput" class="d-block cursor-pointer mt-4">
                    <a class="mb-4 instruction-card text-decoration-none d-block px-2 text-center btn btn-warning">Choose image to get started ⬆</a>
                    <p class="mb-4 text-muted small">or drag and drop image here</p>
                    <p class="mb-4 text-muted small">or <a href="{{url('/login')}}" style="color:#fbaf1c;">Login</a> to see previous designs</p>
                </label>

                <div class="upload-progress-container" id="uploadProgressContainer" style="display:none;">
                    <div class="upload-progress-bar" id="uploadProgressBar">0%</div>
                </div>

                <img src=""  alt="Upload Artwork" class="img-fluid mb-3 d-none" id="artPreview" style="max-height:350px;">
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

                

                {{-- Step 3: Select Size --}}
                <div class="mb-4 step step-3 d-none">
                    <h5 class="fw-bold">Select Size</h5>
                    <div class="row g-2 gy-2">
                        <div class="d-flex flex-wrap gap-2 mb-2 step" id="sizeStep">
                                    @foreach($sizes as $s)
                                    @php
        // Replace x or X with " x " and append .jpg
        $imagePath = preg_replace('/x/i', '×', trim(str_replace('in', '', $s->title))) . '.jpg';

    @endphp
                                        <input type="radio"
                                            name="size_id"
                                            id="size_{{ $s->id }}"
                                            value="{{ $s->id }}"
                                            class="btn-check"
                                            autocomplete="off" data-path="{{ $imagePath }}">

                                        <label for="size_{{ $s->id }}" 
                                            class="btn btn-outline-dark size-card">
                                            {{ $s->title }}
                                        </label>
                                    @endforeach
                         </div>
                    </div>
                </div>

                {{-- Step 4: Quantity --}}
                <div class="mb-4 step step-4 d-none">
                    <h5 class="fw-bold">Quantity</h5>
                    <div class="d-flex align-items-center gap-4">
                        <input type="number" name="quantity" id="qtyInput" class="form-control w-25" value="1" min="1">
                        <div>
                            <h6>Unit Price: $<span id="unitPrice">0.00</span></h6>
                            <h5 class="fw-bold">Subtotal: $<span id="subtotal">0.00</span></h5>
                            <p class="text-muted small">Shipping & taxes calculated at checkout</p>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="unitprice" id="price" />
                <input type="hidden" name="subtotal" id="subtotal" />

                <button type="submit" class="btn btn-warning btn-lg w-100 d-none" id="addToCartBtn">
                    Add to Cart
                </button>
            </form>
        </div>
        </div>
    </div>
</div>

        {{-- <section class="site-container">
            <div class="my-3">
                <h2 class="section-title text-center" style="font-size : 22px;">Arden’s Print – DTF Transfers Built for Impact</h2>
                <p class="text-dark mb-5 text-center fs-5">
                    At <strong>Arden’s Print,</strong> we specialize in premium <strong>Direct-to-Film (DTF)
                        Transfers</strong>
                    made for creators who demand
                    high-quality, long-lasting results. Whether you're decorating a single tee or managing bulk production,
                    our
                    transfers offer unmatched versatility, color depth, and ease of use.
                </p>
            </div>
        </section>
        <h2 class="section-title">Key Features</h2>
        <div class="row g-4 mb-5" id="featuresAccordion">
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card h-100 border shadow-lg" data-bs-toggle="collapse" href="#feature1"
                    role="button" aria-expanded="false" aria-controls="feature1">
                    <div class="card-body d-flex gap-3 align-items-start">
                        <i class="bi bi-palette-fill feature-icon"></i>
                        <div>
                            <h5 class="card-title fw-semibold fs-4">Print On Virtually Any Fabric</h5>
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
                            <h5 class="card-title fw-semibold fs-4">Crisp Detail, Vibrant Color</h5>
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
                            <h5 class="card-title fw-semibold fs-4">Fast & Simple Application</h5>
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
                            <h5 class="card-title fw-semibold fs-4">Lightweight & Soft Finish</h5>
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
                            <h5 class="card-title fw-semibold fs-4">Wash-Resistant Durability</h5>
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
        </p> --}}

        <div class="my-5">
            <div class="row gap-0">
                <!-- Left Column -->
                <div class="col-lg-6 col-md-6 mb-4">
                    <h3 class="fw-bold text-dark mb-2 text-left">Arden’s Print – DTF Transfers Built for Impact</h3>
                    <p class="text-left">
                        At Arden’s Print, we specialize in premium Direct-to-Film (DTF) Transfers made for creators who
                        demand high-quality, long-lasting results. Whether you're decorating a single tee or managing bulk
                        production, our transfers offer unmatched versatility, color depth, and ease of use.
                    </p>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6 col-md-6">
                    <div class="accordion accordion-flush" id="productAccordion">

                        <!-- Features (open by default) -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFeatures">
                                <button class="accordion-button lh-90" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFeatures" aria-expanded="true"
                                    aria-controls="collapseFeatures">
                                    🔧 Key Features
                                </button>
                            </h2>
                            <div id="collapseFeatures" class="accordion-collapse collapse show"
                                aria-labelledby="headingFeatures" data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li class="mb-1"><strong>🎨 Print On Virtually Any Fabric:</strong> From 100% cotton to
                                            poly blends,
                                            nylon, and even leather — our
                                            transfers bond seamlessly with almost any material. No more limitations on
                                            fabric type or garment color.
                                        </li>
                                        <li class="mb-1"><strong>🔍 Crisp Detail, Vibrant Color:</strong>Expect exceptional
                                            clarity and
                                            vivid saturation in every print. Our DTF process captures fine lines, gradients,
                                            and intricate artwork with stunning precision.</li>
                                        <li class="mb-1"><strong>⚡Fast & Simple Application:</strong> No pretreatment, no
                                            weeding — just
                                            press and peel. Get pro-level results in minutes using your heat press, with
                                            minimal effort and setup.
                                        </li>
                                        <li class="mb-1"><strong>🧵Lightweight & Soft Finish
                                                :</strong>Unlike vinyl or other print methods, our DTF transfers leave a
                                            smooth, breathable finish that moves with the garment and feels great against
                                            the skin.
                                        </li>
                                        <li class="mb-1"><strong>💪 Wash-Resistant Durability
                                                :</strong> Our transfers hold up to 100+ wash cycles, resisting cracks,
                                            fading, or peeling. Built to last through everyday wear and laundering.
                                        </li>
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
                                    ✨Specialty DTF Film Options – (Coming Soon)
                                </button>
                            </h2>
                            <div id="collapseGuarantee" class="accordion-collapse collapse"
                                aria-labelledby="headingGuarantee" data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <div class="mb-1">
                                        <strong>🌌 Glow in the Dark</strong>
                                        <p>Bring your designs to life — even in the dark. Our glow film activates in lighter
                                            design areas, delivering a bold green illumination at night while preserving
                                            contrast in darker elements. A great choice for standout pieces or night events.
                                        </p>
                                    </div>
                                    <div class="mb-1">
                                        <strong>✨ Full Cover Glitter Film</strong>
                                        <p>Infuse your designs with sparkle. This specialty film adds a shimmering overlay
                                            across your entire artwork, delivering a premium, high-visibility effect perfect
                                            for statement pieces and fashion items.
                                        </p>
                                    </div>
                                    <div>
                                        <strong>🪙 Metallic Foil (Gold & Silver)</strong>
                                        <p>Create eye-catching finishes with our metallic DTF transfers. Ideal for logos,
                                            outlines, or bold text, these foil designs offer a long-lasting chrome look on
                                            all fabric types—no special steps required.
                                            Specialty transfers use the same artwork setup as standard DTF. You just select
                                            the desired effect, and we handle the rest.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pressing Instructions -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPressing">
                                <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsePressing" aria-expanded="false"
                                    aria-controls="collapsePressing">
                                    🔥Pressing Instructions (Standard DTF)
                                </button>
                            </h2>
                            <div id="collapsePressing" class="accordion-collapse collapse" aria-labelledby="headingPressing"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <p class="mb-1">Follow these four steps for professional-grade results:
                                    </p>
                                    <p><strong>1. Position the Transfer</strong></p>
                                    <p class="mb-1">
                                        Align your artwork flat on the garment. Use heat-resistant tape for hats or textured
                                        items.
                                    </p>

                                    <p><strong>2. Press the Design</strong></p>
                                    <p>
                                        Follow these settings when pressing the design:
                                    </p>
                                    <ul>
                                        <li><strong>Temp:</strong> 310°F (155°C)</li>
                                        <li><strong>Time:</strong> 13 seconds</li>
                                        <li><strong>Pressure:</strong> Medium to High</li>
                                    </ul>
                                    <p class="mb-1">
                                        Use a silicone pad or Teflon cover if needed for protection.
                                    </p>

                                    <p><strong>3. Peel the Film</strong></p>
                                    <p class="mb-1">
                                        Wait a few seconds, then peel warm or hot. If any parts don’t stick, lay the film
                                        back down and press again
                                        with a bit more pressure and heat.
                                    </p>

                                    <p><strong>4. Final Press (Important!)</strong></p>
                                    <p>
                                        Place parchment paper or a soft fabric layer over the print and press for another 15
                                        seconds. This boosts adhesion,
                                        reduces shine, and softens the final feel.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping & Returns -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingShipping">
                                <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseShipping" aria-expanded="false"
                                    aria-controls="collapseShipping">
                                   🧺 Care Instructions
                                </button>
                            </h2>
                            <div id="collapseShipping" class="accordion-collapse collapse" aria-labelledby="headingShipping"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul class="mb-0">
                                        <li>Wash inside out in cold water</li>
                                        <li>Tumble dry low or hang to dry</li>
                                        <li>Avoid bleach and ironing directly on design</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Art Upload Recommendations -->
                        <!-- Shipping & Returns -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingShippingReturns">
                                <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseShippingReturns" aria-expanded="false"
                                    aria-controls="collapseShippingReturns">
                                   📦 Shipping & Returns
                                </button>
                            </h2>
                            <div id="collapseShippingReturns" class="accordion-collapse collapse"
                                aria-labelledby="headingShippingReturns" data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li><strong>Free shipping</strong> on orders over $75</li>
                                        <li><strong>1–2 day express shipping</strong> options available</li>
                                        <li>Contact us within <strong>45 days</strong> for reprint or support requests</li>
                                        <li>We offer free reprints for print quality issues — but not for low-res files</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingArtwork">
                                <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseArtwork" aria-expanded="false" aria-controls="collapseArtwork">
                                   📁 Artwork Setup
                                </button>
                            </h2>
                            <div id="collapseArtwork" class="accordion-collapse collapse" aria-labelledby="headingArtwork"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul class="">
                                        <li><strong>All file types accepted:</strong> PNG, PDF, SVG, AI, PSD</li>
                                        <li><strong>Minimum 300 DPI</strong> recommended</li>
                                        <li><strong>Vector files</strong> preferred for sharpest results</li>
                                        <li><strong>Canva/Procreate users:</strong> export as high-res PDF</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingGang">
                                <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseGang" aria-expanded="false" aria-controls="collapseGang">
                                   📐 Gang Sheet Templates (Downloads Available)
                                </button>
                            </h2>
                            <div id="collapseGang" class="accordion-collapse collapse" aria-labelledby="headingGang"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body">
                                    <ul class="mb-0">
                                        <li>22" x 2 ft</li>
                                        <li>22" x 5 ft</li>
                                        <li>22" x 10 ft</li>
                                        <li>22" x 15 ft</li>
                                        <li>22" x 20 ft</li>
                                    </ul>
                                    <p class="mt-2">
                                        You can build your gang sheets directly using our <strong>Arden’s Print Gang Sheet
                                            Builder</strong>.
                                    </p>

                                </div>
                            </div>
                        </div>

                        <!-- Build Your Own DTF Transfer -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingBuild">
                                <button class="accordion-button collapsed lh-90" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseBuild" aria-expanded="false" aria-controls="collapseBuild">
                                   💯 Satisfaction Guaranteed
                                </button>
                            </h2>
                            <div id="collapseBuild" class="accordion-collapse collapse" aria-labelledby="headingBuild"
                                data-bs-parent="#productAccordion">
                                <div class="accordion-body">We stand by our work. If your transfer doesn’t perform due to
                                    print quality or adhesion, we’ll reprint it at no cost using a new or corrected file.
                                    Your satisfaction is always our priority.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Customer Reviews -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title text-dark">Customer Reviews</h2>
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
        </div> --}}

        <section class="py-5 bg-light" data-aos="fade-up">
            <div class="" style="">
                <h2 class="text-dark text-center">What Our Customers Say</h2>
                <div class="row g-4">
                    <div class="col-lg-12">
                    <script defer async src='https://cdn.trustindex.io/loader.js?bee03e45460d278af256ac8441b'></script>
        </div>
                </div>
                <div class="mt-5">
                    <img src="assets/media/about-2.png" alt="" class="img-fluid w-100 rounded-3 shadow-sm">
                </div>
            </div>
        </section>

        <!-- FAQs Accordion -->
        <h2 class="text-dark text-center">Frequently Asked Questions</h2>
        <div class="accordion mb-5" id="faqAccordion" data-aos="fade-up">
            <h4 class="text-dark pb-3 pt-1">DTF Sizing & Gang Sheet FAQs</h4>
            <div class="accordion-item">
                <h2 class="accordion-header lh-70 lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                        Q4: Are gang sheets delivered as one continuous piece or pre-cut?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">Gang sheets are delivered as one continuous piece.</div>
                </div>
            </div>
        </div>
        <h4 class="text-dark pb-3 pt-1">Material & Application FAQs
        </h4>
        <div class="accordion mb-5" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                        Q8: Can DTF transfers be applied to dark garments?
                    </button>
                </h2>
                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">Yes! The white ink base keeps colors vibrant.</div>
                </div>
            </div>
        </div>

        <h4 class="text-dark pb-3 pt-1">General DTF FAQs</h4>
        <div class="accordion mb-5" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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
                <h2 class="accordion-header lh-70">
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>


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


            const mainImage = document.querySelector('.swiper .swiper-slide img'); // adjust selector if needed

  function updateMainImage() {
    const selected = document.querySelector('input[name="size_id"]:checked');
    if (selected && mainImage) {
      const imagePath = selected.getAttribute('data-path');
      mainImage.src = `/dtf-transfer/${imagePath}`;
    }
  }

 

  // Set correct image on page load
  updateMainImage();
            // STEP HANDLING
            const step2 = document.querySelector('.step-2');
            const step3 = document.querySelector('.step-3');
            const step4 = document.querySelector('.step-4');
            const addToCartBtn = document.getElementById('addToCartBtn');

            // Artwork preview
            const artworkInput = document.getElementById("artworkInput");
            const artPreview = document.getElementById("artPreview");
            const progressContainer = document.getElementById("uploadProgressContainer");
            const progressBar = document.getElementById("uploadProgressBar");
            artworkInput.addEventListener("change", function () {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    const fileName = file.name.toLowerCase();

                    const allowedTypes = [
                        'image/png', 'application/pdf', 'image/svg+xml',
                        'application/postscript', 'image/vnd.adobe.photoshop'
                    ];
                    const allowedExtensions = ['.png', '.pdf', '.svg', '.ai', '.psd'];
                    const isExtensionAllowed = allowedExtensions.some(ext => fileName.endsWith(ext));

                    const oldInfo = document.getElementById('fileInfo');
                    if (oldInfo) oldInfo.remove();

                    if (!allowedTypes.includes(file.type) && !isExtensionAllowed) {
                        const alert = document.createElement('div');
                        alert.className = 'alert alert-danger alert-dismissible fade show mt-2';
                        alert.role = 'alert';
                        alert.innerHTML = `
                            ❌ This file format is not allowed. Only PNG, PDF, SVG, AI, and PSD files are accepted.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        `;
                        this.insertAdjacentElement('afterend', alert);
                        this.value = '';
                        return;
                    }

                    // Show progress bar
                    progressContainer.style.display = 'block';
                    artPreview.classList.add('d-none');

                    let progress = 0;
                    const progressInterval = setInterval(() => {
                        progress += 10;
                        progressBar.style.width = progress + '%';
                        progressBar.textContent = progress + '%';
                        if (progress >= 100) {
                            clearInterval(progressInterval);
                            setTimeout(() => {
                                progressContainer.style.display = 'none';
                                progressBar.style.width = '0%';
                                progressBar.textContent = '0%';
                            }, 500);
                        }
                    }, 100);

                    const reader = new FileReader();
                    reader.onload = async e => {
                        const dataUrl = e.target.result;

                        // Remove old preview
                        const oldPreview = document.getElementById('dynamicPreview');
                        if (oldPreview) oldPreview.remove();

                        let previewEl;

                        if (file.type.startsWith('image/') && !fileName.endsWith('.psd')) {
                            // ✅ PNG, SVG, JPG → show image
                            previewEl = document.createElement('img');
                            previewEl.src = dataUrl; // must be DataURL
                            previewEl.className = 'img-fluid rounded mt-2';
                            previewEl.style.maxHeight = '400px';
                        }
                        else if (file.type === 'application/pdf' || fileName.endsWith('.pdf') || fileName.endsWith('.ai')) {
                            // ✅ PDF or AI → render first page as image
                            previewEl = document.createElement('canvas');
                            previewEl.className = 'img-fluid rounded mt-2';
                            previewEl.style.maxHeight = '400px';
                            
                            // Load PDF.js dynamically if not already loaded
                            if (typeof pdfjsLib === 'undefined') {
                                await loadPdfJs();
                            }

                            const pdf = await pdfjsLib.getDocument({ data: e.target.result }).promise;
                            const page = await pdf.getPage(1);
                            const viewport = page.getViewport({ scale: 1.5 });
                            const context = previewEl.getContext('2d');
                            previewEl.height = viewport.height;
                            previewEl.width = viewport.width;

                            await page.render({ canvasContext: context, viewport }).promise;
                        } 
                        else {
                            // ❌ PSD or others — show filename only
                            previewEl = document.createElement('div');
                            previewEl.className = 'alert alert-secondary alert-dismissible fade show mt-2';
                            previewEl.id = 'fileInfo';
                            previewEl.role = 'alert';
                            previewEl.innerHTML = `
                                📁 Selected file: <strong>${file.name}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            `;
                        }

                        previewEl.id = 'dynamicPreview';
                        this.insertAdjacentElement('afterend', previewEl);
                    };

                    if (file.type.startsWith('image/') && !fileName.endsWith('.psd')) {
                        reader.readAsDataURL(file); // for images
                    } else {
                    reader.readAsArrayBuffer(file);
                    }

                    // Show next steps
                    document.querySelector('.step-3').classList.remove('d-none');
                    document.querySelector('.step-4').classList.remove('d-none');
                    document.getElementById('addToCartBtn').classList.remove('d-none');
                    updatePrice();
                }
            });

            // Utility to load PDF.js dynamically
            async function loadPdfJs() {
                return new Promise(resolve => {
                    const script = document.createElement('script');
                    script.src = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js";
                    script.onload = () => {
                        pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";
                        resolve();
                    };
                    document.body.appendChild(script);
                });
            }




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
                    const inputId = this.getAttribute("for");
                    const input = document.getElementById(inputId);

                    // highlight selection
                     if (input) {
                // Select the radio
                input.checked = true;

                // Remove highlight from all and add to selected
                document.querySelectorAll(".size-card").forEach(l => l.classList.remove("border-success"));
                this.classList.add("border-success");

                // Show next step and button
                if (input.name === "size_id") {
                    if (step4) step4.classList.remove('d-none');
                    if (addToCartBtn) addToCartBtn.classList.remove('d-none');
                    updatePrice(); // recalculate pricing
                    updateMainImage(); // update main image
                    //input.addEventListener('change', updateMainImage);
                }
                if (input.name === "color_id") {
                        step3.classList.remove('d-none'); // Show size options after color
                    }
            }

        });
    });

            // Dynamic pricing
            function updatePrice() {
                let sizeInput = document.querySelector("[name='size_id']:checked");
                //let colorInput = document.querySelector("[name='color_id']:checked");
                let qtyInput = document.getElementById("qtyInput");
                let priceinput = document.getElementById("price");

                if (!sizeInput) return;

                let size_id = sizeInput.value;
                let quantity = qtyInput.value;

                fetch("{{ route('dtf.calculate') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ size_id, quantity })
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