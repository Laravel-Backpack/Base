<!-- =================================================== -->
<!-- ========== Top menu items (ordered left) ========== -->
<!-- =================================================== -->
<ul class="nav navbar-nav d-md-down-none">

    @if (backpack_auth()->check())
        <!-- Topbar. Contains the left part -->
        @include(backpack_view('inc.topbar_left_content'))
    @endif

</ul>
<!-- ========== End of top menu left items ========== -->



<!-- ========================================================= -->
<!-- ========= Top menu right items (ordered right) ========== -->
<!-- ========================================================= -->
<ul class="nav navbar-nav ml-auto">

    @if (config('backpack.base.setup_auth_routes'))
        @if (backpack_auth()->guest())
            <li class="nav-item"><a class="nav-link" href="{{ url(config('backpack.base.route_prefix', 'admin').'/login') }}">{{ trans('backpack::base.login') }}</a>
            </li>
            @if (config('backpack.base.registration_open'))
                <li class="nav-item"><a class="nav-link" href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a></li>
            @endif
        @else
            <!-- Topbar. Contains the right part -->
            @include(backpack_view('inc.topbar_right_content'))
            @include(backpack_view('inc.menu_user_dropdown'))
        @endif
    @endif
</ul>
<!-- ========== End of top menu right items ========== -->
