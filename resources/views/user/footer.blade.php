<div class="main_footer position-relative">
    <div class="main_footer2">
        <section id="footer" class="p_3 bg_black">
            <div class="container-xl">
                <div class="row footer_1">
                    <div class="col-md-3">
                        <div class="footer_1l">
                            <h3 class="mb-3"><a class="text-white" href="{{ url('/') }}"><i
                                        class="fa fa-plane-arrival col_green"></i> Tour <span
                                        class="col_yellow">Booking</span> </a></h3>
                            <h2 class="text-light">Want To Take Tour Packages?</h2>
                            <h6 class="mb-0 mt-4"><a class="button" href="{{ url('/tours') }}">Book A Tour</a></h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer_1l">
                            <h5 class="text-white mt-1 mb-3">Quick Link</h5>
                            <div class="row footer_3ism">
                                <h6 class="col-md-12 col-6"><i
                                        class="fa fa-circle col_green me-1 font_8 align-middle"></i> <a
                                        class="text-white-50 a_tag {{ Request::is('about') ? 'active' : '' }}" href="{{url('/about')}}"> About Us</a></h6>
                                <h6 class="col-md-12 col-6 mt-2"><i
                                        class="fa fa-circle col_green me-1 font_8 align-middle"></i> <a
                                        class="text-white-50 a_tag {{ Request::is('destination') ? 'active' : '' }}" href="{{ url('destination')}}"> Destinations</a></h6>
                                <h6 class="col-md-12 col-6 mt-2"><i
                                        class="fa fa-circle col_green me-1 font_8 align-middle"></i> <a
                                        class="text-white-50 a_tag {{ Request::is('tours') ? 'active' : '' }}" href="{{url('/tours')}}"> Tour Package</a></h6>
                                <h6 class="col-md-12 col-6 mt-2 mb-0"><i
                                        class="fa fa-circle col_green me-1 font_8 align-middle"></i> <a
                                        class="text-white-50 a_tag {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('contact')}}"> Contact Us</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer_1l">
                            <h5 class="text-white mt-1 mb-3"><i class="fa fa-phone col_yellow me-1"></i> More
                                Inquiry</h5>
                            <h6><a class="text-white-50 a_tag1" href="tel:09856723678">09856723678</a></h6>
                            <h5 class="text-white mt-4 mb-3"><i class="fa fa-location-arrow col_yellow me-1"></i>
                                Send Mail</h5>
                            <h6><a class="text-white-50 a_tag1" href="mailto:suyeelaeaung@gmail.com">suyeelaeaung@gmail.com</a></h6>
                            <h5 class="text-white mt-4 mb-3"><i class="fa fa-map-marker col_yellow me-1"></i>
                                Address</h5>
                            <p class="mb-0 text-white-50 a_tag1">House 128/140,
                                Road 01, Pyay</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer_1l top_1r ">
                            <h5 class="text-white mt-1 mb-3"> We Are Here</h5>
                            <p class="text-white-50">Your happiness is just in your hands. Just choose our services.</p>

                        </div>
                    </div>
                </div>
                <hr class="line_1">
                <div class="row footer_2">
                    <div class="col-md-12">
                        <div class="footer_2l">
                            <p class="mb-0 text-white-50">© <?= date('Y') ?> SYLA Tour. All Rights Reserved |
                                Design
                                by <a class="col_green fw-bold" href="https://github.com/su-yee-lae-aung"
                                    target="_blank">Su Yee Lae Aung</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
