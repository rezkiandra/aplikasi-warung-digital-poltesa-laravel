<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free" class="light-style layout-menu-fixed layout-compact" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="icon" type="image/x-icon" href="{{ asset('materio/assets/img/favicon/favicon.ico') }}" />
  <link rel="stylesheet" href="{{ asset('materio/assets/vendor/fonts/materialdesignicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('materio/assets/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('materio/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('materio/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('materio/assets/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('materio/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('materio/assets/vendor/css/pages/page-auth.css') }}" />

  <script src="{{ asset('materio/js/helpers.js') }}"></script>
  <script src="{{ asset('materio/assets/js/config.js') }}"></script>

  <title>@yield('title') - Warung Digital</title>
</head>

<body>
	@include('sweetalert::alert')
  {{-- Content --}}
  <div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        {{-- Card --}}
        @yield('content')
        {{-- End card --}}
      </div>
    </div>
  </div>
  {{-- End content --}}

  <script src="{{ asset('materio/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('materio/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('materio/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('materio/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('materio/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('materio/assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('materio/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
  <script src="{{ asset('materio/assets/js/main.js') }}"></script>
  <script src="{{ asset('materio/assets/js/dashboards-analytics.js') }}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
