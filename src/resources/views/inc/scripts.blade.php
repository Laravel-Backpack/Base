<!-- jQuery 2.2.3 -->
<script src="{{ asset('vendor/adminlte') }}/bower_components/jquery/dist/jquery.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('vendor/adminlte') }}/plugins/jQuery/jQuery-2.2.3.min.js"><\/script>')</script> --}}
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('vendor/adminlte') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('vendor/adminlte') }}/plugins/pace/pace.min.js"></script>
<script src="{{ asset('vendor/adminlte') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
{{-- <script src="{{ asset('vendor/adminlte') }}/bower_components/fastclick/lib/fastclick.js"></script> --}}
<script src="{{ asset('vendor/adminlte') }}/dist/js/adminlte.min.js"></script>

<!-- page script -->
<script type="text/javascript">
    /* Store sidebar state */
    $('.sidebar-toggle').click(function(event) {
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