<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
  @include('backpack::inc.head')

</head>

<body class="{{ config('backpack.base.body_class') }}">

  @include('backpack::inc.main_header')

  <div class="app-body">

    @include('backpack::inc.sidebar')

    <main class="main">

       @includeWhen(isset($breadcrumbs), 'backpack::inc.breadcrumbs')
       
       @yield('header')

        <div class="container-fluid animated fadeIn pt-3 pb-3">
        @yield('content')
        </div>

    </main>


  </div><!-- ./app-body -->

  <footer class="app-footer">
    @include('backpack::inc.footer')
  </footer>

  @yield('before_scripts')
  @stack('before_scripts')

  @include('backpack::inc.scripts')

  @yield('after_scripts')
  @stack('after_scripts')
</body>
</html>
