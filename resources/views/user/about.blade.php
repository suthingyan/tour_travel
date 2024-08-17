@extends('user.master')
@section('content')
    <section id="center" class="center_about">
        <div class="center_om bg_back">
            <div class="container-xl">
                <div class="row center_o1 text-center">
                    <div class="col-md-12">
                        <h1 class="text-white font_50">About</h1>
                        <h6 class="col_green mb-0 mt-3 fw-bold"><a class="text-light" href="{{ url('/') }}">Home</a> <span
                                class="mx-2 text-white-50"><i class="fa fa-arrow-right"></i></span> About</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="choose" class="p_3">
        <div class="container-xl">
            <div class="row vacation_1 text-center mb-4">
                <div class="col-md-12">
                    <h5 class="family_1 icon_tag col_green"><i class="fa fa-leaf me-1"></i> Who We Are <i
                            class="fa fa-leaf ms-1"></i></h5>
                    <h1 class="font_50 mt-3 mb-0">Why Choose Tour Booking</h1>
                </div>
            </div>
            <div class="row choose_1">
                <div class="col-md-4">
                    <div class="choose_1l p-4 px-3 bg_light border_1 rounded_1">
                        <div class="choose_1li row">
                            <div class="col-md-4">
                                <div class="choose_1lil">
                                    <span class="d-inline-block bg_light1 text-center rounded-circle text-center"><i
                                            class="fa fa-globe"></i></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="choose_1lir">
                                    <h5>Worldwide Coverage</h5>
                                    <p class="mb-0">Explore the world with our comprehensive travel booking platform, offering personalized tours and services across every continent.
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose_1l p-4 px-3 bg_light1 border_1 rounded_1">
                        <div class="choose_1li row">
                            <div class="col-md-4">
                                <div class="choose_1lil">
                                    <span class="d-inline-block bg_light text-center rounded-circle text-center"><i
                                            class="fa fa-dollar"></i></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="choose_1lir">
                                    <h5>Competitive Pricing</h5>
                                    <p class="mb-0">Our tour packages are designed with competitive pricing. We offer exclusive deals and discounts to ensure you get the best value for your money. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose_1l p-4 px-3 bg_light border_1 rounded_1">
                        <div class="choose_1li row">
                            <div class="col-md-4">
                                <div class="choose_1lil">
                                    <span class="d-inline-block bg_light1 text-center rounded-circle text-center"><i
                                            class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="choose_1lir">
                                    <h5>Fast Booking</h5>
                                    <p class="mb-0">Experience fast booking with our streamlined process. Secure your travel plans in just a few clicks. Book your next adventure quickly and easily.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row choose_1 mt-4">
                <div class="col-md-4">
                    <div class="choose_1l p-4 px-3 bg_light border_1 rounded_1">
                        <div class="choose_1li row">
                            <div class="col-md-4">
                                <div class="choose_1lil">
                                    <span class="d-inline-block bg_light1 text-center rounded-circle text-center"><i
                                            class="fa fa-user-plus"></i></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="choose_1lir">
                                    <h5>Guided Tours</h5>
                                    <p class="mb-0">Join our guided tours for an immersive and insightful experience led by expert guides. Explore destinations with personalized attention and in-depth knowledge, ensuring you don't miss a thing. Our guided tours combine convenience with enriching commentary for a truly memorable journey.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose_1l p-4 px-3 bg_light1 border_1 rounded_1">
                        <div class="choose_1li row">
                            <div class="col-md-4">
                                <div class="choose_1lil">
                                    <span class="d-inline-block bg_light text-center rounded-circle text-center"><i
                                            class="fa fa-phone"></i></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="choose_1lir">
                                    <h5>Best Support 24/7</h5>
                                    <p class="mb-0">Our dedicated support team is available 24/7 to assist you with any questions or concerns. From booking issues to travel inquiries, we provide prompt and reliable assistance at any time. Enjoy peace of mind knowing that expert help is just a call or click away, anytime, day or night.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose_1l p-4 px-3 bg_light border_1 rounded_1">
                        <div class="choose_1li row">
                            <div class="col-md-4">
                                <div class="choose_1lil">
                                    <span class="d-inline-block bg_light1 text-center rounded-circle text-center"><i
                                            class="fa fa-recycle"></i></span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="choose_1lir">
                                    <h5>Ultimate Flexibility</h5>
                                    <p class="mb-0">Experience ultimate flexibility with our travel options, designed to adapt to your needs. Modify your plans effortlessly with flexible booking and cancellation policies. Enjoy the freedom to travel on your terms, ensuring a stress-free and customized journey.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="team" class="p_3">
        <div class="container-xl">
            <div class="row vacation_1 text-center mb-4">
                <div class="col-md-12">
                    <h5 class="family_1 icon_tag col_green"><i class="fa fa-leaf me-1"></i> Tour Guide <i
                            class="fa fa-leaf ms-1"></i></h5>
                    <h1 class="font_50 mt-3 mb-0">Our Travel Guide</h1>
                </div>
            </div>
            <div class="row team_1">
                @foreach ($tours as $t)
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="team_1l border_1">
                            <div class="team_1l1 position-relative">
                                <div class="team_1l1i p-4 bg_light1">
                                    <img src="{{ asset('images/tours/' . $t->image) }}" alt="abc"
                                        class="w-100 rounded-circle">
                                </div>
                                <div class="team_1l1i1 position-absolute top-0">
                                    <img src="{{ asset('images/tours/' . $t->image) }}" class="w-100" alt="abc">
                                </div>
                                <div class="team_1l1i2 bg_back pt-4 pb-4 px-3 position-absolute top-0">
                                    <ul class="mb-0">
                                        <li><a class="text-white a_tag1" href="{{ $t->facebook_link }}"><i
                                                    class="fa-brands fa-facebook" target="blank"></i></a></li>
                                        <li class="mt-3"><a class="text-white a_tag1" href="{{ $t->twitter_link }}"><i
                                                    class="fa-brands fa-twitter" target="blank"></i></a></li>
                                        <li class="mt-3"><a class="text-white a_tag1" href="{{ $t->instagram_link }}"
                                                target="blank"><i class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li class="mt-3"><a class="text-white a_tag1" href="tel:{{ $t->phone_no }}"><i
                                                    class="fa-solid fa-phone"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team_1l2  p-3 text-center">
                                <h4>{{ $t->name }}</h4>
                                <h6 class="mb-0">Tour Guide</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $tours->links() }}
            </div>
        </div>
    </section>
@endsection
