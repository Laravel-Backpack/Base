<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @yield('before_styles')

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Pace style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/pace/pace.min.css">

    <style>
        /*   // TODO: move this in a separate file, that gets published   */
        /* Bootstrap Overwrites */
        .has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {
            color: #dd4b39;
        }

        /*  AdminLTE Overwrites  */
        .box {
          border-radius: 0;
          border-top: 1px solid #d2d6de;
        }

        body[class^='skin-'] .sidebar-menu>li>a {
          border-left: 1px solid transparent;
        }


        .btn-primary {
          color: #fff;
          background-color: #605ca8;
          border-color: #57549C;
        }
        .btn-primary:focus,
        .btn-primary.focus {
          color: #fff;
          background-color: #7673BD;
          border-color: #122b40;
        }
        .btn-primary:hover {
          color: #fff;
          background-color: #7673BD;
          border-color: #57549C;
        }
        .btn-primary:active,
        .btn-primary.active,
        .open > .dropdown-toggle.btn-primary {
          color: #fff;
          background-color: #7673BD;
          border-color: #57549C;
        }
        .btn-primary:active:hover,
        .btn-primary.active:hover,
        .open > .dropdown-toggle.btn-primary:hover,
        .btn-primary:active:focus,
        .btn-primary.active:focus,
        .open > .dropdown-toggle.btn-primary:focus,
        .btn-primary:active.focus,
        .btn-primary.active.focus,
        .open > .dropdown-toggle.btn-primary.focus {
          color: #fff;
          background-color: #57549C;
          border-color: #122b40;
        }
        .btn-primary:active,
        .btn-primary.active,
        .open > .dropdown-toggle.btn-primary {
          background-image: none;
        }
        .btn-primary.disabled,
        .btn-primary[disabled],
        fieldset[disabled] .btn-primary,
        .btn-primary.disabled:hover,
        .btn-primary[disabled]:hover,
        fieldset[disabled] .btn-primary:hover,
        .btn-primary.disabled:focus,
        .btn-primary[disabled]:focus,
        fieldset[disabled] .btn-primary:focus,
        .btn-primary.disabled.focus,
        .btn-primary[disabled].focus,
        fieldset[disabled] .btn-primary.focus,
        .btn-primary.disabled:active,
        .btn-primary[disabled]:active,
        fieldset[disabled] .btn-primary:active,
        .btn-primary.disabled.active,
        .btn-primary[disabled].active,
        fieldset[disabled] .btn-primary.active {
          background-color: #605ca8;
          border-color: #57549C;
        }
        .btn-primary .badge {
          color: #605ca8;
          background-color: #fff;
        }
    </style>

    @yield('after_styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition {{ config('base.skin') }} sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">{!! config('base.logo_mini') !!}</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">{!! config('base.logo_lg') !!}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          @include('backpack::inc.menu')
        </nav>
      </header>

      <!-- =============================================== -->

      @include('backpack::inc.sidebar')

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('page_title')
          </h1>
          <ol class="breadcrumb">
            @yield('breadcrumbs')
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          @yield('content')

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        @if (config('base.show_powered_by'))
            <div class="pull-right hidden-xs">
              Powered by <a target="_blank" href="http://github.com/laravel-backpack">Laravel BackPack</a>
            </div>
        @endif
        Handcrafted by <a target="_blank" href="{{ config('base.developer_link') }}">{{ config('base.developer_name') }}</a>.
      </footer>
    </div>
    <!-- ./wrapper -->


    @yield('before_scripts')

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('vendor/adminlte') }}/bootstrap/js/bootstrap.min.js"></script>
    <!-- PACE -->
    <script src="{{ asset('vendor/adminlte') }}/plugins/pace/pace.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('vendor/adminlte') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendor/adminlte') }}/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/adminlte') }}/dist/js/app.min.js"></script>
    <!-- page script -->
    <script type="text/javascript">
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() { Pace.restart(); });
    </script>

    @yield('after_scripts')

    <!-- JavaScripts -->
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
