<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <link rel="shortcut icon" href="{{ asset('assets2/images/favicon.ico') }}">
    <script src="{{ asset('assets2/js/layout.js') }}"></script>
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets2/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets2/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets2/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

    @include('layouts.client.menu-user')
    @yield('content2')
    {{-- @include('layouts.client.footer-user') --}}



    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets2/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets2/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets2/js/plugins.js') }}"></script>
    <script src="{{ asset('assets2/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets2/js/app.js') }}"></script>

</body>

</html>
