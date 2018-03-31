<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ isset($title) ? $title.' :: '.config('backpack.base.project_name').' Admin' : config('backpack.base.project_name').' Admin' }}</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('vendor/coreui/') }}/src/css/style.min.css">

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        @yield('content')
      </div>
    </div>
  </div>

  @yield('before_scripts')
  @stack('before_scripts')

  <script src="js/app.js"></script>

  <script src="{{ asset('vendor/coreui') }}/src/js/jquery.min.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script>window.jQuery || document.write('<script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"><\/script>')</script> --}}
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
  <script src="{{ asset('vendor/coreui') }}/src/js/bootstrap.min.js"></script>
  <script src="{{ asset('vendor/coreui') }}/plugins/pace/pace.min.js"></script>
  <script src="{{ asset('vendor/coreui') }}/src/js/app.js"></script>

  @include(backpack_theme('inc.alerts'))

  @yield('after_scripts')
  @stack('after_scripts')
</body>

</html>
