<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('') }}AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}AdminLTE/dist/css/adminlte.min.css">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">



        @include('partials.header')
        @include('partials.sidebar')

        @yield('content')

        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('vendors\jquery\jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('') }}AdminLTE/plugins/jquery/jquery.min.js"></script> --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}AdminLTE/dist/js/adminlte.min.js"></script>

    @yield('js')

</body>

</html>
