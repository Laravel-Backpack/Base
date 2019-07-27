<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
  @include('backpack::inc.head')
</head>

<body class="{{ config('backpack.base.body_class') }}">

	<script type="text/javascript">
		/* Recover sidebar state */
		(function () {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>

    <!-- Site wrapper -->
    @include('backpack::inc.main_header')
    <!-- ./app-header -->

    <div class="app-body">

      @include('backpack::inc.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <main class="main">
        <!-- Content Header (Page header) -->
         @yield('header')

        <!-- Main content -->
        <div class="container-fluid animated fadeIn">

          @yield('content')

        </div>
        <!-- /.content -->
      </main>
      <!-- /.content-wrapper -->

    </div>
    <!-- ./app-body -->

    <footer class="app-footer">
      @include('backpack::inc.footer')
    </footer>


    @yield('before_scripts')
    @stack('before_scripts')

    @include('backpack::inc.scripts')
    @include('backpack::inc.alerts')

    @yield('after_scripts')
    @stack('after_scripts')

    <script>
        /* Store sidebar state */
        $('.sidebar-toggle').click(function(event) {
          event.preventDefault();
          if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
            sessionStorage.setItem('sidebar-toggle-collapsed', '');
          } else {
            sessionStorage.setItem('sidebar-toggle-collapsed', '1');
          }
        });

        // Set active state on menu element
        var full_url = "{{ Request::fullUrl() }}";
        var $navLinks = $("ul.sidebar-menu li a");
        // First look for an exact match including the search string
        var $curentPageLink = $navLinks.filter(
            function() { return $(this).attr('href') === full_url; }
        );
        // If not found, look for the link that starts with the url
        if(!$curentPageLink.length > 0){
            $curentPageLink = $navLinks.filter(
                function() { return $(this).attr('href').startsWith(full_url) || full_url.startsWith($(this).attr('href')); }
            );
        }

        $curentPageLink.parents('li').addClass('active');
    </script>

    <!-- JavaScripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>
