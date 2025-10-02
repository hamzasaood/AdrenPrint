@extends('layout.default')

@section('content')

   

    
    <section class="py-5 container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <div>
                    <h3 class="font-jost fw-semibold text-dark">
                        Do you have some questions? <br>
                        We are at your disposal 7 days a week!
                    </h3><br><br>
                    <div class="d-flex flex-column gap-4 ">
                        
                        <p class="font-jost fs-5 text-dark">
                            
                            16131 N Eldridge Pkwy, Suite 108, Tomball, TX 77377
                        </p>
                        
                        <p class="font-jost fs-5 text-dark">
                            <span class="text-dark">832 480 8080 </span> <br>
                            <span class="text-dark"> info@ardensprint.com</span>
                        </p>
                        <div class="icons d-flex gap-3 mt-3">
                            <a href="#" class="fs-5"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" class="fs-5"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" class="fs-5"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="fs-5"><i class="fa-brands fa-tiktok"></i></a>
                            <a href="#" class="fs-5"><i class="fa-brands fa-x-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 d-flex justify-content-center">
                <img src="{{asset('/contact.webp')}}" alt="Contact Us" class="img-fluid" style="max-width: 500px;">
            </div>
        </div>

        <div class="row mt-5 py-5">
            <div class="col-12">
                <h3 class="fw-semibold mb-3 font-jost text-dark">Fill up the form if you have any question</h3>
                {{-- <form>
                    <div class="row mb-3">
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <label for="name" class="form-label font-jost">Name and Surname <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-0" id="name" placeholder="Name and Surname"
                                required>
                        </div>
                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                            <label for="email" class="form-label font-jost">Your E-mail <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control rounded-0" id="email" placeholder="Your E-mail"
                                required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="subject" class="form-label font-jost">Subject <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-0" id="subject" placeholder="Subject" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label font-jost">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control rounded-0" id="message" rows="4" placeholder="Your message..."
                            required></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark font-jost fs-5">Send</button>
                </form> --}}
                <div class="form-container">
                    <form method="post" class="contact-form" novalidate="novalidate">
                        
                        <div class="row">
                            <div class="col-md-4">
                                 <label class="form-label text-dark">Name and Surname *</label>
                                <div class="input-block mb-16">
                                   
                                    <input type="text" name="name" id="firstName" class="form-control" required=""
                                        placeholder="Name and Surname">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M2.09731 18.8006L2.06728 19.1406H2.40859H17.5914H17.9327L17.9027 18.8006C17.5953 15.3203 14.6974 12.5781 11.1719 12.5781H8.82812C5.30261 12.5781 2.4047 15.3203 2.09731 18.8006ZM3.66148 14.2113L3.43883 13.992L3.66148 14.2113C5.04733 12.8041 6.88146 12.0312 8.82812 12.0312H11.1719C13.1186 12.0312 14.9527 12.8041 16.3385 14.2113C17.7179 15.6119 18.4766 17.4588 18.4766 19.4141C18.4766 19.5651 18.3541 19.6875 18.2031 19.6875H1.79688C1.64587 19.6875 1.52344 19.5651 1.52344 19.4141C1.52344 17.4588 2.28207 15.6119 3.66148 14.2113ZM5.03906 5.27344C5.03906 2.53825 7.26482 0.3125 10 0.3125C12.7352 0.3125 14.9609 2.53825 14.9609 5.27344C14.9609 8.00862 12.7352 10.2344 10 10.2344C7.26482 10.2344 5.03906 8.00862 5.03906 5.27344ZM5.58594 5.27344C5.58594 7.70763 7.56581 9.6875 10 9.6875C12.4342 9.6875 14.4141 7.70763 14.4141 5.27344C14.4141 2.83925 12.4342 0.859375 10 0.859375C7.56581 0.859375 5.58594 2.83925 5.58594 5.27344Z"
                                            fill="#464646" stroke="#464646" stroke-width="0.625"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-dark">Your Email *</label>
                                <div class="input-block mb-16">
                                    <input type="email" name="email" id="e-mail" class="form-control" required=""
                                        placeholder="Email Address">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M18.2422 2.96875H1.75781C0.786602 2.96875 0 3.76023 0 4.72656V15.2734C0 16.2455 0.792383 17.0312 1.75781 17.0312H18.2422C19.2053 17.0312 20 16.2488 20 15.2734V4.72656C20 3.76195 19.2165 2.96875 18.2422 2.96875ZM17.996 4.14062C17.6369 4.49785 11.4564 10.6458 11.243 10.8581C10.9109 11.1901 10.4695 11.3729 10 11.3729C9.53047 11.3729 9.08906 11.1901 8.75594 10.857C8.61242 10.7142 2.50012 4.63414 2.00398 4.14062H17.996ZM1.17188 15.0349V4.96582L6.23586 10.0031L1.17188 15.0349ZM2.00473 15.8594L7.06672 10.8296L7.9284 11.6867C8.48176 12.2401 9.21746 12.5448 10 12.5448C10.7825 12.5448 11.5182 12.2401 12.0705 11.6878L12.9333 10.8296L17.9953 15.8594H2.00473ZM18.8281 15.0349L13.7641 10.0031L18.8281 4.96582V15.0349Z"
                                            fill="#464646"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="col-md-4">
                                 <label class="form-label text-dark">Subject *</label>
                                <div class="input-block mb-16">
                                   
                                    <input type="text" name="name" id="firstName" class="form-control" required=""
                                        placeholder="Subject">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M2.09731 18.8006L2.06728 19.1406H2.40859H17.5914H17.9327L17.9027 18.8006C17.5953 15.3203 14.6974 12.5781 11.1719 12.5781H8.82812C5.30261 12.5781 2.4047 15.3203 2.09731 18.8006ZM3.66148 14.2113L3.43883 13.992L3.66148 14.2113C5.04733 12.8041 6.88146 12.0312 8.82812 12.0312H11.1719C13.1186 12.0312 14.9527 12.8041 16.3385 14.2113C17.7179 15.6119 18.4766 17.4588 18.4766 19.4141C18.4766 19.5651 18.3541 19.6875 18.2031 19.6875H1.79688C1.64587 19.6875 1.52344 19.5651 1.52344 19.4141C1.52344 17.4588 2.28207 15.6119 3.66148 14.2113ZM5.03906 5.27344C5.03906 2.53825 7.26482 0.3125 10 0.3125C12.7352 0.3125 14.9609 2.53825 14.9609 5.27344C14.9609 8.00862 12.7352 10.2344 10 10.2344C7.26482 10.2344 5.03906 8.00862 5.03906 5.27344ZM5.58594 5.27344C5.58594 7.70763 7.56581 9.6875 10 9.6875C12.4342 9.6875 14.4141 7.70763 14.4141 5.27344C14.4141 2.83925 12.4342 0.859375 10 0.859375C7.56581 0.859375 5.58594 2.83925 5.58594 5.27344Z"
                                            fill="#464646" stroke="#464646" stroke-width="0.625"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label text-dark">Message *</label>
                                <div class="input-block mb-16">
                                    <textarea name="message" id="comments" class="form-control form-control-2"
                                        placeholder="Write Your Message"></textarea>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="cus-checkBox mb-24">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Save my Name, Email and Website in this browser.</label>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <button type="submit" class="cus-btn">Send Message</button>
                            </div>
                            <!-- Alert Message -->
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection