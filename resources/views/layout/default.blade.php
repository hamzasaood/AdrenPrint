<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from uiparadox.co.uk/templates/print-hive/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 12:08:42 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ArdensPrint">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Adren's Print</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/media/logo.gif')}}">

    <!-- All CSS files -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/slick-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/wow.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom-style.css')}}">


    
    <style>
        .bg-color-primary {
            background: #1f993d;
        }
    

        h2{
            font-size: 32px !important;
        }
        h4{
                font-size: 24px;
        }
        h3{
            font-size:28px;
        }


        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .main-menu__list>li>a.active,
        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .stricky-header .main-menu__list>li>a.active,
        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .main-menu__list>li>a:hover,
        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .stricky-header .main-menu__list>li>a:hover {
            color: #1f993d !important;
        }

        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .main-menu__list li ul li.current>a,
        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .main-menu__list li ul li:hover>a,
        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .stricky-header .main-menu__list li ul li.current>a,
        header .header-section .header-center .navigation .menu-button-right .main-menu__nav .stricky-header .main-menu__list li ul li:hover>a {
            background-color: #1f993d;
            color: #FAFAFA;
        }

        .btn-primary-custom {
            background: #111;
            color: #fff;
            border-radius: 30px;
            padding: 10px 22px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            background: #dea928;
            color: #111;
        }
    </style>


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



        .cart-button {
            position: relative;
        }

        .cart-count-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: red;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 2px 6px;
            border-radius: 50%;
            line-height: 1;
            min-width: 18px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Cursor Style -->
    <div id="cursor"></div>
    <div id="cursor-border"></div>
    <!-- Cursor Style -->

    <!-- Preloader -->
    <div id="preloader">
        <div>
            <div class="loader"></div>
        </div>
    </div>



    <!-- Preloader -->

    <!-- Main Wrapper Start -->
    <div id="scroll-container" class="main-wrapper">

        @include('layout.header')
        <main class="main-wrapper">


            @yield('content')




            @include('layout.footer')
        </main>

    </div>
    <!-- Main Wrapper End -->

    <!-- Back To Top Start -->
    <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>


    <!-- Mobile Menu Start -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="index-2.html" aria-label="logo image"><img src="{{asset('assets/media/logo.png')}}" alt=""></a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:example@company.com">example@company.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+12345678">+123 (4567) -890</a>
                </li>
            </ul>
            <div class="mobile-nav__social">
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- Mobile Menu End -->

    <!-- Shopping Cart Popup Start -->
    <aside id="sidebar-cart">
        <div class="title-cart-block mb-32 bg-lightest-gray d-flex justify-content-between">
            <h6 class="fw-500 black">Shopping Cart (<span class="cart-count">0</span>)</h6>
            <a href="javascript:;" class="close-button close-popup"><span class="close-icon">X</span></a>
        </div>

        <!-- Dynamic Cart Items -->
        <ul class="product-list p-24" id="cartItems"></ul>

        <div class="price-total p-24 d-flex justify-content-between">
            <span class="h6 fw-600 medium-black">SUBTOTAL</span>
            <span class="h6 fw-600 medium-black" id="cartTotal"></span>
        </div>

        <div class="hr-line mb-24"></div>
        <div class="row p-24">
            <div class="col-lg-6">
                <a href="{{ url('/cart') }}" class="cus-btn w-100 text-center">View Cart</a>
            </div>
            <div class="col-lg-6">
                <a href="{{ url('/checkout') }}" class="cus-btn btn-sec w-100 text-center">Checkout</a>
            </div>
        </div>
    </aside>
    <div id="sidebar-cart-curtain" class="close-popup"></div>
    <!-- Shopping Cart Popup End -->


    <!-- Modal -->
    <div class="modal fade" id="productQuickView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="shop-detail">
                        <div class="detail-wrapper">
                            <div class="row row-gap-4">
                                <div class="col-lg-6">
                                    <div class="quick-image-box">
                                        <img id="modalProductImage" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-text-container bg-white br-20">
                                        <div class="close-content text-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <h4 class="fw-600 black mb-16" id="modalProductName"></h4>
                                        <div class="d-flex align-items-center flex-wrap gap-8 mb-16">
                                            <h6 class="color-star">★★★★★</h6>
                                            <p class="dark-gray subtitle">(02 Customer Reviews) </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-24">
                                            <div class="d-flex align-items-center gap-16">
                                                <h5 class="fw-600 color-primary" id="modalProductSalePrice"></h5>
                                                <p class="fw-500" id="modalProductRegularPrice"></p>
                                            </div>
                                        </div>
                                        <p class="mb-24" id="modalProductDescription">
                                            The Clean Wave Washing Machine Automatic Washing Machine is engineered to
                                            make laundry effortless with its advanced
                                            cleaning technology. Featuring multiple wash cycles, water level sensors,
                                            and a quiet motor...
                                        </p>
                                        <p class="subtitle color-primary mb-24" id="modalProductStock"> in stock, ready
                                            to ship</p>
                                        <div class="function-bar mb-24">
                                            <div class="quantity quantity-wrap">
                                                <div class="input-area quantity-wrap quantity-modal">
                                                    <button class="minus" type="button">-</button>
                                                    <input type="number" name="quantity" value="1" id="modal-quantity"
                                                        data-index="" maxlength="2" size="1" step="1" min="1" max="5"
                                                        class="number">
                                                    <button class="plus" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-12 mb-24">
                                            <p class="fw-600 black">Subtotal:</p>
                                            <p id="modalProducttotalPrice"></p>
                                        </div>
                                        <div class="row mb-24 row-gap-2">
                                            <div class="col-md-6" id="cart">
                                                <a id="modalCartBtn" class="cus-btn w-100 text-center modalCartBtn">Add
                                                    to cart</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="#" class="cus-btn w-100 text-center btn-sec">Buy it now</a>
                                            </div>




                                        </div>
                                        <div class="row mb-24 row-gap-2">


                                            <div class="col-md-6" id="designmodal">
                                                <a id="modaldesignbtn" href=""
                                                    class="cus-btn w-100 text-center btn-sec">Design</a>
                                            </div>


                                        </div>
                                        <div class="d-sm-flex d-none align-items-center gap-12 mb-16">
                                            <p class="fw-600 black">SKU:</p>
                                            <p>AF-001-KT</p>
                                        </div>
                                        <div class="d-sm-flex d-none align-items-center gap-12 mb-16">
                                            <p class="fw-600 black">Category:</p>
                                            <p id="modalProductCategory">Bicycle</p>
                                        </div>
                                        <div class="d-sm-flex d-none align-items-center gap-12 mb-16">
                                            <p class="fw-600 black">Free Shipping:</p>
                                            <p>Free shipping on orders over $1600.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="comparepopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog compare-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="zui-wrapper">
                        <div class="close-content text-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="container" class="zui-scroller">
                            <table class="zui-table">
                                <thead>
                                    <tr>
                                        <th class="zui-sticky-col">&nbsp;</th>
                                        <th id="product-col" class="table-col">
                                            <img class="product-img mb-16"
                                                src="{{asset('assets/media/products/product-1.png')}}" alt="">
                                            <span class="h6">
                                                <a href="#" class="product-link">Classic Printed Caps
                                                </a>
                                            </span>
                                        </th>
                                        <th class="table-col">
                                            <img class="product-img mb-16"
                                                src="{{asset('assets/media/products/product-2.png')}}" alt="">
                                            <span class="h6">
                                                <a href="#" class="product-link">Custom Color Mug
                                                </a>
                                            </span>
                                        </th>
                                        <th class="table-col">
                                            <img class="product-img mb-16"
                                                src="{{asset('assets/media/products/product-3.png')}}" alt="">
                                            <span class="h6">
                                                <a href="#" class="product-link">High-Quality Booklets
                                                </a>
                                            </span>
                                        </th>
                                        <th class="table-col">
                                            <img class="product-img mb-16"
                                                src="{{asset('assets/media/products/product-4.png')}}" alt="">
                                            <span class="h6">
                                                <a href="#" class="product-link">Cosmetic Sachet
                                                </a>
                                            </span>
                                        </th>
                                        <th class="table-col">
                                            <img class="product-img mb-16"
                                                src="{{asset('assets/media/products/product-5.png')}}" alt="">
                                            <span class="h6">
                                                <a href="#" class="product-link">Classic Printed Caps</a>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="zui-sticky-col">Price</td>
                                        <td class="text-center"><strong>$2500.00</strong></td>
                                        <td class="text-center"><strong>$2400.00</strong></td>
                                        <td class="text-center"><strong>$3600.00</strong></td>
                                        <td class="text-center"><strong>$2500.00</strong></td>
                                        <td class="text-center"><strong>$2150.00</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="zui-sticky-col zui-stripe-row">Description</td>
                                        <td>AS4500</td>
                                        <td>AS8500</td>
                                        <td>AS6000</td>
                                        <td>AS4600</td>
                                        <td>AS1000</td>
                                    </tr>
                                    <tr>
                                        <td class="zui-sticky-col">Storage</td>
                                        <td>up to 16 samples</td>
                                        <td>up to 48 samples</td>
                                        <td>up to 16 samples</td>
                                        <td>up to 16 samples</td>
                                        <td>up to 32 samples</td>
                                    </tr>
                                    <tr>
                                        <td class="zui-sticky-col zui-stripe-row">SKU</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-plus-circle"></i>Optional</td>
                                        <td><i class="far fa-times-circle"></i>Not Available</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                    </tr>
                                    <tr>
                                        <td class="zui-sticky-col">Availablity</td>
                                        <td><i class="far fa-plus-circle"></i>Optional</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                    </tr>
                                    <tr>
                                        <td class="zui-sticky-col zui-stripe-row">Weight</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                    </tr>
                                    <tr>
                                        <td class="zui-sticky-col">Dimensions</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                    </tr>
                                    <tr>
                                        <td class="zui-sticky-col zui-stripe-row">Colors
                                        </td>
                                        <td><i class="far fa-times-circle"></i>Not Available</td>
                                        <td><i class="far fa-check-circle"></i>Included</td>
                                        <td><i class="far fa-times-circle"></i>Not Available</td>
                                        <td><i class="far fa-times-circle"></i>Not Available</td>
                                        <td><i class="far fa-times-circle"></i>Not Available</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal-popup area Start  -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here...">
                <button type="submit"><i class="fal fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- search-popup end-->


    <!-- Jquery Js -->
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/wow.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>


    function updateCartCount(count) {
        $(".cart-count-badge").text(count);
    }


    $(document).ready(function () {





        $(".modalCartBtn").on("click", function (e) {
            e.preventDefault();

            console.log("Modal Cart Button Clicked");
            let productId = $(this).data("product-id"); // get product id from button attribute
            let quantity = $("#modal-quantity").val() || 1; // get quantity from modal input
            let design_json = $("#design_json").val() || null; // hidden input (if any)
            let preview = $("#preview").val() || null; // hidden input (if any)

            console.log("Product ID:", productId);
            addToCart(productId, quantity, design_json, preview);
            $(this).removeData("product-id");
            //$("#modal-quantity").val(1);
        });











        // Load cart and render sidebar

        // Add to Cart
        // Bind click event to modal Add to Cart button


        // Reusable function
        function addToCart(productId, quantity = 1, design_json = null, preview = null) {
            var unitprice = $("#variant-price-value").text().trim('$');

            console.log('unitprice', unitprice);
            var size = $("input[name='size']:checked").val() || null;
            var color = $("input[name='color']:checked").val() || null;
            $.post("{{ route('cart.add') }}", {
                _token: "{{ csrf_token() }}",
                product_id: productId,
                quantity: quantity,
                design_json: design_json,
                preview: preview,
                size: size ? size : null,
                color: color ? color : null,
                variant_price_value: unitprice ? unitprice : null,
            }, function (response) {
                if (response.success) {
                    loadCart();
                    $("#sidebar-cart, #sidebar-cart-curtain").addClass("active"); // open sidebar
                    $("#productQuickView").modal('hide'); // close modal
                    document.getElementById("sidebar-cart").style.right = "0%";
                    updateCartCount(response.cart_count); // update cart count in header
                    Swal.fire({
                        title: "🎉 Added Successfully!",
                        text: "Your item has been added to the cart.",
                        icon: "success",

                    });
                } else {
                    
                    Swal.fire({
                        title: "❌ Error!",
                        text: response.message || "Something went wrong!",
                        icon: "error"
                    });
                }
            }).fail(function (xhr) {
                // Laravel returns JSON {message: "Unauthenticated."} with 401 status
                if (xhr.status === 401 || (xhr.responseJSON && xhr.responseJSON.message === "Unauthenticated.")) {
                    Swal.fire({
                        title: "❌",
                        text: "Please login to continue!",
                        icon: "error",
                        confirmButtonText: "Login"
                    }).then(() => {
                        window.location.href = "{{ route('login') }}"; // 👈 redirect to login
                    });
                    return;
                }

                Swal.fire({
                    title: "❌ Error!",
                    text: "Failed to add to cart. Please try again.",
                    icon: "error"
                });
            });
        }




        // Auto-load cart when page loads
        // 
        loadCart();

    });



    function loadCart() {
        $.get("{{ route('cart.show') }}", function (response) {
            let cartHTML = '';
            var total = 0.00;

            console.log(response); // debug
            console.log(response.cart);

            // Ensure we can loop through cart items (array or object)
            Object.values(response.cart).forEach((item, index) => {
                let name = '';
                let imgSrc = '';

                let itemTotal = 0.00;



                // 🟢 Check if gangsheet item


                if (item.type == 'gangsheet') {
                    // Additional HTML for gangsheet items
                    name = item.design_name || 'Unnamed Gangsheet';
                    imgSrc = item.preview || 'https://via.placeholder.com/60x60?text=No+Image';
                    itemTotal = item.price * item.quantity;
                    total += itemTotal;
                }
                else if (item.type == 'dtf') {
                    name = item.name || 'Unnamed Item';
                    imgSrc = `${item.artwork}` || 'https://via.placeholder.com/60x60?text=No+Image';
                    itemTotal = item.price * item.quantity;
                    total += itemTotal;

                }
                else if (item.type == 'dtf-gangsheet-upload') {
                    name = item.name || 'Unnamed Item';
                    imgSrc = `${item.artwork}` || 'https://via.placeholder.com/60x60?text=No+Image';
                    itemTotal = item.price * item.quantity;
                    total += itemTotal;

                }
                else if(item.type=='pod')
                {
                    name = item.name || 'Unnamed Item';
                    imgSrc = `${item.design_preview}` || 'https://via.placeholder.com/60x60?text=No+Image';
                    itemTotal = item.price * item.quantity;
                total += itemTotal;

                }
                
                else {

                    name = item.name || 'Unnamed Item';
                    if(item.image && item.image.startsWith('http')) {
                        imgSrc = item.image; // full URL
                    } else {
                        imgSrc = `/images/${item.image}` || 'https://via.placeholder.com/60x60?text=No+Image';
                    }
                    
                    itemTotal = item.price * item.quantity;
                    total += itemTotal;
                }

                cartHTML += `
            <li class="product-item mb-24">
                <div class="d-flex align-items-center gap-12">
                    <div class="item-image">
                        <img src="${imgSrc}" alt="${name}" width="60" style="border:1px solid #ddd; border-radius:4px;">
                    </div>
                    <div class="prod-title">
                        <span class="fw-600 black mb-8">${name}</span>
                        <p class="subtitle mb-4p">Quantity: ${item.quantity}</p>
                        <p class="subtitle">$${itemTotal.toFixed(2)}</p>
                    </div>
                </div>
                <div class="text-end">
                    <a href="javascript:;" class="cancel mb-12" onclick="deleteCart(${index})">
                        <img src="/assets/media/icons/cancel.png" alt="">
                    </a>
                    <div class="quantity quantity-wrap">
                        <div class="input-area quantity-wrap">
                            <input class="decrement" type="button" value="-" onclick="updateCart(${index}, ${item.quantity - 1})">
                            <input type="text" value="${item.quantity}" class="number" onchange="updateCart(${index}, this.value)">
                            <input class="increment" type="button" value="+" onclick="updateCart(${index}, ${+item.quantity + 1})">
                        </div>
                    </div>
                </div>
            </li>
            <li class="hr-line mb-24"></li>`;
            });

            console.log("total:", total);
            console.log("Cart total raw:", total, typeof total);


            $("#cartItems").html(cartHTML || "<p class='p-24'>Cart is empty.</p>");
            $("#cartTotal").text("$" + total.toFixed(2));

            // cart count safe (array or object)
            let count = Object.keys(response.cart).length;
            updateCartCount(count);
            $(".cart-count").text(count);
        });
    }



    // Update Cart Quantity
    function updateCart(index, quantity) {
        if (quantity < 1) return;
        $.post("{{ route('cart.update') }}", {
            _token: "{{ csrf_token() }}",
            index: index,
            quantity: quantity
        }, function (response) {
            loadCart();
            updateCartCount(response.cart_count);
        });
    }

    // Delete Cart Item
    function deleteCart(index) {
        $.ajax({
            url: "/cart/delete/" + index,
            type: "DELETE",
            data: { _token: "{{ csrf_token() }}" },
            success: function (response) {
                loadCart();
                updateCartCount(response.cart_count);
            }
        });
    }

</script>
<!-- Mirrored from uiparadox.co.uk/templates/print-hive/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jul 2025 12:08:42 GMT -->

</html>