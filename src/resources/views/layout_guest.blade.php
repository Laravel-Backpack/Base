<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('backpack::inc.head')
</head>
<body class="">
    @yield('header')
    @yield('content')

    @include('backpack::inc.footer')

    @yield('before_scripts')
    @stack('before_scripts')

    @include('backpack::inc.scripts')
    @include('backpack::inc.alerts')

    @yield('after_scripts')
    @stack('after_scripts')

    <!-- JavaScripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
