<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Administración de Documentos') }}</title>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="/js/lang.js" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  <!-- Icon -->
  <link rel="icon" href="{{ asset('images/dm-v3.png') }}">
</head>
<body class="landing-page">
  @yield('content')
</body>
</html>
