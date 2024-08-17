<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tour Booking</title>
    <link href="{{ asset('user/assets/css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/destination.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/css/tour.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/fonts/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/fonts/css/brands.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/assets/fonts/css/solid.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
            /* Remove margin to keep the dropdown aligned with the button */
        }

        .dropdown-menu {
            max-height: 200px;
            /* Adjust the height as needed */
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
    @yield('css')

</head>

<body>
    @include('user.nav')
    @yield('content')
    @include('user.footer')

    <script src="{{ asset('user/assets/fonts/js/brands.min.js') }}"></script>
    <script src="{{ asset('user/assets/fonts/js/conflict-detection.js') }}"></script>
    <script src="{{ asset('user/assets/fonts/js/conflict-detection.min.js') }}"></script>
    <script src="{{ asset('user/assets/fonts/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('user/assets/fonts/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/assets/fonts/js/solid.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/common.js') }}"></script>
    <script src="{{ asset('user/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        @if (session()->has('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `right`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)", // Red gradient for errors
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endif
        @if ($errors->any())
            Toastify({
                text: "{{ $errors->first() }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `right`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)", // Red gradient for errors
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endif
        @if (session()->has('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `right`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endif
    </script>
    @yield('script')

</body>


</html>
