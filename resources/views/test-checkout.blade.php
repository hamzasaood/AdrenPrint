


<section class="billing-detail pb-40">
 <div class="container">
   <div class="row row-gap-4">
    <div class="col-xl-8">
      <h2>Checkout</h2>
     <form action="{{ route('checkout.place') }}" method="POST" id="checkout-form">
        @csrf

        {{-- Billing Details --}}
        <h4>Billing Details</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="billing_name" class="form-control" required>
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                    <path d="M10.5 0C7.59223 0 5.22656 2.36566 5.22656 5.27344C5.22656 8.18121 7.59223 10.5469 10.5 10.5469C13.4078 10.5469 15.7734 8.18121 15.7734 5.27344C15.7734 2.36566 13.4078 0 10.5 0ZM10.5 9.375C8.2384 9.375 6.39844 7.53504 6.39844 5.27344C6.39844 3.01184 8.2384 1.17188 10.5 1.17188C12.7616 1.17188 14.6016 3.01184 14.6016 5.27344C14.6016 7.53504 12.7616 9.375 10.5 9.375Z" fill="#141516"></path>
                    <path d="M17.0612  13.992C15.6174 12.5261 13.7035 11.7188 11.6719 11.7188H9.32812C7.29656 11.7188 5.38258 12.5261 3.93883 13.992C2.50215 15.4507 1.71094 17.3763 1.71094 19.4141C1.71094 19.7377 1.97328 20 2.29688 20H18.7031C19.0267 20 19.2891 19.7377 19.2891 19.4141C19.2891 17.3763 18.4979 15.4507 17.0612 13.992ZM2.90859 18.8281C3.20215 15.5045 5.96918 12.8906 9.32812 12.8906H11.6719C15.0308 12.8906 17.7979 15.5045 18.0914 18.8281H2.90859Z" fill="#141516"></path>
                </svg>
            </div>
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="billing_email" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="billing_phone" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="billing_address" class="form-control" required></textarea>
            </div>
        </div>

        {{-- Shipping Details --}}
        <h4>Shipping Details</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="shipping_name" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="shipping_email" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Phone</label>
                <input type="text" name="shipping_phone" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="shipping_address" class="form-control" required></textarea>
            </div>
        </div>

        {{-- Order Summary --}}
        <h4>Order Summary</h4>
        <ul class="list-group mb-3">
            @php $subtotal = 0; @endphp
            @foreach(session('cart', []) as $item)
                @php 
                    $line = $item['price'] * $item['quantity'];
                    $subtotal += $line;
                @endphp
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['name'] }} (x{{ $item['quantity'] }})
                    <span>${{ number_format($line, 2) }}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <strong>Subtotal</strong> 
                <strong>${{ number_format($subtotal, 2) }}</strong>
            </li>
        </ul>

        {{-- Payment --}}
        <h4>Payment</h4>
        <div class="mb-3">
            <input type="radio" name="payment_method" value="stripe" checked> Pay with Stripe
        </div>

        {{-- Stripe Card Element --}}
        <div id="card-element" class="mb-3"></div>
        <div id="card-errors" class="text-danger mb-3"></div>

        <button type="submit" class="btn btn-primary w-100">Place Order</button>
      </form>
    </div>


    @if(session('cart') && count(session('cart')) > 0)
                       <div class="col-xl-4">
    <div class="title-row title-row-2 mb-16">
        <h5 class="medium-black">Order Summary</h5>
    </div>
    <div class="summary-container bg-white">

        {{-- Cart Items --}}
        @php $subtotal = 0; @endphp
        @foreach(session('cart') as $index => $item)
            @php 
                
                $lineTotal = $item['price'] * $item['quantity'];
                $subtotal += $lineTotal;
            @endphp

            <div class="item-container mb-16">
                <div class="left-box d-flex align-items-center gap-16">
                    <div class="icon-box">
                        @if(!empty($item['design_preview']))
                                                <img src="{{ $item['design_preview'] }}" alt="Design" style="max-width:65px; border:1px solid #ddd; cursor:pointer;" onclick="openModal('{{ $item['design_preview'] }}')">
                                            @else
                                                <img src="{{asset('/images/'.$item['image']) ?? 'assets/media/products/nav-image-1.png' }}" alt="">
                                            @endif
                    </div>
                    <span class="h6 medium-black">
                        {{ $item['name'] }} x {{ $item['quantity'] }}
                    </span>
                </div>
                <div class="right-box">
                    <p class="light-gray">${{ number_format($lineTotal, 2) }}</p>
                </div>
            </div>
            <div class="hr-line mb-16"></div>
        @endforeach

        {{-- Coupon --}}
        <div class="input-block mb-32">
            <input type="text" name="coupon" class="form-control form-control-2" id="codeCp" placeholder="Coupon Code">
            <button type="button" class="cus-btn">Apply Now</button>
        </div>

        {{-- Totals --}}
        <div class="d-flex align-items-center justify-content-between mb-16">
            <h6 class="medium-black">Subtotal</h6>
            <h6 class="light-gray">${{ number_format($subtotal, 2) }}</h6>
        </div>
        <div class="hr-line mb-16"></div>
        
        <div class="d-flex align-items-center justify-content-between mb-16">
            <h6 class="medium-black">Standard Delivery</h6>
            <h6 class="light-gray">$5.00</h6>
        </div>
        <div class="hr-line mb-16"></div>
        
        <div class="d-flex align-items-center justify-content-between mb-16">
            <h6 class="medium-black">Coupon Discount</h6>
            <h6 class="light-gray">-$5.00</h6>
        </div>
        <div class="hr-line mb-16"></div>
        
        <div class="d-flex align-items-center justify-content-between mb-16">
            <h5 class="color-primary">TOTAL</h5>
            <h5 class="color-primary">${{ number_format($subtotal + 5 - 5, 2) }}</h5>
        </div>
        <div class="hr-line mb-16"></div>

        {{-- Terms --}}
        <p class="light-gray mb-16">
            Your personal data will be used to process your order, support your experience throughout this website,
            and for other purposes described in our <span class="color-primary">privacy policy.</span>
        </p>
        <div class="col-md-12">
            <div class="cus-checkBox mb-32">
                <input type="checkbox" id="terms">
                <label for="terms">I have read and agree to the website terms and conditions</label>
            </div>
        </div>

        {{-- Checkout Button --}}
        <a href="#" class="cus-btn active-btn">Proceed to Checkout</a>
    </div>
</div>

@endif


 </div>





  </div>
</section>