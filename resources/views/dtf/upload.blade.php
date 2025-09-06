@extends('layout.default')

@section('content')
<div class="container py-5">
    <div class="row g-5">

        {{-- LEFT SIDE: Product Gallery --}}
        <div class="col-lg-6">
            <div class="product-gallery">
                <div class="main-image mb-3">
                    <img id="mainProductImg" 
                         src="{{ $images->first() ? asset('/dtf-transfer/'.$images->first()->path) : 'https://via.placeholder.com/600x600?text=No+Image' }}" 
                         class="img-fluid rounded shadow-sm" 
                         alt="DTF Transfers">
                </div>
                <div class="thumbs d-flex gap-2 flex-wrap">
                    @foreach($images as $img)
                        <img src="{{ asset('/dtf-transfer/'.$img->path) }}" 
                             class="thumb-img img-thumbnail {{ $loop->first ? 'active':'' }}" 
                             width="80">
                    @endforeach
                </div>
            </div>
        </div>

        {{-- RIGHT SIDE: Product Options --}}
        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Upload a DTF Gangsheet</h2>
            <p class="text-muted mb-4">Upload your artwork, then choose color, size & quantity to get live pricing.</p>

            <form id="dtfForm" method="POST" action="{{ route('dtf-gangsheet.addToCart') }}" enctype="multipart/form-data">
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
                                <small class="text-muted">(+${{ number_format($c->surcharge,2) }})</small>
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
                                <span class="badge bg-primary">from ${{ number_format($s->rate,2) }}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Step 4: Quantity & Price --}}
                <div class="mb-4 step step-4 d-none">
                    <h5 class="fw-bold">4. Quantity</h5>
                    <div class="d-flex align-items-center gap-4">
                        <input type="number" name="quantity" id="qtyInput" class="form-control w-25" value="1" min="1">
                        <div>
                            <h6>Unit Price: $<span id="unitPrice">0.00</span></h6>
                            <h5 class="fw-bold">Subtotal: $<span id="subtotal">0.00</span></h5>
                            <p class="text-muted">Shipping & taxes calculated at checkout</p>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="unitprice" id="price" />
                <input type="hidden" name="subtotal" id="subtotal" />
                <button type="submit" class="btn btn-success btn-lg w-100 d-none" id="addToCartBtn">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // STEP HANDLING
    const step2 = document.querySelector('.step-2');
    const step3 = document.querySelector('.step-3');
    const step4 = document.querySelector('.step-4');
    const addToCartBtn = document.getElementById('addToCartBtn');

    // Artwork preview
    const artworkInput = document.getElementById("artworkInput");
    const artPreview   = document.getElementById("artPreview");
    artworkInput.addEventListener("change", function(){
        if(this.files && this.files[0]){
            let reader = new FileReader();
            reader.onload = e => artPreview.src = e.target.result;
            reader.readAsDataURL(this.files[0]);

            // Show Step 2 after upload
            step2.classList.remove('d-none');
        }
    });

    // Gallery thumbnails
    document.querySelectorAll(".thumb-img").forEach(img => {
        img.addEventListener("click", function(){
            document.getElementById("mainProductImg").src = this.src;
            document.querySelectorAll(".thumb-img").forEach(t => t.classList.remove("active"));
            this.classList.add("active");
        });
    });

    // Radio styling (Color & Size)
    document.querySelectorAll(".color-option, .size-card").forEach(label => {
        label.addEventListener("click", function() {
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
    function updatePrice(){
        let sizeInput  = document.querySelector("[name='size_id']:checked");
        let colorInput = document.querySelector("[name='color_id']:checked");
        let qtyInput   = document.getElementById("qtyInput");
        let priceinput = document.getElementById("price");

        if(!sizeInput || !colorInput) return;

        let size_id  = sizeInput.value;
        let color_id = colorInput.value;
        let quantity = qtyInput.value;

        fetch("{{ route('dtf-gangsheet.calculate') }}", {
            method:"POST",
            headers:{
                "Content-Type":"application/json",
                "X-CSRF-TOKEN":"{{ csrf_token() }}"
            },
            body: JSON.stringify({ size_id, color_id, quantity })
        })
        .then(res=>res.json())
        .then(data=>{
            document.getElementById("unitPrice").innerText = data.unit_price.toFixed(2);
            priceinput.value = data.unit_price.toFixed(2);
            document.getElementById("subtotal").innerText  = data.subtotal.toFixed(2);
        });
    }

    document.getElementById("qtyInput").addEventListener("input", updatePrice);
});
</script>
@endsection
