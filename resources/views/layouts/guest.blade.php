<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/x-icon" href="{{ asset('materio/assets/img/favicon/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('materio/assets/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('materio/assets/vendor/css/core.css') }}"
      class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('materio/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('materio/assets/vendor/css/theme-default.css') }}"
      class="template-customizer-theme-css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>@yield('title') - Warung Digital</title>
    @stack('styles')
    <style>
      * {
        font-family: Poppins;
      }

      body {
        background: #F4F5FA;
        scroll-behavior: smooth;
      }
    </style>
  </head>

  <body>
    @include('sweetalert::alert')

    @include('components.navbar-guest')
    @yield('content')
    @include('components.footer-guest')

    <script src="{{ asset('materio/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('materio/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- <script src="{{ asset('materio/assets/vendor/libs/popper/popper.js') }}"></script> --}}
    {{-- <script src="{{ asset('materio/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script> --}}
    {{-- <script src="{{ asset('materio/assets/vendor/js/menu.js') }}"></script> --}}
    {{-- <script src="{{ asset('materio/assets/js/main.js') }}"></script> --}}
    @stack('scripts')
    <script>
      AOS.init();
    </script>
  </body>

</html>
