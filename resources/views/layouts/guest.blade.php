<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>@yield('title') - Warung Digital</title>
</head>

<body>
  @yield('content')
	
  <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>
