@extends('layout.default')

@section('content')




            <!-- TITLE BANNER START -->
             <section>
        <div class="hero-img d-flex align-items-center">
            <div class="text-center site-container my-5">
                <h1 class="font-jost fw-bold text-dark">Checkout</h1>
            </div>
        </div>
    </section>
            <!-- TITLE BANNER END -->

            <!-- Customer Container Start -->
           
            <!-- Customer Container End -->
    
            <!-- Billing Details Start -->
            <section class="billing-detail pb-40 my-5">
                <div class="container">
                    <form action="" method="post" class="contact-form" id="checkout-form">
                        @csrf
                        <div class="row row-gap-4">

                        <div class="col-xl-8">
                            <div class="title-row title-row-2 bg-white mb-16">
                                <h5 class="medium-black">Billing Details</h5>
                            </div>
                            <div class="billing-wrapper bg-white br-10 mb-40">
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-block mb-16">
                                                <input type="text" name="billing_name" id="name" class="form-control" placeholder="Name">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                    <path
                                                        d="M10.5 0C7.59223 0 5.22656 2.36566 5.22656 5.27344C5.22656 8.18121 7.59223 10.5469 10.5 10.5469C13.4078 10.5469 15.7734 8.18121 15.7734 5.27344C15.7734 2.36566 13.4078 0 10.5 0ZM10.5 9.375C8.2384 9.375 6.39844 7.53504 6.39844 5.27344C6.39844 3.01184 8.2384 1.17188 10.5 1.17188C12.7616 1.17188 14.6016 3.01184 14.6016 5.27344C14.6016 7.53504 12.7616 9.375 10.5 9.375Z"
                                                        fill="#141516" />
                                                    <path
                                                        d="M17.0612  13.992C15.6174 12.5261 13.7035 11.7188 11.6719 11.7188H9.32812C7.29656 11.7188 5.38258 12.5261 3.93883 13.992C2.50215 15.4507 1.71094 17.3763 1.71094 19.4141C1.71094 19.7377 1.97328 20 2.29688 20H18.7031C19.0267 20 19.2891 19.7377 19.2891 19.4141C19.2891 17.3763 18.4979 15.4507 17.0612 13.992ZM2.90859 18.8281C3.20215 15.5045 5.96918 12.8906 9.32812 12.8906H11.6719C15.0308 12.8906 17.7979 15.5045 18.0914 18.8281H2.90859Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="input-block mb-16">
                                                <input type="email" name="billing_email" id="e-mail" class="form-control" placeholder="Email Address">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                        <path
                                                            d="M18.7422 2.96875H2.25781C1.2866 2.96875 0.5 3.76023 0.5 4.72656V15.2734C0.5 16.2455 1.29238 17.0312 2.25781 17.0312H18.7422C19.7053 17.0312 20.5 16.2488 20.5 15.2734V4.72656C20.5 3.76195 19.7165 2.96875 18.7422 2.96875ZM18.496 4.14062C18.1369 4.49785 11.9564 10.6458 11.743 10.8581C11.4109 11.1901 10.9695 11.3729 10.5 11.3729C10.0305 11.3729 9.58906 11.1901 9.25594 10.857C9.11242 10.7142 3.00012 4.63414 2.50398 4.14062H18.496ZM1.67188 15.0349V4.96582L6.73586 10.0031L1.67188 15.0349ZM2.50473 15.8594L7.56672 10.8296L8.4284 11.6867C8.98176 12.2401 9.71746 12.5448 10.5 12.5448C11.2825 12.5448 12.0182 12.2401 12.5705 11.6878L13.4333 10.8296L18.4953 15.8594H2.50473ZM19.3281 15.0349L14.2641 10.0031L19.3281 4.96582V15.0349Z"
                                                            fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-block mb-16">
                                                <input type="tel" name="billing_phone" id="phoneNumber" class="form-control" placeholder="Phone Number">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M16.2509 15.5304L15.8338 14.8339C15.0836 13.5971 14.0484 12.1776 12.6904 12.1776C12.4389 12.1776 12.1897 12.2282 11.9431 12.3307L11.2142 12.6432C11.1477 12.6708 11.083 12.7022 11.0145 12.7355C10.828 12.8262 10.6165 12.929 10.3989 12.929C9.86217 12.929 9.2403 12.2305 8.64811 10.9623C8.06692 9.71762 8.10399 9.06508 8.23741 8.73673C8.38462 8.37447 8.72695 8.21959 9.09471 8.08041C9.14585 8.06101 9.19204 8.04342 9.23696 8.02493L9.97501 7.71418C11.8978 6.9101 11.1825 4.10014 10.948 3.17889L10.7491 2.3868C10.579 1.734 10.1282 0 8.63277 0C8.35594 0 8.06061 0.064496 7.75527 0.191774C7.55492 0.271334 4.79792 1.39672 3.79909 3.37382C2.60532 5.72716 2.82605 8.88296 4.45451 12.7515C6.07079 16.625 8.16669 18.9942 10.684 19.7933C11.1158 19.9305 11.6038 19.9999 12.1346 19.9999H12.1349C13.8721 19.9999 15.587 19.2608 15.7262 19.1994C16.3251 18.9457 16.7123 18.5601 16.8768 18.0532C17.1557 17.1937 16.6878 16.2519 16.2509 15.5304ZM15.5897 17.6356C15.5514 17.7534 15.4185 17.8609 15.1948 17.9551C15.1911 17.9567 15.1866 17.9586 15.1828 17.9603C15.1673 17.9672 13.615 18.647 12.1345 18.6469C11.7428 18.6469 11.3926 18.5988 11.0935 18.5037C8.97266 17.8305 7.1592 15.72 5.70231 12.2286C4.23459 8.7416 4.00006 5.96837 5.0062 3.98495C5.78746 2.43858 8.23335 1.45761 8.25734 1.44823C8.26221 1.44625 8.26699 1.44435 8.27177 1.44237C8.41105 1.38391 8.53589 1.35306 8.63277 1.35306C8.9309 1.35306 9.20223 1.81545 9.43803 2.72173L9.63602 3.51048C10.0632 5.18828 9.99819 6.23772 9.45129 6.46647L8.71675 6.77587C8.68753 6.78796 8.65334 6.80068 8.61563 6.81502C8.20989 6.96864 7.36558 7.28814 6.98375 8.22735C6.63727 9.0796 6.7807 10.1615 7.42178 11.535C8.28521 13.3835 9.25897 14.2821 10.3987 14.2821C10.9277 14.2821 11.3523 14.0757 11.6059 13.9525C11.6526 13.9298 11.6944 13.909 11.7393 13.8904L12.4693 13.5774C12.5446 13.546 12.6169 13.5307 12.6903 13.5307C13.0417 13.5307 13.6717 13.8786 14.6749 15.5325L15.0918 16.2285C15.6055 17.0767 15.6461 17.4618 15.5897 17.6356Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-block mb-16">
                                                <input type="text" name="billing_address" id="location" class="form-control" placeholder="Your Address House or Street Name">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M9.51246 19.7391C9.62113 19.9021 9.8041 20 10 20C10.1959 20 10.3789 19.9021 10.4875 19.7391C11.8742 17.6591 13.9167 15.0903 15.34 12.4778C16.478 10.3889 17.0312 8.60727 17.0312 7.03125C17.0312 3.15422 13.877 0 10 0C6.12297 0 2.96875 3.15422 2.96875 7.03125C2.96875 8.60727 3.52199 10.3889 4.66004 12.4778C6.08227 15.0883 8.12863 17.6634 9.51246 19.7391ZM10 1.17188C13.2309 1.17188 15.8594 3.80039 15.8594 7.03125C15.8594 8.40641 15.3529 10.0046 14.3109 11.9171C13.0841 14.1691 11.3334 16.4534 10 18.3738C8.66684 16.4537 6.91602 14.1692 5.6891 11.9171C4.64715 10.0046 4.14062 8.40641 4.14062 7.03125C4.14062 3.80039 6.76914 1.17188 10 1.17188Z"
                                                        fill="#141516" />
                                                    <path
                                                        d="M10 10.5469C11.9385 10.5469 13.5156 8.96977 13.5156 7.03125C13.5156 5.09273 11.9385 3.51562 10 3.51562C8.06148 3.51562 6.48438 5.09273 6.48438 7.03125C6.48438 8.96977 8.06148 10.5469 10 10.5469ZM10 4.6875C11.2923 4.6875 12.3438 5.73891 12.3438 7.03125C12.3438 8.32359 11.2923 9.375 10 9.375C8.70766 9.375 7.65625 8.32359 7.65625 7.03125C7.65625 5.73891 8.70766 4.6875 10 4.6875Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                       
                                        
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="input-block mb-16">
                                                <input type="text" name="billing_postal_code" id="zip" class="form-control" placeholder="Postcode / Zip">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M9.51246 19.7391C9.62113 19.9021 9.8041 20 10 20C10.1959 20 10.3789 19.9021 10.4875 19.7391C11.8742 17.6591 13.9167 15.0903 15.34 12.4778C16.478 10.3889 17.0312 8.60727 17.0312 7.03125C17.0312 3.15422 13.877 0 10 0C6.12297 0 2.96875 3.15422 2.96875 7.03125C2.96875 8.60727 3.52199 10.3889 4.66004 12.4778C6.08227 15.0883 8.12863 17.6634 9.51246 19.7391ZM10 1.17188C13.2309 1.17188 15.8594 3.80039 15.8594 7.03125C15.8594 8.40641 15.3529 10.0046 14.3109 11.9171C13.0841 14.1691 11.3334 16.4534 10 18.3738C8.66684 16.4537 6.91602 14.1692 5.6891 11.9171C4.64715 10.0046 4.14062 8.40641 4.14062 7.03125C4.14062 3.80039 6.76914 1.17188 10 1.17188Z"
                                                        fill="#141516" />
                                                    <path
                                                        d="M10 10.5469C11.9385 10.5469 13.5156 8.96977 13.5156 7.03125C13.5156 5.09273 11.9385 3.51562 10 3.51562C8.06148 3.51562 6.48438 5.09273 6.48438 7.03125C6.48438 8.96977 8.06148 10.5469 10 10.5469ZM10 4.6875C11.2923 4.6875 12.3438 5.73891 12.3438 7.03125C12.3438 8.32359 11.2923 9.375 10 9.375C8.70766 9.375 7.65625 8.32359 7.65625 7.03125C7.65625 5.73891 8.70766 4.6875 10 4.6875Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="cus-checkBox ship-address mb-32">
                                                <input type="checkbox" id="shipAddress">
                                                <label for="shipAddress" class="fw-500">Ship to a diffrent address?</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <div class="input-block">
                                                <label for="textbox" class="fw-500 mb-16">Order notes (optional)</label>
                                                <textarea name="textarea" id="textbox" cols="8" rows="5" class="form-control" placeholder="Note About Your Order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>


                                        
                                    </div>
                                

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-block mb-16">
                                                <input type="text" name="shipping_name" id="name1" class="form-control" placeholder="First Name">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                    <path
                                                        d="M10.5 0C7.59223 0 5.22656 2.36566 5.22656 5.27344C5.22656 8.18121 7.59223 10.5469 10.5 10.5469C13.4078 10.5469 15.7734 8.18121 15.7734 5.27344C15.7734 2.36566 13.4078 0 10.5 0ZM10.5 9.375C8.2384 9.375 6.39844 7.53504 6.39844 5.27344C6.39844 3.01184 8.2384 1.17188 10.5 1.17188C12.7616 1.17188 14.6016 3.01184 14.6016 5.27344C14.6016 7.53504 12.7616 9.375 10.5 9.375Z"
                                                        fill="#141516" />
                                                    <path
                                                        d="M17.0612  13.992C15.6174 12.5261 13.7035 11.7188 11.6719 11.7188H9.32812C7.29656 11.7188 5.38258 12.5261 3.93883 13.992C2.50215 15.4507 1.71094 17.3763 1.71094 19.4141C1.71094 19.7377 1.97328 20 2.29688 20H18.7031C19.0267 20 19.2891 19.7377 19.2891 19.4141C19.2891 17.3763 18.4979 15.4507 17.0612 13.992ZM2.90859 18.8281C3.20215 15.5045 5.96918 12.8906 9.32812 12.8906H11.6719C15.0308 12.8906 17.7979 15.5045 18.0914 18.8281H2.90859Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="input-block mb-16">
                                                <input type="email" name="shipping_email" id="e-mail2" class="form-control" placeholder="Email Address">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                    <g clip-path="url(#clip0_7968_53870)">
                                                        <path
                                                            d="M18.7422 2.96875H2.25781C1.2866 2.96875 0.5 3.76023 0.5 4.72656V15.2734C0.5 16.2455 1.29238 17.0312 2.25781 17.0312H18.7422C19.7053 17.0312 20.5 16.2488 20.5 15.2734V4.72656C20.5 3.76195 19.7165 2.96875 18.7422 2.96875ZM18.496 4.14062C18.1369 4.49785 11.9564 10.6458 11.743 10.8581C11.4109 11.1901 10.9695 11.3729 10.5 11.3729C10.0305 11.3729 9.58906 11.1901 9.25594 10.857C9.11242 10.7142 3.00012 4.63414 2.50398 4.14062H18.496ZM1.67188 15.0349V4.96582L6.73586 10.0031L1.67188 15.0349ZM2.50473 15.8594L7.56672 10.8296L8.4284 11.6867C8.98176 12.2401 9.71746 12.5448 10.5 12.5448C11.2825 12.5448 12.0182 12.2401 12.5705 11.6878L13.4333 10.8296L18.4953 15.8594H2.50473ZM19.3281 15.0349L14.2641 10.0031L19.3281 4.96582V15.0349Z"
                                                            fill="#141516" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_7968_51579">
                                                            <rect width="20" height="20" fill="white" transform="translate(0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-block mb-16">
                                                <input type="tel" name="shipping_phone" id="phoneNumber2" class="form-control" placeholder="Phone Number">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M16.2509 15.5304L15.8338 14.8339C15.0836 13.5971 14.0484 12.1776 12.6904 12.1776C12.4389 12.1776 12.1897 12.2282 11.9431 12.3307L11.2142 12.6432C11.1477 12.6708 11.083 12.7022 11.0145 12.7355C10.828 12.8262 10.6165 12.929 10.3989 12.929C9.86217 12.929 9.2403 12.2305 8.64811 10.9623C8.06692 9.71762 8.10399 9.06508 8.23741 8.73673C8.38462 8.37447 8.72695 8.21959 9.09471 8.08041C9.14585 8.06101 9.19204 8.04342 9.23696 8.02493L9.97501 7.71418C11.8978 6.9101 11.1825 4.10014 10.948 3.17889L10.7491 2.3868C10.579 1.734 10.1282 0 8.63277 0C8.35594 0 8.06061 0.064496 7.75527 0.191774C7.55492 0.271334 4.79792 1.39672 3.79909 3.37382C2.60532 5.72716 2.82605 8.88296 4.45451 12.7515C6.07079 16.625 8.16669 18.9942 10.684 19.7933C11.1158 19.9305 11.6038 19.9999 12.1346 19.9999H12.1349C13.8721 19.9999 15.587 19.2608 15.7262 19.1994C16.3251 18.9457 16.7123 18.5601 16.8768 18.0532C17.1557 17.1937 16.6878 16.2519 16.2509 15.5304ZM15.5897 17.6356C15.5514 17.7534 15.4185 17.8609 15.1948 17.9551C15.1911 17.9567 15.1866 17.9586 15.1828 17.9603C15.1673 17.9672 13.615 18.647 12.1345 18.6469C11.7428 18.6469 11.3926 18.5988 11.0935 18.5037C8.97266 17.8305 7.1592 15.72 5.70231 12.2286C4.23459 8.7416 4.00006 5.96837 5.0062 3.98495C5.78746 2.43858 8.23335 1.45761 8.25734 1.44823C8.26221 1.44625 8.26699 1.44435 8.27177 1.44237C8.41105 1.38391 8.53589 1.35306 8.63277 1.35306C8.9309 1.35306 9.20223 1.81545 9.43803 2.72173L9.63602 3.51048C10.0632 5.18828 9.99819 6.23772 9.45129 6.46647L8.71675 6.77587C8.68753 6.78796 8.65334 6.80068 8.61563 6.81502C8.20989 6.96864 7.36558 7.28814 6.98375 8.22735C6.63727 9.0796 6.7807 10.1615 7.42178 11.535C8.28521 13.3835 9.25897 14.2821 10.3987 14.2821C10.9277 14.2821 11.3523 14.0757 11.6059 13.9525C11.6526 13.9298 11.6944 13.909 11.7393 13.8904L12.4693 13.5774C12.5446 13.546 12.6169 13.5307 12.6903 13.5307C13.0417 13.5307 13.6717 13.8786 14.6749 15.5325L15.0918 16.2285C15.6055 17.0767 15.6461 17.4618 15.5897 17.6356Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-block mb-16">
                                                <input type="text" name="shipping_address" id="location2" class="form-control" placeholder="Your Address House or Street Name">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M9.51246 19.7391C9.62113 19.9021 9.8041 20 10 20C10.1959 20 10.3789 19.9021 10.4875 19.7391C11.8742 17.6591 13.9167 15.0903 15.34 12.4778C16.478 10.3889 17.0312 8.60727 17.0312 7.03125C17.0312 3.15422 13.877 0 10 0C6.12297 0 2.96875 3.15422 2.96875 7.03125C2.96875 8.60727 3.52199 10.3889 4.66004 12.4778C6.08227 15.0883 8.12863 17.6634 9.51246 19.7391ZM10 1.17188C13.2309 1.17188 15.8594 3.80039 15.8594 7.03125C15.8594 8.40641 15.3529 10.0046 14.3109 11.9171C13.0841 14.1691 11.3334 16.4534 10 18.3738C8.66684 16.4537 6.91602 14.1692 5.6891 11.9171C4.64715 10.0046 4.14062 8.40641 4.14062 7.03125C4.14062 3.80039 6.76914 1.17188 10 1.17188Z"
                                                        fill="#141516" />
                                                    <path
                                                        d="M10 10.5469C11.9385 10.5469 13.5156 8.96977 13.5156 7.03125C13.5156 5.09273 11.9385 3.51562 10 3.51562C8.06148 3.51562 6.48438 5.09273 6.48438 7.03125C6.48438 8.96977 8.06148 10.5469 10 10.5469ZM10 4.6875C11.2923 4.6875 12.3438 5.73891 12.3438 7.03125C12.3438 8.32359 11.2923 9.375 10 9.375C8.70766 9.375 7.65625 8.32359 7.65625 7.03125C7.65625 5.73891 8.70766 4.6875 10 4.6875Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="input-block">
                                                <input type="text" name="shipping_postal_code" id="zip2" class="form-control" placeholder="Postcode / Zip">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M9.51246 19.7391C9.62113 19.9021 9.8041 20 10 20C10.1959 20 10.3789 19.9021 10.4875 19.7391C11.8742 17.6591 13.9167 15.0903 15.34 12.4778C16.478 10.3889 17.0312 8.60727 17.0312 7.03125C17.0312 3.15422 13.877 0 10 0C6.12297 0 2.96875 3.15422 2.96875 7.03125C2.96875 8.60727 3.52199 10.3889 4.66004 12.4778C6.08227 15.0883 8.12863 17.6634 9.51246 19.7391ZM10 1.17188C13.2309 1.17188 15.8594 3.80039 15.8594 7.03125C15.8594 8.40641 15.3529 10.0046 14.3109 11.9171C13.0841 14.1691 11.3334 16.4534 10 18.3738C8.66684 16.4537 6.91602 14.1692 5.6891 11.9171C4.64715 10.0046 4.14062 8.40641 4.14062 7.03125C4.14062 3.80039 6.76914 1.17188 10 1.17188Z"
                                                        fill="#141516" />
                                                    <path
                                                        d="M10 10.5469C11.9385 10.5469 13.5156 8.96977 13.5156 7.03125C13.5156 5.09273 11.9385 3.51562 10 3.51562C8.06148 3.51562 6.48438 5.09273 6.48438 7.03125C6.48438 8.96977 8.06148 10.5469 10 10.5469ZM10 4.6875C11.2923 4.6875 12.3438 5.73891 12.3438 7.03125C12.3438 8.32359 11.2923 9.375 10 9.375C8.70766 9.375 7.65625 8.32359 7.65625 7.03125C7.65625 5.73891 8.70766 4.6875 10 4.6875Z"
                                                        fill="#141516" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                
                                <!-- Different Billing Address Form -->
                            </div>
                            <!-- Shipping Method -->
                            
                            <!-- Payment Method -->
                            <div class="title-row title-row-2 mb-16">
                                <h5 class="medium-black">Payments Methods</h5>   
                            </div>
                            <div class="shipping-radio-container">
                                
                                    <div class="plans mb-16">
                                        <label class="plan basic-plan" for="credit">
                                            <input checked type="radio" name="payment_method" id="credit" value="card">
                                            <span class="plan-content content-2">
                                                <img src="assets/media/icons/payment-card-1.png" alt="">
                                                <span class="plan-details">
                                                    <span class="fw-500 medium-black">Pay By Card</span>
                                                </span>
                                            </span>
                                        </label>
                                        <label class="plan basic-plan" for="paypal">
                                            <input type="radio" name="payment_method" id="paypal" value="paypal">
                                            <span class="plan-content content-2">
                                                <img src="assets/media/icons/payment-card-2.png" alt="">
                                                <span class="plan-details">
                                                    <span class="fw-500 medium-black">Paypal</span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                
                                    
                                

                                <h5 class="medium-black mb-24">Payments Details</h5>   
                                
                                <div class="row">
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="input-block" id="card-section">
                                                        <!-- Stripe Card Element container -->
                                                        <div id="card-element" class="form-control"></div>
                        
                                                        <!-- Error messages -->
                                                        <div id="card-errors" class="text-danger mt-2" role="alert"></div>

                                                    <!-- Optional: add icon inside -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%);">
                                                <path d="M1 5h18v10H1z" fill="#141516"/>
                                                <path d="M1 7h18M4 12h4" stroke="#fff" stroke-width="2"/>
                                            </svg>
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center gap-8">
                                            
                                            <p class="light-gray">Your Transaction is Secured with SSL Encryption</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Payment Method -->
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
    <!-- rest of loop content -->


            <div class="item-container mb-16">
                <div class="left-box d-flex align-items-center gap-16">
                    <div class="icon-box">
                        @if($item['type'] === 'gangsheet')
                            <img src="{{ $item['preview'] ?? asset('assets/media/products/nav-image-1.png') }}" 
                                alt="Gangsheet" 
                                style="max-width:65px; border:1px solid #ddd; cursor:pointer;" 
                                onclick="openModal('{{ $item['preview'] ?? asset('assets/media/products/nav-image-1.png') }}')">

                        @elseif($item['type'] === 'dtf' || $item['type'] === 'dtf-gangsheet-upload')
                            <img src="{{ isset($item['artwork']) && $item['artwork'] 
                                        ? asset($item['artwork']) 
                                        : asset('assets/media/products/nav-image-1.png') }}" 
                                alt="Custom Product" 
                                style="max-width:65px; border:1px solid #ddd;" 
                                onclick="openModal('{{ isset($item['artwork']) && $item['artwork'] 
                                                        ? asset($item['artwork']) 
                                                        : asset('assets/media/products/nav-image-1.png') }}')">


                        

                        @else
                            <img src="{{ isset($item['image']) && $item['image'] 
                                        ? asset('images/'.$item['image']) 
                                        : asset('assets/media/products/nav-image-1.png') }}" 
                                alt="Product" 
                                style="max-width:65px; border:1px solid #ddd;" 
                                onclick="openModal('{{ isset($item['image']) && $item['image'] 
                                                        ? asset('images/'.$item['image']) 
                                                        : asset('assets/media/products/nav-image-1.png') }}')">
                        @endif


                    </div>

                    <span class="h6 medium-black">
                        @if($item['type'] === 'gangsheet')
                            {{ $item['design_name'] ?? 'Gang Sheet' }} x {{ $item['quantity'] }}
                        @else
                            {{ $item['name'] ?? 'Product' }} x {{ $item['quantity'] }}
                        @endif
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
            <h6 class="light-gray">${{ number_format($subtotal ?? '', 2) }}</h6>
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
            <h5 class="color-primary">${{ number_format($subtotal ?? '' + 5 - 5, 2) }}</h5>
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
        <button type="submit" id="submitBtn" class="cus-btn active-btn">Proceed to Checkout</button>
    </div>
</div>
@endif


                    </div>
                    </form>
                </div>
            </section>
            <!-- Billing Details End -->

            
            <!-- FOOTER Start -->
           


{{-- Stripe JS --}}
<script src="https://js.stripe.com/v3/"></script>



<script>



document.addEventListener("DOMContentLoaded", function () {
    const cardSection = document.getElementById("card-section");
    const paymentRadios = document.querySelectorAll("input[name='payment_method']");

    paymentRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "card") {
                cardSection.style.display = "block"; // Show Stripe fields
            } else {
                cardSection.style.display = "none"; // Hide Stripe fields
            }
        });
    });
});





    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const card = elements.create("card");
    card.mount("#card-element");

    const form = document.getElementById("checkout-form");

    const loader = document.getElementById("preloader");

form.addEventListener("submit", async function(e) {
    e.preventDefault();

    loader.style.display = "flex"; // 🔥 Show loader

    try {
        // Create Payment Intent from backend
        let response = await fetch("{{ route('checkout.createIntent') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                amount: {{ intval(($subtotal ?? '' + 5 - 5) * 100) }},
                billing_name: form.billing_name.value,
                billing_email: form.billing_email.value
            })
        });

        let { clientSecret } = await response.json();

        // Confirm Card Payment
        const result = await stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: card,
                billing_details: {
                    name: form.billing_name.value,
                    email: form.billing_email.value
                }
            }
        });

        if (result.error) {
            loader.style.display = "none"; // ❌ Hide loader on error
            document.getElementById("card-errors").textContent = result.error.message;
        } else if (result.paymentIntent.status === "succeeded") {
            // Send order details to backend
            fetch("{{ route('checkout.place') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    billing: {
                        name: form.billing_name.value,
                        email: form.billing_email.value,
                        phone: form.billing_phone.value,
                        address: form.billing_address.value,
                        postal_code: form.billing_postal_code.value,
                    },
                    shipping: {
                        name: form.shipping_name.value,
                        email: form.shipping_email.value,
                        phone: form.shipping_phone.value,
                        address: form.shipping_address.value,
                        postal_code: form.shipping_postal_code.value,
                    },
                    payment_intent: result.paymentIntent.id
                })
            })
            .then(res => res.json())
            .then(data => {
                loader.style.display = "none"; // ✅ Hide loader
                if (data.success) {
                    Swal.fire({
                        title: "🎉 Order Placed!",
                        text: "Your order has been placed successfully.",
                        icon: "success",
                        confirmButtonText: "View Order"
                    }).then(() => {
                        window.location.href = "/order/" + data.order_id;
                    });
                } else {
                    Swal.fire("⚠️ Error!", data.message || "Something went wrong.", "error");
                }
            })
            .catch(err => {
                loader.style.display = "none";
                Swal.fire("❌ Server Error", "Please try again later.", "error");
            });
        }
    } catch (err) {
        loader.style.display = "none"; // always hide on exception
        Swal.fire("❌ Error", "Something went wrong. Try again!", "error");
    }
});
</script>
@endsection
