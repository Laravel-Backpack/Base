<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>
      {{ isset($title) ? $title.' :: '.config('backpack.base.project_name').' Admin' : config('backpack.base.project_name').' Admin' }}
    </title>

    @yield('before_styles')
    @stack('before_styles')

    <link rel="stylesheet" href="{{ asset('vendor/coreui/') }}/src/css/style.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/backpack.coreui.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('vendor/coreui/') }}/plugins/pace/pace.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/pnotify/pnotify.custom.min.css') }}">

    @yield('after_styles')
    @stack('after_styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

  	<script type="text/javascript">
  		/* Recover sidebar state */
  		(function () {
  			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
  				var body = document.getElementsByTagName('body')[0];
  				body.className = body.className + ' sidebar-minimized';
  			}
  		})();
  	</script>

  <header class="app-header navbar">
  	<button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('') }}">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini d-none">{!! config('backpack.base.logo_mini') !!}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{!! config('backpack.base.logo_lg') !!}</span>
    </a>
    <button class="navbar-toggler brand-minimizer sidebar-minimizer d-md-down-none" type="button"><span class="navbar-toggler-icon"></span></button>
  	@include(backpack_theme('inc.menu'))
  </header>

    <!-- Site wrapper -->
    <div class="app-body">
      @include(backpack_theme('inc.sidebar'))

      <!-- Main content -->
      <main class="main">
        @yield('header')

        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.conainer-fluid -->
      </main>

    </div>

      <footer class="app-footer">
        <span>{{ trans('backpack::base.handcrafted_by') }} <a target="_blank" href="{{ config('backpack.base.developer_link') }}">{{ config('backpack.base.developer_name') }}</a>.</span>
        <span class="ml-auto">{{ trans('backpack::base.powered_by') }} <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a></span>
      </footer>
    <!-- ./wrapper -->


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

    <!-- page script -->
    <script type="text/javascript">
        /* Store sidebar state */
        $('.sidebar-minimizer').click(function(event) {
          $(".logo-mini").toggleClass("d-none");
          $(".logo-lg").toggleClass("d-none");
          event.preventDefault();
          if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
            sessionStorage.setItem('sidebar-toggle-collapsed', '');
          } else {
            sessionStorage.setItem('sidebar-toggle-collapsed', '1');
          }
        });
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function() { Pace.restart(); });

        // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        // Set active state on menu element
        var current_url = "{{ Request::fullUrl() }}";
        var full_url = current_url+location.search;
        var $navLinks = $("ul.sidebar-menu li a");
        // First look for an exact match including the search string
        var $curentPageLink = $navLinks.filter(
            function() { return $(this).attr('href') === full_url; }
        );
        // If not found, look for the link that starts with the url
        if(!$curentPageLink.length > 0){
            $curentPageLink = $navLinks.filter(
                function() { return $(this).attr('href').startsWith(current_url) || current_url.startsWith($(this).attr('href')); }
            );
        }

        $curentPageLink.parents('li').addClass('active');
        {{-- Enable deep link to tab --}}
        var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
        location.hash && activeTab && activeTab.tab('show');
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            location.hash = e.target.hash.replace("#tab_", "#");
        });
    </script>

    @include(backpack_theme('inc.alerts'))

    @yield('after_scripts')
    @stack('after_scripts')

    <!-- JavaScripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
