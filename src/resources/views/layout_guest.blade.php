<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('backpack::inc.head')
</head>
<body class="app flex-row align-items-center">
    {{-- <div class="app-body"> --}}

      {{-- @include('backpack::inc.sidebar') --}}

      <!-- Content Wrapper. Contains page content -->
      {{-- <main class="main"> --}}
        <!-- Content Header (Page header) -->
         @yield('header')

        <!-- Main content -->
        {{-- <div class="container-fluid animated fadeIn"> --}}

          <div class="container">
          @yield('content')
          </div>

        {{-- </div> --}}
        <!-- /.content -->
      {{-- </main> --}}
      <!-- /.content-wrapper -->

    {{-- </div> --}}
    <!-- ./app-body -->

    <footer class="app-footer sticky-footer">
      @include('backpack::inc.footer')
    </footer>

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
