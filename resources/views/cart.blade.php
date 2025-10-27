{{--

@extends('layout.default')

@section('content')


<!-- TITLE BANNER START -->
<section class="title-banner">
    <div class="container">
        <h1 class="medium-black fw-700">Cart</h1>
    </div>
</section>
<!-- TITLE BANNER END -->

<!-- Cart Area Start -->
<section class="cart py-40">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="d-lg-block d-none">
                    <table class="cart-table mb-16">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                    </table>
                    @foreach(session('cart', []) as $index => $item)

                    <table class="cart-table">
                        <tbody>
                            <tr class="table-row">
                                <td class="pd">
                                    <div class="product-detail-box">
                                        <div class="cus-checkBox">
                                            <input type="checkbox" id="box1">
                                            <label for="box1" class="light-gray"></label>
                                        </div>
                                        <a href="#" class="h5 dark-black"><i class="fal fa-times"></i></a>
                                        <div class="img-block">
                                            <a href="#"><img src="assets/media/products/nav-image-1.png" alt=""></a>
                                        </div>
                                        <div style="width:140px">
                                            
                                            @if(!empty($item['design_preview']))
                                            <img src="{{ $item['design_preview'] }}" alt="Design"
                                                style="max-width:120px; border:1px solid #ddd;">

                                            @else
                                            <img src="{{ $item['image'] }}" alt="Design"
                                                style="max-width:120px; border:1px solid #ddd;">

                                            @endif
                                        </div>
                                        <div class="d-block text-start">
                                            <h6><a href="#" class="medium-black">{{ $item['name'] }}</a></h6>
                                            <small class="text-muted">Size: {{ $item['size'] ?? 'N/A' }}</small>
                                            <small class="text-muted">Color: {{ $item['color'] ?? 'N/A' }}</small>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <p class="fw-500"> {{ number_format($item['price'],2) }}</p>
                                </td>
                                <td>
                                    <div class="quantity quantity-wrap">
                                        <div class="input-area quantity-wrap">
                                            <button class="decrement" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M15.375 7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z"
                                                        fill="#1E1F20" />
                                                </svg>
                                            </button>
                                            <input type="text" name="quantity" value="{{ $item['quantity'] }}"
                                                maxlength="2" size="1" class="number">

                                            <button class="increment" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M15.375 7.375H8.625V0.625C8.625 0.279813 8.34519 0 8 0C7.65481 0 7.375 0.279813 7.375 0.625V7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H7.375V15.375C7.375 15.7202 7.65481 16 8 16C8.34519 16 8.625 15.7202 8.625 15.375V8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z"
                                                        fill="#1E1F20" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-500">@php
                                        $total = $item['price'] * $item['quantity'];
                                        echo number_format($total, 2);
                                        @endphp</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    @endforeach


                </div>

                <div class="table-bottom-row bg-white">
                    <a href="{{url('/shop')}}" class="cus-btn">Continue Shopping</a>
                    <form action="https://uiparadox.co.uk/templates/print-hive/checkout.html" method="post"
                        class="contact-form d-flex align-items-center gap-16">
                        <input type="number" class="form-control" placeholder="Coupon Code" name="code" id="cpCode">
                        <button type="submit" class="cus-btn">Apply Now</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="checkout-box bg-semi-white">
                    <div class="checkout-title mb-16">
                        <h6 class="fw-500 medium-black">Cart Total</h6>
                    </div>
                    <div class="bottom-box">
                        <div class="title-price mb-16">
                            <h6 class="medium-black">Subtotal</h6>
                            <p class="light-gray">$80.00</p>
                        </div>
                        <div class="hr-line mb-16"></div>
                        <div class="title-price mb-16">
                            <h6 class="medium-black">Standard Delivery</h6>
                            <p class="light-gray">$5.00</p>
                        </div>
                        <div class="hr-line mb-16"></div>
                        <div class="title-price mb-32">
                            <h6 class="medium-black">Coupon Discount</h6>
                            <p class="light-gray">$-5.00</p>
                        </div>
                        <div class="hr-line mb-16"></div>
                        <div class="title-price mb-16">
                            <h6 class="color-primary">TOTAL</h6>
                            <h6 class="color-primary">$80.00</h6>
                        </div>
                        <div class="hr-line mb-32"></div>
                        <div class="text-end">
                            <a href="{{url('/checkout')}}" class="cus-btn active-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Area End -->

<!-- FOOTER Start -->

<!-- FOOTER End -->
















@endsection


--}}














@extends('layout.default')

@section('content')


    <style>
        .quantity .input-area .minus {
            border-radius: clamp(2px, 0.208vw, 28px);
            border: none;
            width: clamp(28px, 1.667vw, 64px);
            height: clamp(28px, 1.667vw, 64px);
            transition: all 0.5s ease-in-out;
            background: transparent;
        }

        .quantity .input-area .plus {
            border-radius: clamp(2px, 0.208vw, 28px);
            border: none;
            width: clamp(28px, 1.667vw, 64px);
            height: clamp(28px, 1.667vw, 64px);
            transition: all 0.5s ease-in-out;
            background: transparent;
        }
    </style>

     <section>
        <div class="hero-img d-flex align-items-center">
            <div class="text-center site-container my-5">
                <h1 class="font-jost fw-bold text-dark">Cart</h1>
            </div>
        </div>
    </section>
    <section class="cart py-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    @if(session('cart') && count(session('cart')) > 0)
                        <div class="d-lg-block d-none">
                            <table class="cart-table mb-16">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                            </table>
                            @foreach(session('cart') as $index => $item)
                                <table class="cart-table" data-index="{{ $index }}">
                                    <tbody>
                                        <tr class="table-row">
                                            <td class="pd">
                                                <div class="product-detail-box">
                                                    <div class="cus-checkBox">
                                                        <input type="checkbox" id="box{{ $index }}">
                                                        <label for="box{{ $index }}" class="light-gray"></label>
                                                    </div>

                                                    <!-- Remove button -->
                                                    <a href="javascript:void(0)" class="h5 dark-black remove-item"><i
                                                            class="fal fa-times"></i></a>

                                                    <!-- Product / Design Preview -->
                                                    
                                                    {{--
                                                    <div class="img-block" style="width:140px">
                                                        @if(($item['type'] ?? '') === 'gangsheet' && !empty($item['preview']))
                                                            <img src="{{ $item['preview'] }}" alt="Gangsheet Design"
                                                                style="max-width:120px; border:1px solid #ddd; cursor:pointer;"
                                                                onclick="openModal('{{ $item['preview'] }}')">
                                                        
                                                        @elseif(!empty($item['image']))
                                                           
                                                            @if (Illuminate\Support\Str::startsWith($item['image'], 'http'))
                                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="max-width:120px; border:1px solid #ddd; cursor:pointer;"
                                                                onclick="openModal('{{ $item['image'] }}')">
                                                            @else
                                                            <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" style="max-width:120px; border:1px solid #ddd; cursor:pointer;"
                                                                onclick="openModal('{{ $item['image'] }}')">
                                                            @endif

                                                        @elseif($item['type'] === 'dtf' || !empty($item['artwork']))
                                                            <img src="{{ asset($item['artwork']) }}" alt=""
                                                                style="max-width:120px; border:1px solid #ddd; cursor:pointer;"
                                                                onclick="openModal('{{ asset($item['artwork']) }}')">
                                                       @elseif($item['design_preview'] ?? '')
                                             <img src="{{ $item['design_preview'] }}" alt="Gangsheet Design"
                                                    style="max-width:120px; border:1px solid #ddd; cursor:pointer;"
                                                    onclick="openModal('{{ $item['design_preview'] }}')">
                                                        @else
                                                            <img src="https://via.placeholder.com/120x120?text=No+Image"
                                                                alt="No Image" style="max-width:120px; border:1px solid #ddd;"> 

                                                        

                                                        @endif
                                                    </div>
                                                --}}


                                                <div class="img-block" style="">
    @if(($item['type'] ?? '') === 'gangsheet' && !empty($item['preview']))
        @php
            $ext = strtolower(pathinfo($item['preview'], PATHINFO_EXTENSION));
        @endphp

        @if($ext === 'pdf')
            
                    <div id="clickOverlay" onclick="openModal('{{ $item['preview'] }}')"
         style="top:0;left:0;width:100%;height:100%;cursor:pointer;background:transparent;">Click to view</div>
        @else
            <img src="{{ $item['preview'] }}" alt="Gangsheet Design"
                style=" border:1px solid #ddd; cursor:pointer;"
                onclick="openModal('{{ $item['preview'] }}')">
        @endif

    @elseif(!empty($item['image']))
        @php
            $imageUrl = Illuminate\Support\Str::startsWith($item['image'], 'http') 
                ? $item['image'] 
                : asset('images/' . $item['image']);
            $ext = strtolower(pathinfo($item['image'], PATHINFO_EXTENSION));
        @endphp

        @if($ext === 'pdf')
           
                    <div id="clickOverlay" onclick="openModal('{{ $imageUrl }}')"
         style="top:0;left:0;width:100%;height:100%;cursor:pointer;background:transparent;">Click to view</div>
        @else
            <img src="{{ $imageUrl }}" alt="{{ $item['name'] }}" 
                style=" border:1px solid #ddd; cursor:pointer;"
                onclick="openModal('{{ $imageUrl }}')">
        @endif

    @elseif($item['type'] === 'dtf' || !empty($item['artwork']))
        @php
            $ext = strtolower(pathinfo($item['artwork'], PATHINFO_EXTENSION));
        @endphp

        @if($ext === 'pdf')
            
                    <div id="clickOverlay" onclick="openModal('{{ $item['artwork'] }}')"
         style="top:0;left:0;width:100%;height:100%;cursor:pointer;background:transparent;">Click to view</div>
        @else
            <img src="{{ asset($item['artwork']) }}" alt=""
                style=" border:1px solid #ddd; cursor:pointer;"
                onclick="openModal('{{ asset($item['artwork']) }}')">
        @endif

    @elseif($item['design_preview'] ?? '')
        @php
            $ext = strtolower(pathinfo($item['design_preview'], PATHINFO_EXTENSION));
        @endphp

        @if($ext === 'pdf')
           
                    <div id="clickOverlay" onclick="openModal('{{ $item['design_preview'] }}')"
         style="top:0;left:0;width:100%;height:100%;cursor:pointer;background:transparent;">Click to view</div>
        @else
            <img src="{{ $item['design_preview'] }}" alt="Gangsheet Design"
                style=" border:1px solid #ddd; cursor:pointer;"
                onclick="openModal('{{ $item['design_preview'] }}')">
        @endif

    @else
        <img src="https://via.placeholder.com/120x120?text=No+Image"
            alt="No Image" style="max-width:120px; border:1px solid #ddd;"> 
    @endif
</div>


                                                    <!-- Item Name -->
                                                    <div class="d-block text-center">
                                                        @if($item['title']?? false )
                                                            <h6 class="medium-black">{{ $item['design_name'] ?? 'Gang Sheet' }}</h6>
                                                            <small class="text-muted">
                                                                Size: {{ $item['title'] ?? ($item['width'] . 'x' . $item['height'] . ' in') }}
                                                            </small>

                                                        @elseif($item['size_title'] ?? false)
                                                            <h6 class="medium-black">{{ $item['name'] ?? 'Gang Sheet' }}</h6>
                                                            <small class="text-muted">
                                                                Size: {{ $item['size_title'] ?? ($item['width'] . 'x' . $item['height'] . ' in') }}
                                                            </small>
                                                        @else
                                                            <h6 class="medium-black">{{ $item['name'] }}</h6>
                                                            <small class="text-muted">Size: {{ $item['size'] ?? 'N/A' }}</small>
                                                            <small class="text-muted">Color: {{ $item['color'] ?? 'N/A' }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Price -->
                                            <td>
                                                <p class="fw-500 price" data-price="{{ $item['price'] }}">
                                                    {{ number_format($item['price'], 2) }}
                                                </p>
                                            </td>

                                            <!-- Quantity -->
                                            <td>
                                                <div class="quantity quantity-wrap">
                                                    <div class="input-area quantity-wrap">
                                                        <button class="minus" type="button">-</button>
                                                        <input type="text" name="quantity" value="{{ $item['quantity'] }}"
                                                            data-index="{{ $index }}" maxlength="2" size="1" step="1"
                                                            class="number">
                                                        <button class="plus" type="button">+</button>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Subtotal -->
                                            <td>
                                                <p class="fw-500 subtotal" data-subtotal="{{ $item['price'] * $item['quantity'] }}">
                                                    {{ number_format($item['price'] * $item['quantity'], 2) }}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endforeach

                        </div>

                        <div class="table-bottom-row bg-white mt-2">
                            <a href="{{ url('/shop') }}" class="cus-btn">Continue Shopping</a>
                        </div>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>

                <div class="col-xl-4">
                    <div class="checkout-box bg-semi-white">
                        <div class="checkout-title mb-16">
                            <h6 class="fw-500 medium-black">Cart Total</h6>
                        </div>
                        <div class="bottom-box">
                            <div class="title-price mb-16">
                                <h6 class="medium-black">Subtotal</h6>
                                <p id="cartSubtotal" class="light-gray">0.00</p>
                            </div>
                            <div class="hr-line mb-16"></div>
                            <div class="title-price mb-16">
                                <h6 class="medium-black">Standard Delivery</h6>
                                <p class="light-gray">$5.00</p>
                            </div>
                            <div class="hr-line mb-16"></div>
                            <div class="title-price mb-16">
                                <h6 class="color-primary">TOTAL</h6>
                                <h6 id="cartTotalnn" class="color-primary">0.00</h6>
                            </div>
                            <div class="hr-line mb-32"></div>
                            <div class="text-end">
                                <a href="{{ url('/checkout') }}" class="cus-btn active-btn">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            margin: 5% auto;
            display: block;
            max-width: 90%;
        }

        .modal img {
            width: 100%;
        }
    </style>

    <!-- Image -->

    <!-- Modal -->
    <div id="imageModal" class="modal" onclick="closeModal()">
        <span style="position:absolute;top:20px;right:30px;color:#fff;font-size:30px;cursor:pointer;">&times;</span>
        <div class="modal-content" id="modalImageContainer">
            <img id="modalImage" src="">
        </div>
    </div>

    <script>
        function openModal(src) {
            iframeExt = src.split('.').pop().toLowerCase();
            if (iframeExt === 'pdf') {
document.getElementById("modalImageContainer").innerHTML = `
    <embed 
        src="${src}#toolbar=0&navpanes=0&scrollbar=0&zoom=page-fit" 
        type="application/pdf" 
        style="width:100%; height:100vh; border:none; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.2);">
`;

            } else {
                document.getElementById("modalImageContainer").innerHTML = '<img id="modalImage" src="' + src + '">';
            }
            //document.getElementById("modalImage").src = src;
            document.getElementById("imageModal").style.display = "block";
        }
        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ---- config
            const SHIPPING = 5.00;

            // per-item debounce/in-flight map: { [index]: { timer: number|null, inFlight: boolean, pendingQty: number|null } }
            const updates = {};

            // helpers
            const fmt = v => Number(v).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            const toNum = v => parseFloat(String(v).replace(/[^0-9.\-]/g, '')) || 0;

            // get numeric price for a row (from data-price or fallback to text)
            function getRowPrice(table) {
                const priceEl = table.querySelector('.price');
                if (!priceEl) return 0;
                const dp = priceEl.dataset.price;
                return dp != null ? parseFloat(dp) : toNum(priceEl.textContent);
            }

            function getRowQty(table) {
                const input = table.querySelector('input.number');
                return Math.max(1, parseInt(input?.value, 10) || 1);
            }

            function setRowQty(table, qty) {
                const input = table.querySelector('input.number');
                if (input) input.value = qty;
            }

            function updateRowSubtotal(table, price, qty) {
                const sub = price * qty;
                const el = table.querySelector('.subtotal');
                if (el) el.textContent = fmt(sub);
            }

            function recalcTotals() {
                let subtotal = 0;
                document.querySelectorAll('table.cart-table[data-index]').forEach(table => {
                    const price = getRowPrice(table);
                    const qty = getRowQty(table);
                    subtotal += price * qty;
                });
                const subEl = document.getElementById('cartSubtotal');
                const totEl = document.getElementById('cartTotalnn');
                if (subEl) subEl.textContent = fmt(subtotal);
                if (totEl) totEl.textContent = fmt(subtotal + SHIPPING);
            }

            // optimistic UI change + schedule server update
            function scheduleUpdate(index, qty) {
                const table = document.querySelector(`table.cart-table[data-index="${index}"]`);
                if (!table) return;

                const price = getRowPrice(table);
                setRowQty(table, qty);
                updateRowSubtotal(table, price, qty);
                recalcTotals();

                if (!updates[index]) updates[index] = { timer: null, inFlight: false, pendingQty: null };
                const u = updates[index];
                u.pendingQty = qty;
                if (u.timer) clearTimeout(u.timer);
                u.timer = setTimeout(() => sendUpdate(index), 200); // debounce so rapid clicks coalesce
            }

            async function sendUpdate(index) {
                const u = updates[index];
                if (!u || u.inFlight || u.pendingQty == null) return;

                const qtyToSend = u.pendingQty;
                u.inFlight = true;
                u.pendingQty = null;
                if (u.timer) { clearTimeout(u.timer); u.timer = null; }

                try {
                    const res = await fetch('{{ route("new.cart.update") }}', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: JSON.stringify({ index: Number(index), quantity: Number(qtyToSend) })
                    });
                    const data = await res.json();

                    // Apply authoritative values from server if provided
                    if (data?.success) {

                        const table = document.querySelector(`table.cart-table[data-index="${index}"]`);
                        if (table) {
                            if (typeof data.quantity === 'number') setRowQty(table, data.quantity);
                            if (typeof data.item_subtotal === 'number') {
                                const el = table.querySelector('.subtotal');
                                if (el) el.textContent = data.item_subtotal_formatted ?? fmt(data.item_subtotal);
                            }
                        }
                        if (typeof data.cart_subtotal === 'number') {
                            // prefer server totals if present
                            const subEl = document.getElementById('cartSubtotal');
                            const totEl = document.getElementById('cartTotalnn');
                            if (subEl) subEl.textContent = data.cart_subtotal_formatted ?? fmt(data.cart_subtotal);
                            if (totEl) {
                                const total = (typeof data.cart_total === 'number') ? data.cart_total : (data.cart_subtotal + SHIPPING);
                                totEl.textContent = data.cart_total_formatted ?? fmt(total);
                            }
                        } else {
                            // otherwise recalc locally
                            recalcTotals();
                        }
                        loadCart();
                    }
                } catch (e) {
                    console.error(e);
                } finally {
                    u.inFlight = false;
                    // if user clicked again while request was in-flight, send the latest now
                    if (u.pendingQty != null) sendUpdate(index);
                }
            }

            // ---- event delegation (works even if rows get removed)
            document.addEventListener('click', function (e) {
                // increment
                if (e.target.classList.contains('plus')) {
                    const table = e.target.closest('table.cart-table[data-index]');
                    if (!table) return;
                    const index = table.dataset.index;
                    const current = getRowQty(table);
                    scheduleUpdate(index, current + 1);
                }

                // decrement
                if (e.target.classList.contains('minus')) {
                    const table = e.target.closest('table.cart-table[data-index]');
                    if (!table) return;
                    const index = table.dataset.index;
                    const current = getRowQty(table);
                    if (current > 1) scheduleUpdate(index, current - 1);
                }

                // remove item
                if (e.target.closest('.remove-item')) {
                    const table = e.target.closest('table.cart-table[data-index]');
                    if (!table) return;
                    const index = table.dataset.index;

                    fetch('{{ route("new.cart.remove") }}', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: JSON.stringify({ index: Number(index) })
                    }).then(r => r.json()).then(data => {
                        if (data?.success) {
                            table.remove();
                            if (typeof data.cart_subtotal === 'number') {
                                document.getElementById('cartSubtotal').textContent = data.cart_subtotal_formatted ?? fmt(data.cart_subtotal);
                                const total = (typeof data.cart_total === 'number') ? data.cart_total : (data.cart_subtotal + SHIPPING);
                                document.getElementById('cartTotalnn').innerText = data.cart_total_formatted ?? fmt(total);
                            } else {
                                recalcTotals();
                            }
                            if (!document.querySelector('table.cart-table[data-index]')) {
                                const holder = document.querySelector('.col-xl-8');
                                if (holder) holder.innerHTML = '<p>Your cart is empty.</p>';
                            }
                            loadCart();
                        }
                    }).catch(console.error);
                }
            });

            // sanitize & react to manual edits
            document.addEventListener('input', function (e) {
                if (e.target.matches('input.number')) {
                    e.target.value = e.target.value.replace(/[^\d]/g, '').slice(0, 2);
                }
            });
            document.addEventListener('change', function (e) {
                if (e.target.matches('input.number')) {
                    const table = e.target.closest('table.cart-table[data-index]');
                    if (!table) return;
                    const index = table.dataset.index;
                    let v = parseInt(e.target.value, 10) || 1;
                    if (v < 1) v = 1;
                    scheduleUpdate(index, v);
                }
            });

            // initial totals
            recalcTotals();
        });
    </script>



@endsection