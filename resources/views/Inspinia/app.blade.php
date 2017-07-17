<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA - @yield('title') </title>
    <meta  id="token" name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/animate.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/morris/morris-0.4.3.min.css') !!}" />

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('Inspinia.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('Inspinia.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('Inspinia.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->




<script src="{!! asset('js/jquery-3.1.1.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}" type="text/javascript"></script>
  <script src="{{ asset('js/app.js') }}"></script>

<script src="{!! asset('js/inspinia.js') !!}" type="text/javascript"></script>

  {{--<script src="{!! asset('js/morris/raphael-2.1.0.min.js') !!}" type="text/javascript"></script>--}}
  {{--<script src="{!! asset('js/morris/morris.js') !!}" type="text/javascript"></script>--}}
  {{--<script src="{!! asset('js/demo/morris-demo.js') !!}" type="text/javascript"></script>--}}
@section('scripts')
@show

</body>
</html>
