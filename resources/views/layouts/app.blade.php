<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">
@include('layouts.components.head-tag')
<body>
    @include('layouts.components.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.components.header ')
        <div class="body flex-grow-1 px-3">
            @yield('content')
        </div>
        @include('layouts.components.footer')
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('assets/dist/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('assets/dist/vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/distvendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('assets/dist/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('assets/dist/js/main.js') }}"></script>
    <script></script>

</body>

</html>
