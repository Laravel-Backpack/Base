<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('backpack::inc.head')
</head>
<body class="hold-transition @yield('body_attributes')">

@yield('login-box')

@include('backpack::inc.footer_guest')

@yield('before_scripts')

@include('backpack::inc.scripts')

@include('backpack::inc.alerts')

@yield('after_scripts')

<!-- JavaScripts -->
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

</body>
</html>
