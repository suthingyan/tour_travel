<section id="vacation" class="p_3">
    <div class="container-xl">
        <div class="row vacation_1 text-center mb-4">
            <div class="col-md-12">
                <h5 class="family_1 icon_tag col_green"><i class="fa fa-leaf me-1"></i> Journey to the <i
                        class="fa fa-leaf ms-1"></i></h5>
                <h1 class="font_50 mt-3 mb-0">Desired Vacation Spots</h1>
            </div>
        </div>
        <div class="row vacation_2">
            @foreach ($categories as $c)
                <div class="col-md-3 mb-3">
                    <div class="vacation_2i position-relative">
                        <div class="vacation_2i1">
                            <img src="/images/categories/{{$c->image}}" alt="abc" class="rounded_1">
                        </div>
                        <div class="vacation_2i2 text-center position-absolute bottom-0 w-100 h-100 px-3 bg_back">
                            <h3 class="mb-0 text-white">{{ $c->name }}</h3>
                        </div>
                        <div class="vacation_2i3 text-center position-absolute top-0 w-100 h-100 bg_back px-3">
                            <h3 class="mb-0"><a class="text-white a_tag1" href="">{{ $c->name }}</a></h3>
                            <hr class="line mx-auto">
                            <h6 class="d-inline-block bg_green text-white p-2 px-4">
                                {{ $c->packages->sum('tour_count') }} Tour</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<style>
    .vacation_2i1 img {
    width: 100%;
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* Ensure images cover the area without distortion */
}

</style>