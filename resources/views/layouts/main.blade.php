@include('layouts.head')

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.partials.header')
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            @include('layouts.partials.navbar')

            @include('layouts.partials.sidebar')

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            @include('layouts.partials.footer')
        </div>
        <!-- end main content-->
    </div>

    @include('layouts.themes-settings')
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- apexcharts -->
    <script src="{{ asset('velzon/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Layout config Js -->
    <script src="{{ asset('velzon/assets/js/layout.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('velzon/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('velzon/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('velzon/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('velzon/assets/js/app.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('velzon/assets/js/plugins.js') }}"></script>
    <!-- prismjs plugin -->
    <script src="{{ asset('velzon/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('velzon/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('velzon/assets/js/pages/listjs.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('velzon/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- form wizard init -->
    <script src="{{ asset('velzon/assets/js/pages/form-wizard.init.js') }}"></script>
</body>


</html>
