<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', config('app.name'))</title>

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
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <div id="app">

    @include('layouts.header')
    <div class="app-body">
      @include('layouts.sidebar')
      <main class="main">
        {!! Breadcrumbs::render() !!}

        <div class="container-fluid">
          <div class="animated fadeIn">
            @include('includes.messages')

            @yield('content')
          </div>
        </div>
      </main>
    </div>

  </div>

  {-- @stack('calendar-script') --} 
</body>
</html>
