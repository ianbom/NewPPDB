<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin PPDB </title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    {{-- <script src="assets/js/plugin/webfont/webfont.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: [{{ asset('dashboard/assets/css/fonts.min.css') }}]

        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">



    <!-- CSS Files -->
    {{-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="/assets/css/plugins.min.css" /> --}}
    {{-- <link rel="stylesheet" href="assets/css/kaiadmin.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/kaiadmin.min.css') }}">


    <!-- CSS Just for demo purpose, don't include it in your project -->

    {{-- <link rel="stylesheet" href="assets/css/demo.css" /> --}}
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}">
  </head>
  <body>
    <div class="wrapper">

        @include('ppdb.admin.layout.sidebar')

        {{-- yield content di dalem header --}}
        @include('ppdb.admin.layout.header')


    </div>


    <!--   Core JS Files   -->
    {{-- <script src="assets/js/core/jquery-3.7.1.min.js"></script> --}}
    {{-- <script src="assets/js/core/popper.min.js"></script> --}}
    {{-- <script src="assets/js/core/bootstrap.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/core/bootstrap.min.js') }}"></script>


    <!-- jQuery Scrollbar -->
    {{-- <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    {{-- <script src="assets/js/plugin/chart.js/chart.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/chart.js/chart.min.js') }}"></script>


    <!-- jQuery Sparkline -->
    {{-- <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>


    <!-- Chart Circle -->
    {{-- <script src="assets/js/plugin/chart-circle/circles.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    {{-- <script src="assets/js/plugin/datatables/datatables.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    {{-- <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>


    <!-- jQuery Vector Maps -->
    {{-- <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    {{-- <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>


    <!-- Kaiadmin JS -->
    {{-- <script src="assets/js/kaiadmin.min.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    {{-- <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script> --}}
    <script src="{{ asset('dashboard/assets/js/setting-demo.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/demo.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>

    @yield('scripts')
  </body>
</html>
