<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="" />
    <title> @yield('title') || Kobir's Dashboard</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.ico" type="image/x-icon') }}" />
    <!-- Vector CSS -->
    <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!--Data Tables -->
    <link href="{{ asset('backend/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css">
    <!-- Icons CSS-->
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- notification -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/notifications/css/lobibox.min.css') }}" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('backend/assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Bootstrap Toggle CSS-->
    <link href="{{ asset('backend/assets/css/bootstrap-toggle.min.css') }}" rel="stylesheet" />
    <!-- Datepicker CSS-->
    <link href="{{ asset('backend/assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <!--multi select-->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/plugins/jquery-multi-select/multi-select.css') }}" rel="stylesheet"
    type="text/css">
    <!-- Custom Style-->
    <link href="{{ asset('backend/assets/css/app-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/custom.css') }}" rel="stylesheet" />

</head>

<body>

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        @include('backend.includes.sidebar')
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        @include('backend.includes.header')
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                <!--Start Dashboard Content-->
                @yield('main-content')
                <!--End Dashboard Content-->

            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        @include('backend.includes.footer')
        <!--End footer-->

    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('backend/assets/js/sidebar-menu.js') }}"></script>

    <!-- Custom scripts -->
    <script src="{{ asset('backend/assets/js/app-script.js') }}"></script>
    <!-- Bootstrap toggle scripts -->
    <script src="{{ asset('backend/assets/js/bootstrap-toggle.min.js') }}"></script>
    <!--notification js -->
    <script src="{{ asset('backend/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/notifications/js/notifications.min.js') }}"></script>

    <!--Datapicker js -->
    <script src="{{ asset('backend/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <!--Data Tables js-->
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>
    <!--Select2-->
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Multi Select Js-->
    <script src="{{ asset('backend/assets/plugins/jquery-multi-select/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-multi-select/jquery.quicksearch.js') }}"></script>
    @yield('js')

    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>
    <!-- Index js -->
    <script src="{{ asset('backend/assets/js/index.js') }}"></script>


</body>

</html>
