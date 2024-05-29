<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="theme-default"
  data-assets-path="{{ asset('materio/assets') }}" data-template="vertical-menu-template-free"
  class="light-style layout-menu-fixed layout-compact" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('materio/assets/img/favicon/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('materio/assets/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('materio/assets/vendor/css/core.css') }}"
      class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('materio/assets/vendor/css/theme-default.css') }}"
      class="template-customizer-theme-css" />
    <title>@yield('title') - Warung Digital</title>
    @stack('styles')
  </head>

  <body>
    <div class="w-100">
      @yield('content')
    </div>
    @stack('scripts')
  </body>

</html>
