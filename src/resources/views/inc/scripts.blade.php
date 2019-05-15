<!-- page script -->
<script type="text/javascript">
    // To make Pace works on Ajax calls
    // $(document).ajaxStart(function() { Pace.restart(); });

    require(['jquery'], function($) {

            // ------
            // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
            // ------
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // ------
            // Enable deep link to tab
            // ------
            var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
            location.hash && activeTab && activeTab.tab('show');
            $('.nav-tabs a').on('shown.bs.tab', function (e) {
                location.hash = e.target.hash.replace("#tab_", "#");
            });

            // ------
            // Set active state on menu element
            // ------
            var current_url = "{{ Request::fullUrl() }}";
            var full_url = current_url+location.search;
            var $navLinks = $("#bpMainMenu li a");
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

            $curentPageLink.addClass('active');
            $curentPageLink.parents('.nav-item').children('a').addClass('active');

    });
</script>

{{-- <script src="{{ mix('js/app.js') }}"></script> --}}