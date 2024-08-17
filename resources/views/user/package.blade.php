<section id="package" class="p_3">
    <div class="container-xl">
        <div class="row vacation_1 text-center mb-4">
            <div class="col-md-12">
                <h5 class="family_1 icon_tag col_green"><i class="fa fa-leaf me-1"></i> Tour Package <i
                        class="fa fa-leaf ms-1"></i></h5>
                <h1 class="font_50 mt-3 mb-0">Affordable Vacation Bundles</h1>
            </div>
        </div>
        <section id="tour" class="p_3">
            <div class="container-xl">
                <div class="row tour_1">
                    <div class="col-md-12">
                        <div class="tour_1r">
                            <div class="profile6i row mt-4">
                                @foreach ($packages as $p)
                                    <div class="col-md-4 mb-3">
                                        <div class="profile6il p-3 shadow_box rounded_1">
                                            <div class="profile6il1 position-relative">
                                                <div class="profile6il1i">
                                                    <img src="{{ asset('images/packages/' . $p->image) }}"
                                                        alt="{{ $p->name }}" class="w-100 rounded_1 fixed-height-img">
                                                </div>
                                                <div class="profile6il1i1 position-absolute top-0">
                                                    <h6
                                                        class="d-inline-block bg-black text-white p-2 px-3 font_14 mb-0">
                                                        {{ $p->time }}
                                                    </h6><br>
                                                    <h6 class="d-inline-block bg_light p-2 px-3 font_14  mb-0"><i
                                                            class="fa fa-map-marker me-1 col_green"></i>
                                                        {{ $p->category->name }}</h6>

                                                </div>
                                            </div>
                                            <div class="profile6il2 mt-3">
                                                <h5>{{ $p->name }}</h5>
                                                <!-- <h6 class="mb-4">{{ $p->description }}</h6> -->
                                                <ul class="font_12" style="font-weight:bold">
                                                    <li class="d-inline-block me-1">{{ $p->tag->name }}</li>
                                                </ul>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <p><i class="fa-solid fa-eye col_green"></i><span
                                                            id="view-count-{{ $p->id }}">{{ $p->view_count }}</span>
                                                    </p>
                                                    <p><i
                                                            class="fa-solid fa-truck-fast col_yellow"></i>{{ $p->tour_count }}
                                                    </p>
                                                </div>
                                                <hr>
                                                <div class="profile6il2i row">
                                                    <div class="col-md-6">
                                                        <div class="profile6il2il">
                                                            <h6 class="font_14 mb-0">
                                                                <span class="fw-bold"><span class="fs-4 col_green">MMK
                                                                        {{ $p->price }}</span>
                                                                    <span
                                                                        class="text-decoration-line-through text-muted"></span></span><br>
                                                                
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="profile6il2ir text-end pt-2">
                                                            <h6 class="mb-0"><a class="button px-3" href=""
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#packageModal{{ $p->id }}">Book
                                                                    A Trip <i class="fa fa-plane"></i></a></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="packageModal{{ $p->id }}" tabindex="-1"
                                            aria-labelledby="packageModalLabel{{ $p->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-success"
                                                            id="packageModalLabel{{ $p->id }}">
                                                            {{ $p->name }} <span class="text-secondary">|
                                                                {{ $p->category->name }}</span></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="{{ asset('images/packages/' . $p->image) }}"
                                                                    alt="{{ $p->name }}" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{!! $p->description !!}</p>
                                                                <h6 class="font_14 mb-0">
                                                                    <span class="fw-bold"><span
                                                                            class="fs-4 col_green">MMK
                                                                            {{ $p->price }}</span>
                                                                        <span
                                                                            class="text-decoration-line-through text-muted"></span></span><br>
                                                                    
                                                                </h6>
                                                                <p>{{ $p->tag->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        @guest
                                                            <a href="{{ url('/login') }}" class="btn btn-primary">Login
                                                                First</a>
                                                        @else
                                                        <form action="{{ route('bookTrip', $p->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $p->id }}">
                                                            <button type="submit" class="btn btn-primary">Add to
                                                                cart</button>
                                                        </form>
                                                        @endguest
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row package_1 text-center mt-5">
            <div class="col-md-12">
                <h6 class="mb-0"><a class="button_1" id="viewPack" href="{{ url('/tours') }}">View All
                        Packages</a></h6>
            </div>
        </div>
    </div>
</section>
<style>
    .fixed-height-img {
    height: 250px; /* Adjust the height as needed */
    object-fit: cover;
    object-position: center;
}

</style>