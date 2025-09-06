@extends('layout.default')

@section('content')




            <!-- TITLE BANNER START -->
            <section class="title-banner">
                <div class="container">
                    <h1 class="medium-black fw-700">Wishlist</h1>
                </div>
            </section>
            <!-- TITLE BANNER END -->

            <!-- Wishlist Area Start -->
            <section class="cart py-40">
                <div class="container">
                    <div class="d-lg-block d-none">
                        <table class="cart-table wishlist mb-16">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Available</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                        <table class="cart-table">
                            <tbody>
                                <tr class="table-row wishlist-row">
                                    <td class="pd">
                                        <div class="product-detail-box">
                                            <div class="cus-checkBox">
                                                <input type="checkbox" id="box1">
                                                <label for="box1" class="light-gray"></label>
                                            </div>
                                            <a href="#" class="h5 dark-black"><i class="fal fa-times"></i></a>
                                            <div class="img-block">
                                                <a href="product-detail.html"><img src="assets/media/products/nav-image-1.png"
                                                        alt=""></a>
                                            </div>
                                            <div class="d-block text-start">
                                                <h6><a href="product-detail.html" class="medium-black">Classic Printed Caps</a></h6>
                                            </div>
        
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-500"> $1.00</p>
                                    </td>
                                    <td>
                                        <p class="fw-500">29 Jun, 2024</p>
                                    </td>
                                    <td>
                                        <p class="fw-500 stock-label m-auto">In Stock</p>
                                    </td>
                                    <td>
                                        <div class="quantity quantity-wrap">
                                            <div class="input-area quantity-wrap">
                                                <button class="decrement" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M15.375 7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                    </svg>
                                                </button>
                                                <input type="text" name="quantity" value="1" maxlength="2" size="1"
                                                    class="number">

                                                <button class="increment" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M15.375 7.375H8.625V0.625C8.625 0.279813 8.34519 0 8 0C7.65481 0 7.375 0.279813 7.375 0.625V7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H7.375V15.375C7.375 15.7202 7.65481 16 8 16C8.34519 16 8.625 15.7202 8.625 15.375V8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-500">$1.00</p>
                                    </td>
                                    <td>
                                        <a href="{{url('/cart')}}" class="cus-btn">Add to Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="cart-table">
                            <tbody>
                                <tr class="table-row wishlist-row">
                                    <td class="pd">
                                        <div class="product-detail-box">
                                            <div class="cus-checkBox">
                                                <input type="checkbox" id="box2">
                                                <label for="box2" class="light-gray"></label>
                                            </div>
                                            <a href="#" class="h5 dark-black"><i class="fal fa-times"></i></a>
                                            <div class="img-block">
                                                <a href="product-detail.html"><img src="assets/media/products/nav-image-2.png"
                                                        alt=""></a>
                                            </div>
                                            <div class="d-block text-start">
                                                <h6><a href="product-detail.html" class="medium-black">High-Quality Booklets</a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-500"> $1.00</p>
                                    </td>
                                    <td>
                                        <p class="fw-500">29 Jun, 2024</p>
                                    </td>
                                    <td>
                                        <p class="fw-500 stock-label m-auto">In Stock</p>
                                    </td>
                                    <td>
                                        <div class="quantity quantity-wrap">
                                            <div class="input-area quantity-wrap">
                                                <button class="decrement" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M15.375 7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                    </svg>
                                                </button>
                                                <input type="text" name="quantity" value="1" maxlength="2" size="1"
                                                    class="number">

                                                <button class="increment" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M15.375 7.375H8.625V0.625C8.625 0.279813 8.34519 0 8 0C7.65481 0 7.375 0.279813 7.375 0.625V7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H7.375V15.375C7.375 15.7202 7.65481 16 8 16C8.34519 16 8.625 15.7202 8.625 15.375V8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-500">$1.00</p>
                                    </td>
                                    <td>
                                        <a href="{{url('/cart')}}" class="cus-btn">Add to Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-lg-none d-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="cart-item-block mb-32">
                                    <div class="img-block mb-16">
                                        <a href="product-detail.html"><img src="assets/media/products/nav-image-1.png"
                                                alt=""></a>
                                        <a href="#" class="cross"><i class="fal fa-times"></i></a>
                                    </div>
                                    <h6 class="fw-600 mb-24">Classic Printed Caps</h6>
                                    <ul class="unstyled detail">
                                        <li>
                                            <h6 class="">Price</h6>
                                            <h6 class="">$270.00</h6>
                                        </li>
                                        <li>
                                            <h6 class="">Date Added</h6>
                                            <h6 class="">29 Jun, 2024</h6>
                                        </li>
                                        <li>
                                            <h6 class="">Stock Status</h6>
                                            <h6 class="">In-Stock</h6>
                                        </li>
                                        <li>
                                            <h6 class="">Quantity</h6>
                                            <div class="quantity quantity-wrap">
                                                <div class="input-area quantity-wrap">
                                                    <button class="decrement" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M15.375 7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                        </svg>
                                                    </button>
                                                    <input type="text" name="quantity" value="1" maxlength="2" size="1"
                                                        class="number">

                                                    <button class="increment" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M15.375 7.375H8.625V0.625C8.625 0.279813 8.34519 0 8 0C7.65481 0 7.375 0.279813 7.375 0.625V7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H7.375V15.375C7.375 15.7202 7.65481 16 8 16C8.34519 16 8.625 15.7202 8.625 15.375V8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="{{url('/cart')}}" class="cus-btn">Add to Cart</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-item-block mb-32">
                                    <div class="img-block mb-16">
                                        <a href="product-detail.html"><img src="assets/media/products/nav-image-2.png"
                                                alt=""></a>
                                        <a href="#" class="cross"><i class="fal fa-times"></i></a>
                                    </div>
                                    <h6 class="fw-600 mb-24">High-Quality Booklets</h6>
                                    <ul class="unstyled detail">
                                        <li>
                                            <h6 class="">Price</h6>
                                            <h6 class="">$190.00</h6>
                                        </li>
                                        <li>
                                            <h6 class="">Date Added</h6>
                                            <h6 class="">29 Jun, 2024</h6>
                                        </li>
                                        <li>
                                            <h6 class="">Stock Status</h6>
                                            <h6 class="">In-Stock</h6>
                                        </li>
                                        <li>
                                            <h6 class="">Quantity</h6>
                                            <div class="quantity quantity-wrap">
                                                <div class="input-area quantity-wrap">
                                                    <button class="decrement" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M15.375 7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                        </svg>
                                                    </button>
                                                    <input type="text" name="quantity" value="1" maxlength="2" size="1"
                                                        class="number">

                                                    <button class="increment" type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M15.375 7.375H8.625V0.625C8.625 0.279813 8.34519 0 8 0C7.65481 0 7.375 0.279813 7.375 0.625V7.375H0.625C0.279813 7.375 0 7.65481 0 8C0 8.34519 0.279813 8.625 0.625 8.625H7.375V15.375C7.375 15.7202 7.65481 16 8 16C8.34519 16 8.625 15.7202 8.625 15.375V8.625H15.375C15.7202 8.625 16 8.34519 16 8C16 7.65481 15.7202 7.375 15.375 7.375Z" fill="#1E1F20"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="{{url('/cart')}}" class="cus-btn">Add to Cart</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-bottom-row varient-2 bg-white">
                        <h5 class="color-primary py-40 text-end">Total: $80.00</h5>
                        <div class="hr-line mb-40"></div>
                        <div class="d-flex justify-content-between flex-wrap gap-16">
                            <div class="d-flex align-items-center gap-16 ">
                                <ul class="list-unstyled social-link mb-0"> 
                                    <li class="d-flex align-items-center gap-8">
                                        <h6 class="medium-black fw-600">Share:</h6>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                <path d="M12.5696 24.5995C12.4901 24.5995 12.4106 24.5995 12.3306 24.5992C10.4494 24.6038 8.71118 24.556 7.02075 24.4531C5.47095 24.3588 4.05627 23.8232 2.92944 22.9043C1.84216 22.0178 1.09967 20.819 0.722656 19.3417C0.394531 18.0555 0.377136 16.793 0.360474 15.5719C0.348389 14.6957 0.335937 13.6575 0.333374 12.6017C0.335937 11.5416 0.348389 10.5033 0.360474 9.62719C0.377136 8.40624 0.394531 7.14373 0.722656 5.85742C1.09967 4.38012 1.84216 3.18133 2.92944 2.29473C4.05627 1.37591 5.47095 0.840326 7.02093 0.746026C8.71136 0.643304 10.4499 0.595331 12.3352 0.599908C14.217 0.59588 15.9546 0.643304 17.6451 0.746026C19.1949 0.840326 20.6096 1.37591 21.7364 2.29473C22.8238 3.18133 23.5662 4.38012 23.9432 5.85742C24.2713 7.14355 24.2887 8.40624 24.3054 9.62719C24.3174 10.5033 24.3301 11.5416 24.3325 12.5973V12.6017C24.3301 13.6575 24.3174 14.6957 24.3054 15.5719C24.2887 16.7928 24.2715 18.0553 23.9432 19.3417C23.5662 20.819 22.8238 22.0178 21.7364 22.9043C20.6096 23.8232 19.1949 24.3588 17.6451 24.4531C16.0262 24.5516 14.3633 24.5995 12.5696 24.5995ZM12.3306 23.1127C14.1813 23.1171 15.8805 23.0702 17.5312 22.9699C18.7031 22.8987 20.0854 22.13 20.9178 21.4512C21.6872 20.8237 22.2171 19.958 22.4927 18.878C22.7658 17.8074 22.7816 16.6579 22.7968 15.5463C22.8087 14.676 22.8211 13.6451 22.8237 12.5995C22.8211 11.5538 22.8087 10.5231 22.7968 9.65282C22.7816 8.54119 22.7658 7.39166 22.4927 6.32086C22.2171 5.2409 21.6872 4.37518 20.9178 3.74767C20.0854 3.06909 18.7031 2.32292 17.5312 2.2517C15.8805 2.15117 14.1813 2.10485 12.335 2.10887C10.4847 2.10448 8.78534 2.15667 7.13464 2.2572C5.96277 2.32843 4.70864 2.83101 3.87624 3.50959C3.10683 4.1371 2.43443 5.2409 2.15885 6.32086C1.88566 7.39166 1.86991 8.54101 1.85472 9.65282C1.84281 10.5239 1.83036 11.5553 1.8278 12.6017C1.83036 13.6436 1.84281 14.6752 1.85472 15.5463C1.86991 16.6579 1.88566 17.8074 2.15885 18.878C2.43443 19.958 2.96434 20.8237 3.73374 21.4512C4.56614 22.1298 5.96277 22.8987 7.13464 22.9699C8.78534 23.0704 10.4851 23.1173 12.3306 23.1127ZM12.2859 18.4589C9.05523 18.4589 6.42657 15.8304 6.42657 12.5995C6.42657 9.36864 9.05523 6.74017 12.2859 6.74017C15.5168 6.74017 18.1453 9.36864 18.1453 12.5995C18.1453 15.8304 15.5168 18.4589 12.2859 18.4589ZM12.335 8.1045C9.70055 8.1045 7.84651 9.95854 7.84651 12.5973C7.84651 14.7942 9.50773 17.1126 12.3091 17.1126C14.5062 17.1126 16.7904 15.0312 16.7904 12.5973C16.7904 10.4004 15.1143 8.1045 12.335 8.1045ZM18.8016 4.86517C18.025 4.86517 17.3953 5.49468 17.3953 6.27142C17.3953 7.04815 18.025 7.67767 18.8016 7.67767C19.5783 7.67767 20.2078 7.04815 20.2078 6.27142C20.2078 5.49468 19.5783 4.86517 18.8016 4.86517Z" fill="white"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                <path d="M17.9584 6.22461C18.3465 6.22461 18.6615 5.90961 18.6615 5.52148V1.30273C18.6615 0.914609 18.3465 0.599609 17.9584 0.599609H13.7396C11.0256 0.599609 8.81775 2.80742 8.81775 5.52148V9.03711H6.70837C6.32025 9.03711 6.00525 9.35211 6.00525 9.74023V13.959C6.00525 14.3471 6.32025 14.6621 6.70837 14.6621H8.81775V23.8965C8.81775 24.2846 9.13275 24.5996 9.52087 24.5996H13.7396C14.1277 24.5996 14.4427 24.2846 14.4427 23.8965V14.6621H17.2552C17.5988 14.6621 17.8923 14.4137 17.949 14.0748L18.6521 9.85602C18.6859 9.65211 18.6287 9.44352 18.4951 9.28555C18.3615 9.12805 18.1651 9.03711 17.9584 9.03711H14.4427V6.22461H17.9584ZM13.7396 10.4434H17.1282L16.6595 13.2559H13.7396C13.3515 13.2559 13.0365 13.5709 13.0365 13.959V23.1934H10.224V13.959C10.224 13.5709 9.909 13.2559 9.52087 13.2559H7.4115V10.4434H9.52087C9.909 10.4434 10.224 10.1284 10.224 9.74023V5.52148C10.224 3.5832 11.8013 2.00586 13.7396 2.00586H17.2552V4.81836H13.7396C13.3515 4.81836 13.0365 5.13336 13.0365 5.52148V9.74023C13.0365 10.1284 13.3515 10.4434 13.7396 10.4434Z" fill="white"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                <path d="M14.5746 10.762L23.3171 0.599609H21.2454L13.6543 9.42345L7.5914 0.599609H0.598511L9.76688 13.9428L0.598511 24.5996H2.6703L10.6866 15.2813L17.0896 24.5996H24.0825L14.5741 10.762H14.5746ZM11.737 14.0604L10.8081 12.7317L3.4168 2.15922H6.59895L12.5638 10.6915L13.4928 12.0202L21.2464 23.1109H18.0642L11.737 14.0609V14.0604Z" fill="white"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                                <path d="M5.97705 8.13074H1.45837C1.07001 8.13074 0.755249 8.44568 0.755249 8.83386V23.8965C0.755249 24.2849 1.07001 24.5996 1.45837 24.5996H5.97705C6.36542 24.5996 6.68018 24.2849 6.68018 23.8965V8.83386C6.68018 8.44568 6.36542 8.13074 5.97705 8.13074ZM5.27393 23.1934H2.1615V9.53699H5.27393V23.1934Z" fill="white"></path>
                                                <path d="M3.7179 0.599609C2.08423 0.599609 0.755249 1.92859 0.755249 3.56189C0.755249 5.19556 2.08423 6.52435 3.7179 6.52435C5.35138 6.52435 6.68018 5.19537 6.68018 3.56189C6.68018 1.92859 5.35138 0.599609 3.7179 0.599609ZM3.7179 5.1181C2.85968 5.1181 2.1615 4.4201 2.1615 3.56189C2.1615 2.70386 2.85968 2.00586 3.7179 2.00586C4.57593 2.00586 5.27393 2.70386 5.27393 3.56189C5.27393 4.4201 4.57593 5.1181 3.7179 5.1181Z" fill="white"></path>
                                                <path d="M17.2745 8.03131C16.2057 8.03131 15.1523 8.28894 14.2089 8.77087C14.1769 8.41217 13.8757 8.13074 13.5085 8.13074H8.9895C8.60132 8.13074 8.28638 8.44568 8.28638 8.83386V23.8965C8.28638 24.2849 8.60132 24.5996 8.9895 24.5996H13.5085C13.8969 24.5996 14.2117 24.2849 14.2117 23.8965V15.6121C14.2117 14.5464 15.0789 13.6794 16.1445 13.6794C17.2102 13.6794 18.077 14.5464 18.077 15.6121V23.8965C18.077 24.2849 18.392 24.5996 18.7802 24.5996H23.299C23.6874 24.5996 24.0021 24.2849 24.0021 23.8965V14.759C24.0021 11.0493 20.9842 8.03131 17.2745 8.03131ZM22.5959 23.1934H19.4835V15.6121C19.4835 13.7709 17.9857 12.2731 16.1447 12.2731C14.3034 12.2731 12.8054 13.7709 12.8054 15.6121V23.1934H9.69281V9.53699H12.8054V10.0565C12.8054 10.3269 12.9605 10.5734 13.2044 10.6904C13.4481 10.8074 13.7374 10.774 13.9485 10.605C14.9007 9.84131 16.051 9.43756 17.2745 9.43756C20.2087 9.43756 22.5959 11.8247 22.5959 14.759V23.1934Z" fill="white"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex align-items-center gap-16 flex-wrap">
                                <a href="{{url('/cart')}}" class="cus-btn">Add Selected to Cart</a>
                                <a href="{{url('/cart')}}" class="cus-btn btn-sec">Add All to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Wishlist Area End -->
            
            <!-- FOOTER Start -->
            


@endsection