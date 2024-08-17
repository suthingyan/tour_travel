@extends('user.master')
@section('content')
    <section id="center" class="center_o">
        <div class="center_om bg_back">
            <div class="container-xl">
                <div class="row center_o1 text-center">
                    <div class="col-md-12">
                        <h1 class="text-white font_50">Destinations</h1>
                        <h6 class="col_green mb-0 mt-3 fw-bold"><a class="text-light" href="{{ url('/') }}">Home</a> <span
                                class="mx-2 text-white-50"><i class="fa fa-arrow-right"></i></span> Destinations</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="vacation" class="p_3">
        <div class="container-xl">
            <div class="row vacation_1 text-center mb-4">
                <div class="col-md-12">
                    <h5 class="family_1 icon_tag col_green"><i class="fa fa-leaf me-1"></i> Journey to the <i
                            class="fa fa-leaf ms-1"></i></h5>
                    <h1 class="font_50 mt-3 mb-0">Desired Vacation Spots</h1>
                </div>
            </div>
            <div class="dropdown col-2">
                <button class="text-white fw-bold btn btn-warning dropdown-toggle" type="button" id="categoriesDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
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
            <div class="row vacation_2">
                @foreach ($categories as $c)
                    <div class="mt-3 col-md-3 mb-3 package-item" data-category="{{ $c->name }}">
                        <div class="vacation_2i position-relative">
                            <div class="vacation_2i1">
                                <img src="/images/categories/{{ $c->image }}" alt="abc" class="rounded_1 w-100">
                            </div>
                            <div class="vacation_2i2 text-center position-absolute bottom-0 w-100 h-100  px-3 bg_back">
                                <h3 class="mb-0 text-white">{{ $c->name }}</h3>
                            </div>
                            <div class="vacation_2i3 text-center position-absolute top-0 w-100 h-100 bg_back  px-3">
                                <h3 class="mb-0"><a class="text-white a_tag1" href="#">{{ $c->name }}</a></h3>
                                <hr class="line mx-auto">
                                <h6 class="d-inline-block bg_green text-white p-2 px-4">
                                    {{ $c->packages->sum('tour_count') }} Tour</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 text-center" id="no-items-message" style="display: none;">
                    <p><i class="fa-regular fa-face-sad-cry col_green" style="margin-right: 5px"></i>No
                        Destination<i class="fa-regular fa-face-sad-cry col_green"style="margin-left: 5px"></i>
                    </p>
                </div>
                {{ $categories->links() }}
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
    <style>
        .package-item img {
    height: 250px; /* Adjust the height as needed */
    object-fit: cover;
    width: 100%;
}

    </style>
@endsection
