<div class="main position-relative">
    <div class="main_1">
        <section id="center" class="center_home px_4">
            <div class="container-fluid">
                <div class="row">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('user/assets/img/home2.jpg') }}" class="d-block w-100" style="height: 500px;" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('user/assets/img/home.jpg') }}" class="d-block w-100" style="height: 500px;"  alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('user/assets/img/home3.jpg') }}" class="d-block w-100" style="height: 500px;"  alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="main_2 position-absolute w-100">
        <section id="book" class="px_4 mb-5">
            <div class="container-fluid">
                <div class="row book_1 text-center">
                </div>
                <div class="row book_2 mx-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="book_2i row bg_light">
                                <div class="col">
                                    <div class="book_2il">
                                        <h6><i class="fa fa-suitcase-rolling me-1 col_green fs-3 align-middle"></i>
                                            Packages</h6>
                                        <input type="text" class="w-45 form-control" name="query"
                                            placeholder="Search Packages" value="{{ request('query') }}">
                                    </div>
                                </div>
                                <div class="col pe-0">
                                    <div class="book_2ir text-center bg_green">
                                        <h5 class="mb"><a class="text-white d-block" href="#">Search</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}
</div>
