@extends('user.master')
@section('content')
    <section id="center" class="center_dt">
        <div class="center_om bg_back">
            <div class="container-xl">
                <div class="row center_o1 text-center">
                    <div class="col-md-12">
                        <h1 class="text-white font_50">Tours</h1>
                        <h6 class="col_green mb-0 mt-3 fw-bold"><a class="text-light" href="{{ url('/') }}">Home</a> <span
                                class="mx-2 text-white-50"><i class="fa fa-arrow-right"></i></span> Tours</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="tour" class="p_3">
        <div class="container-xl">
            <div class="row tour_1">
                @if (!request()->has('query') || empty(request()->query('query')))
                    <div class="input-group">
                        <div class="dropdown">
                            <button class="text-white fw-bold btn btn-warning dropdown-toggle" type="button"
                                id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-map-marker me-1 col_green fs-3 align-middle"></i>
                                Destination </button>
                            <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <li><a class="dropdown-item" href="#">All</a></li>
                                @foreach ($categories as $c)
                                    <li><a class="dropdown-item" href="#">{{ $c->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="tour_1r">
                        <div class="profile6i row mt-4">
                            @if ($packages->isEmpty())
                                <div class="col-md-12 text-center">
                                    <p><i class="fa-regular fa-face-sad-cry col_green" style="margin-right: 5px"></i>No
                                        Packages Found<i
                                            class="fa-regular fa-face-sad-cry col_green"style="margin-left: 5px"></i>
                                    </p>
                                </div>
                            @else
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
                                                <h6 class="mb-4">{{ $p->description }}</h6>
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
                                                            <h6 class="font_14 mb-0">Starting From:<br>
                                                                <span class="fw-bold"><span class="fs-4 col_green">MMK
                                                                        {{ $p->price }}</span>
                                                                    <span
                                                                        class="text-decoration-line-through text-muted"></span></span><br>
                                                                <span class="font_12">TAXES INCL/PERS</span>
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
                                                                <h6 class="font_14 mb-0">Starting From:<br>
                                                                    <span class="fw-bold"><span
                                                                            class="fs-4 col_green">MMK
                                                                            {{ $p->price }}</span>
                                                                        <span
                                                                            class="text-decoration-line-through text-muted"></span></span><br>
                                                                    <span class="font_12">TAXES INCL/PERS</span>
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
                            @endif
                            <div class="col-md-12 text-center" id="no-items-message" style="display: none;">
                                <p><i class="fa-regular fa-face-sad-cry col_green" style="margin-right: 5px"></i>No
                                    Destination<i class="fa-regular fa-face-sad-cry col_green"style="margin-left: 5px"></i>
                                </p>
                            </div>
                            {{ $packages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            const packageItems = document.querySelectorAll('.package-item');
            const noItemsMessage = document.getElementById('no-items-message');

            dropdownItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedCategory = this.textContent.trim();
                    let visibleCount = 0;

                    packageItems.forEach(packageItem => {
                        if (selectedCategory === 'All' || packageItem.dataset.category ===
                            selectedCategory) {
                            packageItem.style.display = 'block';
                            visibleCount++;
                        } else {
                            packageItem.style.display = 'none';
                        }
                    });

                    if (visibleCount === 0) {
                        noItemsMessage.style.display = 'block';
                    } else {
                        noItemsMessage.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($packages as $p)
                document.querySelector(`#packageModal{{ $p->id }}`).addEventListener('show.bs.modal',
                    function() {
                        axios.post('{{ route('packages.incrementView', $p->id) }}', {
                                _token: '{{ csrf_token() }}'
                            })
                            .then(function(response) {
                                if (response.data.success) {
                                    console.log('View count incremented');
                                    let viewCountElement = document.getElementById(
                                        'view-count-{{ $p->id }}');
                                    viewCountElement.innerText = parseInt(viewCountElement.innerText) + 1;
                                } else {
                                    console.log('Failed to increment view count');
                                }
                            })
                            .catch(function(error) {
                                console.error('Error:', error);
                            });
                    });
            @endforeach
        });
    </script>
   <style>
    .profile6il {
        height: 100%; /* Ensure cards fill the height */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .profile6il1i img {
        height: 250px; /* Adjust the height as needed */
        width: 100%; /* Ensure images take full width of their container */
        object-fit: cover; /* Maintain aspect ratio and cover the container */
    }

    .profile6il {
        max-width: 350px; /* Set a maximum width for each card */
        margin: 0 auto; /* Center cards within their container */
    }
</style>



    </style>
@endsection
