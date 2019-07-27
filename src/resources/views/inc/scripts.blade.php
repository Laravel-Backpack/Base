@if (config('backpack.base.scripts') && count(config('backpack.base.scripts')))
    @foreach (config('backpack.base.scripts') as $path)
    <script type="text/javascript" src="{{ asset($path) }}"></script>
    @endforeach
@endif

@if (config('backpack.base.mix_scripts') && count(config('backpack.base.mix_scripts')))
    @foreach (config('backpack.base.mix_scripts') as $path)
    <script type="text/javascript" src="{{ mix($path) }}"></script>
    @endforeach
@endif

<!-- page script -->
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function() { Pace.restart(); });

    // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    {{-- Enable deep link to tab --}}
    var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
    location.hash && activeTab && activeTab.tab('show');
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        location.hash = e.target.hash.replace("#tab_", "#");
    });
</script>

@include('backpack::inc.alerts')