<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/flag-icon-css/css/flag-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/dist/assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin/dist/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/dist/assets/css/vertical-light-layout/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/dist/assets/images/favicon.png') }}" />
    <!--   dataTables   -->
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/buttons.dataTables.min.css') }}">
    @yield('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.components.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.components.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if ($message = Session::get('success'))
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                            <span><b>{{ $message }}</b></span>
                        </div>
                        <script>
                            // Function to hide the success alert after a specific time (in milliseconds)
                            setTimeout(function() {
                                $("#successAlert").fadeOut("slow");
                            }, 3000); // Change 5000 to the desired time in milliseconds (e.g., 5000 milliseconds = 5 seconds)
                        </script>
                    @endif
                    @if ($message = Session::get('error'))
                        <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span><b>{{ $message }}</b></span>
                        </div>
                        <script>
                            // Function to hide the success alert after a specific time (in milliseconds)
                            setTimeout(function() {
                                $("#errorAlert").fadeOut("slow");
                            }, 3000); // Change 5000 to the desired time in milliseconds (e.g., 5000 milliseconds = 5 seconds)
                        </script>
                    @endif
                    @if ($errors->any())
                        <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><b>{{ $error }}</b></li>
                                @endforeach
                            </ul>
                        </div>
                        <script>
                            // Function to hide the error alert after a specific time (in milliseconds)
                            setTimeout(function() {
                                $("#errorAlert").fadeOut("slow");
                            }, 3000); // Change 3000 to the desired time in milliseconds (e.g., 3000 milliseconds = 3 seconds)
                        </script>
                    @endif
                    @yield('breadcrumb')
                    <div class="row">
                        <div class="col-lg-12 grid-margin">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('admin.components.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/dist/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/dist/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/js/jquery.cookie.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/dist/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/dist/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/dist/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    <!--   dataTables   -->
    <script src="{{ asset('datatable/dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/axios.min.js') }}"></script>
    <script>
        new DataTable('#datatable', {
            paging: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            language: {
                search: '',
                searchPlaceholder: 'Search Records'
            },
            // dom: 'Bfrtip',
            // buttons: [{
            //     extend: 'excelHtml5',
            //     text: 'Export to Excel',
            // }],
        });
    </script>
    @yield('script')
</body>

</html>
