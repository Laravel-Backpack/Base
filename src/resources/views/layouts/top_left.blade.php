<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
  @include(backpack_view('inc.head'))

</head>

<body class="{{ config('backpack.base.body_class') }}">

  @include(backpack_view('inc.main_header'))

  <div class="app-body">

    @include(backpack_view('inc.sidebar'))

    <main class="main">

       @includeWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'))

       @yield('header')

        <div class="container-fluid animated fadeIn">
          
          @if (isset($widgets['before_content']))
            @include(backpack_view('inc.widgets'), [ 'widgets' => $widgets['before_content'] ])
          @endif
          
          @yield('content')
          
          @if (isset($widgets['after_content']))
            @include(backpack_view('inc.widgets'), [ 'widgets' => $widgets['after_content'] ])
          @endif

        </div>

    </main>

  </div><!-- ./app-body -->

  <footer class="app-footer">
    @include(backpack_view('inc.footer'))
  </footer>

  @yield('before_scripts')
  @stack('before_scripts')

  @include(backpack_view('inc.scripts'))

  @yield('after_scripts')
  @stack('after_scripts')
</body>
</html>
