 <section id="header">
     <nav class="navbar navbar-expand-md navbar-light px_4" id="navbar_sticky">
         <div class="container-fluid">
             <a class="navbar-brand  p-0 fw-bold" href="{{ url('/') }}"><i class="fa fa-plane-arrival col_green"></i>
                 Tour <span class="col_yellow">Booking</span> </a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mb-0 ms-auto nav_1">
                     <form action="{{ route('tours.search') }}" method="GET" class="input-group w-45">
                         <div class="input-group">
                             <input type="text" class="w-45 form-control" name="query"
                                 placeholder="Search Packages" value="{{ request('query') }}">
                             <button class="btn btn-outline-success bg-success text-white"
                                 type="submit">Search</button>
                         </div>
                     </form>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                             href="{{ url('/') }}">Home</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link  {{ Request::is('about') ? 'active' : '' }}"
                             href="{{ url('/about') }}">About </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('tours') ? 'active' : '' }}" href="{{ url('/tours') }}">Packages
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('destination') ? 'active' : '' }}"
                             href="{{ url('destination') }}">Destination
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                             href="{{ url('contact') }}">Contact</a>
                     </li>
                 </ul>
                 <ul class="navbar-nav mb-0 ms-auto nav_2">
                     @guest
                         <li class="nav-item" style="margin-right: 15px">
                             <a class="nav-link fs-4 col_green" href="{{ url('/login') }}"><i class="fa fa-user"></i></a>
                         </li>
                     @endguest

                     @auth
                         <li class="nav-item">
                             <a class="nav-link fs-4 col_green" href="{{ route('userProfile') }}"><i
                                     class="fa fa-user"></i></a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('cart') }}" class="nav-link fs-4 col_green">
                                 <i class="fa fa-cart-shopping"></i>
                                 <span class="badge text-danger" id="cartTotalQuantity"> {{ $totalQuantity ?? 0 }}</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link fs-4 col_green" href="{{ url('/logout') }}"><i
                                     class="fa-solid fa-right-from-bracket"></i></a>
                         </li>
                     @endauth

                 </ul>
             </div>
         </div>
     </nav>
 </section>
