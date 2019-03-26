<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('backpack::inc.head')
</head>
<body class="">
    <div class="page">
      <div class="page-main">
        @include('backpack::inc.header')
        @include('backpack::inc.menu')
        @yield('header')
        @yield('content')
      </div>

    </div>
    @include('backpack::inc.footer')

    @yield('before_scripts')
    @stack('before_scripts')

    @include('backpack::inc.scripts')
    @include('backpack::inc.alerts')

    @yield('after_scripts')
    @stack('after_scripts')
</body>
</html>
